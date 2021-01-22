<?php

$day = "saturday";

switch($day)
{
	case 'saturday':
	case 'sunday':
		echo "It's a weekend!";
		break;
	default :
		echo "It's a working day!";
		break;
}

?>