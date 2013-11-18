<?
	define('SEARCH_INCLUDES', 'w3s_inc');
	require_once SEARCH_INCLUDES . '/search.conf';

	if (isset($_GET['cache'])) {
		$w3s_res=mysql_query("SELECT * FROM `" . TABLE . "_cache` WHERE `key`='" . mysql_real_escape_string($_GET['cache']) . "' LIMIT 1");
		$w3s_cache=mysql_fetch_assoc($w3s_res); mysql_free_result($w3s_res);

		$w3s_cache['pages']=unserialize($w3s_cache['pages']);
		$w3s_cache['words']=unserialize($w3s_cache['words']);

		if (!is_array($w3s_cache)) {
			require_once HEADER;
			echo '<p>Ошибка: результат поиска с таким кодом не найден. Возможно он устарел и был удалён из кэша.</p>';
		} else {
			$result=$w3s_cache;
			if (!$result['count']) {
				$w3s_query=$_GET['q']=$result['query'];
				require_once HEADER;
				echo '<p>К сожалению, результатов по Вашему запросу не найдено.</p>';
			} else {
				if (!isset($_GET['page'])) {
					$w3s_page=0;
				} else	$w3s_page=abs(intval($_GET['page']));

				$q='SELECT `url`, `title`, `text`, `lastupdate` FROM `' . TABLE . '` WHERE `url` IN (';
				foreach($result['pages'] as $i) $q.='"' . $i . '", ';
				$q.='"") LIMIT ' . ($w3s_page * RESULTS_PER_PAGE) . ', ' . RESULTS_PER_PAGE;

				$w3s_query=$_GET['q']=$result['query'];
				require_once HEADER;

				$res=@mysql_query($q);
				while($w3s_item=@mysql_fetch_assoc($res)) {
					$w3s_item['text']=w3s_linkText($w3s_item['text'], $result['words']);
					require SEARCH_INCLUDES . '/search_item.php';
				} mysql_free_result($res);

				if ($result['count']>RESULTS_PER_PAGE) {
					require_once SEARCH_INCLUDES . '/search_pages.php';
				}
			}
		}
	} else {
		header('Location: search.php');
	}

	echo '<div class="copyright">Поиск по сайту &copy;2006 — <a href="http://evgeny.neverov.name/" target="_blank">Неверов Евгений</a></div>';

	require_once FOOTER;
?>