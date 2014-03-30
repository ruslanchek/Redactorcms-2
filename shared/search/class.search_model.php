<?
class SearchModel
{
    private $existURLs = array(),
            $doNotUploadURLs;

    public function __construct()
    {
        setlocale(LC_ALL, 'ru_RU.UTF-8');

        $this->BLACKLIST = $_SERVER['DOCUMENT_ROOT'] . '/shared/search/blacklist.conf';

        $this->UPDATE_EVERY = 3600;
        $this->URLHOST = $_SERVER['HTTP_HOST'];
        $this->PAGES_PER_TIME = 1;
        $this->USE_NOINDEX_TAG = true;
        $this->DECODE_METHOD = 'iconv';
        $this->RESULTS_PER_PAGE = 15;
        $this->TABLE = 'search';
        $this->HTTP = '1.0';
        $this->UA = 'Redactor CMS';
        $this->STARTURL = 'http://' . $this->URLHOST;

        $this->acceptMIMETypes = array('text/html', 'text/plain');
        $this->deniedExtensions = array(
            // Бинарные форматы (архивы, приложения, документы и прочее)
            'exe', 'rar', 'zip', 'dll', 'tar', 'gz', 'tgz', '7z', 'doc', 'rtf', 'xls', 'chm', 'pdf',

            // Графика
            'gif', 'jpg', 'jpeg', 'png', 'bmp', 'psd', 'tga', 'ico',

            // Музыка
            'wav', 'mp3', 'wma', 'midi', 'mid', 'mpa', 'mp2', 'ac3', 'aif', 'aifc', 'aiff', 'kar', 'mp1', 'ogg', 'ra', 'rmi',

            // Видео
            'avi', 'mpg', 'mov', 'mpeg', 'm1v', 'm2v', 'mp4', 'mpe', 'mpv', 'qt', 'ogm', 'ram', 'rm', 'rv', 'wm', 'vob',

            // Другое
            'js', 'vbs', 'css'
        );

        // Массивы замены текстов
        $this->replacementArrays = array(
            'from' => array(
                '',
                ''
            ),
            'to' => array(
                ' ',
                ' '
            )
        );

        // Слова, по которым поиск (и индексация) не производится (т.н. stopwords)
        // записывать в нижнем регистре!
        $this->stopWords = array(
            ''
        );

        set_time_limit(600);
        ignore_user_abort(FALSE);
    }


// Избавляемся от всего лишнего в тексте
    function strtolower_utf8($string)
    {
        $convert_to = array(
            "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u",
            "v", "w", "x", "y", "z", "à", "á", "â", "ã", "ä", "å", "æ", "ç", "è", "é", "ê", "ë", "ì", "í", "î", "ï",
            "ð", "ñ", "ò", "ó", "ô", "õ", "ö", "ø", "ù", "ú", "û", "ü", "ý", "а", "б", "в", "г", "д", "е", "ё", "ж",
            "з", "и", "й", "к", "л", "м", "н", "о", "п", "р", "с", "т", "у", "ф", "х", "ц", "ч", "ш", "щ", "ъ", "ы",
            "ь", "э", "ю", "я"
        );

        $convert_from = array(
            "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U",
            "V", "W", "X", "Y", "Z", "À", "Á", "Â", "Ã", "Ä", "Å", "Æ", "Ç", "È", "É", "Ê", "Ë", "Ì", "Í", "Î", "Ï",
            "Ð", "Ñ", "Ò", "Ó", "Ô", "Õ", "Ö", "Ø", "Ù", "Ú", "Û", "Ü", "Ý", "А", "Б", "В", "Г", "Д", "Е", "Ё", "Ж",
            "З", "И", "Й", "К", "Л", "М", "Н", "О", "П", "Р", "С", "Т", "У", "Ф", "Х", "Ц", "Ч", "Ш", "Щ", "Ъ", "Ъ",
            "Ь", "Э", "Ю", "Я"
        );

        return str_replace($convert_from, $convert_to, $string);
    }

    function w3s_mdate($timestamp)
    {
        $m[1] = 'января';
        $m[2] = 'февраля';
        $m[3] = 'марта';
        $m[4] = 'апреля';
        $m[5] = 'мая';
        $m[6] = 'июня';
        $m[7] = 'июля';
        $m[8] = 'августа';
        $m[9] = 'сентября';
        $m[10] = 'октября';
        $m[11] = 'ноября';
        $m[12] = 'декабря';

        return date('j', $timestamp) . ' ' . $m[date('n', $timestamp)] . ' ' . date('Y') . ' года, ' . date('G:i:s', $timestamp);
    }

