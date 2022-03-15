<?php
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION["user_id"] ='';
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
header("Location: login.php");

?>
