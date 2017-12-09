<?php
function sendMessage($parameters) {
    header('Content-Type: application/json');
    echo json_encode($parameters);
}

$parameters = "LOL";


sendMessage($parameters);