<?
	define('SEARCH_INCLUDES', 'w3s_inc');
	require_once SEARCH_INCLUDES . '/search.conf';

	$w3s_query=strtolower(@$_GET['q']);
	$w3s_query=str_replace('ё', 'е', $w3s_query);
	$w3s_query=str_replace(array('nbsp', 'laquo', 'raquo', "\r", "\n"), ' ', $w3s_query);
	$w3s_query=str_replace('!', '	', $w3s_query);
	$w3s_query=str_replace('-', '	', $w3s_query);
	$w3s_query=preg_replace('([[:punct:]]+)', ' ', $w3s_query);
	$w3s_query=str_replace('	', '!', $w3s_query);
	$w3s_query=preg_replace('([[:space:]]+)', ' ', $w3s_query);
	$w3s_wordArray=explode(' ', $w3s_query);
	array_walk($w3s_wordArray, 'w3s_exclude');
	$w3s_query=urlencode(trim(implode(' ', $w3s_wordArray)));

	if (trim(implode('', $w3s_wordArray))!='') {
		$w3s_db_query='SELECT `url`, `text` FROM `' . TABLE . '` WHERE ';
		$w3s_where_cond='';
		foreach($w3s_wordArray as $w3s_i) {
			$w3s_i=trim($w3s_i); $w3s_where_cond.='`text` ';
			if (substr($w3s_i, 0, 1)=='!') { $w3s_where_cond.='NOT '; $w3s_i=substr($w3s_i, 1); }
			$w3s_where_cond.='LIKE \'%' . @mysql_real_escape_string($w3s_i) . '%\' AND ';
		}
		$w3s_where_cond=substr($w3s_where_cond, 0, -4);
		$w3s_db_query.=$w3s_where_cond;

		$w3s_res=@mysql_query($w3s_db_query);
		while($w3s_item=@mysql_fetch_assoc($w3s_res))
			$w3s_result[$w3s_item['url']]=w3s_getRank($w3s_item['text'], $w3s_wordArray);
		@mysql_free_result($w3s_res);

		// На всякий случай меняем права у кэш-файла
		mysql_query("DELETE FROM `" . TABLE . "_cache` WHERE `date`<" . (gmdate('U')-3600));

		if (isset($w3s_result)) {
			arsort($w3s_result);
			$w3s_results=array(
				'count'=>count($w3s_result),
				'pages'=>array(),
				'query'=>$_GET['q'],
				'words'=>$w3s_wordArray
			);
			foreach ($w3s_result as $url=>$rank) $w3s_results['pages'][]=$url;
		} else {
			$w3s_results=array(
				'count'=>0,
				'pages'=>array(),
				'query'=>$_GET['q'],
				'words'=>$w3s_wordArray
			);
		}

		$w3s_key=md5(serialize($w3s_results));

		mysql_query("INSERT INTO `" . TABLE . "_cache` (`key`, `date`, `count`, `pages`, `query`, `words`) VALUES ('" . $w3s_key . "', '" . gmdate('U') . "', '" . $w3s_results['count'] . "', '" . serialize($w3s_results['pages']) . "', '" . $w3s_results['query'] . "', '" . serialize($w3s_results['words']) . "')");

		header('location: search-results.php?cache=' . $w3s_key);
	} else {
		require_once HEADER;
		echo '<div class="copyright">Поиск по сайту &copy;2006 — <a href="http://evgeny.neverov.name/" target="_blank">Неверов Евгений</a></div>';
		require_once FOOTER;
	}
?>