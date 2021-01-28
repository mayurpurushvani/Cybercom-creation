<?php

$find = array('mayur', 'akshay', 'max');
$replace = array('m***r', 'a***y', 'm*x');

if (isset($_POST['user_input']) && !empty($_POST['user_input'])) {
    $user_input = $_POST['user_input'];
//    $user_input_lc = strtolower($_user_input);  //OR You can use str_ireplace method..!
    $user_input_new = str_ireplace($find, $replace, $user_input);
    echo $user_input_new;
}

?>

<form action="word_censoring.php" method="POST">
    <hr>
    <textarea name="user_input" rows="10" cols="50">
</textarea>
    <br><br><br>
    <input type="submit" name="submit">
</form>