    function w3s_addToBlacklist($url)
    {
        if($url == '/') {
            return true;
        }

        if (file_exists($this->BLACKLIST)) @chmod($this->BLACKLIST, 0777);

        $f = @fopen($this->BLACKLIST, 'a+');

        @fwrite($f, $url . "\r\n");
        @fclose($f);
        @chmod($this->BLACKLIST, 0777);

        return true;
    }

    function w3s_exclude(&$item1, $key)
    {
        $x = 0;
        if (strlen($item1) < 3) {
            $x = 1;
            $item1 = '';
        }
        if (strval(intval($item1)) == $item1) {
            $x = 1;
            $item1 = '';
        }
        if (in_array($item1, $this->stopWords)) {
            $x = 1;
            $item = '';
        }
        if ($x != 1) $item1 = ' ' . trim($item1) . ' ';
    }

    function w3s_getExistURLsList()
    {
        if (isset($this->existURLs)) return $this->existURLs;

        $this->existURLs = array();

        $res = @mysql_query("SELECT `url` FROM `" . $this->TABLE . "` WHERE 1");
        while ($row = @mysql_fetch_row($res))
            $this->existURLs[] = $row[0];
        @mysql_fetch_array($res);

        return $this->existURLs;
    }

    function w3s_getDoNotUploadURLsList()
    {
        if (isset($this->doNotUploadURLs)) return $this->doNotUploadURLs;

        $this->doNotUploadURLs = @file($this->BLACKLIST);
        array_walk($this->doNotUploadURLs, create_function('&$item', '$item=str_replace("\r", \'\', $item); $item=str_replace("\n", \'\', $item);'));

        return $this->doNotUploadURLs;
    }

    function w3s_indexURL($url, $ref = '', $md5 = '')
    {
        $existURLs = $this->w3s_getExistURLsList();
        $doNotUploadURLs = $this->w3s_getDoNotUploadURLsList();

        $ret = $this->w3s_index($url, $ref, $md5);

        if ($ret['number'] == 200 and $ret['action'] == 'update') {
            $retval = 'added';
            $res = @mysql_query("SELECT `text` FROM `" . $this->TABLE . "` WHERE `url`='" . @mysql_real_escape_string($url) . "'");
            $p = @mysql_fetch_row($res);
            @mysql_free_result($res);
            if (isset($p[0])) {
                $res = @mysql_query("UPDATE `" . $this->TABLE . "` SET `text`='" . @mysql_real_escape_string($ret['string']) . "', `md5`='" . $ret['md5'] . "', `lastupdate`='" . gmdate('U') . "', `title`='" . @mysql_real_escape_string($ret['title']) . "' WHERE `url`='" . @mysql_real_escape_string($url) . "'");
            } else {
                $res = @mysql_query("INSERT INTO `" . $this->TABLE . "` (`text`, `md5`, `lastupdate`, `title`, `url`) VALUES ('" . @mysql_real_escape_string($ret['string']) . "', '" . $ret['md5'] . "', '" . gmdate('U') . "', '" . @mysql_real_escape_string($ret['title']) . "', '" . @mysql_real_escape_string($url) . "');");
            }
            @mysql_free_result($res);

            $query = 'INSERT INTO `' . $this->TABLE . '` ( `url`, `referrer`, `md5`, `lastupdate` ) VALUES ';
            $insertedRows = 0;
            foreach ($ret['links'] as $k) {
                if (!@in_array($k, $existURLs) and !@in_array($k, $doNotUploadURLs)) {
                    $query .= "('" . @mysql_real_escape_string($k) . "', '" . @mysql_real_escape_string($url) . "', '', '0'), ";
                    $existURLs[] = $k;
                    $insertedRows++;
                }
            }

            if ($insertedRows > 0) {
                $res = @mysql_query(substr($query, 0, -2));
                @mysql_free_result($res);
            }
        } else {
            $retval = 'not added';
            if ($ret['action'] == 'delete') {
                $res = @mysql_query("DELETE FROM `" . $this->TABLE . "` WHERE `url`='" . @mysql_real_escape_string($url) . "'");
                @mysql_free_result($res);

                $this->w3s_addToBlacklist($url);
                $retval = 'deleted';
            }
        }

        return $ret['title'];
    }

