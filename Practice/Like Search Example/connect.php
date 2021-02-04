<?php

$conn_error = 'Could not connect.';
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'practice';

$conn = @mysqli_connect($mysql_host, $mysql_user, $mysql_pass);

if (!@mysqli_connect($mysql_host, $mysql_user, $mysql_pass) || !@mysqli_select_db($conn, $mysql_db)) {
    die($conn_error);
}
?>