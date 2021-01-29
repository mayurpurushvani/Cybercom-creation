<form method="post" action="file.php" name="file" enctype="multipart/form-data">
    <input type="file" name="file"><br><br>
    <input type="submit" value="Submit">
</form>

<?php

$name = @$_FILES["file"]["name"];
$tmp_name = @$_FILES['file']['tmp_name'];

if (isset($name)) {
    if (!empty($name)) {
        $location = 'uploads/';
        if (move_uploaded_file($tmp_name, $location . $name)) {
            echo 'Uploaded!';
        } else {
            echo 'There was an error';
        }
    } else {
        echo 'Please choose a file';
    }
}
?>