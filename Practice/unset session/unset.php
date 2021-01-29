<?php
session_start();
unset($_SESSION['username']);

//session_destroy(); //Or you can use this. It will remove all the sessions in your website at once.
?>