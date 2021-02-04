<?php

function devide ($num1, $num2)
{
    if($num2 == 0) {
        throw new Exception('Cannot devide by zero');
    }
    else {
        return $num1/$num2;
    }
}

devide(10,0);
?>