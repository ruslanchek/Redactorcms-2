<?php
/*
 * Этот класс используется для расширения функционала ядра системы (/classes/Core.php)
 * */

Class Project extends Utilities
{
    public function __construct()
    {
        //Additions
        include_once $_SERVER['DOCUMENT_ROOT'] . '/securimage/securimage.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/Simpleimage.class.php';
        $this->securimage = new Securimage();

        //Create login objct
        $this->login = new Login($this, array());

        //Operate ajax calls
        $this->operateAJAX();

        if (isset($_GET['action']) && $_GET['action'] == 'exit') {
            $this->login->exitUser();
            header('Location:' . $this->uri);
        };

        $this->operateOauth();
    }

    private function operateAJAX()
    {
        if ($this->answer_type == 'ajax') {
            switch ($_GET['action']) {
                case 'subscribe' : {
                    header('Content-type: application/json');
                    print json_encode( $this->subscribe($_POST['email']) );
                } break;

                case 'visit' : {
                    header('Content-type: application/json');
                    print json_encode( $this->visit() );
                } break;

                /*case 'unsubscribe' : {
                    header('Content-type: application/json');
                    print json_encode( $this->unSubscribe($_POST['email']) );
                } break;*/
            };

            exit;
        }
    }

    private function operateOauth()
    {
        if (isset($_GET['oauth'])) {
            $this->login->oAuth();
            exit;
        };
    }

    private function ajaxTest()
    {
        return 'Test ok!';
    }

    public function getInlineMenu($menu_id = false, $pid = false)
    {
        $additional = '';
        $menu = '';
        $pid_add = '';

        if ($pid) {
            $pid_add = " && `structure`.`pid` = " . intval($pid);
        };

        if ($menu_id > 0) {
            $menu = "`structure_data`.`menu` = " . intval($menu_id) . " && ";
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
                    " . $menu . "
                    `structure_data`.`publish` = 1 &&
                    `structure_data`.`id` = `structure`.`id` " . $pid_add . $additional . "
                ORDER BY
                    `sort` ASC
            ";

        return $this->db->assocMulti($query);
    }

    //Get page
    public function getPage($id)
    {
        $query = "
                SELECT
                    `col_33` AS `text`
                FROM
                    `section_3`
                WHERE
                    `id` = " . intval($id) . "
            ";

        $result = $this->db->assocItem($query);
        return $result['text'];
    }

    //Returns array of specified branch
    public function getBranchMenu($id = 1, $menu)
    {
        $query = "
                SELECT
                    `structure`.`id`,
                    `structure_data`.`name`,
                    `structure_data`.`path`
                FROM
                    `structure`,
                    `structure_data`
                WHERE
                    `structure`.`pid` = " . intval($id) . " &&
                    `structure`.`id` = `structure_data`.`id` &&
                    `structure_data`.`publish` = 1 &&
                    `structure_data`.`menu` = " . intval($menu) . "
                ORDER BY
                    `structure_data`.`sort` ASC
            ";
        $result = mysql_query($query);

        $rows = array();

        while ($row = mysql_fetch_assoc($result)) {
            $row['childrens'] = $this->getBranchMenu($row['id'], $menu);
            $rows[] = $row;
        };

        return $rows;
    }


    /************************************************************
     * CUSTOM METHODS WRITE BELOW THIS BLOCK
     ************************************************************/
    public function getSearchItems($sq)
    {

    }

    //Sitemap
    public function getSitemapBranch($pid)
    {
        $query = "
                    SELECT
                        `structure`.`id`,
                        `structure_data`.`name`,
                        `structure_data`.`path`
                    FROM
                        `structure`,
                        `structure_data`
                    WHERE
                        `structure`.`pid` = " . intval($pid) . " &&
                        `structure`.`id` = `structure_data`.`id` &&
                        `structure_data`.`publish` = 1 &&
                        `structure_data`.`mode` NOT IN(3, 8)
                    ORDER BY
                        `structure_data`.`sort` ASC
                ";
        $result = mysql_query($query);

        while ($row = mysql_fetch_assoc($result)) {
            $row['childrens'] = $this->getSitemapBranch($row['id']);
            $rows[] = $row;
        };

        return $rows;
    }

    // Slider items
    public function getSLiderItems()
    {
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

    //News short
    public function getNewsShort($limit)
    {
        $query = "
                SELECT
                    s.id AS structure_id,
                    s.name AS structure_name,
                    s.path AS path,
                    s.publish AS publish,

                    d.id AS id,
                    d.name AS name,
                    d.col_132 AS date,
                    d.col_134 AS text
                FROM
                    structure_data s
                LEFT JOIN
                    section_19 d ON (d.id = s.content_id)
                WHERE
                    s.publish = 1 && s.mode = 3
                ORDER BY
                    d.col_132
                DESC
                LIMIT " . intval($limit);

        return $this->db->assocMulti($query);
    }

    //Flex-blocks
    public function getFlexBlocks(){
        $query = "
                SELECT
                    `id`,
                    `sort`,
                    `publish`,
                    `name`,
                    `col_171` AS `text_1`,
                    `col_172` AS `text_2`
                FROM
                    `section_24`
                WHERE
                    `publish` = 1
                ORDER BY
                    `sort`
                ASC
                LIMIT 3";

        return $this->db->assocMulti($query);
    }

    // Tariffs
    public function getTariffs($pack_id){
        $w = "";

        if($pack_id > 0){
            $w = " && `col_202` = ". intval($pack_id);
        }

        $query = "
                SELECT
                    `id`,
                    `sort`,
                    `publish`,
                    `col_202` AS `pack_id`,
                    `name`,
                    `col_203` AS `price`,
                    `col_205` AS `params`,
                    `col_207` AS `promo`
                FROM
                    `section_28`
                WHERE
                    `publish` = 1 ".$w."
                ORDER BY
                    `sort`
                ASC
                ";

        return $this->db->assocMulti($query);
    }

    // Tariffs packs
    public function getTariffsPacks(){
        $query = "
                SELECT
                    `id`,
                    `sort`,
                    `publish`,
                    `name`,
                    `col_201` AS `text`
                FROM
                    `section_29`
                WHERE
                    `publish` = 1
                ORDER BY
                    `sort`
                ASC
                ";

        return $this->db->assocMulti($query);
    }

    // Tariffs pack
    public function getTariffsPack($id){
        $query = "
                SELECT
                    `id`,
                    `sort`,
                    `publish`,
                    `name`,
                    `col_201` AS `text`
                FROM
                    `section_29`
                WHERE
                    `publish` = 1 &&
                    `id` = ".intval($id)."
                ORDER BY
                    `sort`
                ASC
                ";

        return $this->db->assocItem($query);
    }

    public function visit(){
        $result = new stdClass();
        $result->fields = array();

        $result->status = true;

        $form_company = $_POST['form_company'];
        $form_doc = $_POST['form_doc'];
        $form_sender_name = $_POST['form_sender_name'];
        $form_car_make = $_POST['form_car_make'];
        $form_car_colour = $_POST['form_car_colour'];
        $form_car_id = $_POST['form_car_id'];
        $visitor_name_1 = $_POST['visitor_name_1'];
        $visitor_name_2 = $_POST['visitor_name_2'];
        $visitor_word_1 = $_POST['visitor_word_1'];
        $visitor_word_2 = $_POST['visitor_word_2'];
        $form_date = $_POST['form_date'];
        $form_time = $_POST['form_time'];
        $form_duration = $_POST['form_duration'];
        $form_gear_in = ($_POST['form_gear_in'] == '1') ? 'Да' : 'Нет';
        $form_gear_in_count = $_POST['form_gear_in_count'];
        $form_gear_out = ($_POST['form_gear_out'] == '1') ? 'Да' : 'Нет';
        $form_gear_out_count = $_POST['form_gear_out_count'];
        $form_message = $_POST['form_message'];

        if(!$form_company){ $result->status = false; array_push($result->fields, 'form_company'); };
        if(!$form_doc){ $result->status = false; array_push($result->fields, 'form_doc'); };
        if(!$form_sender_name){ $result->status = false; array_push($result->fields, 'form_sender_name'); };

        if(!$visitor_name_1){ $result->status = false; array_push($result->fields, 'visitor_name_1'); };
        if(!$visitor_word_1){ $result->status = false; array_push($result->fields, 'visitor_word_1'); };

        if(!$form_date){ $result->status = false; array_push($result->fields, 'form_date'); };
        if(!$form_time){ $result->status = false; array_push($result->fields, 'form_time'); };

        if(!$form_duration){ $result->status = false; array_push($result->fields, 'form_duration'); };

        $message = '';

        $message .= '<h2>Компания</h2>';

        if($form_company && $form_company != ''){ $message .= '<p><b>Компания *</b>: ' . $form_company . '</p>'; };
        if($form_doc && $form_doc != ''){ $message .= '<p><b>Номер договора *</b>: ' . $form_doc . '</p>'; };
        if($form_sender_name && $form_sender_name != ''){ $message .= '<p><b>Ф.И.О. отправителя *</b>: ' . $form_sender_name . '</p>'; };


        if($form_car_make || $form_car_colour || $form_car_id){
            $message .= '<h2>Автомобиль</h2>';
        }

        if($form_car_make && $form_car_make != ''){ $message .= '<p><b>Марка</b>: ' . $form_car_make . '</p>'; };
        if($form_car_colour && $form_car_colour != ''){ $message .= '<p><b>Цвет</b>: ' . $form_car_colour . '</p>'; };
        if($form_car_id && $form_car_id != ''){ $message .= '<p><b>Гос. номер</b>: ' . $form_car_id . '</p>'; };


        $message .= '<h2>Посетитель 1</h2>';

        if($visitor_name_1 && $visitor_name_1 != ''){ $message .= '<p><b>Ф.И.О. посетителя *</b>: ' . $visitor_name_1 . '</p>'; };
        if($visitor_word_1 && $visitor_word_1 != ''){ $message .= '<p><b>Кодовое слово *</b>: ' . $visitor_word_1 . '</p>'; };


        if($visitor_name_2 || $visitor_word_2){
            $message .= '<h2>Посетитель 2</h2>';
        }

        if($visitor_name_2 && $visitor_name_2 != ''){ $message .= '<p><b>Ф.И.О. посетителя</b>: ' . $visitor_name_2 . '</p>'; };
        if($visitor_word_2 && $visitor_word_2 != ''){ $message .= '<p><b>Кодовое слово</b>: ' . $visitor_word_2 . '</p>'; };


        $message .= '<h2>Дата и время</h2>';

        if($form_date && $form_date != ''){ $message .= '<p><b>Дата прибытия *</b>: ' . $form_date . '</p>'; };
        if($form_time && $form_time != ''){ $message .= '<p><b>Время прибытия *</b>: ' . $form_time . '</p>'; };


        $message .= '<h2>Продолжительность работ</h2>';

        if($form_duration && $form_duration != ''){ $message .= '<p><b>Планируемая продолжительность работ в часах *</b>: ' . $form_duration . '</p>'; };


        $message .= '<h2>Ввоз оборудования</h2>';

        $message .= '<p><b>Планируется вывоз оборудования *</b>: ' . $form_gear_in . '</p>';

        if($form_gear_in_count && $form_gear_in_count != ''){ $message .= '<p><b>Количество мест (упаковок)</b>: ' . $form_gear_in_count . '</p>'; };


        $message .= '<h2>Вывоз оборудования</h2>';

        $message .= '<p><b>Планируется ввоз оборудования *</b>: ' . $form_gear_out . '</p>';

        if($form_gear_out_count && $form_gear_out_count != ''){ $message .= '<p><b>Количество мест (упаковок)</b>: ' . $form_gear_out_count . '</p>'; };


        $message .= '<h2>Дополнительно</h2>';

        if($form_message && $form_message != ''){ $message .= '<p><b>Дополнительная информация</b>: ' . $form_message . '</p>'; };

        if($result->status !== false){
            $constants = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/constants.ini', true);

            $this->mail_vars = array(
                'content' => $message,
                'subject' => 'Заявка на посещение ДЦ'
            );

            $body = $this->smarty->fetch('mailing.tpl');

            Utilities::sendMail('robot@' . $_SERVER['SERVER_NAME'], 'robot@' . $_SERVER['SERVER_NAME'], urldecode($constants['common']['visit_email_1'][0]), 'Заявка на посещение ДЦ', false, $body);
            Utilities::sendMail('robot@' . $_SERVER['SERVER_NAME'], 'robot@' . $_SERVER['SERVER_NAME'], urldecode($constants['common']['visit_email_2'][0]), 'Заявка на посещение ДЦ', false, $body);
        }

        return $result;
    }

    public function subscribe($email){
        $result = new stdClass();

        if(!Utilities::matchPattern($email, 'email')){
            $result->status = false;
            $result->message = 'Некорректный адрес почты';

            return $result;
        };

        $check_query = "
            SELECT
                `id`,
                `publish`
            FROM
                `section_31`
            WHERE
                `col_211` = '".$this->db->quote($email)."'
            LIMIT 1
        ";

        $item = $this->db->assocItem($check_query);

        $md5str = md5(md5('password_' . $this->db->quote($email) . '_' . $_SERVER['REMOTE_ADDR']));

        if($item && $item['publish'] != '1'){
            $result->status = true;
            $this->db->query("UPDATE section_31 SET code = '".$this->db->quote($md5str)."' WHERE col_211 = '".$this->db->quote($email)."'");
            $result->message = 'Вы снова подписались на рассылку, подтвердите свое согласие перейдя по ссылке, отправленной в письме на ваш адрес';

        }else if($item && $item['publish'] == '1'){
            $result->status = false;
            $result->message = 'Вы уже подписывались на рассылку';
        }else{
            $result->status = true;
            $this->db->query("INSERT INTO section_31 SET name = '".$this->db->quote($email)."', col_211 = '".$this->db->quote($email)."', code = '".$this->db->quote($md5str)."'");
            $result->message = 'Вы успешно подписались на рассылку, подтвердите свое согласие перейдя по ссылке, отправленной в письме на ваш адрес';
        }

        if($result->status === true){
            $link = 'http://' . $_SERVER['SERVER_NAME'] . '/market-press/subscribe/?action=proof&code=' . $md5str;
            $message = 'Вы запросили подписку на рассылку на сайте '.$_SERVER['SERVER_NAME']. '. Чтобы подтвердить, перейдте по адресу: <a href="'. $link .'">' . $link . '</a>.';

            $this->mail_vars = array(
                'content' => $message,
                'subject' => 'Подтверждение подписки на рассылку'
            );

            $body = $this->smarty->fetch('mailing.tpl');

            Utilities::sendMail('subscribe@' . $_SERVER['SERVER_NAME'], 'subscribe@' . $_SERVER['SERVER_NAME'], $this->db->quote($email), 'Подтверждение подписки на рассылку', false, $body);
        }

        return $result;
    }

    public function checkSubscribeProofCode(){
        $check_query = "
            SELECT
                `id`,
                `publish`
            FROM
                `section_31`
            WHERE
                `code` = '".$this->db->quote($_GET['code'])."'
            LIMIT 1
        ";

        $item = $this->db->assocItem($check_query);

        $result = new stdClass();

        if($item && $item['id']){
            $this->db->query("UPDATE section_31 SET publish = 1 WHERE id = ".intval($item['id']));

            $result->status = true;
            $result->message = 'Подписка активирована';
        }else{
            $result->status = false;
            $result->message = 'Неверный код подтверждения';
        }

        return $result;
    }

    /*public function unSubscribe($email){
        $result = new stdClass();

        if(!Utilities::matchPattern($email, 'email')){
            $result->status = false;
            $result->message = 'Некорректный адрес почты';

            return $result;
        };

        $check_query = "
            SELECT
                `id`,
                `publish`
            FROM
                `section_31`
            WHERE
                `col_211` = '".$this->db->quote($email)."'
            ORDER BY
                `sort`
            ASC
        ";

        $item = $this->db->assocItem($check_query);

        if($item && $item['publish'] == '1'){
            $this->db->query("UPDATE section_31 SET publish = 0 WHERE col_211 = '".$this->db->quote($email)."'");
            $result->status = true;
            $result->message = 'Вы успешно отписались от рассылки';

        }else if($item && $item['publish'] != '1'){
            $result->status = true;
            $result->message = 'Вы уже отписались от рассылки';
        }else{
            $result->status = true;
            $result->message = 'Вашего адреса нет в базе рассылки';
        }

        return $result;
    }*/
}