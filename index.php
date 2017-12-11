<?php
/**
 *
 */

require __DIR__ . '/vendor/autoload.php';

require "MyBot.php";


//Guzzle
$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if ($method == 'POST') {

    $myBot = new MyBot();

    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);


    $parameters = strtolower($json->result->parameters);
    $personnage = strtolower($json->result->parameters->personnage);
    $allQuery = strtolower($json->result->resolvedQuery);
    $action = strtolower($json->result->parameters->action);
    $list = strtolower($json->result->parameters->list);


    $speech = $personnage . " - " . $action . " - " . $list . " - " . $allQuery . " - " . $parameters;

    if (!empty($personnage) && empty($action) && empty($list))
    {
        $myBot->getCitation($personnage, $citation);
        $speech = $citation;
    }
    elseif (!empty($personnage) and !empty($action))
    {
        if ($action === "add")
        {
            /**
            $allQuery = str_replace($action." ",'',$allQuery);
            $allQuery = str_replace($personnage." ",'',$allQuery);

            $myBot->addCitation($personnage, $allQuery, $citation);
            $speech = $citation;
             */
            $speech = "add perso";
        }
        elseif ($action === 'list')
        {

            $myBot->getListCitation($personnage, $citation);
            $speech = $citation;

        }
        else {
            $speech = "L'action n'est pas géré";
        }
    }
    elseif (!empty($action) && $action === 'list')
    {
        $myBot->getListHero($citation);
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

