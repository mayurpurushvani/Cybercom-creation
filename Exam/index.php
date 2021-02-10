<?php 
  session_start(); 

if (!$_SESSION['firstName']) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
if ($_GET['logout']) {
    session_destroy();
    unset($_SESSION['name']);
    header("location: login.php");
}
?>