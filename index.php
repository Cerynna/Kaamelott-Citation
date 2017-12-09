<?php
/**
 * token
 * 328efac2ee224d7fb498aad13424867f
 *
 * sessionId
 * bce16c60-02a8-44ab-8b37-25e20ea97bbd
 */
require "Citation.php";

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);

    $text = strtolower($json->result->parameters->text);
    $categorie = strtolower($json->result->parameters->Categorie);

    switch ($text) {
        case 'perceval':
            ;
            $speech = Citation::PERCEVAL[array_rand(Citation::PERCEVAL, 1)];
            break;

        case 'arthur':
            $speech = Citation::ARTHUR[array_rand(Citation::ARTHUR, 1)];
            break;

        case 'anything':
            $speech = "Yes, you can type anything here.";
            break;

        default:
            $speech = "Sorry, I didnt get $text - $categorie.  Please ask me something else.";
            break;
    }

    $response = new \stdClass();
    $response->speech = $speech;
    $response->displayText = $speech;
    $response->source = "webhook";
    echo json_encode($response);
}
else
{
    echo "Method not allowed";
}

