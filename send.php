<?php
    date_default_timezone_set('Europe/Moscow');

    function send($from_name, $from_mail, $to, $subject, $content){
        $subj = "=?utf-8?b?" . base64_encode($subject) . "?=";
        $from = "=?utf-8?B?" . base64_encode($from_name) . "?= <".$from_mail.">";

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'Content-Transfer-Encoding: 8bit' . "\r\n";

        // Additional headers
        $headers .= 'To: <'.$to.'>' . "\r\n";
        $headers .= 'From: '.$from. "\r\n";

        $content = '<body style="font: 12px/20px Arial, Tahoma, Verdana, sans-serif;">
                        <html>
                            <h1 style=" color: #444444; font-family: Georgia, Times, serif; font-size: 24px; font-weight: normal; padding: 10px 15px; margin: 0; background: #eeeeee;">'.$subject.'</h1>
                            <div style="padding: 9px 14px; border: 1px solid #eeeeee;">'.$content.'</div>
                        </html>
                    </body>';

        return mail($to, $subj, $content, $headers);
    }

    if(
        isset($_POST['maker']) && $_POST['maker'] != '' &&
        isset($_POST['name']) && $_POST['name'] != '' &&
        isset($_POST['company']) && $_POST['company'] != '' &&
        isset($_POST['phone']) && $_POST['phone'] != ''
    ){
        $message = "";

        $message .= '<p><b>Производитель, маркировка</b><br>'.strip_tags($_POST['maker']).'</p>';
        $message .= '<p><b>Имя</b><br>'.strip_tags($_POST['name']).'</p>';
        $message .= '<p><b>Компания</b><br>'.strip_tags($_POST['company']).'</p>';
        $message .= '<p><b>Телефон</b><br>'.strip_tags($_POST['phone']).'</p>';

        $result = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/constants.ini', true);

        send('Сайт '.$result['site']['name'][0], 'callme@'.$_SERVER['HTTP_HOST'], $result['common']['send_email'][0], 'Заказ от посетителя сайта «'.$result['site']['name'][0].'»', $message);

        print json_encode(array(
            'status' => true,
            'message' => 'Спасибо за обращение!'
        ));
    }else{
        print json_encode(array(
            'status' => false,
            'message' => 'Заполните пожалуйста все поля!'
        ));
    }
?>