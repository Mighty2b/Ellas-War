<?php

if(!empty($_POST['chef'])) {
	$paquet = new EwPaquet('changer_chef', array($_POST['chef']));
}
else {
	$paquet = new EwPaquet('possibles_chefs');
}

if($paquet->getid() != $paquet->getidchef()) {
	redirect("Alliance");
}

$mon_alliance  = $paquet->getinfoalliance();
$liste_joueurs = $paquet->getRetour();

$liste_attente = $paquet->getRetour(4);
$sortie        = $paquet->getRetour(5);
$depart_urgent = $paquet->depart_urgent();
$demande_ress  = $paquet->getRetour(6);

include('lang/'.LANG.'/menu_monalliance.php');
include('lang/'.LANG.'/include/changer_grandchef.php');

?>