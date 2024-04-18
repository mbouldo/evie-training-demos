<?php

session_start();

if($_SESSION['logged_in']==true){

}else{
    echo $_SESSION['logged_in'];
    echo 'You are not logged in!';
    exit();
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
    <h1>Create new fitness entry</h1>

    <form id="form" action="https://mbouldo.com/evie/new/create_new_entry.php" method="POST">
        Weight
        <input type="number" value="1" id="weight" name="weight">
        Sleep Duration
        <input type="number"  value="1"  id="sleepDuration" name="sleepDuration">
        Total Steps
        <input type="number"  value="1" id="totalSteps" name="totalSteps">

        <input type="text" value="2024-01-01" id="date" name="date">
        <input type="number"  value="1" id="avgHeartRate" name="avgHeartRate">
        <input type="number"  value="1" id="waterIntake" name="waterIntake">
        <input type="number"  value="1" id="milesRan" name="milesRan">
        <input type="number"  value="1" id="caloriesBurnt" name="caloriesBurnt">
        <input type="number"  value="1" id="strengthTraining" name="strengthTraining">

        <button type="button" onclick="validateForm()">Submit</button>
    </form>

    
</body>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    function validateForm(){


        //form validation:

        let weightValue = $('#weight').val()

        if(weightValue>1000 || weightValue==0 || weightValue==''){
            alert('invalid value for weight');
            return;
        }


        let postObj = {
            weight: weightValue,
            sleepDuration: $('#sleepDuration').val(),
            totalSteps: $('#totalSteps').val(),
            date: $('#date').val(),
            avgHeartRate: $('#avgHeartRate').val(),
            waterIntake: $('#waterIntake').val(),
            milesRan: $('#milesRan').val(),
            caloriesBurnt: $('#caloriesBurnt').val(),
            strengthTraining: $('#strengthTraining').val(),
            extraData: 'straight from javascript',
        }
       
        console.log('Posting to the server....')

        $.ajax({
            url: "create_new_entry.php",
            type: 'POST',
            data: postObj,
            dataType: 'json', // added data type
            success: function(responseFromServer) {
                if(responseFromServer=='success_happy_yay'){
                    alert('Show success screen')
                    alert(responseFromServer)
                }else{
                    alert("Error submiting the form! Reason: " + responseFromServer);
             
                }
            },
            error: function(responseFromServer){ // server is dead OR server returned non json data
                alert('error!')
            }
        });

    }

</script>


</html>