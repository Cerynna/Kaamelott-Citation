<?php
require_once __DIR__.'/vendor/autoload.php';

use DialogFlow\Client;

try {
$client = new Client('9a0ea10481284834a13202f84daf409e');

$query = $client->get('query', [
'query' => 'Hello',
]);

$response = json_decode((string) $query->getBody(), true);
} catch (\Exception $error) {
echo $error->getMessage();
}

