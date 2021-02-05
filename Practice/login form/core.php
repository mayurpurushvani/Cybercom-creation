<?php

ob_start();
@session_start();
$current_file1 = $_SERVER['SCRIPT_FILENAME'];
$current_file = str_replace("C:/xampp/htdocs/","/", $current_file1);


if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFEREF'])) {
    $http_referer = $_SERVER['HTTP_REFERER'];
}
$http_referer = $_SERVER['HTTP_REFERER'];


function loggedin()
{
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}

function getuserfield($field) {
    require 'connect.php';
    $query = "SELECT `$field` from `users` WHERE `id`='".$_SESSION['user_id']."'";
    if($query_run = mysqli_query($conn, $query)) {
        while($row = mysqli_fetch_assoc($query_run)) {
            if(@$id == @$row['id']) {
                return implode($row);
            }
        }
    }
}
?>