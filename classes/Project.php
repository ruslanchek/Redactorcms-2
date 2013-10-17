<?php
    /*
     * Этот класс используется для расширения функционала ядра системы (/classes/Core.php)
     * */

    Class Project extends Utilities {
        public function __construct(){
            //Additions
            include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
            include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Simpleimage.class.php';
            $this->securimage = new Securimage();
            
            //Create login objct
            $this->login = new Login($this, array());

            //Operate ajax calls
            $this->operateAJAX();

            if(isset($_GET['action']) && $_GET['action'] == 'exit'){
                $this->login->exitUser();
                header('Location:'.$this->uri);
            };

            $this->operateOauth();
        }

        private function operateAJAX(){
            if($this->answer_type == 'ajax'){
                switch ($_GET['action']){
                    case 'priceDemand' : $this->priceDemand(); break;
                };

                exit;
            }
        }

        private function operateOauth(){
            if(isset($_GET['oauth'])){
                $this->login->oAuth();
                exit;
            };
        }

        private function ajaxTest(){
            return 'Test ok!';
        }

        public function getInlineMenu($menu_id = false, $pid = false){
            $additional = '';
            $menu = '';
            $pid_add = '';

            if($pid){
                $pid_add = " && `structure`.`pid` = ".intval($pid);
            };

            if($this->login->user_status['status']){
                $additional .= " && `mode` NOT IN (6,7,8)";
            }else{
                $additional .= " && `mode` NOT IN (9,10)";
            };

            if($menu_id > 0){
                $menu = "`structure_data`.`menu` = ".intval($menu_id)." && ";
            };

            $query = "
                SELECT
                    `structure_data`.`id` AS `id`,
                    `structure_data`.`name` AS `name`,
                    `structure_data`.`path` AS `path`,
                    `structure`.`pid` AS `pid`
                FROM
                    `structure_data`,
                    `structure`
                WHERE
                    ".$menu."
                    `structure_data`.`publish` = 1 &&
                    `structure_data`.`id` = `structure`.`id` ".$pid_add.$additional."
                ORDER BY
                    `sort` ASC
            ";

            return $this->db->assocMulti($query);
        }

        public function getPage($id){
            $query = "
                SELECT
                    `col_33` AS `text`
                FROM
                    `section_3`
                WHERE
                    `id` = ".intval($id)."
            ";

            $result = $this->db->assocItem($query);
            return $result['text'];
        }

        //Returns array of specified branch
        public function getBranchMenu($id = 1, $menu){
            $query = "
                SELECT
                    `structure`.`id`,
                    `structure_data`.`name`,
                    `structure_data`.`path`
                FROM
                    `structure`,
                    `structure_data`
                WHERE
                    `structure`.`pid` = ".intval($id)." &&
                    `structure`.`id` = `structure_data`.`id` &&
                    `structure_data`.`menu` = ".intval($menu)."
                ORDER BY
                    `structure_data`.`sort` ASC
            ";
            $result = mysql_query($query);

            while($row = mysql_fetch_assoc($result)){
                $row['childrens'] = $this->getBranchMenu($row['id'], $menu);
                $rows[] = $row;
            };

            return $rows;
        }

        public function getSLiderItems(){
            $query = "
                SELECT
                    `id`,
                    `sort`,
                    `publish`,
                    `name`,
                    `col_123` AS `announce`,
                    `col_127` AS `link`
                FROM
                    `section_18`
                WHERE
                    `publish` = 1
                ORDER BY
                    `sort`
                ASC
            ";

            return $this->db->assocMulti($query);
        }


        /************************************************************
         * CUSTOM METHODS WRITE BELOW THIS BLOCK
         ************************************************************/
        //News short
        public function getNewsShort($limit){
            $query = "
                SELECT
                    s.id AS structure_id,
                    s.name AS structure_name,
                    s.path AS path,
                    s.publish AS publish,

                    d.id AS id,
                    d.name AS name,
                    d.col_132 AS date,
                    d.col_136 AS announce,
                    d.col_134 AS text
                FROM
                    structure_data s
                LEFT JOIN
                    section_19 d ON (d.id = s.content_id)
                WHERE
                    s.publish = 1 && s.pid = 17
                ORDER BY
                    d.col_132
                ASC
                LIMIT ".intval($limit)."
            ";

            return $this->db->assocMulti($query);
        }

        //Makers short
        public function getMakersShort(){
            $query = "
                SELECT
                    id AS id,
                    name AS name,
                    col_161 AS country,
                    col_156 AS announce
                FROM
                    section_22
                WHERE
                    publish = 1
                ORDER BY
                    sort
                ASC
            ";

            return $this->db->assocMulti($query);
        }
    }
?>