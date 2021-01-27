<?php

$food = array('Healthy' =>
            array('vegitable','salad'),
        'Unhealthy' =>
            array('pizza', 'Ice Cream'));

foreach ( $food as $elements => $items_array)
{
    echo '<b>'.$elements.'</b><br>';
    foreach( $items_array as $items_names)
    {
        echo $items_names.'<br>';
    }
}

?>