    function w3s_index($url, $ref, $md5)
    {
        $rn = "\r\n";

        $this->doNotUploadURLs = $this->w3s_getDoNotUploadURLsList();

        $query = 'GET ' . $url . ' HTTP/' . $this->HTTP . $rn . 'Referer: ' . $this->STARTURL . $rn . 'Content-Type: application/x-www-form-urlencoded' . $rn . 'Host: ' . $this->URLHOST . $rn . 'Accept: ' . implode(', ', $this->acceptMIMETypes) . $rn . 'Accept-Encoding: gzip, deflate' . $rn . 'Connection: Keep-Alive' . $rn . 'User-Agent: ' . $this->UA . $rn . $rn;

        $errno = 0;
        $errstr = '';
        $f = fsockopen($this->URLHOST, 80, $errno, $errstr, 50);
        if (!$f) {
            $retVal = array(
                'number' => $errno,
                'string' => $errstr
            );
        } else {
            @fwrite($f, $query);
            $inputData = FALSE;
            $fileData = NULL;
            $status = NULL;
            $newLocation = NULL;
            $contentType = NULL;
            $charset = NULL;
            while (!@feof($f)) {
                $line = fgets($f, 1024 * 1024);
                // Читаем строку 1Mb из файла…

                $line = str_replace("\r", '', $line);
                $line = str_replace("\n", '', $line);

                if ($inputData) {
                    if (!$fileData) $fileData = $line;
                    else        $fileData .= $rn . $line;
                } else {
                    if (strtolower(substr(strtok($line, ' '), 0, 4)) == 'http')
                        $status = strtok(' ');

                    if (strtolower(substr($line, 0, 7)) == 'status:')
                        $status = substr($line, 7);

                    if (strtolower(substr($line, 0, 9)) == 'location:')
                        $newLocation = substr($line, 9);

                    if (strtolower(substr($line, 0, 17)) == 'content-encoding:')
                        $encoding = substr($line, 18);

                    if (strtolower(strtok($line, ' ')) == 'content-type:') {
                        $contentType = strtolower(trim(strtok(';')));
                        if (strtolower(trim(strtok('='))) == 'charset') {
                            $charset = strtolower(strtok(';'));
                        }
                    }

                    if (!$line) {
                        $inputData = TRUE;

                        if ($status == 400) {
                            $retVal = array(
                                'number' => 400,
                                'string' => 'Ошибка запроса'
                            );
                            break;
                        }
                        if ($status == 401) {
                            $retVal = array(
                                'number' => 401,
                                'string' => 'Требуется авторизация',
                                'action' => 'delete'
                            );
                            break;
                        }
                        if ($status == 403) {
                            $retVal = array(
                                'number' => 403,
                                'string' => 'Доступ закрыт',
                                'action' => 'delete'
                            );
                            break;
                        }
                        if ($status == 404) {
                            $retVal = array(
                                'number' => 404,
                                'string' => 'Файл не найден',
                                'action' => 'delete'
                            );
                            break;
                        }
                        if ($status == 406) {
                            $retVal = array(
                                'number' => 406,
                                'string' => 'Тип документа не соответствует разрешённым для индексации типам',
                                'action' => 'delete'
                            );
                            break;
                        }
                        if ($status == 410) {
                            $retVal = array(
                                'number' => 410,
                                'string' => 'Файл навсегда удалён с сервера',
                                'action' => 'delete'
                            );
                            break;
                        }
                        if ($status > 500) {
                            $retVal = array(
                                'number' => $status,
                                'string' => 'Ошибка на стороне сервера'
                            );
                            if ($status != 503) $retVal['action'] = 'delete';
                            break;
                        }

                        if (!@in_array($contentType, $this->acceptMIMETypes)) {
                            $retVal = array(
                                'number' => 406,
                                'string' => 'Тип документа не соответствует разрешённым для индексации типам',
                                'action' => 'delete'
                            );
                            break;
                        }

                        if (!empty($newLocation)) {
                            if (strtolower(substr($newLocation, 0, 4)) == 'http') {
                                $retVal = array(
                                    'number' => 601,
                                    'string' => 'Перенаправление на другой домен',
                                    'action' => 'delete'
                                );
                            } else {
                                if (substr($newLocation, 0, 1) != '/') $newLocation = dirname($url) . '/' . $newLocation;

                                return w3s_index($newLocation, $url, $md5);
                            }
                            break;
                        }
                    }
                }
            }
            @fclose($f);

            if (isset($encoding) and $encoding == 'deflate' and function_exists('gzinflate'))
                $fileData = @gzinflate($fileData);

            $retVal = array(
                'number' => 200,
                'md5' => md5(@$fileData)
            );

            if ($md5 != $retVal['md5']) {
                $retVal['action'] = 'update';

                // Ищем Charset в тегах <meta>
                $ret = '';
                $mask = '#<meta http-equiv="content-type" content="[a-zA-Z0-9\/]+;[\s]*charset=([-\w]+)#i';
                preg_match($mask, $fileData, $ret);
                if (isset($ret[1]) and !empty($ret[1])) $charset = $ret[1];


                // Перекодировываем результат ;)
                if ($charset != 'windows-1251' and $charset != 'win-1251') {
                    if ($this->DECODE_METHOD == 'iconv') {
                        $fileData = @iconv(strtoupper($charset), 'UTF-8', $fileData);
                    } else {
                        if ($charset == 'cp866') $charset = 'a';
                        if ($charset == 'koi8-r') $charset = 'k';
                        if ($charset == 'koi-8r') $charset = 'k';
                        if ($charset == 'cp-866') $charset = 'a';
                        if ($charset == 'x-cp866') $charset = 'a';
                        if ($charset == 'x-cp-866') $charset = 'a';
                        if ($charset == 'alt-866') $charset = 'a';
                        if ($charset == 'iso8859-5') $charset = 'i';
                        if ($charset == 'x-mac-cyrillic') $charset = 'm';

                        $fileData = @convert_cyr_string($charset, 'w', $fileData);
                    }
                }

                // Находим заголовок страницы
                $ts = split('title>', $fileData);
                if (isset($ts[1]) and !empty($ts[1])) $title = substr($ts[1], 0, -2);

                if ($this->USE_NOINDEX_TAG)
                    $fileData = preg_replace('#<noindex>.*<\/noindex>#i', ' ', $fileData);
                $fileData = str_replace($this->replacementArrays['from'], $this->replacementArrays['to'], $fileData);

                // Вырезаем все УРЛы
                $mask = '#href=(["\']{0,1})([a-zA-Zа-яА-Я0-9\.\/,\-_\?\&\=\:; ]+)\1#i';
                $ret = '';
                preg_match_all($mask, $fileData, $ret);
                $ret = $ret[2];

                // Удаляем повторяющиеся ссылки
                $ret = array_unique($ret);

                foreach ($ret as $i => $k) {
                    if ($ret[$i] == $url) unset($ret[$i]);

                    $ext = substr(@$ret[$i], strrpos(@$ret[$i], '.') + 1);
                    if (@in_array($ext, $this->deniedExtensions)) unset($ret[$i]);

                    if (@in_array(@$ret[$i], $this->doNotUploadURLs)) unset($ret[$i]);

                    // Удаляем все полные УРЛ-ы (которые содержат ://)
                    if (@strpos(' ' . $ret[$i], '://') > 0) unset($ret[$i]);
                    if (isset($ret[$i]) and substr($ret[$i], 0, 1) != '/') $ret[$i] = dirname($url) . $ret[$i];
                    if (isset($ret[$i])) $ret[$i] = str_replace('\\', '/', $ret[$i]);
                }

                $fileData = $this->strtolower_utf8($fileData);
                $fileData = str_replace(array('<br />', '<br>', '<br/>', '<p>', '</p>'), ' ', $fileData);
                $fileData = str_replace(array('<td', '<tr', '<th', '<li'), array(' <td', ' <tr', ' <th', ' <li'), $fileData);
                $fileData = strip_tags($fileData);
                $fileData = str_replace(array('nbsp', 'laquo', 'raquo', "\r", "\n"), ' ', $fileData);
                $fileData = str_replace(array(',', '.', ';', ":", "-", "!", "?"), '', $fileData);
                //$fileData=preg_replace('([[:punct:]]+)', ' ', $fileData);
                //$fileData=preg_replace('([[:space:]]+)', ' ', $fileData);

                $wordArray = explode(' ', $fileData);

                array_walk($wordArray, array($this, 'w3s_exclude'));

                $wordArray = array_unique($wordArray);
                /*
                                $wordArray=array_count_values($wordArray);

                                foreach($wordArray as $word=>$count)
                                    if (trim($word))
                                        $words[]=trim($word) . ' ' . $count;
                */
                $text = @implode(' ', $wordArray);
                $text = str_replace('  ', ' ', $text);

                $retVal['string'] = @$text;
                $retVal['title'] = @$title;
                $retVal['links'] = @$ret;
                $retVal['action'] = 'update';
            } else {
                $retVal['action'] = FALSE;
            }
        }

        if (empty($retVal['string'])) $retVal['action'] = 'delete';

        return @$retVal;
    }

