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
    $allQuery = $json->result->resolvedQuery;
    $action = $json->result->parameters->action;
    $myBot = new MyBot();

    if ( !empty($action)  and strtolower($action) === "ajouter")
    {
        $newCitation = explode(' ', $allQuery);
        unset($newCitation[0]);
        unset($newCitation[1]);
        $newCitation = implode(' ', $newCitation);
        $speech = $newCitation;
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

