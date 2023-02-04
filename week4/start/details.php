<?php
//Require database in this file
/** @var $db */
require_once "includes/database.php";

//If the ID isn't given, redirect to the homepage
if (!isset($_GET['id']) || $_GET['id'] === '') {
    header('Location: index.php');
    exit;
}

//Retrieve the GET parameter from the 'Super global'
$albumId = $_GET['id'];

//Get the record from the database result
$query = "SELECT * FROM albums WHERE id = " . $albumId;
$result = mysqli_query($db, $query);

//If the album doesn't exist, redirect back to the homepage
if (mysqli_num_rows($result) == 0) {
    header('Location: index.php');
    exit;
}

//Transform the row in the DB table to a PHP array
$album = mysqli_fetch_assoc($result);

//Close connection
mysqli_close($db);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <title>Details - <?= $album['name'] ?></title>
</head>
<body>
<div class="container px-4">
    <h1 class="title mt-4"><?= $album['name'] ?></h1>
    <section class="content">
        <ul>
            <li>Genre: <?= $album['genre'] ?></li>
            <li>Year: <?= $album['year'] ?></li>
            <li>Tracks: <?= $album['tracks'] ?></li>
        </ul>
    </section>
    <div>
        <a class="button" href="index.php">Go back to the list</a>
    </div>
</div>
</body>
</html>
