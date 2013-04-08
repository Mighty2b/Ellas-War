<?php

if(!empty($_POST['choix'])) {
	$paquet = new EwPaquet('action_ultimatum', array($_POST['id'], $_POST['choix']));
}
elseif(!empty($_GET['var1']) && !empty($_GET['var2']) && $_GET['var1'] == 'annuler') {
	$paquet = new EwPaquet('annuler_guerre', $_GET['var2']);
}
else {
	$paquet = new EwPaquet('info_mes_guerres');
}

$mon_alliance  = $paquet->getinfoalliance();
$liste_attente = $paquet->getRetour(4);
$sortie        = $paquet->getRetour(5);
$depart_urgent = $paquet->depart_urgent();
$demande_ress  = $paquet->getRetour(6);

$bientot = $paquet->getRetour()->bientot;
$encours = $paquet->getRetour()->encours;

$paquet-> display();

include('lang/'.LANG.'/menu_monalliance.php');
include('lang/'.LANG.'/include/guerres.php');

?>