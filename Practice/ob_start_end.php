<?php ob_start(); ?>
<h1>Hello this is my page!</h1>

<?php

$redirect_page = 'https://bestlaptopsguides.com';
$redirect = false;

if ($redirect == true) {
    header('Location:' . $redirect_page);
}

//ob_end_clean(); //The default content is not shown when page redirect is false
ob_end_flush(); //The default content is shown when page redirect is false
?>