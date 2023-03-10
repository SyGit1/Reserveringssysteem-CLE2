

<?php
//here you can see details and delete rows from the table.
// Include data 
require_once './includes/database.php';

// Wil not recieve index because of deeplink and redirects to index.php
// IF index is not present in url or value is empty
if (!isset($_GET['index']) || $_GET['index'] === '')
{
    // redirect to index.php
    header('Location: index.php');
    exit;
}
//get index from database
$userid = $_GET['index'];

//select al from the table reserveren wehere id = the same as userid.
//result gets connection through database.php
$query = "SELECT * FROM reserveren WHERE id = " . $userid;
$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) == 0) {
    header(header:'location: index.php');
    exit;
}
    

//result is the table en wil be shown in the user array. 
$user = mysqli_fetch_assoc($result);

//check if remove button is pressed.
if(isset($_POST['delete_button'])) {
    //Remove reservation
    //Send to index
    $query = "DELETE FROM reserveren WHERE id = '$userid'";
    mysqli_query($db,$query);
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
            <!-- Gets information from the table user and is shown -->
        
            <li>id: <?= htmlentities ($user ['id']) ?></li>
            <li>Voornaam: <?= htmlentities ($user['Voornaam']) ?></li>
            <li>Achternaam: <?= htmlentities ($user['Achternaam']) ?></li>
            <li>Email: <?= htmlentities ($user['Email']) ?></li>
            <li>Telefoon_nummer: <?= htmlentities ($user['Telefoon_nummer']) ?></li>
            <li>Formaat_ruimte: <?= htmlentities ($user['Formaat_ruimte']) ?></li>
        </ul>
    </section>
    <div>
        <a class="button" href="../overzicht.php">Go back to the list</a>
    </div>
    <!-- deletes row from the table-->
    <form action="" method="post" class="delete">
                    <input type="checkbox" name="delete_button" id="delete_button" value="DELETE">
                    <input class="terugKnop" type="submit" value="DELETE">
                </form>

</body>
</html>
