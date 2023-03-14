<!--Detail.php allows you to view and delete appointments-->
<?php

// Include database & fetch $db variable
require_once './includes/database.php';
/** @var $db */

// If user is not logged in redirect them to index.php, this is to prevent deeplinking
if (!isset($_GET['index']) || $_GET['index'] === '') {
    header('Location: index.php');
    exit;
}
// Get index from database
$userId = $_GET['index'];

// Select all from the table reservation where id === userId
// Result gets connection through database.php
$query = "SELECT * FROM reservation WHERE id = " . $userId;
$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) == 0) {
    header(header: 'location: index.php');
    exit;
}


// Result is the table en wil be shown in the user array
$user = mysqli_fetch_assoc($result);

// Check if remove button is pressed
if (isset($_POST['deleteButton'])) {
    // Remove reservation & send back to the ''overzicht''
    $query = "DELETE FROM reservation WHERE id = '$userId'";
    mysqli_query($db, $query);
    header('location: overzicht.php');
    exit;
}

mysqli_close($db);

?>
<!doctype html>
<html lang="en">
<head>
    <title>Details</title>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
<div class="container px-4">
    <h1 class="title mt-4">Informatie</h1>
    <section class="content">
        <ul>
            <li>id: <?= htmlentities($user ['id']) ?></li>
            <li>Voornaam: <?= htmlentities($user['firstName']) ?></li>
            <li>Achternaam: <?= htmlentities($user['lastName']) ?></li>
            <li>E-mail: <?= htmlentities($user['email']) ?></li>
            <li>Telefoonnummer: <?= htmlentities($user['phoneNumber']) ?></li>
            <li>Comments: <?= htmlentities($user['comments']) ?></li>
            <li>Datum: <?= htmlentities($user['date']) ?></li>
        </ul>
    </section>


    <div class="container">
        <form action="" method="post" class="delete">
            <div class="container">
                <input class="button is-white" name="deleteButton" id="deleteButton" type="submit"
                       value="Afspraak verwijderen">
                <a class="button is-white" href="overzicht.php">Terug naar het overzicht</a>
            </div>
        </form>
    </div>
</body>
</html>
