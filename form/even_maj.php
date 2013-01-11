<?php

include('../header.php');

$paquet = new EwPaquet('info_stv');
$info = $paquet->getRetour(2);

switch($_GET['event']) {
	case 'parade':
		echo $info->parade;
	break;
	
	case 'amphore':
	case 'babiole':
	case 'coupe':
		echo $info->present;
	break;
	
	case 'recherche':
		echo $info->recherche;
	break;
}

?>