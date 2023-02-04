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
                $errors['loginFailed'] = 'Er ging iets mis, probeer het nogmaals.';
            }
        } else {
            //error incorrect log in
            $errors['loginFailed'] = 'Er ging iet mis, probeer het nogmaals.';
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
    <link rel="stylesheet" href="">
    <link rel="icon"
 
          sizes="32x32">
    
    <title>Log in</title>
</head>
<body>
<a class="back" href="index.php">Terug naar beginpagina</a>
<?php if ($login) {
    header('Location: overzicht.php');
} else { ?>

    <form action="" method="post" class="create">
        <h2>Log In</h2>
        <section class="formfield">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="name@mail.com" value="<?= $email ?? '' ?>"
                   autocomplete="off">
        </section>
        <p class="error"><?= $errors['email'] ?? '' ?></p>
        <section class="formfield">
            <label for="password">Wachtwoord:</label>
            <input type="password" name="password" id="password" placeholder="Wachtwoord" autocomplete="off">
            <button class="eye-btn" type="button" onclick="togglePasswordVisibility()"><i class="fa fa-eye"></i>
            </button>
            <script>
                function togglePasswordVisibility() {
                    let passwordInput = document.getElementById("password");
                    let eyeBtn = document.querySelector(".eye-btn i");
                    if (passwordInput.type === "password") {
                        passwordInput.type = "text";
                        eyeBtn.classList.add("fa-eye-slash");
                        eyeBtn.classList.remove("fa-eye");
                    } else {
                        passwordInput.type = "password";
                        eyeBtn.classList.add("fa-eye");
                        eyeBtn.classList.remove("fa-eye-slash");
                    }
                }
            </script>
        </section>
        <p class="error"><?= $errors['password'] ?? '' ?></p>
        <p class="error"><?= $errors['loginFailed'] ?? '' ?></p>
        <section class="formfield">
            <button type="submit" name="submit">LOG IN</button>
        </section>
    </form>
<?php } ?>
<footer>
    <p></p>
</footer>
</body>
</html>