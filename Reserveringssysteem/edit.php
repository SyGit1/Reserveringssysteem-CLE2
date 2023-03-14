<?php

// Require database & fetch $db variable
/** @var $db */
require_once "./includes/database.php";

// When not logged in send back to overzicht.php
if (!isset($_GET['index']) || $_GET['index'] === '') {
    header('Location: overzicht.php');
    exit;
}

// Retrieve the GET parameter from the 'Super global'
// Store index in $userId
$userId = $_GET['index'];


// Select all from the table reservation where the id = userId
$query = "SELECT * FROM reservation WHERE id = " . $userId;
$result = mysqli_query($db, $query);

// If the reservation doesn't exist, redirect back to the ''overzicht''
if (mysqli_num_rows($result) == 0) {
    header('Location: overzicht.php');
    exit;
}

// Transform the row in the DB table to a PHP array
// Store the result in a new variable
$reservation = mysqli_fetch_assoc($result);

/** @var mysqli $db */

//Transform the row in the DB table to a PHP array
if (isset($_POST['submit'])) {
//Require database in this file & image helpers
    require_once "./includes/database.php";
    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phoneNumber = mysqli_real_escape_string($db, $_POST['phoneNumber']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $comments = mysqli_real_escape_string($db, $_POST['comments']);


// Require the form validation handling
    require_once "form-validation.php";

    if (empty($errors)) {
        //Save the record to the database
        $query = "UPDATE reservation
                  SET firstName = '$firstName', lastName = '$lastName', email = '$email', phoneNumber = '$phoneNumber', date = '$date', comments = '$comments'
                  WHERE id = '$userId'";

        $result = mysqli_query($db, $query) or die('Error: ' . mysqli_error($db) . ' with query ' . $query);

        // Close connection
        mysqli_close($db);

        // Redirect to index.php
        header('Location: overzicht.php');
        exit;
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css'>
    <title>info Aanpassen - <?= $reservation['firstName'] ?> <?= $reservation['lastName'] ?></title>
</head>
<body>
<div class="container px-4">
    <h1 class="title mt-4">Inschrijving aanpassen</h1>

    <section class="columns">
        <form class="column is-6" action="" method="post">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="Fname">Voornaam</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input class="input" id="firstName" type="text" name="firstName"
                                   value="<?= $reservation['firstName'] ?>"/>
                        </div>
                        <p class="help is-danger">
                            <?= $errors['firstName'] ?? '' ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="lastName">Achternaam</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input class="input" id="lastName" type="text" name="lastName"
                                   value="<?= $reservation['lastName'] ?>"/>
                        </div>
                        <p class="help is-danger">
                            <?= $errors['lastName'] ?? '' ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="email">E-mail</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input class="input" id="email" type="email" name="email"
                                   value="<?= $reservation['email'] ?>"/>
                        </div>
                        <p class="help is-danger">
                            <?= $errors['email'] ?? '' ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="phoneNumber">Telefoonnummer</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input class="input" id="phoneNumber" type="number" name="phoneNumber"
                                   value="<?= $reservation['phoneNumber'] ?>"/>
                        </div>
                        <p class="help is-danger">
                            <?= $errors['phoneNumber'] ?? '' ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="comments">Comments</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <textarea class="input" id="comments" type="text" name="comments" cols="30"
                                      rows="10 value="<?= $reservation['comments'] ?>"/> </textarea>
                        </div>
                        <p class="help is-danger">
                            <?= $errors['comments'] ?? '' ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="date">Datum</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input class="input" id="date" type="date" name="date" value="<?= $reservation['date'] ?>"/>
                        </div>
                        <p class="help is-danger">
                            <?= $errors['date'] ?? '' ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal"></div>
                <div class="field-body">
                    <button class="button is-link is-fullwidth" type="submit" name="submit">Opslaan</button>
                </div>
            </div>
        </form>
    </section>
    <a class="button-is-white" href="overzicht.php">Terug naar het overzicht</a>
</div>
</body>
</html>

