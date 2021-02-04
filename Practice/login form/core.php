<?php

ob_start();
@session_start();
$current_file1 = $_SERVER['SCRIPT_FILENAME'];
$current_file = str_replace("C:/xampp/htdocs/","/", $current_file1);
/*
function loggedin()
{
    if () {
        return true;
    } else {
        return false;
    }
}*/
?>