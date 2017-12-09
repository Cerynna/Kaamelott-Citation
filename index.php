<?php

$data = [
    'speech' => 'Perceval',
    'displayText' => 'LOL'
];
header('Content-Type: application/json');
echo json_encode($data);