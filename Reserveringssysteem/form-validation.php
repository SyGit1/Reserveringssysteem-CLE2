<?php

include_once 'includes/database.php';
/** @var $firstName */
/** @var $lastName */
/** @var $email */
/** @var $phoneNumber */
/** @var $comments */
/** @var $date */

// Check if data is valid, generate error if not
$errors = [];
if ($firstName == "") {
    $errors['firstName'] = 'Voornaam kan niet leeg zijn';
}
if ($lastName == "") {
    $errors['lastName'] = 'Achternaam kan niet leeg zijn';
}
if ($email == "") {
    $errors['email'] = 'E-mail kan niet leeg zijn';
}
if ($phoneNumber == "") {
    $errors['phoneNumber'] = 'Telefoonnummer kan niet leeg zijn';
}
if ($comments == "") {
    $errors['comments'] = 'Comments kan niet leeg zijn';
}
if ($date == "") {
    $errors['date'] = 'Date kan niet leeg zijn';
}
if (!is_numeric($phoneNumber) || strlen($phoneNumber) != 10) {
    $errors['phoneNumber'] = 'Voer een geldig telefoonnummer in';
}