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

        private function priceDemand(){
            $name = $_POST['name'];
            $email = $_POST['email'];

            $query = "INSERT section_20 SET name = 'Заказ'";
            $this->db->query($query);

            $id = mysql_insert_id();

            $query = "
                UPDATE
                    section_20
                SET
                    publish = 1,
                    sort = ".intval($id).",
                    name = 'Заказ №".intval($id)."',
                    col_141 = '".$this->db->quote($name)."',
                    col_142 = '".$this->db->quote($email)."',
                    col_151 = ".intval($_POST['type'])."
                WHERE
                    id = ".intval($id);

            $this->db->query($query);

            $this->sendMail($this->getConstant('site', 'name'), 'price@'.$_SERVER['HTTP_HOST'], $email, 'Заказ прайс-листа', 'include/mailing/price-list.tpl', null);

            print 'true';
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

        //News item
        public function getEventsShort($limit){
            $query = "
                SELECT
                    `id`,
                    `name`,
                    `col_119` AS `date`
                FROM
                    `section_6`
                WHERE
                    `publish` = 1
                ORDER BY
                    `sort`
                ASC
                LIMIT ".intval($limit)."
            ";

            return $this->db->assocMulti($query);
        }

        //News item
        public function getNewsShort($limit){
            $query = "
                SELECT
                    `id`,
                    `name`,
                    `col_134` AS `announce`,
                    `col_132` AS `date`
                FROM
                    `section_19`
                WHERE
                    `publish` = 1
                ORDER BY
                    `sort`
                ASC
                LIMIT ".intval($limit)."
            ";

            return $this->db->assocMulti($query);
        }
    }
?>