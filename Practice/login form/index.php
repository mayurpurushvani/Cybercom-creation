<?php

require 'core.php';
require 'connect.php';

if(loggedin()) {
    $firstname = getuserfield('firstname');
    $surname = getuserfield('surname');
    echo 'You\'re logged in.'.$firstname.' '.$surname.'. <a href="logout.php">Log out</a><br>';
}
else {
    include 'login.php';
}

?>