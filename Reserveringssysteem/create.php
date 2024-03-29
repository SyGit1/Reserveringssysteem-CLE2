<?php
// This is where the client can make a new reservation

// Include database
include_once 'includes/database.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reserveringssysteem</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
<section class="section">
    <div class="container">
        <h1 class="title">Afspraak maken</h1>
    </div>
    <form action="action_page.php" method="post">
        <div class="container">
            <input type="text" name="firstName" id="firstName" placeholder="Voornaam" required>
            <label for="firstName">Voornaam</label>
        </div>
        <div class="container">
            <input type="text" name="lastName" id="lastName" placeholder="Achternaam" required>
            <label for="lastName">Achternaam</label>
        </div>
        <div class="container">
            <input type="text" name="email" id="email" placeholder="E-mail" required>
            <label for="email">E-mail</label>
        </div>
        <div class="container">
            <input type="tel" name="phoneNumber" id="phoneNumber" placeholder="+31 06 00000000" required>
            <label for="phoneNumber">Telefoonnummer</label>
        </div>
        <div class="container">
            <textarea name="comments" id="comments" cols="30" rows="10"></textarea>
            <label for="comments">Doel van afspraak</label>
        </div>
        <div class="container">
            <input type="date" name="date" id="date" placeholder="Datum" required>
            <label for="date">Datum</label>
        </div>
        <div class="container">
            <button type="submit">Versturen</button>
        </div>
    </form>
    <div class="container">
        <button class="button is-white"><a href="index.php">Home</a></button>
        <button class="button is-white"><a href="overzicht.php">Terug naar het overzicht</a></button>
        <button class="button is-white"><a href="logout.php">Log out</a></button>
    </div>
</section>
</body>
</html>