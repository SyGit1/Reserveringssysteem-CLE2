<?php
//hieronder haal je de formdata op
require 'includes/database.php';
/** @var $db */

// mysqli_real_escape_string makes the sending of information to the database safer.
$name = mysqli_real_escape_string ($db, $_POST['name']);
$email = mysqli_real_escape_string ($db, $_POST['email']);
$password = mysqli_real_escape_string ($db, $_POST['password']);

// Server-side validation
$errors = [];
if($name == '') {
    $errors['name'] = 'Please fill in your name.';
}
if($email == '') {
    $errors['email'] = 'Please fill in your email.';
}
if($password == '') {
    $errors['password'] = 'Please fill in your password.';
}

// If data valid
if(empty($errors)) {
    // create a secure password, with the PHP function password_hash()
    $password = password_hash($password, PASSWORD_DEFAULT);

    // store the new user in the database.
    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    $result = mysqli_query($db, $query);

    if ($result) {
        header('Location: login.php');
        exit;
    }
}
?>