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
    ->getReference('citations/perceval')
    ->push([

        "Putain, en plein dans sa mouille !",
        "C’est pas faux.",
        "Toi un jour je te crame ta famille, toi.",
        "Faut arrêter ces conneries de nord et de sud ! Une fois pour toutes, le nord, suivant comment on est tourné, ça change tout !",


    ]);


$newPost->getValue(); // Fetches the data from the realtime database