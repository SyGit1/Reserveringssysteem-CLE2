<?php
//session start keeps the accoutn logged in
session_start();
//login page

$login = false;
// Is user logged in?
//isset checkt of de loggedinuser bestaat(boolean). 
if (isset($_SESSION['loggedInUser'])) {
    $login = true;
}

if (isset($_POST['submit'])) {
    /** @var mysqli $db */
    require_once "includes/database.php";

    // Get form data
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = $_POST['password'];

    // Server-side validation
    $errors = [];
    if ($email == '') {
        $errors['email'] = 'Vul een email in.';
    }
    if ($password == '') {
        $errors['password'] = 'Vul een wachtwoord in.';
    }

    // If data valid
    if (empty($errors)) {
        // SELECT the user from the database, based on the email address.
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($db, $query);

        // check if the user exists
        if (mysqli_num_rows($result) == 1) {
            // Get user data from result
            $user = mysqli_fetch_assoc($result);

            // Check if the provided password matches the stored password in the database
            if (password_verify($password, $user['password'])) {
                $login = true;

                // Store the user in the session
                $_SESSION['loggedInUser'] = [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email'],
                    'admin' => $user['admin'],
                ];

               
            } else {
                //error incorrect log in
                $errors['loginFailed'] = 'E-mail of wachtwoord is niet correct.';
            }
        } else {
            //error incorrect log in
            $errors['loginFailed'] = 'E-mail of wachtwoord is niet correct.';
        }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="icon"
 
          sizes="32x32">
    
    <title>Log in</title>
</head>
<body>
<?php if ($login) {
    header('Location: overzicht.php');
} else { ?>

    <form action="" method="post" class="create">

        <section class="section">
            <div class="container">
                <h1 class="title">Log in</h1>

                <input type="email" name="email" id="email" placeholder="name@gmail.com" value="<?= $email ?? '' ?>"
                       autocomplete="off">
                <label for="email">E-mail</label>
                <p class="error"><?= $errors['email'] ?? '' ?></p>

                <input type="password" name="password" id="password" placeholder="Wachtwoord" autocomplete="off">
                <label for="password">Wachtwoord</label>

                <p class="error"><?= $errors['password'] ?? '' ?></p>
                <p class="error"><?= $errors['loginFailed'] ?? '' ?></p>

                <button type="submit" name="submit">Log in</button>
            </div>

    </form>
            <div class="container">
                <button class="button is-white"><a href="index.php">Home</a></button>
            </div>
        </section>

<?php } ?>

</body>
</html>