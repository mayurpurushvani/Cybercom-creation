<?php

require('connect.php');

@$email = $_POST["email"];
@$pass1 = $_POST["password1"];
$passwordHash = md5($pass1);

if (!$con) {
    die("not connected");
} else {
    if (@$_POST['login']) {
        $select = "SELECT `userId`,`email`,`passwordHash` FROM `user` WHERE `email`='$email' and `passwordHash` = '$passwordHash'";
        if (mysqli_query($con, $select)) {
            $row = mysqli_fetch_array(mysqli_query($con, $select));
            if ($row['userId'] == "") {
                echo "<script>
            var answer = alert ('Email or Password incorrect.')
            if (!answer)
                window.location='login.php';
            </script>";
            } else {
            session_start();
            $_SESSION['firstName']=$row['firstName'];
            $_SESSION['id']=$row['userId'];	
            header("location:index.php");
            }
        }
    }
}
