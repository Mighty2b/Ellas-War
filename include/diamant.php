<?php 

$paquet      = new EwPaquet('info_diamant');
//objet : id -> id du joueur qui a le diamant login -> son login
$actuel      = $paquet->getRetour();
//0 si on a jamais eu le diamant
//objet : temps -> temps durant lequel on a eu le diamant
//        depuis-> si on a le diamant, date à laquelle on l'a eu
$info_perso = $paquet->getRetour(2);
$temps_perso=$info_perso->temps;

//Temps en secondes durant lequel mon alliance a eu le diamant
$temps_alli  = $paquet->getRetour(3);

if(!empty($info_perso->depuis)) {
	$temps_alli += ($paquet->get_timestamp()-$info_perso->depuis);
	$temps_perso += ($paquet->get_timestamp()-$info_perso->depuis);
}

if(!empty($temps_perso)) {
	//Heure, minutes, jours
	$tp = array(0,0,0);
	
	$tp[2] = floor($temps_perso/86400);
	$temps_perso -= ($tp[2]*86400);
	$tp[1] = floor($temps_perso/3600);
	$temps_perso -= ($tp[1]*3600);
	$tp[0] = floor($temps_perso/60);
	//$temps_perso -= ($tp[0]*60);
}

if(!empty($temps_alli)) {
	//Heure, minutes, jours
	$ta = array(0,0,0);
	
	$ta[2] = floor($temps_alli/86400);
	$temps_alli -= ($ta[2]*86400);
	$ta[1] = floor($temps_alli/3600);
	$temps_alli -= ($ta[1]*3600);
	$ta[0] = floor($temps_alli/60);
	//$temps_perso -= ($tp[0]*60);
}

$last_player  = $paquet->getRetour(4);
$total_player = $paquet->getRetour(5);
$total_alli   = $paquet->getRetour(6);

include('lang/'.LANG.'/include/diamant.php');

?>