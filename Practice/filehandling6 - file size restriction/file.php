<form method="post" action="file.php" name="file" enctype="multipart/form-data">
    <input type="file" name="file"><br><br>
    <input type="submit" value="Submit">
</form>

<?php

$name = @$_FILES["file"]["name"];
$tmp_name = @$_FILES['file']['tmp_name'];
$extension = strtolower(substr($name, strpos($name, '.') + 1));
$type = @$_FILES['file']['type'];
$size = @$_FILES['file']['size'];
$max_size = 100000;

if (isset($name)) {
    if (!empty($name)) {
        if (($extension == 'jpg' || $extension == 'jpeg') && ($type == 'image/jpg' || $type == 'image/jpeg') && $size <= $max_size) {
            $location = 'uploads/';
            if (move_uploaded_file($tmp_name, $location . $name)) {
                echo 'Uploaded!';
            } else {
                echo 'There was an error';
            }
        } else {
            echo 'File must be jpg/jpeg ad must be 2mb or less';
        }
    } else {
        echo 'Please choose a file';
    }
}
?>