<?php

$paquet -> add_action('infoalliance');

echo '<title>'._('Nommer les membres de votre alliance').'</title>
<meta name="description"
      content="'._('Nommer les membres de votre alliance').'" />';

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
		$paquet -> add_action('maj_droits_joueur', array($_GET['var1'], $info));
	}
	
	$paquet -> add_action('droits_joueur', array($_GET['var1']));
	
}

?>