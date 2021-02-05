<?php
$conn = @mysqli_connect('localhost', 'root', '');
$db = @mysqli_select_db($conn, 'practice');

if (isset($_POST['text'])) {
    $text = $_POST['text'];
    if (!empty($text)) {
        $query = "INSERT into name values ('', '" . mysqli_real_escape_string($conn,$text) . "')";
        if ($query_run = mysqli_query($conn, $query)) {
            echo 'Data inserted!';
        } else {
            echo 'Failed!';
        }
    } else {
        echo 'Please type something!';
    }
}
?>