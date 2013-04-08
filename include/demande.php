<?php

if(!empty($_POST['type']) && !empty($_POST['qtt']) && 
	 !empty($_POST['choix'])) {
	$paquet = new EwPaquet('do_demande',
												 array($_POST['type'],
												 			 $_POST['qtt'],
												 			 $_POST['choix']));
}
elseif(!empty($_GET['var1'])) {
	$paquet = new EwPaquet('del_demande', array($_GET['var1']));
}
else {
	$paquet = new EwPaquet('get_demande');
} 

$demande = $paquet->getRetour();
$offre   = $paquet->getRetour(2);

$info = $paquet->getinfoalliance();
$mon_alliance  = $info;
$liste_attente = $paquet->getRetour(4);
$sortie        = $paquet->getRetour(5);
$demande_ress  = $paquet->getRetour(6);

include('lang/'.LANG.'/menu_monalliance.php');
include('lang/'.LANG.'/include/demande.php');

?>