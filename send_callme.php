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
                    </body>
                    ';

        return mail($to, $subj, $content, $headers);
    }

    if(isset($_POST['phone']) && isset($_POST['name'])){
        if($_POST['phone'] && $_POST['name']){
            $message = "";

            if($_POST['phone']){
                $message .= '<p><b>Имя</b><br>'.strip_tags($_POST['name']).'</p>';
                $message .= '<p><b>Контактная информация</b><br>'.strip_tags($_POST['phone']).'</p>';
            };

            $when = intval(strip_tags($_POST['when']));

            $date = new DateTime();
            $date->modify('+' . $when . ' day');

            $message .= '<p><b>Когда позвонить</b><br>'.$date->format('d-m-Y').', с '.strip_tags($_POST['from']).' до '.strip_tags($_POST['to']).'</p>';

            $result = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/constants.ini', true);

            send('Сайт SDN (обратный звонок)', 'callme@'.$_SERVER['HTTP_HOST'], urldecode($result['common']['send_email'][0]), 'Заполнена форма обратного звонка на сайте «SDN»', $message);

            print json_encode(array(
                'status' => true,
                'message' => 'Спасибо за обращение, ожидайте звонка!'
            ));
        }else{
            print json_encode(array(
                'status' => false,
                'message' => 'Заполните пожалуйста все поля!'
            ));
        }

        die();
    };

    print json_encode(array(
        'status' => true,
        'message' => 'Спасибо за обращение, ожидайте звонка!'
    ));
?>