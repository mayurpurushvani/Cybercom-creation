<?php

$age = 16;

try {
    if($age > 18) {
        echo 'Old enought';
    }
    else {
        throw new Exception('Not old enought.');
    }
}
catch(exception $e) {
    echo 'Error : '.$e->getMessage();
}
?>