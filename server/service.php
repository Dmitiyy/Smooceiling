<?php 
    $phone = htmlspecialchars($_POST['num']);

    function send () {
        global $phone;
        $message = "Заявка со страницы 'Сервис'\nТелефон: $phone";
        $to = 'dmitriyy311@gmail.com';
        $subject = 'Заявка с сайта';
        $headers = 'From: webmaster@example.com' . "\r\n" .
            'Reply-To: webmaster@example.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        mail($to, $subject, $message, $headers);
        echo 'Спасибо за заявку, мы скоро с вами свяжемся';
    }
    send();
?>