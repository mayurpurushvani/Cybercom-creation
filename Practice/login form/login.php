<?php

require('core.php');
require('connect.php');

if (isset($_POST['username']) && isset($_POST['password']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password_hash = md5($password);
    if(!empty($username) && !empty($password))
    {
        $query = "SELECT `id`,`username`, `password` FROM `users` WHERE `username` = '$username' AND `password` = '$password_hash'";
        //echo $query;
        if($query_run= mysqli_query($conn, $query))
        {
            $query_num_row = mysqli_num_rows($query_run);
            if($query_num_row == 0) {
                echo 'Invalid username and password!';
            }
            else if ($query_num_row == 1) {
                //$user_id = mysqli_result($query_run, 0, 'id');
                while($row = mysqli_fetch_assoc($query_run)) {
                    $user_id = $row['id'];
                    $user_name = $row['username'];
                    if($user_name == $username) {
                        $_SESSION['user_id'] = $user_id;
                        header('Location:index.php');
                        //echo $username,$user_id;
                    }
                    
                 }
                
                
            }
        }
    }
    else
    {
        echo 'You must supply a username and password';
    }
}

?>
<form action="<?php $current_file ?>" method="POST">
UserName :<input type = "text" name="username"><br>
Password : <input type="text" name="password"><br>
<input type="submit" name="submit" value="Sign In">