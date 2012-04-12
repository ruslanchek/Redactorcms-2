<?php
	class DB {
		private $link, $db, $host, $user, $pass, $newlink;

		function __construct($db, $host, $user, $pass, $newlink = false) {
            $this->db       = $db;
			$this->host     = $host;
			$this->user     = $user;
			$this->pass     = $pass;
            $this->newlink  = $newlink;

            $this->connect();

            mysql_query("set names 'utf8'");
		}

        function __destruct(){
            $this->disconnect();
        }

        //Connect to the DB
        private function connect(){
            $this->link = mysql_connect($this->host, $this->user, $this->pass, $this->newlink);
            
			if($this->link){
				return mysql_select_db($this->db, $this->link);
			}else{
				return 0;
			};
        }

        //Disconnect from DB
        private function disconnect(){
            mysql_close($this->link);
        }

        //Quote a sting
        static public function quote($value){
            if(get_magic_quotes_gpc()){
                $value = stripslashes($value);
            };

            if(!is_numeric($value)){
                $value = mysql_real_escape_string($value);
            };

            return $value;
        }

        //Filtering query and save HTML-tags
        static public function quoteWithHTML($value){
            if(get_magic_quotes_gpc()){
                $value = stripslashes($value);
            };

            $value = mysql_real_escape_string($value);
            return $value;
        }

        //Perform a query
        public function query($query){
            $result = mysql_query($query, $this->link) or die(
                Utilities::debug('
                    <b>MySQL Error:</b><br>
                    '.mysql_error().'<br><br>
                    <b>Query that been requested:</b><br>
                    <code>'.$query.'</code>
                ')
            );

            return $result;
        }

        //Return an associative array of a one row
        public function assocItem($query){
            return mysql_fetch_assoc($this->query($query));
        }

        //Return an associative array of a multiple rows
        public function assocMulti($query){
            $rows = array();
            $sql = $this->query($query);
            while($req = mysql_fetch_assoc($sql)){
                $rows[] = $req;
            };
            return $rows;
        }

        //Returns true, if exists
        public function checkRowExistance($table, $param, $value, $not = false){
            if(is_numeric($value)){
                $value = intval($this->quote($value));
            }else{
                $value = "'".$this->quote($value)."'";
            };

            if($not && !empty($not)){
                $exclude = " && `id` NOT IN (";

                foreach($not as $item){
                    $exclude .= intval($item).",";
                };

                $exclude = substr($exclude, 0, strlen($exclude)-1);
                $exclude .= ")";
            };

            $query = "
                SELECT
                    COUNT(*) AS `count`
                FROM
                    `".$this->quote($table)."`
                WHERE
                    `".$this->quote($param)."` = ".$value.$exclude."
                LIMIT 1
            ";

            $row_count = $this->assocItem($query);

            if($row_count['count'] > 0){
                return true;
            }else{
                return false;
            };
        }

        public function getRandomItems($table, $count, $fields = array(), $where = false){

            if($where){
                $where = "WHERE ".$where;
            };

            $query = "SELECT COUNT(*) AS `count` FROM `".$this->quote($table)."` ".$where;
            $row_count = $this->assocItem($query);
            $row_count = $row_count['count'] - 1;
            $query = array();

            if(!empty($fields)){
                $f = implode(",", $fields);
            }else{
                $f = '*';
            };

            $rand_matrix = array();

            while (count($query) < $count) {
                $next_random = rand(0, $row_count);

                while(in_array($next_random, $rand_matrix)){
                    $next_random = rand(0, $row_count);
                };

                array_push($rand_matrix, $next_random);

                $query[] = "(SELECT ".$this->quote($f)." FROM `".$this->quote($table)."` ".$where." LIMIT ".$next_random.", 1)";
            };

            unset($rand_matrix, $next_random);

            $query = implode(" UNION ", $query);

            return $this->assocMulti($query);
        }
	};
?>