<?php

// this came from a database....
$entries = [
    [
        'weight'=>168,
        'water'=>250025,
    ],
    [
        'weight'=>169,
        'water'=>1750,
    ]
];


$json_entries = json_encode($entries);
echo $json_entries;
