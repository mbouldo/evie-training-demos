<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//connect to db:
include '../db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$hashed_password = password_hash($password, PASSWORD_BCRYPT);


$sql = "INSERT INTO fitness_users (name,email,password) VALUES (:name,:email,:password)";

try {
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'name'=>$name,
    'email'=>$email,
    'password'=>$hashed_password,
]);

echo 'success';

} catch(PDOException $error){
    echo "Connection failed: " . $error->getMessage();
}