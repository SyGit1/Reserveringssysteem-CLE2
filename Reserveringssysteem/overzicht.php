<!-- Overview of all made appointments, through this page you can access the CRUD functionalities-->

<?php
// Require database & fetch $db variable
require_once "includes/database.php";
/** @var mysqli $db */

session_start();

// Redirect user to the index.php if user isn't logged in
if(!isset($_SESSION['loggedInUser'])){
    header('location:index.php');
}

$query = "SELECT COUNT(*) FROM reservation";
$result = mysqli_query($db, $query) or die ('Error: ' . $query);
$total = mysqli_fetch_column($result);

// Define offset from URL
$limit = 5;
$offset = 0;

if (isset($_GET['offset'])) {
    $offset = $_GET['offset'];
}

// Get the result set from the database with a SQL query
$query = "SELECT * FROM reservation LIMIT $limit OFFSET $offset";
$result = mysqli_query($db, $query) or die ('Error: ' . $query);

// Loop through the result to create an array
$reservation = [];
while ($row = mysqli_fetch_assoc($result)) {
    $reservation[] = $row;
}



//Close connection
mysqli_close($db);

?>
<!doctype html>
<html lang="en">
<head>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css'>
    <title></title>
    <meta charset="utf-8"/>
</head>
<body>
<div class="container">
    <h1 class="title">Overzicht reserveringen</h1>
    <hr>
    <table class="table is-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>E-mail</th>
            <th>Telefoonnummer</th>
            <th>Datum</th>

        </tr>
        </thead>
        <tfoot>
        </tfoot>
        <tbody>
        <?php foreach ($reservation as $reservationdata) { ?>
            
            <tr> <!--entities make what comes back from database encrypted-->
                <td><?= htmlentities($reservationdata['id']) ?></td>
                <td><?= htmlentities($reservationdata['firstName']) ?></td>
                <td><?= htmlentities($reservationdata['lastName']) ?></td>
                <td><?= htmlentities($reservationdata['email']) ?></td>
                <td><?= htmlentities($reservationdata['phoneNumber']) ?></td>
                <td><?= htmlentities($reservationdata['date']) ?></td>

                

                <td> <a href="detail.php?index=<?= $reservationdata['id'] ?>">Details</a> </td>
                <td> <a href="edit.php?index=<?= $reservationdata['id'] ?>">Edit</a> </td>

               

             
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

<div class="container">
    <button class="button is-white"><a href="index.php">Home</a></button>
    <button class="button is-white"><a href="create.php">Afspraak maken</a></button>
    <button class="button is-white"><a href="logout.php">Log out</a></button>
</div>




</body>

</html>

