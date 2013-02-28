<?php

if(!empty($_POST)) {
	unset($_POST['Enregistrer']);
	$paquet = new EwPaquet('maj_vagues', array(serialize($_POST)));
}
else {
	if(isset($_GET['var1']) && ($_GET['var1']==0 or $_GET['var1']==999999)) {
		if($_GET['var1'] == 999999) {
			$paquet = new EwPaquet('ajout_vague', array($_GET['var1']));
		}
		else {
			$paquet = new EwPaquet('ajout_vague');
		}
	}
	elseif(!empty($_GET['var1'])) {
		$paquet = new EwPaquet('supprimer_vague', array($_GET['var1']));
	}
	else {
		$paquet = new EwPaquet('get_vagues');
	}
}

include('lang/'.LANG.'/donnees/unites.php');

$liste_vague = array();
$liste = '';
$tab = array();
$tableau = '<table width="100%"><tr>';
$i = 0;
$liste_unites = $paquet->get_unites();
$vague = unserialize($paquet->getRetour());
$largeur = 4;

foreach($liste_unites as $value) {
	if(($value -> defense > 0) && ($value -> nb > 0)) {
		$liste .= $value -> nb.' '.$unites[$value->nom2]['nom'].'<br/>';
		$tab[] = $value->nom2;
	}
}

$nb_vague = sizeof($vague);
$nb_unite = sizeof($tab);
$total = 0;

foreach($tab as $unite) {
	$i++;
	$tableau .= '<td>
	<table width="100%">
		<tr>
			<td class="titre_tab">'.$unites[$unite]['nom'].'</td>
		</tr>';
	for($j=0;$j<$nb_vague;$j++) {
		$total += ($vague[$j][$unite]*$liste_unites->$unite->defense);
		$tableau .= '<tr>
		<td class="centrer"><input type="text" value="'.$vague[$j][$unite].'" name="'.$unite.'[]" class="form_unites"/></td>
		</tr>';
	}
	$tableau .= '</table>
	</td>';
	
	if($i%$largeur == 0) {
		$tableau .= '<td><table width="100%"><tr><td class="case_suppr_strat">&nbsp;</td></tr>';
		
		for($j=0;$j<$nb_vague;$j++) {
			$tableau .= '<tr>
			<td>
			&nbsp;'.nbf($total).' '.img('images/attaques/bouclier.png', 'defense').'&nbsp;</td>
			<td class="droite case_suppr_strat">&nbsp;
&nbsp;<a href="StrategieDefensive-'.($j+1).'">'.img('images/joueurs/supprimer_mp.png', 'supprimer').'</a>&nbsp;
			</td></tr>';
			$total = 0;
		}
		
		$tableau .= '</table></td>';
		if($i < $nb_unite) {
			$tableau .= '</tr><tr>';
		}
		else {
			$tableau .= '</tr>';
		}
	}
}

include('lang/'.LANG.'/include/strategiedefensive.php');

?>