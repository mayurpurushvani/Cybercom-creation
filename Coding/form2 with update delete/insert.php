<?php
require('connect.php');

@$fname = $_POST['fname'];
@$password = md5($_POST['password']);
@$gender = $_POST['gender'];
@$address = $_POST['address'];
@$game = $_POST['game'];
@$games = implode(",", $game);
@$marital = $_POST['marital'];

@$date = $_POST['date'];
@$month = $_POST['month'];
@$year = $_POST['year'];
@$dob = @$year . "-" . @$month . "-" . @$date;

/*INSERT DATA REGION*/
if (isset($_POST['submit'])) {
    if (isset($fname) && isset($password) && isset($address) && isset($gender) && isset($dob) && isset($games) && isset($marital)) {
        if (!empty($fname) && !empty($password) && !empty($address) && !empty($gender) && !empty($dob) && !empty($games) && !empty($marital)) {
            $query = "INSERT into form2 (`fname`,`password`,`gender`,`address`,`dob`,`games`,`marital`) values ('$fname', '$password','$gender', '$address','$dob', '$games', '$marital')";
            $res = mysqli_query($con, $query);
            if (!$res) {
                echo '<script> alert("Something goes wrong!") </script>';
                echo "<script> location.repace('index.php');</script>";
            }
            if ($res) {
                echo "<script> alert ('Record inserted successfully!') </script>";
                echo "<script> location.replace('index.php');</script>";
            }
        }
    }
}

/*INSERT DATA REGION OVER*/
?>