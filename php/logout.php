<?php
// Start the session
session_start();

// Unset the 'courseTitle' session variable
unset($_SESSION['courseTitle']);

// Redirect to another page or perform other actions
header('Location: ../index.php');
exit();
?>