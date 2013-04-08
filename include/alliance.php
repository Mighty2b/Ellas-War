<?php

$paquet = new EwPaquet('infoalliance');
$mon_alliance  = $paquet->getinfoalliance();
$liste_membres = $paquet->getRetour();
$liste_guerres = $paquet->getRetour(2);
$liste_pactes  = $paquet->getRetour(3);
$liste_attente = $paquet->getRetour(4);
$sortie        = $paquet->getRetour(5);
$demande_ress  = $paquet->getRetour(6);
$depart_urgent = $paquet->depart_urgent();
if(is_array($liste_guerres) && sizeof($liste_guerres) > 0) {
	$nombre_guerres = sizeof($liste_guerres);
}
else {
	$nombre_guerres = 0;
}

include('lang/'.LANG.'/menu_monalliance.php');
include('lang/'.LANG.'/include/alliance.php');

?>