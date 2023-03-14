<?php
// The sign-up is hosted on index.php for convenience's sake
include_once 'includes/database.php';
?>


<!--Sign-up form-->
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
        <h1 class="title">Account maken</h1>
    </div>
    <form action="signup-action.php" method="post">
        <div class="container">
            <input type="text" name="name" id="name" placeholder="Naam" required>
            <label for="name">Naam</label>
        </div>
        <div class="container">
            <input type="text" name="email" id="email" placeholder="E-mail" required>
            <label for="email">E-mail</label>
        </div>
        <div class="container">
            <input type="password" name="password" id="password" placeholder="" required>
            <label for="password">Wachtwoord</label>
        </div>
        <div class="container">
            <button type="submit">Versturen</button>
        </div>
    </form>
    <div class="container">
        <button class="button is-white"><a href="login.php">Log in</a></button>
    </div>
</section>
</body>
</html>