<?php

    $to = "mail@jan-patrick.de";
    $from = $_POST['email'];
    $name = $_POST['name'];
    $header = "Neue Nachricht von $from";
    $subject = $_POST['subject'];

    $send = mail($to, $subject, $body, $header);

?>