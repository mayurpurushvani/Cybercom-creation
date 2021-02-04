<?php

require('connect.php');
if (isset($_POST['search'])) {
    $search_name = $_POST['search'];
    if (!empty($search_name)) {
        if (strlen($search_name) >= 4) {
            $query = "SELECT `name` from `name` WHERE `name` like '%"  . $search_name ."%'";
            $query_run = mysqli_query($conn, $query);
            $query_num_rows = @mysqli_num_rows($query_run);
            if (@$query_num_rows >= 1) {
                echo $query_num_rows.' results found.<br>';
                while ($query_row = mysqli_fetch_assoc($query_run)) {
                    echo $query_row['name'] . "<br>";
                }
            } else {
                echo 'No Result found!';
            }
        } else {
            echo 'Atlest 5 character required!';
        }
    }
}


?>

<form action="index.php" method="POST">
    Name : <input type="text" name="search"> <input type="submit" value="Search">
</form>