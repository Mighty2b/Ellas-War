<?php

date_default_timezone_set('Europe/Paris');

function display_date($temps, $type=1) {
	switch($type) {
		case 1:
			return 'le '.date("d-m-y", $temps);
		break;
		case 2:
			return date("d-m-y", $temps);
		break;
		case 3:
			return 'le '.
	    strftime('%A %d %B', $do->date).' à '.
	    strftime('%Hh %M', $do->date);
		break;
	}
}

function trad_to_page($page) {
	return $page;
}

?>