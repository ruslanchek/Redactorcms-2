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
                    case 'test'                     : $this->page['content'] = $this->ajaxTest();                           break;
                    case 'login'                    : $this->page['content'] = print json_encode($this->login());           break;
                    case 'register'                 : $this->page['content'] = print json_encode($this->register());        break;
                    case 'remember'                 : $this->page['content'] = print json_encode($this->remember());        break;
                    case 'change_user_data'         : $this->page['content'] = print json_encode($this->changeUserData());  break;
                    case 'change_password'          : $this->page['content'] = print json_encode($this->changePassword());  break;
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

        public function changePassword(){
            return $this->login->changePassword($_POST['old_password'], $_POST['new_password'], $_POST['new_password_again']);
        }

        public function changeUserData(){
            return $this->login->changeUserData($this->login->user_status['userdata']['id']);
        }

        public function register(){
            return $this->login->registerNewUser($_POST, $this->securimage);
        }

        public function login(){
            $this->login->auth($_POST['login'], $_POST['password']);
            return $this->login->user_status;
        }

        public function remember(){
            return $this->login->remember($_POST['email']);
        }

        public function postToGb(){
            if($this->login->user_status['status'] && $this->login->user_status['userdata']['id'] > 0){
                if($_POST['message'] != ''){
                    //Check for captcha code is not empty
                    if(isset($_POST['captcha_code']) && $_POST['captcha_code'] != ''){
                        //Check for captcha code is ok
                        if($this->securimage->check($_POST['captcha_code']) === false){
                            return array(
                                'status' => false,
                                'message' => 'Неправильный код с картинки'
                            );
                        }else{
                            $message = $_POST['message'];

                            if(mb_strlen($message) > 1000){
                                return array(
                                    'status' => false,
                                    'message' => 'Длина сообщения не должна превышать 1000 символов'
                                );
                            };

                            $message = trim($message);
                            $message = stripslashes($message);
                            $message = htmlspecialchars($message, ENT_QUOTES);
                            $message = mb_substr($message, 0, 1000);

                            $this->db->query("
                                INSERT INTO `section_11` (
                                    `publish`,
                                    `col_64`,
                                    `col_69`,
                                    `col_65`,
                                    `col_66`,
                                    `col_67`,
                                    `col_68`
                                ) VALUES (
                                    1,
                                    NOW(),
                                    '".DB::quote($message)."',
                                    ".intval($this->login->user_status['userdata']['id']).",
                                    '".DB::quote($this->login->user_status['userdata']['login'])."',
                                    '".DB::quote($this->login->user_status['userdata']['name'])."',
                                    '".DB::quote($this->login->user_status['userdata']['email'])."'
                                )
                            ");

                            $id = mysql_insert_id();

                            $this->db->query("
                                UPDATE
                                    `section_11`
                                SET
                                    `sort` = ".intval($id).",
                                    `name` = 'Сообщение №".intval($id)." от пользователя ".DB::quote($this->login->user_status['userdata']['login'])."'
                                WHERE
                                    `id` = ".intval($id));

                            $_POST['message'] = '';

                            return array(
                                'status' => true,
                                'message' => 'Спасибо, сообщение отправлено'
                            );
                        };
                    }else{
                        return array(
                            'status' => false,
                            'message' => 'Введите код с картинки'
                        );
                    };
                }else{
                    return array(
                        'status' => false,
                        'message' => 'Пустое сообщение'
                    );
                };
            };
        }

        public function getInlineMenu($menu_id, $pid){
            $additional = '';

            if($this->login->user_status['status']){
                $additional .= " && `mode` NOT IN (6,7,8)";
            }else{
                $additional .= " && `mode` NOT IN (9,10)";
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
                    `structure_data`.`menu` = ".intval($menu_id)." &&
                    `structure_data`.`publish` = 1 &&
                    `structure_data`.`id` = `structure`.`id` &&
                    `structure`.`pid` = ".intval($pid).$additional."
                ORDER BY
                    `sort` ASC
            ";

            return $this->db->assocMulti($query);
        }

        public function getArticlesList(){
            $section_id = '8';

            $fields = array(
                'id',
                'name',
                array('col_40', 'date'),
                array('col_41', 'announce')
            );

            $order = array('col_40', 'DESC');
            return $this->getSectionContent($section_id, $fields, false, $order, 5, $_GET['page']);
        }

        //News item
        public function getArticlesItemData($id){
            $query = "
                SELECT
                    `id`,
                    `name`,
                    `col_40` AS `date`,
                    `col_42` AS `text`
                FROM
                    `section_8`
                WHERE
                    `id` = ".intval($id)." &&
                    `publish` = 1
            ";

            $result = $this->db->assocItem($query);
            return $result;
        }

        public function getNewsList($limit){
            $section_id = '6';

            $fields = array(
                'id',
                'name',
                array('col_32', 'date'),
                array('col_30', 'announce')
            );

            $order = array('col_30', 'DESC');

            return $this->getSectionContent($section_id, $fields, false, $order, $limit, $_GET['page']);
        }

        //News item
        public function getNewsItemData($id){
            $query = "
                SELECT
                    `id`,
                    `name`,
                    `col_32` AS `date`,
                    `col_31` AS `text`
                FROM
                    `section_6`
                WHERE
                    `id` = ".intval($id)." &&
                    `publish` = 1
            ";

            $result = $this->db->assocItem($query);
            return $result;
        }

        public function getMapMarkers($id){
            $query = "
                SELECT
                    `id`,
                    `data`
                FROM
                    `maps_objects`
                WHERE
                    `form_item` = 'col_84' &&
                    `section_id` = 13 &&
                    `relative_id` = ".intval($id)."
                LIMIT 1
            ";

            $result = $this->db->assocItem($query);

            $coords = explode(';', $result['data']);

            $result['lat'] = $coords[0];
            $result['lng'] = $coords[1];

            return $result;
        }

        public function getProjectType($id){
            $query = "
                SELECT
                    `id`,
                    `sort`,
                    `publish`,
                    `name`,
                    `col_102` AS `color`
                FROM
                    `section_14`
                WHERE
                    `id` = ".intval($id);

            $result = $this->db->assocItem($query);
            return $result;
        }

        //News item
        public function getLastNewsItemsData($limit){
            $query = "
                SELECT
                    `id`,
                    `name`,
                    `col_32` AS `date`,
                    `col_30` AS `announce`
                FROM
                    `section_6`
                WHERE
                    `publish` = 1
                ORDER BY
                    `id`
                DESC
                LIMIT ".intval($limit)."
            ";

            $result = $this->db->assocMulti($query);
            return $result;
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

        public function getAlbums(){
            $section_id = '9';

            $fields = array(
                'id',
                'name',
                array('col_48', 'announce')
            );

            $order = array('sort', 'DESC');

            return $this->getSectionContent($section_id, $fields, "`publish` = 1", $order, false, $_GET['page']);
        }

        public function getAlbum($id){
            $query = "
                SELECT
                    `id`,
                    `name`,
                    `col_48` AS `announce`
                FROM
                    `section_9`
                WHERE
                    `id` = ".intval($id)."
            ";

            $result = $this->db->assocItem($query);
            return $result;
        }

        public function getVideosList(){
            $section_id = '16';

            $fields = array(
                'id',
                'name',
                array('col_112', 'announce')
            );

            $order = array('sort', 'DESC');

            return $this->getSectionContent($section_id, $fields, "`publish` = 1", $order, 5, $_GET['page']);
        }

        //News item
        public function getVideosItemData($id){
            $query = "
                SELECT
                    `id`,
                    `name`,
                    `col_111` AS `embed_code`,
                    `col_113` AS `text`
                FROM
                    `section_16`
                WHERE
                    `id` = ".intval($id)." &&
                    `publish` = 1
            ";

            $result = $this->db->assocItem($query);
            return $result;
        }

        public function getGbItems(){
            $section_id = '11';

            $fields = array(
                'id',
                'name',
                array('col_64', 'datetime'),
                array('col_69', 'message'),
                array('col_65', 'user_id'),
                array('col_66', 'user_login'),
                array('col_67', 'user_name'),
                array('col_68', 'user_email')
            );

            $order = array('col_64', 'DESC');

            return $this->getSectionContent($section_id, $fields, "`publish` = 1", $order, 15, $_GET['page']);
        }

        public function getMainpagePhotos(){
            return $this->db->getRandomItems(
                'images',
                4, array('id', 'name', 'extension', 'path', 'date', 'size', 'width', 'height', 'metaname', 'metadesc'),
                "`relative_table` = 'section_9' && `form_item` = 'col_47' && `type` = 1"
            );
        }

        public function getSpecialRandom(){
            $result = $this->db->getRandomItems(
                'section_10',
                1, array('id', 'name', 'col_54', 'col_58', 'col_52'),
                "`publish` = 1 && `col_56` = '1'"
            );

            return $result[0];
        }
    }
?>