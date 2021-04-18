<?php 
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $error = false;
    $token = '1602790385:AAHphMQW8Oa-QaLLwfm_0qxWfUJ-vf9Cvfk';
    $chat_id = '-572806241';
    $status = '';
    $dataErrors = [];

    if (strlen($name) < 1) {
        array_push($dataErrors, 'Enter the correct name');
        $error = true;
    }

    if (strpos($email, '@') == false) {
        array_push($dataErrors, 'Enter the correct email');
        $error = true;
    }

    if (strlen($message) < 5) {
        array_push($dataErrors, 'Enter the correct message');
        $error = true;
    }

    if (!$error) {
        $data = array(
            'name:' => $name, 
            'email:' => $email, 
            'message:' => $message
        );
        foreach ($data as $key => $value) {
            $result .= $key.' '.$value.'%0A';
        }
        send($result);
        if ($status) {
            echo 'Thank you, we will contact you shortly!';
        }
    } else {
        $str = implode(', ', $dataErrors);
        echo $str;
    }

    function send ($data) {
        global $token;
        global $chat_id;
        global $status;
        $status = fopen("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&parse_mode=html&text=$data", 'r');
    }
?>