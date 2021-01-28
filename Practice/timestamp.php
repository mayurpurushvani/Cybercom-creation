<?php

$time = time();
echo $time."<br>"; // returns the current time in the number of seconds since the Unix Epoch (January 1 1970 00:00:00 GMT).

$actual_time = date('D M Y @ H:i:sa');
echo  "<b>Current Time : </b>".$actual_time."<br>";

$d=strtotime("tomorrow");
echo "<b>Tommorow's Time : </b>".date("D M Y @ h:i:sa", $d) . "<br>";

$modified = date('D M Y @ H:i:sa', strtotime('+1 week 2 hours 30 seconds'));
echo "<b>Modified Time : </b>".$modified."<br>";

date_default_timezone_set('Asia/Kolkata');
echo "<b>Indian time : </b>".date('d-m-Y H:i');

?>