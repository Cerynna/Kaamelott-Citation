<?php
function sendMessage($parameters) {
    header('Content-Type=> application/json');
    echo json_encode($parameters);
}

$animals = [

        "name" => "lièvre",
        "sound" => [
            "noun" => "vagissement",
            "verb" => "vagit"
        ],

];


sendMessage($animals);