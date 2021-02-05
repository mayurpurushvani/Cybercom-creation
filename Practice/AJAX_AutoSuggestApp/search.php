<?php

if (isset($_GET['search_text'])) {
    $search_text = $_GET['search_text'];
}

if (!empty($search_text)) {
    if ($conn = @mysqli_connect('localhost', 'root', '')) {
        if (@mysqli_select_db($conn,'practice')) {
            $query = "SELECT `name` from  `name` where `name` like '" . mysqli_real_escape_string($conn, $search_text) . "%'";
            $query_run = mysqli_query($conn, $query);
            while ($query_row = mysqli_fetch_assoc($query_run)) {
                echo $name = '<a href="anotherpage.php?search_text=' . $query_row['name'] . '">' . $query_row['name'] . '</a><br>';
            }
        }
    }
}
?>