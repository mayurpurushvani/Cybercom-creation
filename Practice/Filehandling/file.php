<?php

$handle = fopen('names.txt', 'w');

fwrite($handle, 'Mayur'."\n");
fwrite($handle, 'max');
fclose($handle);
echo "Written!";

?>