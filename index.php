<!DOCTYPE html>
<?php
//1525 Program 1
    //set default value of variables for initial page load
    if(!isset($message)) {$message = '';}
    if(!isset($first_name)) {$first_name = '';} 
    if (!isset($last_name)) { $last_name = ''; } 
    if (!isset($pary_size)) { $party_size = ''; } 
    if (!isset($reservation_time)) { $reservation_time = ''; }
    if(!isset($chosen_timetime)) {$time = '';}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Daniel Humphrey</title>
        <link rel="stylesheet" type="text/css" href="restaurant.css">
    </head>
    <body>
        <main>
            <h1>Restaurant Reservation Form</h1>
            <p>Please fill out this form to make your reservation.</p>
            <h3><?php echo $message; ?></h3>
            <form action="confirmation.php" method="get">
                <label>First Name:</label>
                <input type="text" name="first_name" value="<?php echo $first_name; ?>"><br>

                <label>Last Name:</label>
                <input type="text" name="last_name" value="<?php echo $last_name; ?>"><br>

                <label>Party Size:</label>
                <!--I used this resource to help me figure out how to keep the party size in the text box after user omits another required field and submits form
                https://www.experts-exchange.com/questions/27418170/PHP-Get-textbox-value-after-submit.html#a37037499-->
                <input type="number" name="party_size"
                   value="<?php if (isset($_GET['party_size'])) echo $_GET['party_size']; ?>">
                <br>
                
                <label>Reservation Time:</label>
                <input type="number" name="reservation_time"
                   value="<?php echo htmlspecialchars($reservation_time); ?>">
                <br>
                
                <!--Similarly, this resource helped me figure out how to keep the radio button that the user selected checked after submitting a form containing invalid data
                https://stackoverflow.com/questions/50098744/keep-radio-checked-after-submit-->
                <input type="radio" name="chosen_time" value="am"<?php if(isset($_GET['chosen_time']) && $_GET['chosen_time'] =='am' ){echo "checked";}?> checked class="checkmark">
                <label class="checkmark">AM</label><br>
                <input type="radio" name="chosen_time" value="pm"<?php if(isset($_GET['chosen_time']) && $_GET['chosen_time'] =='pm' ){echo "checked";}?> class="checkmark">
                <label class="checkmark">PM</label><br><br>
                
                <label>Food Allergies:</label><br>
                <input type="checkbox" name="allergies[]" value="Milk" class="checkmark">
                <label class="checkmark">Milk</label>
                <input type="checkbox" name="allergies[]" value="Eggs" class="checkmark">
                <label class="checkmark">Eggs</label><br>
                <input type="checkbox" name="allergies[]" value="Tree Nuts" class="checkmark">
                <label class="checkmark">Tree Nuts</label>
                <input type="checkbox" name="allergies[]" value="Peanuts" class="checkmark"> 
                <label class="checkmark">Peanuts</label><br>
                <input type="checkbox" name="allergies[]" value="Shellfish" class="checkmark">
                <label class="checkmark">Shellfish</label>
                <input type="checkbox" name="allergies[]" value="Wheat" class="checkmark">
                <label class="checkmark">Wheat</label><br>
                <input type="checkbox" name="allergies[]" value="Soy" class="checkmark">
                <label class="checkmark">Soy</label>
                <input type="checkbox" name="allergies[]" value="Fish" class="checkmark">
                <label class="checkmark">Fish</label><br><br>
                <label>&nbsp;</label>
                <input type="submit" class="button" value="Submit"><br> 
            </form>
        </main>
    </body>
</html>
