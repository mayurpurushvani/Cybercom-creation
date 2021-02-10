<?php
require('connect.php');
if(isset($_POST['action']))
{
$id=$_POST['row_id'];
$qry = mysqli_query($con, "DELETE FROM `blog_category` where `categoryId`='$id'");
if($qry)
echo "success";
else
echo "error";
}
?>
