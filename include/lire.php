<?php

switch($mp->type_message) {
	case 3://Admin
		$color = 'red';
		break;
	case 1://Oracle
		$color = '#FF9900';
		break;
	case 2://Prophète
		$color = '#000066';
		break;
	default:
		$color = 'white';
		break;
}

include('lang/'.LANG.'/include/lire.php');

?>