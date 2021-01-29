<?php

$filename = 'filetodelete.txt';

if (@unlink($filename)) {
    echo 'File <strong>' . $filename . '</strong> has been deleted!';
} else {
    echo 'File not deleted!';
}

$filename2 = 'filetorename.txt';
$rand = rand(100, 999);
if (@rename($filename2, $rand .'.txt')) {
    echo 'File <strong>' . $filename2 . '</strong> has been renamed with <strong>' . $rand . ' .txt </strong>';
} else {
    echo 'File not renamed!';
}
?>