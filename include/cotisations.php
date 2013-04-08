<?php

if(isset($_POST['cotise_volontaire'])) {
	$paquet = new EwPaquet('changer_cotise_volontaire',
												 array($_POST['cotise_volontaire']));
}
elseif(!empty($_POST['super_grade_mini'])) {
	$cotisation = array(
	'drachme' => round(abs($_POST['drachme'])),
	'fer'			=> round(abs($_POST['fer'])),
	'argent'	=> round(abs($_POST['argent'])),
	'gold'		=> round(abs($_POST['gold'])),
	'bois'		=> round(abs($_POST['bois'])),
	'pierre'	=> round(abs($_POST['pierre'])),
	'marbre'	=> round(abs($_POST['marbre'])),
	'nourriture' => round(abs($_POST['nourriture'])),
	'eau'			=> round(abs($_POST['eau'])),
	'raisin'	=> round(abs($_POST['raisin'])),
	'vin'			=> round(abs($_POST['vin'])));
	$super=abs(round($_POST['super_grade_mini']));
	
	if(empty($_POST['mode'])) {
		$mode = 0;
	}
	else {
		$mode = 1;
	}

	$paquet = new EwPaquet('maj_cotisation', array($cotisation, $super, $mode));
}
else {
	$paquet = new EwPaquet('get_cotisation');
}

$id_alliance = $paquet->getAlliance();
$info = $paquet->getinfoalliance();
$mon_alliance  = $info;
$do = $paquet->getRetour();
$liste_attente = $paquet->getRetour(4);
$sortie        = $paquet->getRetour(5);
$demande_ress  = $paquet->getRetour(6);

if(empty($id_alliance)) {
	redirect();
}

if($info->level >= 3) {
	$max_ses=100000;
	$max_fer=200000;
	$max_arg=100000;
	$max_orr=2000;
	$max_boi=100000;
	$max_pie=100000;
	$max_mar=10000;
	$max_nou=200000;
	$max_eau=200000;
	$max_rai=100000;
	$max_vin=2000;
}
else {
	$max_ses=50000;
	$max_fer=100000;
	$max_arg=50000;
	$max_orr=1000;
	$max_boi=50000;
	$max_pie=50000;
	$max_mar=5000;
	$max_nou=100000;
	$max_eau=100000;
	$max_rai=50000;
	$max_vin=1000;
}

include('lang/'.LANG.'/menu_monalliance.php');
include('lang/'.LANG.'/include/cotisations.php');

?>