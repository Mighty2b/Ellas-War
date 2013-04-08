<?php

$nb_archives_par_page = 20;

if(empty($_GET['var2']) or !is_numeric($_GET['var2']) or 
	 (round($_GET['var2']) != abs($_GET['var2']))) {
	$page = 1;
}
else {
	$page = addslashes($_GET['var2']);
}

if(!empty($_GET['var1']) && ($_GET['var1'] <= 4)) {
  $rub = round($_GET['var1']);
}
else {
  $rub = 0;
}

$paquet = new EwPaquet('get_archive_alliance', array($rub, $page));
$mon_alliance  = $paquet->getinfoalliance();
$liste_attente = $paquet->getRetour(4);
$sortie        = $paquet->getRetour(5);
$depart_urgent = $paquet->depart_urgent();
$demande_ress  = $paquet->getRetour(6);

$nb_archives = $paquet->getRetour();
$nb_pages = ceil($nb_archives/$nb_archives_par_page);
$archives = $paquet->getRetour(2);


include('lang/'.LANG.'/menu_monalliance.php');
include('lang/'.LANG.'/include/archives_alliance.php');

?>