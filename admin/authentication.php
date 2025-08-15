<?php
session_start();
include("config/connect.php"); 

if (isset($_POST['auth'])) {
    $_SESSION['message'] = "Login to access successful.";
    header("Location: ../login.php");
    exit(0);
}
?>
