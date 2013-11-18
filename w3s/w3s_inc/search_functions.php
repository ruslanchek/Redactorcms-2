<?
	function w3s_mdate($timestamp) {
		$m[1]='января';
		$m[2]='февраля';
		$m[3]='марта';
		$m[4]='апреля';
		$m[5]='мая';
		$m[6]='июня';
		$m[7]='июля';
		$m[8]='августа';
		$m[9]='сентября';
		$m[10]='октября';
		$m[11]='ноября';
		$m[12]='декабря';

		return date('j', $timestamp) . ' ' . $m[date('n', $timestamp)] . ' ' . date('Y') . ' года, ' . date('G:i:s', $timestamp);
	}

	function w3s_addToBlacklist($url) {
		global $doNotUploadURLs;

		if (file_exists(SEARCH_INCLUDES . '/blacklist.conf')) @chmod('blacklist.conf', 0777);
		$f=@fopen('blacklist.conf', 'a+');
		@fwrite($f, $url . "\r\n"); @fclose($f);

		@chmod('blacklist.conf', 0777);

		return TRUE;
	}

	function w3s_exclude(&$item1, $key) {
		$x=0;
		if (strlen($item1)<3) { $x=1; $item1=''; }
		if (strval(intval($item1))==$item1) { $x=1; $item1=''; }
		if (in_array($item1, $GLOBALS['stopWords'])) { $x=1; $item=''; }
		if ($x!=1) $item1=' ' . trim($item1) . ' ';
	}

	function w3s_getExistURLsList() {
		if (isset($GLOBALS['existURLs'])) return $GLOBALS['existURLs'];

		$GLOBALS['existURLs']=array();
		$res=@mysql_query("SELECT `url` FROM `" . TABLE . "` WHERE 1");
		while ($row=@mysql_fetch_row($res))
			$GLOBALS['existURLs'][]=$row[0];
		@mysql_fetch_array($res);

		return $GLOBALS['existURLs'];
	}

	function w3s_getDoNotUploadURLsList() {
		if (isset($GLOBALS['doNotUploadURLs'])) return $GLOBALS['doNotUploadURLs'];

		$GLOBALS['doNotUploadURLs']=@file(SEARCH_INCLUDES . '/blacklist.conf');
		array_walk($GLOBALS['doNotUploadURLs'], create_function('&$item', '$item=str_replace("\r", \'\', $item); $item=str_replace("\n", \'\', $item);'));

		return $GLOBALS['doNotUploadURLs'];
	}

	function w3s_indexURL($url, $ref='', $md5='') {
		$existURLs=w3s_getExistURLsList();
		$doNotUploadURLs=w3s_getDoNotUploadURLsList();

		mt_srand();
		if (empty($md5)) $md5=md5(uniqid(mt_rand(), true));

		$ret=w3s_index($url, $ref, $md5);

		if ($ret['number']==200 and $ret['action']=='update') {
			$retval='added';
			$res=@mysql_query("SELECT `text` FROM `" . TABLE . "` WHERE `url`='" . @mysql_real_escape_string($url) . "'");
			$p=@mysql_fetch_row($res); @mysql_free_result($res);
			if (isset($p[0])) {
				$res=@mysql_query("UPDATE `" . TABLE . "` SET `text`='" . @mysql_real_escape_string($ret['string']) . "', `md5`='" . $ret['md5'] . "', `lastupdate`='" . gmdate('U') . "', `title`='" . @mysql_real_escape_string($ret['title']) . "' WHERE `url`='" . @mysql_real_escape_string($url) . "'");
			} else {
				$res=@mysql_query("INSERT INTO `" . TABLE . "` (`text`, `md5`, `lastupdate`, `title`, `url`) VALUES ('" . @mysql_real_escape_string($ret['string']) . "', '" . $ret['md5'] . "', '" . gmdate('U') . "', '" . @mysql_real_escape_string($ret['title']) . "', '" . @mysql_real_escape_string($url) . "');");
			}
			@mysql_free_result($res);

			$query='INSERT INTO `' . TABLE . '` ( `url`, `referrer`, `md5`, `lastupdate` ) VALUES '; $insertedRows=0;
			foreach($ret['links'] as $k) {
				if (!@in_array($k, $existURLs) and !@in_array($k, $doNotUploadURLs)) {
					$query.="('" . @mysql_real_escape_string($k) . "', '" . @mysql_real_escape_string($url) . "', '" . md5(uniqid(mt_rand(), true)) . "', '0'), ";
					$existURLs[]=$k;
					$insertedRows++;
				}
			}

			if ($insertedRows>0) {
				$res=@mysql_query(substr($query, 0, -2));
				@mysql_free_result($res);
			}
		} else {
			$retval='not added';
			if ($ret['action']=='delete') {
				$res=@mysql_query("DELETE FROM `" . TABLE . "` WHERE `url`='" . @mysql_real_escape_string($url) . "'"); @mysql_free_result($res);

				w3s_addToBlacklist($url);
				$retval='deleted';
			}
		}

		return $retval;
	}

	function w3s_index($url, $ref, $md5) {
		global $acceptMIMETypes, $deniedExtensions, $replacementArrays;
		$rn="\r\n";

		$doNotUploadURLs=w3s_getDoNotUploadURLsList();

		if (function_exists('curl_init') AND CAN_USE_CURL) {
			$c=curl_init(STARTURL . $url);
			curl_setopt($c, CURLOPT_HEADER, 1);
			curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($c, CURLOPT_REFERER, ($ref?$ref:STARTURL));
			curl_setopt($c, CURLOPT_USERAGENT, UA);
			curl_setopt($c, CURLOPT_HTTPHEADER, array('Accept: ' . implode(', ', $acceptMIMETypes), 'Accept-Encoding: '));
			$res=explode("\n", curl_exec($c));
			curl_close($c);
			$inputData=FALSE; $fileData=NULL;
			foreach($res as $line) {
				$line=str_replace(array("\r", "\n"), array(''), $line);

				if ($inputData) {
					if (!$fileData) $fileData=$line;
					else		$fileData.=$rn . $line;
				} else {
					$r=w3s_analyzeLine($line, $url);

					$contentType=$r[0];
					$charset=$r[1];
					$encoding=$r[2];
					$retVal=$r[3];

					if ($retVal['number']==602) return w3s_index($retVal['string'], STARTURL . $url, $md5);

					if (!$line) $inputData=TRUE;
				}
			}
		} else {
			$query='GET ' . $url . ' HTTP/' . HTTP . $rn . 'Referer: ' . ($ref?$ref:STARTURL) . $rn . 'Content-Type: application/x-www-form-urlencoded' . $rn . 'Host: ' . URLHOST . $rn . 'Accept: ' . implode(', ', $acceptMIMETypes) . $rn . 'Accept-Encoding: ' . $rn . 'Connection: Close' . $rn . 'User-Agent: ' . UA . $rn . $rn;
	
			$errno=0; $errstr='';
			$f=fsockopen(URLHOST, 80, $errno, $errstr, 50);
			if (!$f) {
				$retVal=array(
					'number'=>$errno,
					'string'=>$errstr
				);
			} else {
				@fwrite($f, $query);
				$inputData=FALSE; $fileData=NULL;
				while(!@feof($f)) {
					$line=fgets($f, 1024*1024);
						// Читаем строку 1Mb из потока…
	
					$line=str_replace(array("\r", "\n"), array(''), $line);

					if ($inputData) {
						if (!$fileData) $fileData=$line;
						else		$fileData.=$rn . $line;
					} else {
						$r=w3s_analyzeLine($line, $url);

						$contentType=$r[0];
						$charset=$r[1];
						$encoding=$r[2];
						$retVal=$r[3];

						if ($retVal['number']==602) return w3s_index($retVal['string'], STARTURL . $url, $md5);

						if (!$line) $inputData=TRUE;
					}
				}
				@fclose($f);
			}
		}

		if (isset($encoding) and $encoding=='deflate' and function_exists('gzinflate'))
			$fileData=@gzinflate($fileData);

		$retVal=array(
			'number'=>200,
			'md5'=>md5(@$fileData)
		);

		if ($md5!=$retVal['md5']) {
			$retVal['action']='update';

			if (DECODE_DATA) {
				// Ищем значение кодировки в тегах <meta>
				$ret=''; $mask='#<meta http-equiv="content-type" content="[a-zA-Z0-9\/]+;[\s]*charset=([-\w]+)#i';
				preg_match($mask, $fileData, $ret);
				if (isset($ret[1]) and !empty($ret[1])) $charset=$ret[1];

				// Перекодировываем результат
				if ($charset!='windows-1251' and $charset!='win-1251') {
					if (DECODE_METHOD=='iconv') {
						$fileData=@iconv(strtoupper($charset), 'WINDOWS-1251', $fileData);
					} else {
						if ($charset=='cp866') $charset='a';
						if ($charset=='koi8-r') $charset='k';
						if ($charset=='koi-8r') $charset='k';
						if ($charset=='cp-866') $charset='a';
						if ($charset=='x-cp866') $charset='a';
						if ($charset=='x-cp-866') $charset='a';
						if ($charset=='alt-866') $charset='a';
						if ($charset=='iso8859-5') $charset='i';
						if ($charset=='x-mac-cyrillic') $charset='m';

						$fileData=@convert_cyr_string($charset, 'w', $fileData);
					}
				}
			}

			// Находим заголовок страницы
			$ts=split('title>', $fileData);
			if (isset($ts[1]) and !empty($ts[1])) $title=substr($ts[1], 0, -2);

			// Если нужно использовать ограничители текста, используем их
			if (USE_INDEX_DELIMITERS) {
				$startPos=strpos(' ' . $fileData, INDEX_DELIMITER_START) + strlen(INDEX_DELIMITER_START)-1;
				$endPos=strpos(' ' . $fileData, INDEX_DELIMITER_END)-1;
				if ($startPos and !$endPos) {
					$fileData=substr($fileData, $startPos);
				} elseif (!$startPos and $endPos) {
					$fileData=substr($fileData, 0, $endPos);
				} elseif ($startPos and $endPos) {
					$fileData=substr($fileData, $startPos, ($endPos-$startPos));
				}
			}

			// Удаляем теги <noindex> если это разрешено и обязательно удаляем все комментарии
			if (USE_NOINDEX_TAG)
				$fileData=preg_replace('#<noindex>[^\x00]*?<\/noindex>#i', ' ', $fileData);

			$fileData=preg_replace('#<!--[^\x00]*?-->#i', ' ', $fileData);

			$fileData=str_replace($replacementArrays['from'], $replacementArrays['to'], $fileData);

			// Вырезаем все УРЛы
			$mask='#href=(["\']{0,1})([a-zA-Zа-яА-Я0-9\.\/,\-_\?\&\=\:;% ]+)\1#i';
			$ret=''; preg_match_all($mask, $fileData, $ret);
			$ret=$ret[2];

			// Удаляем повторяющиеся ссылки
			$ret=array_unique($ret);

			foreach($ret as $i=>$k) {
				if (empty($k)) continue;
				$k=html_entity_decode($k);
				if ($k==$url) { unset($ret[$i]); continue; }

				$ext=substr(@$ret[$i], strrpos(@$ret[$i], '.')+1);
				if (@in_array($ext, $deniedExtensions)) { unset($ret[$i]); continue; }

				if (@in_array(@$ret[$i], $doNotUploadURLs)) { unset($ret[$i]); continue; }

				// Удаляем все полные УРЛ-ы (которые содержат :// и не содержат наш URL)
				$su=(substr(URLHOST, 0, 4)=='www.')?substr(URLHOST, 4):'www.' . URLHOST;
				if (strpos(' ' . $k, '://')>0) {
					if (!strpos($k, '://' . URLHOST) and !strpos($k, '://' . $su)) {
						unset($ret[$i]); continue;
					} else {
						$r=parse_url($k);
						$ret[$i]=isset($r['path'])?$r['path']:'/';
						$r=NULL;
					}
				}

				if (isset($ret[$i]) and substr($ret[$i], 0, 1)!='/') $ret[$i]=dirname($url) . '/' . $ret[$i];
				if (isset($ret[$i])) $ret[$i]=str_replace('\\', '/', $ret[$i]);
				$ret[$i]=str_replace('/./', '/', $ret[$i]);
				while(stristr($ret[$i], '/../'))
					$ret[$i]=preg_replace('#/[a-zA-Zа-яА-Я0-9\.,\-_\?\&\=\:;% ]+/\.\./#i', '/', $ret[$i]);
				while(stristr($ret[$i], '//')) $ret[$i]=str_replace('//', '/', $ret[$i]);

				// Удаляем также ссылки на другие протоколы, а то у некоторых вебмастеров есть
				// дурная привычка пихать в href= что-нибудь вроде
				// javascript:i_am_stupid_webmaster(true); когда лучше бы запихать это в onclick=
				if (@strpos(' ' . $ret[$i], 'javascript:')>0) unset($ret[$i]);
				if (@strpos(' ' . $ret[$i], 'jscript:')>0) unset($ret[$i]);
				if (@strpos(' ' . $ret[$i], 'vbscript:')>0) unset($ret[$i]);
				if (@strpos(' ' . $ret[$i], 'irc:')>0) unset($ret[$i]);
				if (@strpos(' ' . $ret[$i], 'news:')>0) unset($ret[$i]);
				if (@strpos(' ' . $ret[$i], 'mailto:')>0) unset($ret[$i]);
			}

			// Удаляем теги, сущности и прочую грязь
			$fileData=preg_replace('#&?([a-z]+?);#i', ' ', $fileData);
			$fileData=preg_replace('#&?\#([0-9]+?);#', ' ', $fileData);
			$fileData=str_replace(array("\r", "\n"), ' ', $fileData);
			foreach(array('#<style.*?<\/style>#i', '#<script.*?<\/script>#i') as $i)
				$fileData=preg_replace($i, ' ', $fileData);
			$fileData=preg_replace('#<.+?' . '>#i', ' ', $fileData);
			$fileData=str_replace(array('ё', '/>'), array('е', ''), $fileData);

			$fileData=preg_replace('#[[:space:]]+#i', ' ', $fileData);
			$fileData=preg_replace('#([[:punct:]]){2,}#i', '$1', $fileData);
			$fileData=preg_replace('#\s([,.:;!?])#i', '$1', $fileData);

			$text=str_replace('  ', ' ', $fileData);

			$retVal['string']=@$text;
			$retVal['title']=@$title;
			$retVal['links']=@$ret;
			$retVal['action']='update';
		} else {
			$retVal['action']=FALSE;
		}

		if (empty($retVal['string'])) $retVal['action']='delete';

		return @$retVal;
	}

	function w3s_analyzeLine($line, $url) {
		$status=0;

		if (strtolower(substr(strtok($line, ' '), 0, 4))=='http')
			$status=strtok(' ');

		if (strtolower(substr($line, 0, 7))=='status:')
			$status=substr($line, 7);

		if (strtolower(substr($line, 0, 9))=='location:')
			$newLocation=substr($line, 9);

		if (strtolower(substr($line, 0, 17))=='content-encoding:')
			$encoding=substr($line, 18);

		if (strtolower(strtok($line, ' '))=='content-type:') {
			$contentType=strtolower(trim(strtok(';')));
			if (strtolower(trim(strtok('=')))=='charset') {
				$charset=strtolower(strtok(';'));
			}
		}

		$retVal=array();

		if ($status==400)
			$retVal=array(
				'number'=>400,
				'string'=>'Ошибка запроса'
			);

		if ($status==401)
			$retVal=array(
				'number'=>401,
				'string'=>'Требуется авторизация',
				'action'=>'delete'
			);

		if ($status==403)
			$retVal=array(
				'number'=>403,
				'string'=>'Доступ закрыт',
				'action'=>'delete'
			);

		if ($status==404)
			$retVal=array(
				'number'=>404,
				'string'=>'Файл не найден',
				'action'=>'delete'
			);

		if ($status==406)
			$retVal=array(
				'number'=>406,
				'string'=>'Тип документа не соответствует разрешённым для индексации типам',
				'action'=>'delete'
			);

		if ($status==410)
			$retVal=array(
				'number'=>410,
				'string'=>'Файл навсегда удалён с сервера',
				'action'=>'delete'
			);

		if ($status>500) {
			$retVal=array(
				'number'=>$status,
				'string'=>'Ошибка на стороне сервера'
			);
			if ($status!=503) $retVal['action']='delete';
		}

		if (!@in_array($contentType, $acceptMIMETypes))
			$retVal=array(
				'number'=>406,
				'string'=>'Тип документа не соответствует разрешённым для индексации типам',
				'action'=>'delete'
			);

		if (!empty($newLocation))
			if (strtolower(substr($newLocation, 0, 4))=='http')
				$retVal=array(
					'number'=>601,
					'string'=>'Перенаправление на другой домен',
					'action'=>'delete'
				);
			else {
				if (substr($newLocation, 0, 1)!='/') $newLocation=dirname($url) . '/' . $newLocation;

				$retVal=array(
					'number'=>602,
					'string'=>$newLocation
				);
			}

		return array(isset($contentType)?$contentType:NULL, isset($charset)?$charset:NULL, isset($encoding)?$encoding:NULL, $retVal);
	}

	function w3s_linkText($text, $words) {
		preg_match_all('#(.*?\.)#i', $text, $sentences);
		foreach ($sentences[0] as $v)
			$sent[$v]=w3s_getRank($v, $words);

		@arsort($sent);
		$cnt=0; $text=NULL;
		if (is_array($sent))
			foreach($sent as $i=>$k) {
				if (!$k) break;
				$cnt++; if ($cnt>RESULT_QUOTES) break;
				$text.=$i . '<br />';
			}

		foreach($words as $word)
			$text=preg_replace('#(' . trim($word) . '[^\s<]*)#i', '<b>$1</b>', $text);

		return $text;
	}

	function w3s_getRank($text, $words) {
		$r=0; $text=strtolower($text);
		foreach($words as $word) {
			$word=trim($word); if (empty($word)) continue;
			$r+=substr_count($text, $word);
		}
		return $r;
	}
?>