<?php

$data = [
    'name' => 'Perceval',
    'Citation' => 'LOL'
];
header('Content-Type: application/json');
echo json_encode($data);