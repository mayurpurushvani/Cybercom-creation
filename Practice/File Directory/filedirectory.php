<?php

$directory = 'files';
if ($handle = opendir($directory)) {
    echo 'Looking into your \'' . $directory . '\' : <br>';

    while ($file = readdir($handle)) {
        if ($file != "." && $file != "..") {
            echo '<a href="' . $directory . '/' . $file. '">' . $file . '</a><br>';
        }
    }
} else {
    echo 'Please make the directory first!';
}
?>