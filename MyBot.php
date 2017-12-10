<?php
/**
 * Created by PhpStorm.
 * User: cerynna
 * Date: 10/12/17
 * Time: 21:21
 */

require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class MyBot
{


    const JSON_FIREBASE = __DIR__ . '/firebase.json';
    const API_KEY_FIREBASE = 'AIzaSyDLa89dyojec_T69Q-HXP2CWfgNsIg6xmw';


    public $database;

    /**
     * @return mixed
     */
    public function getDatabase()
    {
        return $this->database;
    }

    /**
     * @param mixed $database
     * @return MyBot
     */
    public function setDatabase($database)
    {
        $this->database = $database;
        return $this;
    }

    public function __construct()
    {
        $serviceAccount = ServiceAccount::fromJsonFile(self::JSON_FIREBASE);
        $apiKey = self::API_KEY_FIREBASE;

        $firebase = (new Factory)
            ->withServiceAccountAndApiKey($serviceAccount, $apiKey)
            ->create();

        $this->setDatabase($firebase->getDatabase()) ;

    }

    public function getCitation($personnage, &$citation)
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

}