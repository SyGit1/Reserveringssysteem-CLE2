<?php
// Start the session.
session_start();
// End the session.
session_destroy();

// Redirect to index.php & exit
header('Location: index.php');
exit;