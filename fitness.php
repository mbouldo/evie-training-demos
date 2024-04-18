<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

include 'db.php';

//INSERT INTO fitnessEntries (date,weight,sleepDuration,totalSteps,avgHeartRate,waterIntake,milesRan,caloriesBurnt,strengthTraining) VALUES ('2022-12-01',142,8.4,10000,53,2000,2.3,550,0);

$sql = "SELECT * FROM fitnessEntries ";

try {
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}


echo json_encode($data);


?>