    public function getResults($q){
        $w3s_results = false;
        $pager_cpage = false;
        $results_array = false;

        $st = DB::quote($q);
        $w3s_query = $this->strtolower_utf8($st);

        $w3s_query = str_replace(array('nbsp', 'laquo', 'raquo', "\r", "\n"), ' ', $w3s_query);
        $w3s_query = str_replace('!', '	', $w3s_query);
        $w3s_query = str_replace('-', '	', $w3s_query);
        $w3s_query = str_replace(array(',', '.', ';', ":", "-", "!", "?"), '', $w3s_query);
        $w3s_query = str_replace('	', '!', $w3s_query);

        //$w3s_query=str_replace('([[:space:]]+)', ' ', $w3s_query);

        $w3s_wordArray = explode(' ', $w3s_query);
        array_walk($w3s_wordArray, array($this, 'w3s_exclude'));

        if(trim(implode('', $w3s_wordArray)) != ''){
            $w3s_db_query = 'SELECT `url`, `title`, `lastupdate` FROM `' . $this->TABLE . '` WHERE ';
            $w3s_where_cond = '';

            foreach($w3s_wordArray as $w3s_i) {
                $w3s_i = trim($w3s_i); $w3s_where_cond .= '`text` ';
                if (substr($w3s_i, 0, 1) == '!'){
                    $w3s_where_cond.='NOT '; $w3s_i = substr($w3s_i, 1);
                };

                $w3s_where_cond.='LIKE \'%' . @mysql_real_escape_string($w3s_i) . '%\' AND ';
            };

            $w3s_where_cond = substr($w3s_where_cond, 0, -4);
            $w3s_count_query = $w3s_db_query . $w3s_where_cond;

            if($_GET['page']){
                $pager_cpage = $_GET['page'];
            }else{
                $pager_cpage = 1;
            };

            $pager_cpage = intval($pager_cpage);

            $w3s_db_query .= $w3s_where_cond . 'LIMIT ' . (($pager_cpage-1) * $this->RESULTS_PER_PAGE) . ', ' . $this->RESULTS_PER_PAGE;

            $w3s_count_query = str_replace('`url`, `title`, `lastupdate`', 'count(`url`) as `count`', $w3s_count_query);

            $w3s_res = @mysql_query($w3s_count_query);

            $w3s_results = @mysql_fetch_row($w3s_res);


            @mysql_free_result($w3s_res);

            $w3s_res = @mysql_query($w3s_db_query);

            while($w3s_item = @mysql_fetch_assoc($w3s_res)) {
                $results_array[] = array(
                    'url' => $w3s_item['url'],
                    'title' => $w3s_item['title'],
                    'lastupdate' => $this->w3s_mdate($w3s_item['lastupdate'])
                );
            };

            @mysql_free_result($w3s_res);

            if (!$w3s_results[0]){
                $error = 3;
            };

        }elseif(@strlen($st) <= 2){
            if($st){
                $error = 1;
            }else{
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $error = 2;
                };
            };
        };

