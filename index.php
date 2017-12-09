<?php
/**
 * token
 * 328efac2ee224d7fb498aad13424867f
 *
 * sessionId
 * bce16c60-02a8-44ab-8b37-25e20ea97bbd
 */

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if($method == 'POST'){
    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);

    $text = $json->result->parameters->text;

    switch ($text) {
        case 'Perceval':
            $speech = "Hi, Nice to meet you";
            break;

        case 'bye':
            $speech = "Bye, good night";
            break;

        case 'anything':
            $speech = "Yes, you can type anything here.";
            break;

        default:
            $speech = "Sorry, I didnt get that. $text  Please ask me something else.";
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

