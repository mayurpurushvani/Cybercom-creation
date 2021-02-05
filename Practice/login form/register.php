<?php

require 'core.php';
require 'connect.php';

if (!loggedin()) {

    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['cpassword']) && isset($_POST['firstname']) && isset($_POST['surname'])) {

        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $surname = $_POST['surname'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $password_hash = md5($password);

        if(!empty($username) && !empty($password) && !empty($cpassword) && !empty($firstname) && !empty($surname)) {
            if($password != $cpassword) {
                echo 'Password do not match!';
            }
            else {
                
                $query = "SELECT `username` from `users` where `username` = '$username'";
                $query_run = mysqli_query($conn, $query);

                if(mysqli_num_rows($query_run) == 1) {
                    echo 'The username '.$username.' already exists!';
                }
                else {
                    $query = "INSERT into `users` values ('','$username','$password_hash','$firstname','$surname')";
                    if($query_run = mysqli_query($conn, $query)) {
                        header('Location:register_success.php');
                    }
                    else {
                        echo 'Sorry! we couldn\'t register you at this time. Try again later';
                    }
                }
            }
        } else {
            echo 'All fields are mendetory!';
        }
    }



?>



    <form action="register.php" method="POST">
        USERNAME : <br> <input type="text" name="username" maxlength="30" value="<?php if(isset($username)) { $username; } ?>"><br><br>
        PASSWORD : <br> <input type="password" name="password"><br><br>
        CONFIRM PASSWORD : <br> <input type="password" name="cpassword"><br><br>
        FIRSTNAME : <br> <input type="text" name="firstname" maxlength="30" value="<?php if(isset($firstname)) { $firstname; } ?>"><br><br>
        Surname : <br> <input type="text" name="surname" maxlength="30" value="<?php if(isset($password_hash)) { $surname; } ?>"><br><br>
        <input type="submit" value="Register" name="submit">
    </form>

<?php

} else if(loggedin()) {
    echo 'You\'re already registered and logged in!';
}

?>