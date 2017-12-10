<?php
/**
 * Created by PhpStorm.
 * User: cerynna
 * Date: 10/12/17
 * Time: 18:53
 */

require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

$serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebase.json');
$apiKey = 'AIzaSyDLa89dyojec_T69Q-HXP2CWfgNsIg6xmw';

$firebase = (new Factory)
    ->withServiceAccountAndApiKey($serviceAccount, $apiKey)
    ->create();

$database = $firebase->getDatabase();

$newPost = $database
    ->getReference('citations/merlin')
    ->push([

        "Qu'est-ce qui est petit et marron ?",
        "Putain, il est fort ce con.",
        "J'adore la chataîgne. Je m'en ferais péter le bide. Vous en voulez ?",
        "Franchement, une potion pour faire pisser bleu, ça presse forcément la minute ?"


    ]);


$newPost->getValue(); // Fetches the data from the realtime database