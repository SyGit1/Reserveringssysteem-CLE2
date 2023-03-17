<?php
//in this edit.php you can change information in rows of the table. 

//Require database in this file
/** @var $db */
require_once "./includes/database.php";

//If the ID isn't given, redirect to the homepage
//When not logged in send back to overzicht.php
//if index is not found or empty send to overzicht.php
if (!isset($_GET['index']) || $_GET['index'] === '') {
    header('Location: overzicht.php');
    exit;
}

//Retrieve the GET parameter from the 'Super global'
// userid is a variable where the index is stored
$userid = $_GET['index']; 


//select all from the table reserveren where the id = userid
$query = "SELECT * FROM reserveren WHERE id = " . $userid;
$result = mysqli_query($db, $query);

//If the reservation doesn't exist, redirect back to the homepage
if (mysqli_num_rows($result) == 0) {
    header('Location: overzicht.php');
    exit;
}

//Transform the row in the DB table to a PHP array
//put the result from mysqli_query in reserveren
$reserveren = mysqli_fetch_assoc($result);

/** @var mysqli $db */

//Transform the row in the DB table to a PHP array
if (isset($_POST['submit'])) {
//Require database in this file & image helpers
    require_once "./includes/database.php";
    //Postback with the data showed to the user, first retrieve data from 'Super global'
$Voornaam = mysqli_real_escape_string($db, $_POST['Voornaam']);
$Achternaam = mysqli_real_escape_string ($db, $_POST['Achternaam']);
$Email = mysqli_real_escape_string ($db, $_POST['Email']);
$Telefoon_nummer = mysqli_real_escape_string ($db, $_POST['Telefoon_nummer']);
$Formaat_ruimte = mysqli_real_escape_string($db, $_POST['Formaat_ruimte']);
$Datum = mysqli_real_escape_string ($db, $_POST['Datum']);



//Require the form validation handling
    require_once "verwerking/form-validation.php";

    if (empty($errors)) {
        //Save the record to the database
        $query = "UPDATE reserveren
                  SET Voornaam = '$Voornaam', Achternaam = '$Achternaam', Email = '$Email', Telefoon_nummer = '$Telefoon_nummer', Formaat_ruimte = '$Formaat_ruimte', Datum = '$Datum'
                  WHERE id = '$userid'";

        $result = mysqli_query($db, $query) or die('Error: ' . mysqli_error($db) . ' with query ' . $query);

        //Close connection
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
    <link rel="stylesheet" href="style/style.css"/>
    <link rel="icon" href="img/atelier58.png">
    <title>info Aanpassen - <?= $reserveren['fname'] ?> <?= $reserveren['Achternaam'] ?></title>
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
                            <input class="input" id="Voornaam" type="text" name="Voornaam" value="<?= $reserveren['Voornaam'] ?>"/>
                        </div>
                        <p class="help is-danger">
                            <?= $errors['Voornaam'] ?? '' ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="name">Achternaam</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input class="input" id="Achternaam" type="text" name="Achternaam" value="<?= $reserveren['Achternaam'] ?>"/>
                        </div>
                        <p class="help is-danger">
                            <?= $errors['Achternaam'] ?? '' ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="Email">email</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input class="input" id="Email" type="Email" name="Email" value="<?= $reserveren['Email'] ?>"/>
                        </div>
                        <p class="help is-danger">
                            <?= $errors['Email'] ?? '' ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="Telefoon_nummer">Telefoon nummer</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input class="input" id="Telefoon_nummer" type="Telefoon_nummer" name="Telefoon_nummer" value="<?= $reserveren['Telefoon_nummer'] ?>"/>
                        </div>
                        <p class="help is-danger">
                            <?= $errors['Telefoon_nummer'] ?? '' ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label" for="Formaat_ruimte">Formaat ruimte</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input class="input" id="Formaat_ruimte" type="text" name="Formaat_ruimte" value="<?= $reserveren['Formaat_ruimte'] ?>"/>
                        </div>
                        <p class="help is-danger">
                            <?= $errors['Formaat_ruimte'] ?? '' ?>
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
                            <input class="input" id="Datum" type="date" name="Datum" value="<?= $reserveren['Datum'] ?>"/>
                        </div>
                        <p class="help is-danger">
                            <?= $errors['Datum'] ?? '' ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal"></div>
                <div class="field-body">
                    <button class="button is-link is-fullwidth" type="submit" name="submit">Save</button>
                </div>
            </div>
        </form>
    </section>
    <a class="button" href="overzicht.php">Go back to the list</a>
</div>
</body>
</html>

