<?php

$find = "mayur";

$offset = 0;

$find_length = strlen($find);

$string = 'This is mayur purushvani. I\'m mayur. My name is mayur';

//echo strpos($string, $find, 35);

while ($string_position = strpos($string, $find, $offset)) {
    echo '<strong>'. $find.'</strong> found at '.$string_position.'<br>';
    $offset = $string_position + $find_length;
}
?>