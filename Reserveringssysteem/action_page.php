<?php
// Require database & define $db variable
require 'includes/database.php';
/** @var $db */

// mysqli_real_escape_string makes the sending of information to the database safer.
$firstName = mysqli_real_escape_string ($db, $_POST['firstName']);
$lastName = mysqli_real_escape_string ($db, $_POST['lastName']);
$email = mysqli_real_escape_string ($db, $_POST['email']);
$phoneNumber = mysqli_real_escape_string ($db, $_POST['phoneNumber']);
$comments = mysqli_real_escape_string ($db, $_POST['comments']);
$date =  mysqli_real_escape_string ($db, $_POST['date']);


// This puts the information in the table reservation
$sql = "INSERT INTO reservation (firstName, lastName, email, phoneNumber, comments, date)
VALUES ('$firstName', '$lastName', '$email', '$phoneNumber', '$comments' ,'$date')";

// If the information is right send back to pverzicht.php else show error
if ($db->query($sql) === TRUE) {
    header("Location: overzicht.php");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();