<?php

echo '<title>'._('Gestion de vos cotisations').'</title>
<meta name="description"
      content="'._('Gestion de vos cotisations').'" />';

$paquet -> add_action('infoalliance');
$paquet -> add_action('peut_greve');

if(isset($_POST['changer_cotisation'])) {
	if(empty($_POST['greve'])) {
		$greve = 0;
	}
	else {
		$greve = 1;
	}
	$paquet -> add_action('changer_greve', array($greve));
}

if(isset($_POST['cotise_volontaire'])) {
	$paquet -> add_action('changer_cotise_volontaire',
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

	$paquet -> add_action('maj_cotisation', array($cotisation, $super, $mode));
}

$paquet -> add_action('get_cotisation');

?>