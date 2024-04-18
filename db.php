<?php


$host = "localhost";
$user = "devUser";
$pass = '4m9%WVwp!4MVDdS!vns8qDRHG5AN2TMz$xKc';
$db='mbouldo_main';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
}
catch(PDOException $error){
  echo "Connection failed: " . $error->getMessage();
}

function p($arr){
  echo '<pre>'.print_r($arr,true).'</pre>';
}