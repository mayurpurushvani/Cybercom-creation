<?php

if (isset($_POST['user_password']) && !empty($_POST['user_password'])) {
    $user_password = md5($_POST['user_password']);
    $filename = 'hash.txt';
    $handle = fopen($filename, 'r');
    $file_password = fread($handle, filesize($filename));
    if ($user_password == $file_password) {
        echo 'Password is Okay!';
        
    } else {
        echo 'Password wrong!';
    }
} else {
    echo "Please enter password!";
}


?>

<form action="index.php" method="POST">
    Password : <input type="password" name="user_password">
    <input type="submit" name="submit">
</form>