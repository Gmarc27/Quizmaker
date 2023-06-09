<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user to the desired page
header("Location: Login&Reg.php");
exit;
?>