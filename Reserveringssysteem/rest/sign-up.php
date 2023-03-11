<?php
//Form that client fills in.
// this is the first page shown
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
<nav>
    <div>
        <a href="../index.php">Home</a>
        <a href="../detail.php">Mijn reserveringen</a>
        <a href="../login.php">Login</a>
    </div>
</nav>
<section class="section">
    <div class="container">
        <h1 class="title">Account maken</h1>
    </div>
    <form action="../signup-action.php" method="post">
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
</section>
</body>
</html>