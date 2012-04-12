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

            if($_GET['action'] == 'exit'){
                $this->login->exitUser();
                header('Location:'.$this->uri);
            };

            $this->operateOauth();
            $this->operateUpload();
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
                    case 'load_more_items'          : $this->page['content'] = print $this->loadMoreItems();                break;
                    case 'getProject'               : $this->page['content'] = print json_encode($this->getProjectsItemData($_GET['id'], $_GET['number']));          break;
                };

                exit;
            }
        }

        private function convertImg($f, $ext){
            $file = $f.'.'.$ext;

            $image_info = getimagesize($file);
            $image_type = $image_info[2];

            if($image_type == IMAGETYPE_JPEG){
                $image = imagecreatefromjpeg($file);
            }elseif($image_type == IMAGETYPE_GIF){
                $image = imagecreatefromgif($file);
            }elseif($image_type == IMAGETYPE_PNG){
                $image = imagecreatefrompng($file);
            };

            imagejpeg($image, $f.'.jpg', 100);
            imagedestroy($image);

            if($image_type != IMAGETYPE_JPEG){
                unlink($file);
            };
        }

        private function uploadAvatar(){
            $dir = $_SERVER['DOCUMENT_ROOT'].'/data/users/'.$this->login->user_status['userdata']['id'].'/';

            if(!file_exists($dir)){
                mkdir($dir, 0777, true);
            };

            $ext = mb_strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));

            if ((($ext == "jpeg") || ($ext == "jpg") || ($ext == "png") || ($ext == "gif")) && ($_FILES["Filedata"]["size"] < 1048576)){

                if(!$dh = @opendir($dir)) return;

                while (false !== ($obj = readdir($dh))) {
                    if($obj=='.' || $obj=='..') continue;
                    @unlink($dir.'/'.$obj);
                };

                closedir($dh);

                $image = new SimpleImage();

                $image->load($_FILES['file']['tmp_name']);
                $image->resizeToWidth(150);
                $image->save($dir.'userpic_150.'.$ext);
                $image->resizeToWidth(25);
                $image->save($dir.'userpic_25.'.$ext);


                $this->convertImg($dir.'userpic_150', $ext);
                $this->convertImg($dir.'userpic_25', $ext);

                print json_encode(array(
                    'status' => true,
                    'user_id' => $this->login->user_status['userdata']['id'],
                    'message' => 'Картинка успешно загружена'
                ));
            }else{
                print json_encode(array(
                    'status' => false,
                    'message' => 'Поддерживается только JPEG, GIF и PNG, размер файла не более 1 МБ'
                ));
            };
        }

        private function operateUpload(){
            if(isset($_GET['upload_userpic'])){
                if($this->login->user_status['status'] && $this->login->user_status['userdata']['id'] > 0){
                    $this->uploadAvatar();
                    exit;
                };
                exit;
            };
        }

        private function operateOauth(){
            if(isset($_GET['oauth'])){
                $this->login->oAuth();
                exit;
            };
        }

        private function loadMoreItems(){
            switch($_GET['module']){
                case 'news' : {
                    $this->page['data']['list'] = $this->getNewsList($_GET['per_page_items']);
                    $template = 'modules/news_list.tpl';
                }; break;

                case 'projects' : {
                    $this->page['data']['list'] = $this->getProjectsList($_GET['per_page_items']);
                    $template = 'modules/projects_list.tpl';
                }; break;
            };

            $result['total_pages'] = $this->page['data']['list']['pager']['total_pages'];

            if($this->page['data']['list']['pager']['total_pages'] >= $_GET['page']){
                $result['html'] = $this->smarty->fetch($template);
            };

            print json_encode($result);
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

        public function getProjectsList($limit){
            $section_id = '13';

            $fields = array(
                'id',
                'name',
                array('col_82', 'type'),
                array('col_83', 'city'),
                array('col_86', 'authors'),
                array('col_87', 'customer'),
                array('col_88', 'project_year'),
                array('col_89', 'complete_year'),
                array('col_90', 'budget'),
                array('col_91', 'stage'),
                array('col_92', 'partners'),
                array('col_93', 'prizes'),
                array('col_94', 'description'),
                array('col_106', 'scope')
            );

            switch($_GET['mode']){
                case 'types' : {
                    $order = array('col_82', 'DESC');
                }; break;

                case 'chronology' : {
                    $order = array('col_88', 'DESC');
                }; break;

                case 'scope' : {
                    $order = array('col_106', 'DESC');
                }; break;

                case 'stage' : {
                    $order = array('col_91', 'DESC');
                }; break;

                case 'map' : {
                    $order = array('col_83', 'DESC');
                }; break;

                default : {
                    $order = array('name', 'ASC');
                };
            };

            return $this->getSectionContent($section_id, $fields, false, $order, $limit, $_GET['page']);
        }

        public function projectsByCities($city){
            $section_id = '13';

            $fields = array(
                'id',
                'name',
                array('col_82', 'type'),
                array('col_83', 'city'),
                array('col_86', 'authors'),
                array('col_87', 'customer'),
                array('col_88', 'project_year'),
                array('col_89', 'complete_year'),
                array('col_90', 'budget'),
                array('col_91', 'stage'),
                array('col_92', 'partners'),
                array('col_93', 'prizes'),
                array('col_94', 'description')
            );

            $order = array('sort', 'DESC');

            return $this->getSectionContent($section_id, $fields, "`col_83` = '".DB::quote($city)."'", $order, false, false);
        }

        public function getProjectsItemData($id, $number, $first){
            if($number && $number != 'info') {
                $image_on = "i.id = ".intval($number);
            } elseif ($number == 'info') {
                $image_on = "i.relative_table = 'section_13' AND i.relative_id = p.id AND form_item = 'col_97'";
            } else {
                $image_on = "i.relative_table = 'section_13' AND i.relative_id = p.id AND form_item = 'col_107'";
            }

            $query = "
                SELECT
                    p.id,
                    p.name,
                    p.col_83 AS `city`,
                    p.col_86 AS `authors`,
                    p.col_87 AS `customer`,
                    p.col_88 AS `project_year`,
                    p.col_89 AS `complete_year`,
                    p.col_90 AS `budget`,
                    p.col_84 AS `map_params`,
                    if(p.col_91=1,'Концепция','')  as `stage1`,
                    if(p.col_91=2,'Проект','') as `stage2`,
                    if(p.col_91=3,'В реализации','') as `stage3`,
                    if(p.col_91=4,'Постройка','') as `stage4`,
                    p.col_92 AS `partners`,
                    p.col_93 AS `prizes`,
                    p.col_94 AS `description`,                  
                    t.name AS `type`,
                    t.col_102 AS `color`,
                    i.path,                    
                    i.name AS `name_img`,
                    i.extension,
                    i.id AS `id_img`,
                    i.width,
                    i.height,
                    ii.name AS `img_current`,                                        
                    ii.path AS `path_current`,
                    ii.extension AS `extension_current`,
                    f.name AS `file_name`,
                    f.path AS `file_path`,
                    f.extension AS `file_extension`,
                    m.data AS `marker`,
                    COUNT(ii.relative_id) as total,
					GROUP_CONCAT(DISTINCT(ii.id)) as images
				FROM
                    section_13 p
                LEFT JOIN section_14 t ON (t.id = p.col_82)
                LEFT JOIN images i ON ($image_on)
                LEFT JOIN images ii ON (ii.relative_table = 'section_13' AND ii.relative_id = p.id AND ii.type = '1' AND ii.form_item = 'col_107')
                LEFT JOIN files f ON (f.relative_table = 'section_13' AND f.relative_id = p.id AND f.type = '0' AND f.form_item = 'col_108')
                LEFT JOIN maps_objects m ON (m.section_id = 13 AND m.relative_id = p.id AND m.type = '1' AND m.form_item = 'col_84')
                WHERE
                    p.id = ".intval($id)." &&
                    p.publish = 1
                GROUP BY ii.relative_id
                ORDER BY i.sort
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

        public function getCities(){
            $query = "
                SELECT
                    `col_83` AS `city`
                FROM
                    `section_13`
                WHERE
                    `publish` = 1 &&
                    `col_83` != ''
                GROUP BY
                    `col_83`
            ";

            return $this->db->assocMulti($query);
        }

        //News item
        public function getLastNewsItemData($limit){
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

            $result = $this->db->assocItem($query);
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
            $section_id = '12';

            $fields = array(
                'id',
                'name',
                array('col_76', 'announce')
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
                    `col_74` AS `embed_code`,
                    `col_76` AS `text`
                FROM
                    `section_12`
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

        public function getAvatar($format = 150){
            $file = '/data/users/'.$this->login->user_status['userdata']['id'].'/userpic_'.$format.'.jpg';

            if(file_exists($_SERVER['DOCUMENT_ROOT'].$file)){
                return $file;
            }else{
                return '/resources/img/nophoto_'.$format.'.jpg';
            };
        }
    }
?>