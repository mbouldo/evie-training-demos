<?php

$username = $_POST['username'];
$password = $_POST['password'];

if($username=='sparkleDog' && $password=='passw123'){

}else{
    echo 'Invalid Login';
    die();
}

$weight = $_POST['weight'];

$magicWeight = (250-$weight*0.25)*44

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    
<h3>Admin Panel</h3>
<p>Hello, <?php echo $username; ?>, to the admin panel! This is secret. The formula is 25 g Mango, 25 g pinapple juice!</p>
<p>Your magic weight number is: <?php echo $magicWeight;?></p>
</body>
</html>
