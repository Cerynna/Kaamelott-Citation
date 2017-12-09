<?php

$data = [
    'test' => 'Perceval',
    'displayText' => 'LOL'
];
header('Content-Type', 'application/json; charset=UTF-8');
echo json_encode($data);