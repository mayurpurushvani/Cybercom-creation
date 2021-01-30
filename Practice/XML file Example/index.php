<?php

$xml = simplexml_load_file('example.xml');

foreach ($xml->producer as $producer) {
    echo $producer->name . ' (' . $producer->age . ')<br>';
    foreach ($producer->show as $show) {
        echo $show->showname . ' on ' . $show->showdate.'<br>';
    }
}
?>