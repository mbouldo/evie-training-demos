<?php

include '../db.php';


session_start();
// session spoofing as if we had logged in!
$_SESSION['logged_in'] = true;
$_SESSION['user_ID'] = 2;


// we're going to query the database

$sql = "SELECT `name`, email, age FROM godo_users WHERE id=:id";
try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id'=>$_SESSION['user_ID']
    ]);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //echo 'Hi '.$data['name']. ' (your email is: '.$data['email'].') ' . $data['age'];

} catch(PDOException $error){
    echo "Select failed: " . $error->getMessage();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <main class="max-w-screen-xl  mx-auto">
      <div class="p-12 bg-green-600">
          <h1 class="text-3xl text-white  font-bold ">Welcome to Godo!</h1> 
          <a href="create-new-event/" class="text-white">Create new event</a>
      </div> 

      <section>
            <div class="mt-6 flex justify-between">
                <a href="edit-event/?event_id=1">
                    <h3 class="text-xl">Community Cleanup</h3>
                </a>
                <button class="border border-gray-400 rounded px-12 py-2">Sign Up</button>
            </div>
            <div>
                <div class="font-semibold">Signed Up:</div>
                <ul>
                    <li>Martin Bouldo</li>
                    <li>Evie Anderson</li>
                </ul>
            </div>
      </section>
      <section>
            <div class="mt-6 flex justify-between">
            <a href="edit-event/?event_id=2">
                    <h3 class="text-xl">Fishing Fundraiser</h3>
                </a>
                <button class="border border-gray-400 rounded px-12 py-2">Sign Up</button>
            </div>
            <div>
                <div class="font-semibold">Signed Up:</div>
                <ul>
                    <li>Martin Bouldo</li>
      
                </ul>
            </div>
      </section>
</main>
</body>
</html>