<?php

session_start();
include '../../db.php';

$event_id = $_GET['event_id'];

$sql = "SELECT * FROM godo_events WHERE id=:event_id";
try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'event_id'=>$event_id
    ]);
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
  

    $eventName = $data['eventName'];
    $eventAddress = $data['eventAddress'];
    $eventCapacity = $data['eventCapacity'];

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
      <div>
          <h1 class="text-3xl text-white p-12 font-bold bg-green-600">Edit Event</h1> 
      </div> 

      <section>
        <form action="#" method="POST" class="mt-12">
            <label for="eventName">Event Name:</label><br>
            <input type="text" id="eventName" name="eventName" value="<?php echo $eventName;?>" class="border border-slate-400 rounded mb-5"><br>
            <label for="eventAddress">Event Address:</label><br>
            <input type="text" id="eventAddress" name="eventAddress" value="<?php echo $eventAddress;?>"  class="border border-slate-400 rounded mb-5"><br>
            <label for="eventCapacity">Event Maximum Capacity:</label><br>
            <input type="number" id="eventCapacity" name="eventCapacity" value="<?php echo $eventCapacity;?>" class="border border-slate-400 rounded mb-5"><br><br>
            <input type="button" value="Save Changes" onclick="createNewEvent()" class="border border-gray-400 rounded px-12 py-2 cursor-pointer">
        </form>
      </section>
</main>

</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
     
</script>
</html>