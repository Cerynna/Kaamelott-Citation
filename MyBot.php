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

        $this->setDatabase($firebase->getDatabase());

    }

    public function getListCitation($perso, &$list)
    {
        $arrayCitation = $this->database->getReference("citations/$perso")->getValue();

        foreach ($arrayCitation as $personnage => $citations){
            $list[] = $this->formatCitation($personnage);
        }
        $list = "Voila la liste des Citations pour $perso : " . implode(', ', $list) ;
        return $list;
    }

    public function getListHero(&$list)
    {
        $arrayCitation = $this->database->getReference("citations")->getValue();

        foreach ($arrayCitation as $personnage => $citations){
            $list[] = $this->formatCitation($personnage);
        }
        $list = "Voila la liste des Héros : " . implode(', ', $list) ;
        return $list;
    }


    public function getCitation($personnage, &$citation)
    {
        $reference = $this->database->getReference("citations/$personnage");
        $value = $reference->getValue();
        if (is_array($value)) {
            $keyRandom = array_rand($value);
            $keyRandomCitation = array_rand($value[$keyRandom]);
            return $citation = $value[$keyRandom][$keyRandomCitation];
        } else {
            return $citation = "Je connais $personnage mais je n'ai pas encore de citation pour ce personnage.";
        }

    }

    public function addCitation($personnage, $newCitation, &$citation)
    {
        $newPost = $this->database
            ->getReference("citations/$personnage")
            ->push([
                $this->formatCitation($newCitation),
            ]);
        $newPost->getValue();

        return $citation = $this->formatCitation($newCitation) . "\n | A été rajouter pour $personnage";
    }

    public function formatCitation($str)
    {
        for ($i = 0; $i < strlen($str) - 1; $i++) {
            if ($i === 0) {
                if ($str[$i] == ' ') {
                    $str[$i + 1] = strtoupper($str[$i + 1] . "");
                } else {
                    $str[$i] = strtoupper($str[$i] . "");
                }

            } else if ($str[$i] == '.' || $str[$i] == '!' || $str[$i] == "?") {
                if ($str[$i + 1] == ' ') {
                    $str[$i + 2] = strtoupper($str[$i + 2] . "");
                } else {
                    $str[$i + 1] = strtoupper($str[$i + 1] . "");
                }
            }
        }
        return $str;
    }

}