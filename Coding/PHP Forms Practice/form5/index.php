<head>
    <title>Form 5</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="index.php" method="POST" name="form" onSubmit="return validateForm();">

        <div class="container">
            <div class="box">
                <div class="heading">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                    <label>Sign In</label>
                </div>

                <label class="label-100">E-mail address </label>
                <input type="email" name="email" class="input" placeholder="mail@address.com">

                <label class="label-100">Password</label>

                <input type="password" name="password" class="input" placeholder="&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;&#9679;">

                <input type="submit" name="submit" value="Sign In" class="btn">
            </div>
        </div>

    </form>
    <script src="https://kit.fontawesome.com/5e9083c057.js" crossorigin="anonymous"></script>
</body>

<?php

require('connect.php');

@$email = $_POST["email"];
@$pass = $_POST["password"];

if (!$con) {
    die("not connected");
} else {
    if (@$_POST['submit']) {
        $select = "SELECT * FROM `form5` WHERE `email`='$email' and `password` = '$pass'";
        if (mysqli_query($con, $select)) {
            $row = mysqli_fetch_array(mysqli_query($con, $select));
            if ($row['id'] == "") {
                echo "<script>
            var answer = alert ('Email or Password incorrect.')
            if (!answer)
                window.location='index.php'
            </script>";
            } else {
                echo "<script>
            var answer = alert ('login successfully!')
            if (!answer)
                window.location='index.php'
            </script>";
            }
        }
    }
}
?>


<?php
/*
------------------------------EXTRA CODE------------------------------------
if ($_POST['submit']) {
    $query1 = "SELECT `email`,`password` from `form5`";
    if ($query_run1 = mysqli_query($con, $query1)) {
        if (mysqli_num_rows($query_run1) == NULL) {
            echo 'No result found!';
        } else {
            while ($query_row = mysqli_fetch_assoc($query_run1)) {
                $email = $query_row['email'];
                $password = $query_row['password'];
                if (($_POST['email'] == $email) && ($_POST['password'] == $password)) {
                    echo "<script language='javascript'>";
                    echo "alert('Login Successfully!')";
                    echo "</script>";
                    break;
                } else {
                    echo "<script language='javascript'>";
                    echo "alert('WRONG INFORMATION')";
                    echo "</script>";
                }
            }
        }
    } else {
        echo ('Error!');
    }
}
*/
?>