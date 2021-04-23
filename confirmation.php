<?php

$first_name = filter_input(INPUT_GET, "first_name");
$last_name = filter_input(INPUT_GET, "last_name");
$pary_size = filter_input(INPUT_GET, "party_size", FILTER_VALIDATE_INT);
$reservation_time = filter_input(INPUT_GET, "reservation_time", FILTER_VALIDATE_INT);
$allergies = filter_input(INPUT_GET, "allergies", FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
$message = "";
$chosen_time = $_GET['chosen_time'];

if ($first_name == "") {
   $message = "First Name must not be blank. ";
} else if ($last_name == "") {
    $message = "Last Name must not be blank. ";
} else if ($pary_size === false) {
    $message = "Party Size must be a whole number. ";
} else if ($pary_size < 1 || $pary_size > 20) {
    $message = "Party size must be between 1 and 20. ";
} else if ($reservation_time === false) {
    $message = "Reservation Time must be a whole number. ";
} else if ($chosen_time === "am") {
    if ($reservation_time < 9 || $reservation_time > 11) {
        $message = "Reservation Time for AM slots must be between 9 and 11. ";
    }
} else if ($chosen_time === "pm") {
    if ($reservation_time < 1 || $reservation_time > 12 || $reservation_time === 11) {
        $message = "Reservation Time for PM slots must be between 12 and 10. ";
    }
} else {
    $message = "";
}

if ($message !== "") {
    include('index.php');
    die();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirmed</title>
    <link rel="stylesheet" type="text/css" href="restaurant.css">
</head>
<body>
    <main>
        <h1>Reservation Confirmed</h1>
        <p> Thank you! Your reservation has been confirmed.</p>
        <label>First Name:</label>
        <span><?php echo $first_name; ?></span><br>

        <label>Last Name:</label>
        <span><?php echo $last_name; ?></span><br>

        <label>Party Size:</label>
        <span><?php echo $pary_size; ?></span><br>

        <label>Reservation Time:</label>
        <span><?php echo $reservation_time . ' ' . strtoupper($chosen_time); ?></span><br>
        
        <label>Food Allergies:</label><br>
                <?php if($allergies !== null) : ?>
            <ul>
               <?php foreach($allergies as $allergy) : ?>
                <li><?php echo $allergy; ?></li>
               <?php endforeach; ?>
            </ul>   
        <?php endif; ?>
    </main>
</body>
</html>

