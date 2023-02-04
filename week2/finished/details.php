<?php
// reference $musicAlbums https://docs.phpdoc.org/guide/references/phpdoc/tags/var.html
/** @var array $musicAlbums */
// Include data (all albums)
require_once 'includes/music-data.php';

// IF index is not present in url or value is empty
if (!isset($_GET['index']) || $_GET['index'] === '')
{
    // redirect to index.php
    header('Location: index.php');
    exit;
}

// Get index of album from url (GET)
$index = $_GET['index'];

// get album from albums collection
$album = $musicAlbums[$index];
?>
<!doctype html>
<html lang="en">
<head>
    <title>Music Collection - Details</title>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
<div class="container px-4">
    <h1 class="title mt-4"><?= $album['album'] ?></h1>
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
</body>
</html>
