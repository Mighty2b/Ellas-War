<?php

$paquet = new EwPaquet('recrutement');
$id_alliance = $paquet->getAlliance();
$info = $paquet->getinfoalliance();
$mon_alliance  = $info;
$liste_attente = $paquet->getRetour(4);
$sortie        = $paquet->getRetour(5);
$demande_ress  = $paquet->getRetour(6);

include('lang/'.LANG.'/menu_monalliance.php');
include('lang/'.LANG.'/include/recrutements.php');

?>