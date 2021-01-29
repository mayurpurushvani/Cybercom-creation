<?php

$filename = "file.txt";
if (file_exists($filename)) {
    echo 'file already exists!';
} else {

    $handle = fopen($filename, 'w');
    fwrite($handle, "nothing!");
    fclose($handle);
}
?>