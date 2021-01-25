<?php

@mysqli_connect('localhost', 'root', '') or die('Could ot connect to database!'); //If not, thrn it redirect in the die
//@ - used to remove the actual error statement from the web page

echo('connected!'); //If everything is perfect then this message will be showen

?>