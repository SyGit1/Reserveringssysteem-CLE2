<!--shows data from users(clients) and you are able to go to create, update and details(delete) from here.--> 

<?php
/** @var mysqli $db */
require_once "includes/database.php";

session_start();

if(!isset($_SESSION['loggedInUser'])){
    header('location:index.php');
}

$query = "SELECT COUNT(*) FROM reserveren";
$result = mysqli_query($db, $query) or die ('Error: ' . $query);
$total = mysqli_fetch_column($result);

//Define offset from URL
$limit = 5;
$offset = 0;

if (isset($_GET['offset'])) {
    $offset = $_GET['offset'];
}

//Get the result set from the database with a SQL query
$query = "SELECT * FROM reserveren LIMIT $limit OFFSET $offset";
$result = mysqli_query($db, $query) or die ('Error: ' . $query);

//Loop through the result to create a custom array
$reserveren = [];
while ($row = mysqli_fetch_assoc($result)) {
    $reserveren[] = $row;
}



//Close connection
mysqli_close($db);

?>
<!doctype html>
<html lang="en">
<head>
<link rel='stylesheet' href=
'https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css'>
    <title></title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class = "overzichtbody">
<div class="container px-4">
    <h1 class="title mt-4">reserveren</h1>
    <hr>
    <table class="table is-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>E-mail</th>
            <th>telefoon nummer</th>
            <th>Formaat Ruimte</th>
            <th>Datum</th>

        </tr>
        </thead>
        <tfoot>
        <tr>
            <td colspan="6" class="has-text-centered">&copy; Gegevens</td>
        </tr>
        </tfoot>
        <tbody>
        <?php foreach ($reserveren as $reserveer) { ?>
            
            <tr> <!--entities make what comes back from database encrypted-->
                <td><?= htmlentities($reserveer['id']) ?></td>
                <td><?= htmlentities($reserveer['Voornaam']) ?></td>
                <td><?= htmlentities($reserveer['Achternaam']) ?></td>
                <td><?= htmlentities($reserveer['Email']) ?></td>
                <td><?= htmlentities($reserveer['Telefoon_nummer']) ?></td>
                <td><?= htmlentities($reserveer['Formaat_ruimte']) ?></td>
                <td><?= htmlentities($reserveer['Datum']) ?></td>

                

                <td> <a href="detail.php?index=<?= $reserveer['id'] ?>">Details</a> </td>
                <td> <a href="edit.php?index=<?= $reserveer['id'] ?>">Update</a> </td>

               

             
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <div class="buttons">
        <?php if ($offset > 0) { ?>
            <a class="button" href="?offset=<?= $offset - $limit ?>">Previous</a>
        <?php } ?>
        <?php if ($offset + $limit < $total) { ?>
            <a class="button" href="?offset=<?= $offset + $limit ?>">Next</a>
        <?php } ?>
    </div>
</div>

<button class="button is-white"><a href="index.php">terug</a></button>
<button class="button is-white"><a href="create.php">create</a></button>
<button class="button is-white"><a href="logout.php">log uit</a></button>



</body>

</html>

