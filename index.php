<?php
/**
 * token
 * 328efac2ee224d7fb498aad13424867f
 *
 * sessionId
 * bce16c60-02a8-44ab-8b37-25e20ea97bbd
 */
require_once __DIR__.'/vendor/autoload.php';

use DialogFlow\Client;

try {
    $client = new Client('328efac2ee224d7fb498aad13424867f');

    $query = $client->get('query', [
        'query' => 'Hello',
    ]);

    $response = json_decode((string) $query->getBody(), true);
} catch (\Exception $error) {
    echo $error->getMessage();
}