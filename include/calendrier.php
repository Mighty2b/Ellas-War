<?php

$mon_alliance  = $paquet->getinfoalliance();

if($mon_alliance -> level == 1) {
	redirect();
}

if(!empty($_GET['var1'])) {
	$verif_date = explode("_", addslashes($_GET['var1'])); 

	if(checkdate($verif_date[1], $verif_date[0], $verif_date[2]) == true)
	{
		if($verif_date[0] < 10)
			$verif_date[0] = '0'.round($verif_date[0]);
			
		if($verif_date[1] < 10)
			$verif_date[1] = '0'.round($verif_date[1]);
			
		$date = $verif_date[0].'-'.$verif_date[1].'-'.$verif_date[2];
	}	
	else {
		$date = date('d-m-Y');
	}
}
else
{
	$date = date('d-m-Y');
}

$date_enre = str_replace('-', '_', $date);

if(!empty($_POST) && $paquet->peut_profil() > 0) {
	if(empty($_POST['rappel'])) {
		$_POST['rappel'] = 0;
	}
	$paquet = new EwPaquet('maj_calendrier', 
												 array($date, $_POST['texte'], $_POST['rappel']));
}
else {
	$paquet = new EwPaquet('calendrier', array($date));
}

$do = $paquet->getRetour();
$dates=$paquet->getRetour(2);
$liste_attente = $paquet->getRetour(4);
$sortie        = $paquet->getRetour(5);
$depart_urgent = $paquet->depart_urgent();
$demande_ress  = $paquet->getRetour(6);

include('lang/'.LANG.'/menu_monalliance.php');
include('lang/'.LANG.'/include/calendrier.php');

?>