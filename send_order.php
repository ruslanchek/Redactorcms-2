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
        isset($_POST['tariff']) && $_POST['tariff'] != '' &&
        isset($_POST['phone']) && $_POST['phone'] != ''
    ){
        $message = "";

        $message .= '<p><b>Имя</b><br>'.strip_tags($_POST['name']).'</p>';
        $message .= '<p><b>E-mail</b><br>'.strip_tags($_POST['email']).'</p>';
        $message .= '<p><b>Телефон</b><br>'.strip_tags($_POST['phone']).'</p>';
        $message .= '<p><b>Тариф</b><br>'.strip_tags($_POST['tariff']).'</p>';

        $result = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/constants.ini', true);
        
        send('Сайт SDN (заказ тарифа)', 'order@'.$_SERVER['HTTP_HOST'], urldecode($result['common']['send_email'][0]), 'Заказ тарифа «SDN»', $message);

        $message = '
            <p>Благодарим Вас за обращение в нашу компанию.
            После обработки заявки Вам будет дана обратная связь.</p>

            <p>Уточняющие вопросы Вы можете задать дежурым операторам
            по телефону +7 (812) 319-00-04</p>

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