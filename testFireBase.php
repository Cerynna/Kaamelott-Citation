<?php
/**
 * Created by PhpStorm.
 * User: cerynna
 * Date: 10/12/17
 * Time: 19:45
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
        return $citation = "Je n'ai pas compris $personnage";
    }

}

getCitation('lolilol', $cit);

echo $cit;


//echo $cit;