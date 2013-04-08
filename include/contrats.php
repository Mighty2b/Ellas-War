<?php

if(!empty($_GET['var1'])) {
	if(!empty($_GET['var2'])) {
		if($_GET['var2'] == 'valider') {
			$paquet = new EwPaquet('valider_contrat', array($_GET['var1']));
		}
		else {
			$paquet = new EwPaquet('annuler_contrat', array($_GET['var1']));
		}
	}
	else {
		$paquet = new EwPaquet('info_contrats');
	}
}
else {
	$paquet = new EwPaquet('info_contrats');
}

$liste_contrats = $paquet->getRetour();
$mes_contrats   = $paquet->getRetour(2);

$mon_alliance  = $paquet->getinfoalliance();
$liste_attente = $paquet->getRetour(4);
$sortie        = $paquet->getRetour(5);
$depart_urgent = $paquet->depart_urgent();
$demande_ress  = $paquet->getRetour(6);

if($mon_alliance -> level < 3 or $paquet->peut_contrat() == 0) {
	redirect();
}

$paquet-> display();

include('lang/'.LANG.'/menu_monalliance.php');
include('lang/'.LANG.'/include/contrats.php');

?>