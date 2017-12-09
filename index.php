<?php
function sendMessage($parameters) {
    header('Content-Type=> application/json');
    echo json_encode($parameters);
}

$animals = [

        "name" => "lièvre",
        "female" => "hase (qui s'écrit <say-as interpret-as=\"characters\">HASE</say-as>)",
        "child" => "levraut (qui s'écrit <say-as interpret-as=\"characters\">LEVRAUT</say-as>)",
        "sound" => [
            "noun" => "vagissement",
            "verb" => "vagit"
        ],

];


sendMessage($animals);