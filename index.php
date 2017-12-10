<?php
/**
 * token
 * 328efac2ee224d7fb498aad13424867f
 *
 * sessionId
 * bce16c60-02a8-44ab-8b37-25e20ea97bbd
 *
 *
 *
 * <script src="https://www.gstatic.com/firebasejs/4.8.0/firebase.js"></script>
 * <script>
 * // Initialize Firebase
 * var config = {
 * apiKey: "AIzaSyDLa89dyojec_T69Q-HXP2CWfgNsIg6xmw",
 * authDomain: "test-17456.firebaseapp.com",
 * databaseURL: "https://test-17456.firebaseio.com",
 * projectId: "test-17456",
 * storageBucket: "test-17456.appspot.com",
 * messagingSenderId: "1040903013228"
 * };
 * firebase.initializeApp(config);
 * </script>
 *
 *
 *
 *
 */

require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


function getCitation($personnage, &$citation)
{

    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebase.json');
    $apiKey = 'AIzaSyDLa89dyojec_T69Q-HXP2CWfgNsIg6xmw';

    $firebase = (new Factory)
        ->withServiceAccountAndApiKey($serviceAccount, $apiKey)
        ->create();

    $database = $firebase->getDatabase();
    $reference = $database->getReference("citations/$personnage");
    $value = $reference->getValue();
    if (is_array($value)) {
        $keyRandom = array_rand($value);
        $keyRandomCitation = array_rand($value[$keyRandom]);
        return $citation = $value[$keyRandom][$keyRandomCitation];
    }
    else {
        return $citation = "Je connais $personnage mais je n'ai pas encore de citation pour ce personnage.";
    }

}


require "Citation.php";

$method = $_SERVER['REQUEST_METHOD'];

// Process only when method is POST
if ($method == 'POST') {
    $requestBody = file_get_contents('php://input');
    $json = json_decode($requestBody);

    $text = strtolower($json->result->parameters->text);

    getCitation($text, $citation);
    $speech = $citation;


    $response = new \stdClass();
    $response->speech = $speech;
    $response->displayText = $speech;
    $response->source = "webhook";
    echo json_encode($response);
} else {
    echo "Method not allowed";
}

