<?php
/**
 *
 */

require __DIR__ . '/vendor/autoload.php';

require "MyBot.php";



$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if ($method == 'POST') {
    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);

    $personnage = strtolower($json->result->parameters->personnage);
    $allQuery = strtolower($json->result->resolvedQuery);
    $action = strtolower($json->result->parameters->action);
    $myBot = new MyBot();

    if ( !empty($action)  and $action === "ajouter")
    {
        str_replace($action,'',$allQuery);
        str_replace($personnage,'',$allQuery);

        $myBot->addCitation($personnage,$allQuery, $citation);
        $speech = $citation;
    }
    else {

        $myBot->getCitation($personnage, $citation);
        $speech = $citation;
    }



    $response = new \stdClass();
    $response->speech = $speech;
    $response->displayText = $speech;
    $response->source = "webhook";
    echo json_encode($response);
} else {
    echo "Method not allowed";
}

