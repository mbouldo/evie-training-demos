<?php

include '../../db.php';

$eventName = $_POST['eventName'];
$eventAddress = $_POST['eventAddress'];
$eventCapacity = $_POST['eventCapacity'];

$sql = "INSERT INTO godo_events (eventName,eventAddress,eventCapacity) VALUES (:eventName,:eventAddress,:eventCapacity)";

try {
    $statement = $pdo->prepare($sql);
    $statement->execute([
        'eventName'=>$eventName,
        'eventAddress'=>$eventAddress,
        'eventCapacity'=>$eventCapacity,
    ]);
   
    echo json_encode('success');

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}