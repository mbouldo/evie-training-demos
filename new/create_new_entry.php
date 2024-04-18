<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include '../db.php';

$formData = $_POST;

$weight = $formData['weight'];

if($weight=='500'){
    echo 'hello world';
    exit();
}


$sleepDuration = $formData['sleepDuration'];
$totalSteps = $formData['totalSteps'];
$date = $formData['date'];
$avgHeartRate = $formData['avgHeartRate'];
$waterIntake = $formData['waterIntake'];
$milesRan = $formData['milesRan'];
$caloriesBurnt = $formData['caloriesBurnt'];
$strengthTraining = $formData['strengthTraining'];

$sql = "INSERT INTO fitnessEntries (`date`,`weight`,sleepDuration,totalSteps,avgHeartRate,waterIntake,milesRan,caloriesBurnt,strengthTraining) 
VALUES ('$date',$weight,$sleepDuration,$totalSteps,$avgHeartRate,$waterIntake,$milesRan,$caloriesBurnt,$strengthTraining);
";
try{
    $statement = $pdo->prepare($sql);
    $statement->execute();
    echo json_encode('success_happy_yay');
}catch(PDOException $e){
    echo json_encode('error');
    echo $e;
}



