<?php
require_once __DIR__.'/vendor/autoload.php';

use DialogFlow\Client;
use DialogFlow\Model\Query;
use DialogFlow\Method\QueryApi;

try {
    $client = new Client('328efac2ee224d7fb498aad13424867f');
    $queryApi = new QueryApi($client);

    $meaning = $queryApi->extractMeaning('Hello', [
        'sessionId' => 'bce16c60-02a8-44ab-8b37-25e20ea97bbd',
        'lang' => 'fr',
    ]);
    $response = new Query($meaning);
} catch (\Exception $error) {
    echo $error->getMessage();
}

