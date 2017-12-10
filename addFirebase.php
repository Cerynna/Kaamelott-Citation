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
    ->getReference('citations/karadoc')
    ->push([

        "Eh oui mémé, t'es bien mouchée!",
        "Des p'tits croutons tout vieux genre pour les lapins ? Ouais j'savais pas c'que c'était, dans le doute j'les ai bouffés.",
        "Si ça peut m'éviter de chlinguer du cul, je peux bien me tremper une ou deux fois par an.",
        "Ça y est… je vois trouble. C’est le manque de gras, je me dessèche."


    ]);


$newPost->getValue(); // Fetches the data from the realtime database