<?php

if(!empty($_GET['var1'])) {
	$paquet = new EwPaquet('action_blocus', array($_GET['var1']));
}
else {
	$paquet = new EwPaquet('info_blocus');
}
$id_alliance = $paquet->getAlliance();
$info = $paquet->getinfoalliance();
$mon_alliance  = $info;
$do = $paquet->getRetour();
$liste_attente = $paquet->getRetour(4);
$sortie        = $paquet->getRetour(5);
$demande_ress  = $paquet->getRetour(6);

include('lang/'.LANG.'/menu_monalliance.php');
include('lang/'.LANG.'/include/blocus.php');

?>