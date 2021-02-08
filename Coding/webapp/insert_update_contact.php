<html>
    <head>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>   
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    </head>
</html>
<?php

require ('connection.php');
$type = $_POST['type'];

if ($type == "contact_update") {
    @$id = mysqli_real_escape_string($con, $_REQUEST['id']);
    @$name = mysqli_real_escape_string($con, $_REQUEST['name']);
    @$email = mysqli_real_escape_string($con, $_REQUEST['email']);
    @$phone = mysqli_real_escape_string($con, $_REQUEST['phone']);
    @$title = mysqli_real_escape_string($con, $_REQUEST['title']);
    @$created = mysqli_real_escape_string($con, $_REQUEST['created']);

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($title) && !empty($created)) {
        $update = "UPDATE contact SET `name` = '$name' ,`email` = '$email' , `phone` = '$phone' , `title` = '$title' , `created` = '$created' WHERE `id`='$id'";
        if (!$con)
            die("not connected");
        else {
            if (mysqli_query($con, $update)) {
                echo "<script>
                window.location='contactus.php';
                
                </script>";
                
            } else {
                echo "<script>
                window.location='update.php'</script>";
            }
        }
    }
}

if ($type == "contact_insert") {
    @$name = mysqli_real_escape_string($con, $_REQUEST['name']);
    @$email = mysqli_real_escape_string($con, $_REQUEST['email']);
    @$phone = mysqli_real_escape_string($con, $_REQUEST['phone']);
    @$title = mysqli_real_escape_string($con, $_REQUEST['title']);
    @$created = mysqli_real_escape_string($con, $_REQUEST['created']);

    if (!empty($name) && !empty($email) && !empty($phone) && !empty($title) && !empty($created)) {
        $insert = "INSERT into contact (`name`, `email`,`phone`,`title`,`created`) values('$name' ,'$email' , '$phone' , '$title' , '$created')";
        if (!$con)
            die("not connected");
        else {
            if (mysqli_query($con, $insert)) {
                echo "<script>
                window.location='contactus.php'</script>";
            } else {
                echo "<script>
                window.location='create_contact.php'</script>";
            }
        }
    }
}
?>