        $wcount = substr($w3s_results[0], -1);
        $wcount_pre = substr($w3s_results[0], -2, 1);

        if($wcount == 0){
            $w_c_word = 'результатов';
        }elseif($wcount == 1){
            if($wcount_pre == 1){
                $w_c_word = 'результатов';
            }else{
                $w_c_word = 'результат';
            }
        }elseif($wcount == 2){
            if($wcount_pre == 1){
                $w_c_word = 'результатов';
            }else{
                $w_c_word = 'результата';
            }
        }elseif($wcount == 3){
            if($wcount_pre == 1){
                $w_c_word = 'результатов';
            }else{
                $w_c_word = 'результата';
            }
        }elseif($wcount == 4){
            if($wcount_pre == 1){
                $w_c_word = 'результатов';
            }else{
                $w_c_word = 'результата';
            }
        }elseif($wcount >= 5){
            $w_c_word = 'результатов';
        };

        $w3s_pages_count = round($w3s_results[0]/$this->RESULTS_PER_PAGE);
        if(!$w3s_pages_count){
            $w3s_pages_count = 1;
        };

        $pager_pages = array();

        for($w3s_i = 1; $w3s_i <= $w3s_pages_count; $w3s_i++){
            $pager_pages[] = $w3s_i;
        };

        if(count($pager_pages) <= 1){
            $pager_pages = array();
        };

        $result = new stdClass();
        $result->current_page = $pager_cpage;
        $result->total_pages = $pager_pages;
        $result->word = $w_c_word;
        $result->results_count = $w3s_results[0];
        $result->items = $results_array;

        return $result;
    }
}