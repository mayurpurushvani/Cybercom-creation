<?php

$browser = get_browser(null, true);
$browser = strtolower($browser['browser']);

if ($browser != "chrome") {
    echo "Please use Chrome browser!";
}
?>