<?php

//preg_match(); //It is used for finding the word from any string

$string = "This is mayur's tutorial";

if (preg_match("/mayur/",$string)) {
    echo "Match found!";
} else {
    echo "Match not found!";
}

?>