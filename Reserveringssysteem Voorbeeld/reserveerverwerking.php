<?php
//hieronder haal je de formdata op
require '../includes/database.php';


// mysqli_real_escape_string makes the sending of information to the database safer.
$fname = mysqli_real_escape_string ($db, $_POST['fname']);
$Achternaam = mysqli_real_escape_string ($db, $_POST['Achternaam']);
$email = mysqli_real_escape_string ($db, $_POST['email']);
$Telefoonnummer = mysqli_real_escape_string ($db, $_POST['Telefoonnummer']);
$FormaatRuimte = mysqli_real_escape_string ($db, $_POST['FormaatRuimte']);
$Datum =  mysqli_real_escape_string ($db, $_POST['Datum']);


//This puts the information in the table reserveren.
$sql = "INSERT INTO reserveren (Voornaam, Achternaam, email, Telefoon_nummer, Formaat_Ruimte, Datum)
VALUES ('$fname', '$Achternaam', '$email', '$Telefoonnummer', '$FormaatRuimte' ,'$Datum')";

//if the information is right send back to index.php if wrong show error.
if ($db->query($sql) === TRUE) {
    header("Location: ../index.php");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();
?>