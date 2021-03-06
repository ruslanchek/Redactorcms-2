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
        isset($_POST['email']) && $_POST['email'] != '' &&
        isset($_POST['name']) && $_POST['name'] != '' &&
        isset($_POST['message']) && $_POST['message'] != '' &&
        isset($_POST['phone']) && $_POST['phone'] != ''
    ){
        $message = "";

        $message .= '<p><b>Имя</b><br>'.strip_tags($_POST['name']).'</p>';
        $message .= '<p><b>E-mail</b><br>'.strip_tags($_POST['email']).'</p>';
        $message .= '<p><b>Телефон</b><br>'.strip_tags($_POST['phone']).'</p>';
        $message .= '<p><b>Сообщение</b><br>'.strip_tags($_POST['message']).'</p>';

        $result = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/constants.ini', true);
        
        send('Сайт SDN (экскурсия)', 'contact@'.$_SERVER['HTTP_HOST'], urldecode($result['common']['send_email'][0]), 'Клиент сделал запрос на экскурию в «SDN»', $message);

        $message = '
            <p>
                Уточняющие вопросы Вы можете задать дежурым операторам по телефону  +7 (812) 319-00-03
            </p>

            <p>Команда модульного дата-центра SDN <a hre="http://stackdata.net">stackdata.net</a></p>
            
            <h2>Ваши данные</h2>
        ' . $message;

        send('SDN', 'robot@'.$_SERVER['HTTP_HOST'], $_POST['email'], 'Подтверждение заказа с сайта stackdata.net', $message);

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