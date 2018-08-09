<?php

    $data = json_decode(file_get_contents('php://input'), true);
    
    $to = "mail@jan-patrick.de";
    $from = $data['from'];
    $name = $data['name'];
    $header = "Neue Nachricht von $from";
    $subject = $data['subject'];

    $send = mail($to, $subject, $body, $header);

?>