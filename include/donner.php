<?php

if(!empty($_POST['joueur']) && !empty($_POST['somme'])) {
	$paquet = new EwPaquet('donner', array($_POST['joueur'],$_POST['somme']));
}
else {
	$paquet = new EwPaquet('info_donner');
}

$mon_alliance  = $paquet->getinfoalliance();
$liste_membres = $paquet->getRetour();
$possible      = $paquet->getRetour(2);
$liste_attente = $paquet->getRetour(4);
$sortie        = $paquet->getRetour(5);
$depart_urgent = $paquet->depart_urgent();
$demande_ress  = $paquet->getRetour(6);

include('lang/'.LANG.'/menu_monalliance.php');
include('lang/'.LANG.'/include/donner.php');

?>