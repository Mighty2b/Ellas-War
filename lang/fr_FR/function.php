<?php

date_default_timezone_set('Europe/Paris');

function display_date($temps, $type=1) {
	switch($type) {
		case 1:
			return 'le '.date("d-m-y", $temps);
		break;
	}
}

?>