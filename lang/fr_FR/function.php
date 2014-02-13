<?php

function display_date($temps, $type=1) {
	if($temps > 0)
	switch($type) {
		case 1:
			return 'le '.date("d-m-y", $temps);
		break;
		case 2:
			return date("d-m-y", $temps);
		break;
		case 3:
			return 'le '.
	    strftime('%A %d %B', $temps).' à '.
	    strftime('%Hh %M', $temps);
		break;
		case 4:
			return 
	    strftime('%A %d %B', $temps).' à '.
	    strftime('%Hh %M', $temps);
		break;
		case 5:
			return 
	    strftime('%A %d %B', $temps).' '.
	    strftime('%Hh %M', $temps);
		break;
	}
}

function trad_to_page($page) {
	return $page;
}

?>