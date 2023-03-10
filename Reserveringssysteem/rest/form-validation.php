<?php
//Check if data is valid & generate error if not so
$errors = [];
if ($Voornaam== "") {
    $errors['Voornaam'] = 'Voornaam cannot be empty';
}
if ($Achternaam == "") {
    $errors['Achternaam'] = 'Achternaam cannot be empty';
}
if ($Email == "") {
    $errors['Email'] = 'email cannot be empty';
}
if ($Telefoon_nummer == "") {
    $errors['Telefoon_nummer'] = 'Telefoonnummer cannot be empty';
}
if ($Formaat_ruimte == "") {
    $errors['Formaat_ruimte'] = 'FormaatRuimte cannot be empty';
}
if ($Datum == "") {
    $errors['Datum'] = 'email cannot be empty';
}
if (!is_numeric($Telefoon_nummer) || strlen($Telefoon_nummer) != 10) {
    $errors['Telefoon_nummer'] = 'Telefoonnummer needs to be a number with the length of 10';
}