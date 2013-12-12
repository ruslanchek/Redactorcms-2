<?
	header('content-type: text/plain; charset=windows-1251');
	header('machine-type: w3search 1.0.5');
		// Ќи в коем случае не удал€йте строку выше Ч без неЄ
		// Ђ”далЄнное индексированиеї будет ¬ам недоступно.

	list($w3s_msec, $w3s_sec)=explode(chr(32), microtime());
	$w3s_mTimeStart=$w3s_sec+$w3s_msec;

	define('SEARCH_INCLUDES', '.');
	require_once SEARCH_INCLUDES . '/search.conf';

	$w3s_lastUpdate=gmdate('U')-UPDATE_EVERY;

	$w3s_res=@mysql_query("SELECT `url`, `referrer`, `md5` FROM `" . TABLE . "` WHERE `text`='' OR `lastupdate`<" . $w3s_lastUpdate . " OR `md5`='' LIMIT 0, " . PAGES_PER_TIME);
	while ($w3s_row=@mysql_fetch_array($w3s_res)) {
		$w3s_r=w3s_indexURL($w3s_row['url'], $w3s_row['referrer'], $w3s_row['md5']);
		echo '[' . $w3s_row['url'] . '] ';
		if ($w3s_r=='added') echo 'проиндексирован успешно';
		else echo 'не проиндексирован';

		echo "\r\n";
	}
	@mysql_free_result($w3s_res);

	list($w3s_msec, $w3s_sec)=explode(chr(32), microtime());
	$w3s_mTime=round(($w3s_sec+$w3s_msec)-$w3s_mTimeStart, 6);
	echo '¬рем€ индексации: ' . $w3s_mTime . ' сек.' . "\r\n";
?>