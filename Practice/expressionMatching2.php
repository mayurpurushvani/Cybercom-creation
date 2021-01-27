<?php

function has_space($string){
    if(preg_match('/ /', $string)) {
        return true;
    }
    else {
        return false;
    }
}


$string = "Thisismayurformcybercomcreation!";

if(has_space($string)){
    echo 'Space is between!';
}
else {
    echo 'No space';
}
?>