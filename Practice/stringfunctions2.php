<?php

//String shuffle
$string = 'abcdefghijklmnopqrstuvwxyz1234567890';
$string_shuffle = str_shuffle($string) ;

$res = substr( $string_shuffle, 0, 5);
echo $res."<br>";

//String reverse
$string1 = 'This is an exmple!';
$string_reverse = strrev($string1);

echo $string_reverse."<br>";

//similar_text 
$string2 = 'This is mayur from cybercom creation.';
$string3 = 'This is mayur. i\'m trainee at cybercom creation.';

similar_text($string2, $string3, $result);
echo $result."<br>";

//strlen
$string4 = 'This is mayur from cybercom creation.';
$length = strlen($string4);

echo $length."<br>";

//trim - To remove white spaces
$string5 = "This is mayur from cybercom creation.";
$string_trim = trim($string5);
echo $string_trim."<br>";

//addslashes
$string6 = "This is my image <img src = 'image.jpg'> ";
$string_slash = htmlentities(addslashes($string6));
echo $string_slash;

?>