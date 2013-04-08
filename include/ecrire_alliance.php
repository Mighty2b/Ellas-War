<?php

if(!empty($_POST['contenu'])) {
	$paquet = new EwPaquet('ecrire_liste',
												 array($_POST['destinataire'],
												 			 $_POST['titre_mp'],
															 $_POST['contenu']));
}
else {
	$paquet = new EwPaquet('infoalliance');
}
$mon_alliance  = $paquet->getinfoalliance();
$liste_membres = $paquet->getRetour();
$liste_guerres = $paquet->getRetour(2);
$liste_pactes  = $paquet->getRetour(3);
$liste_attente = $paquet->getRetour(4);
$sortie        = $paquet->getRetour(5);
$depart_urgent = $paquet->depart_urgent();
$nombre_guerres = sizeof($liste_guerres);
$demande_ress  = $paquet->getRetour(6);

include('lang/'.LANG.'/menu_monalliance.php');
include('lang/'.LANG.'/include/ecrire_alliance.php');

?>