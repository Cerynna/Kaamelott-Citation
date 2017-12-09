<?php
function sendMessage($parameters) {
    header('Content-Type=> application/json');
    echo json_encode($parameters);
}

$animals = [
        "name" => "lièvre",
];


sendMessage($animals);