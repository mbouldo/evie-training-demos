<?php



$username = $_POST['username'];
$password = $_POST['password'];

// a bunch of sql, database, logic.

$usernameFound = true;
$passwordCorrect = false;

if($usernameFound){
    if($passwordCorrect){
        header("Location: index.html");
        exit();
    }else{
        header("Location: join.php?error=invalid_password");
        exit();
    }
}else{
    header("Location: join.php?error=invalid_username");
    exit();
}