<?php

if(isset($_GET['username']) && !empty($_GET['username']))
{
    $username = $_GET['username'];
    $username_lc = strtolower($username);
    if($username_lc == 'mayur') {
        echo 'all the best!';
    }
}
?>

<form action="upper_lowercasefunctions.php" method="get">
    Name : <input type ="text" name = "username"><br><br>
    <input type = "submit" value ="OK">
</form>