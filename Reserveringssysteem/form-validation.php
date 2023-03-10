<?php

include_once 'includes/database.php';
/** @var $firstName */
//Check if data is valid & generate error if not so
$errors = [];
if ($firstName== "") {
    $errors['firstName'] = 'Voornaam cannot be empty';
}
if ($lastName == "") {
    $errors['lastName'] = 'Achternaam cannot be empty';
}
if ($email == "") {
    $errors['email'] = 'E-mail cannot be empty';
}
if ($phoneNumber == "") {
    $errors['phoneNumber'] = 'Telefoonnummer cannot be empty';
}
if ($comments == "") {
    $errors['comments'] = 'Comments cannot be empty';
}
if ($date == "") {
    $errors['date'] = 'Date cannot be empty';
}
if (!is_numeric($phoneNumber) || strlen($phoneNumber) != 10) {
    $errors['phoneNumber'] = 'Telefoonnummer needs to be a number with the length of 10';
}