<?php

include('connect.php');

if (isset($_POST['reg_user'])) {
    @$prefix = $_POST['prefix'];
    @$firstName = mysqli_real_escape_string($con, $_POST['firstName']);
    @$lastName = mysqli_real_escape_string($con, $_POST['lastName']);
    @$email = mysqli_real_escape_string($con, $_POST['email']);
    @$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    @$password = mysqli_real_escape_string($con, $_POST['password']);
    @$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    @$information = mysqli_real_escape_string($con, $_POST['information']);
    $password_hash = md5($password);

    if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($mobile) && !empty($password) && !empty($cpassword) && !empty($information)) {
        $query = "INSERT INTO user (prefix, firstName, lastName, mobile,email,passwordHash,information) 
  			  VALUES('$prefix', '$firstName','$lastName','$mobile', '$email', ' $password_hash', 'information')";
        mysqli_query($con, $query);
        header('location: index.php');
    }
}
?>