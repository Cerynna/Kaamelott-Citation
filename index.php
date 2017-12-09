<?php
function sendMessage($parameters) {
    header('Content-Type: application/json');
    echo json_encode($parameters);
}

$parameters = array(
    "speech" => "Here are the results : None.Please say Detail Placename for more details of a place.",
    "displayText" => "Hello Google",
    "contextOut" => "",
    "source" => "agent"
);


sendMessage($parameters);
