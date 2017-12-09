<?php
require_once __DIR__.'/vendor/autoload.php';

use DialogFlow\Client;

try {
$client = new Client('access_token');

$query = $client->get('query', [
'query' => 'Hello',
]);

$response = json_decode((string) $query->getBody(), true);
} catch (\Exception $error) {
echo $error->getMessage();
}