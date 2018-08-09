<?php

    $data = json_decode(file_get_contents('php://input'), true);
    
    $to = "mail@jan-patrick.de";
    $from = "buttonclicked@sense-chess.de";
    $header = "sense-chess.de | Kaufenbutton geklickt";
    $subject = "Der Kaufenbutton wurde auf der Website gedrückt. Mal sehen, ob gleich eine Mail mit persönlicherem inhalt kommt ;)";

    $send = mail($to, $subject, $body, $header);

?>