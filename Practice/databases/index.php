<?php

require('connect.php');

?>

<form action="index.php" method="GET">

    Healthy and Unhealthy :
    <select name="uh">
        <option value="u">Unhealthy</option>
        <option value="h">Healthy</option>
    </select>
    <br><br>
    <input type="submit" value="submit">

</form>
<?php

if (isset($_GET['uh']) && !empty($_GET['uh'])) {
    $uh =  strtolower($_GET['uh']);

    if ($uh == 'u' || $uh == 'h') {
        $query = "SELECT `food`, `calories` from `food` where `healthy_unhealthy` = '$uh' ORDER BY `id`";
        if ($query_run = mysqli_query($con, $query)) {
            if (mysqli_num_rows($query_run) == NULL) {
                echo 'No results found.';
            } else {
                while ($query_row = mysqli_fetch_assoc($query_run)) {
                    $food = $query_row['food'];
                    $caleroie = $query_row['calories'];

                    echo $food . ' has ' . $caleroie . ' calories <br>';
                }
            }
        } else {
            echo mysqli_error('Error!');
        }
    }
}

?>