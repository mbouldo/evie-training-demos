<?php

session_start();

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
          <h1 class="text-3xl text-white p-12 font-bold bg-green-600">Create new event</h1> 
      </div> 

      <section>
        <form action="#" method="POST" class="mt-12">
            <label for="eventName">Event Name:</label><br>
            <input type="text" id="eventName" name="eventName" value="Community Cleanup" class="border border-slate-400 rounded mb-5"><br>
            <label for="eventAddress">Event Address:</label><br>
            <input type="text" id="eventAddress" name="eventAddress"  value="813 Folmar St" class="border border-slate-400 rounded mb-5"><br>
            <label for="eventCapacity">Event Maximum Capacity:</label><br>
            <input type="number" id="eventCapacity" name="eventCapacity" value="5" class="border border-slate-400 rounded mb-5"><br><br>
            <input type="button" value="Submit" onclick="createNewEvent()" class="border border-gray-400 rounded px-12 py-2 cursor-pointer">
        </form>
      </section>
</main>

</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
     function createNewEvent(){
        const postObj = {
                eventName: $("#eventName").val(),
                eventAddress: $("#eventAddress").val(),
                eventCapacity: $("#eventCapacity").val(),
        };

        $.ajax({
            url: "createNewEvent.php",
            type: 'POST',
            data: postObj,
            dataType: 'json', // added data type
            success: function(res) {
                $("#eventName").val('');
                $("#eventAddress").val('');
                $("#eventCapacity").val('');
            },
            error: function(res){
                //alert('error')
            }
        });
     }
</script>
</html>