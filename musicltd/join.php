<?php

$error = $_GET['error'];
echo 'you typed in';
echo htmlspecialchars($error);

$display_error_message = '';

if($error=='invalid_username'){
    $display_error_message = 'Please enter in a correct username';
}else if($error=='invalid_password'){
    $display_error_message = 'Please enter in a correct password';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 400px;
        margin: 50px auto;
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
    }
    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }
    input[type="text"],
    input[type="password"] {
        width: calc(100% - 12px);
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    input[type="submit"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type="submit"]:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>

<div class="container">

    <h2>Login</h2>

    <form action="join_process.php" method="post">
        <h3><?php echo $display_error_message; ?></h3>

        <label for="username">Username:</label>
        <?php
        if($error=='invalid_username'){
            echo 'Username not found!';
        }
        ?>

        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <?php
        if($error=='invalid_password'){
            echo 'Incorrect Password!';
        }
        ?>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Login">
    </form>
</div>

</body>
</html>
