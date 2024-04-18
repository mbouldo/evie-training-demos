<?php
//connect to db:
include '../db.php';

$email = $_POST['email'];
$passwordInput = $_POST['password'];


// $correctEmail = 'mbouldo@gmail.com';
// $correctPassword = 'password';

// if($email==$correctEmail && $password==$correctPassword){
//     // authenticate user
//     session_start();

//     $_SESSION['logged_in'] = true;
//     $_SESSION['email'] = $email;
//     $_SESSION['rank']='admin';

// }else{
//     echo 'Invalid Auth!';
// }


$sql = "SELECT * FROM fitness_users WHERE email=:email";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'email'=>$email,
    ]);
    
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    if($data==false){
       
        // there is no user with this email in our database
        echo 'Invalid Auth: no user exists!';
    }else{

        if(password_verify($passwordInput,$data['password'])){
          
            session_start();
            $_SESSION['logged_in'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['name']=$data['name'];
            $_SESSION['rank']='admin';

            header("location: ../admin-panel/");
            exit();

        }else{

            p($data);

            echo $data['password'] . ' vs '. $passwordInput;
       

            // header("location: /evie/login/?error=invalid_password");
            // exit();
        }

    }
    
    


    //echo 'success';

} catch(PDOException $error){
    echo "Connection failed: " . $error->getMessage();
}


