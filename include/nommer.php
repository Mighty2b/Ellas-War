<?php

if(!empty($_GET['var1']) && is_numeric($_GET['var1'])) {
	if(!empty($_POST['cg'])) {
	
		if(empty($_POST['rang'])) {
			$nom_rang = '';
		}
		else {
			$nom_rang = trim($_POST['rang']);
		}
		
		$modifier_profils=@abs(round(addslashes(trim(htmlentities($_POST['modifier_profils'])))));
		$changer_cotise=@abs(round(addslashes(trim(htmlentities($_POST['changer_cotise'])))));
		$pacte=@abs(round(addslashes(trim(htmlentities($_POST['pacte'])))));
		$declarer_guerre=@abs(round(addslashes(trim(htmlentities($_POST['declarer_guerre'])))));
		$annuler_guerre=@abs(round(addslashes(trim(htmlentities($_POST['annuler_guerre'])))));
		$accepter_joueur=@abs(round(addslashes(trim(htmlentities($_POST['accepter_joueur'])))));
		$recrutement=@abs(round(addslashes(trim(htmlentities($_POST['recrutement'])))));
		$contrat=@abs(round(addslashes(trim(htmlentities($_POST['contrat'])))));
		$accepter_demande=@abs(round(addslashes(trim(htmlentities($_POST['accepter_demande'])))));

		$info = array(
			'nom' => $nom_rang,
			'modifier_profils' => $modifier_profils,
			'changer_cotise' => $changer_cotise,
			'pacte' => $pacte,
			'declarer_guerre' => $declarer_guerre,
			'annuler_guerre' => $annuler_guerre,
			'accepter_joueur' => $accepter_joueur,
			'recrutement' => $recrutement,
			'contrat' => $contrat,
			'accepter_demande' => $accepter_demande,
			'sous_chef' => @$_POST['sous_chef']);
		$paquet = new EwPaquet('maj_droits_joueur', array($_GET['var1'], $info));
	}
	else {
		$paquet = new EwPaquet('droits_joueur', array($_GET['var1']));
	}
	$droits = $paquet->getRetour();
}
else {
	$paquet = new EwPaquet('nommer');
	$liste_membres = $paquet->getRetour();
}

$mon_alliance  = $paquet->getinfoalliance();
$liste_attente = $paquet->getRetour(4);
$sortie        = $paquet->getRetour(5);
$depart_urgent = $paquet->depart_urgent();
$demande_ress  = $paquet->getRetour(6);

include('lang/'.LANG.'/menu_monalliance.php');
include('lang/'.LANG.'/include/nommer.php');

?>