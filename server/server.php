<?php 
    $name = htmlspecialchars($_POST['name']);
    $phone = htmlspecialchars($_POST['phone']);

    function send () {
        global $name;
        global $phone;
        $message = "Имя: $name\nТелефон: $phone";
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