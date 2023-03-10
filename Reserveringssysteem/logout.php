<?php
// Start the session.
session_start();
// end the session.
session_destroy();

// Redirect to home page
header('Location: index.php');
// Exit the code.
exit;