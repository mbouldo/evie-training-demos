<?php
session_start();

if($_SESSION['rank']!='admin'){
    echo 'Forbidden';
    exit();
}else{
    echo $_SESSION['name'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Admin Panel: The secret is Love.
</body>
</html>