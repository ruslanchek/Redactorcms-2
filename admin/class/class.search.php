<?php
	class Search{
        private
            $main;

        public function __construct($main){
            $this->main = $main;
            $this->main->module_mode = $_GET['suboption'];

            $this->remote_action = $_GET['remote_action'];

            $this->index_count = mysql_num_rows(mysql_query("SELECT * FROM search"));
            $this->last_index = mysql_query("SELECT MAX(lastupdate) FROM search");

            if($this->remote_action == 'update'){
                $this->update();
            }

            if($this->main->module_mode == 'clear'){
                $this->clear();
            }
        }

        private function update(){
            list($w3s_msec, $w3s_sec) = explode(chr(32), microtime());
            $w3s_mTimeStart = $w3s_sec + $w3s_msec;

            require_once $_SERVER['DOCUMENT_ROOT'] . '/shared/search/class.search_model.php';
            $sm = new SearchModel();

            $w3s_lastUpdate = gmdate('U') - $sm->UPDATE_EVERY;

            //$w3s_res = @mysql_query("SELECT * FROM `" . TABLE . "` WHERE `text`='' OR `lastupdate`<" . $w3s_lastUpdate . " LIMIT 0, " . PAGES_PER_TIME);
            $w3s_res = @mysql_query("SELECT * FROM search WHERE `text`='' OR `lastupdate`<" . $w3s_lastUpdate . " LIMIT 0, " . $sm->PAGES_PER_TIME);

            while ($w3s_row = @mysql_fetch_array($w3s_res)){
                $w3s_r = $sm->w3s_indexURL($w3s_row['url'], $w3s_row['referrer'], $w3s_row['md5']);

                echo $w3s_row['id'] . '~~';
                echo $w3s_row['url'] . '~~';
                echo $w3s_row['lastupdate'] . '~~';
                echo $w3s_r . '~~';
                echo $w3s_row['referrer'] . '~~';

                if ($w3s_r){
                    echo '1;;';
                }else{
                    echo '0;;';
                };
            };

            if(!mysql_num_rows($w3s_res)){
                echo '!_complete_!';
            };

            @mysql_free_result($w3s_res);

            list($w3s_msec, $w3s_sec) = explode(chr(32), microtime());
            $w3s_mTime = round(($w3s_sec + $w3s_msec)-$w3s_mTimeStart, 6);
            //echo 'Время индексации: ' . $w3s_mTime . ' сек.';
            exit;
        }

        private function clear(){
            if(mysql_query('TRUNCATE TABLE search')){
                if(mysql_query("INSERT INTO search VALUES ('/', '', '', '', '', '0',1)")){
                    header("Location:/admin/?option=search");
                };
            };
        }
    }