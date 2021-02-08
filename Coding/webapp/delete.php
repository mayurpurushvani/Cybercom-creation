<?php
require('connection.php');
if(isset($_POST['action']))
{
$id=$_POST['row_id'];
$qry = mysqli_query($con, "DELETE FROM `contact` where `id`='$id'");
if($qry)
echo "success";
else
echo "error";
}
?>
