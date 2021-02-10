<?php  
$con = mysqli_connect('localhost', 'root', '');  
    if (! $con) {  
die("Connection failed" . mysqli_connect_error());  
}  
    else {  
mysqli_select_db($con, 'Exam');  
}  
?>  