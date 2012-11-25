<?php

$paquet = new EwPaquet('get_def_mur');
$def_mur = $paquet->getRetour();

include('lang/'.LANG.'/donnees/unites.php');
include('lang/'.LANG.'/donnees/batiments.php');

$liste_unites = $paquet->get_unites();
$constructions = $paquet->get_batiments();

if(sizeof($liste_unites) > 0) {

	$tab_unite = '';

	$attaque = 0;
	$defense = 0;
	$nb = 0;
	$i = 0;

	foreach($liste_unites as $unit => $value) {
		if(($value -> nb > 0) && ($value -> type != 'def'))	{
			if($i != 0) {
					$tab_unite .= '<tr class="tableau_fond2"><td colspan="5"></td></tr>';
			}
$tab_unite .= '<tr class="tableau_fond'.($i%2).'">
	<td class="gauche">&nbsp;<a href="'.trad_to_page('Engager').'-'.$unites[$value -> nom2]['aff'].'-'.$unit.'" class="centre_armee">'.$unites[$value -> nom2]['nom'].'</a>&nbsp;</td>
	<td class="centrer">&nbsp;'.nbf($value -> nb).'&nbsp;</td>
	<td class="droite">&nbsp;';

		if(!empty($value -> consodrachme)) {
			$tab_unite .= nbf($value -> nb*$value -> consodrachme).' '.imress('drachme');
		}
		
		if(!empty($value -> consonourriture)) {
			$tab_unite .= nbf($value -> nb*$value -> consonourriture).' '.imress('nourriture');
		}
		
		if(!empty($value -> consoeau)) {
			$tab_unite .= nbf($value -> nb*$value -> consoeau).' '.imress('eau');
		}
		
		if(!empty($value -> consobois)) {
			$tab_unite .= nbf($value -> nb*$value -> consobois).' '.imress('bois');
		}
		
		if(!empty($value -> consofer)) {
			$tab_unite .= nbf($value -> nb*$value -> consofer).' '.imress('fer');
		}
		
		if(!empty($value -> consoargent)) {
			$tab_unite .= nbf($value -> nb*$value -> consoargent).' '.imress('argent');
		}
		
		if(!empty($value -> consopierre)) {
			$tab_unite .= nbf($value -> nb*$value -> consopierre).' '.imress('pierre');
		}
		
		if(!empty($value -> consomarbre)) {
			$tab_unite .= nbf($value -> nb*$value -> consomarbre).' '.imress('marbre');
		}
		
		if(!empty($value -> consoraisin)) {
			$tab_unite .= nbf($value -> nb*$value -> consoraisin).' '.imress('raisin');
		}
		if(!empty($value -> consovin)) {
			$tab_unite .= nbf($value -> nb*$value -> consovin).' '.imress('vin');
		}
		
		if(!empty($value -> consoor)) {
			$tab_unite .= nbf($value -> nb*$value -> consoor).' '.imress('or');
		}

		$tab_unite .= '&nbsp;</td>
	<td class="droite">&nbsp;'.nbf($value -> attaque*$value -> nb).' '.img('images/attaques/dague.png', 'attaque').'&nbsp;</td>
	<td class="droite">&nbsp;'.nbf(round($value -> defense*$value -> nb,2)).' '.img('images/attaques/bouclier.png', 'defense').'&nbsp;</td>
			</tr>';
			$nb				+= $value -> nb;
			$attaque	+= $value -> attaque*$value -> nb;
			$defense	+= $value -> defense*$value -> nb;
			$i++;			
		}
	}

	if(!empty($tab_unite)) {
		$tab_unite = '
		<table class=\'tableau2 centrer_tableau\'>
			<tr class=\'tableau_header\'>
				<td>&nbsp;'.$txt_nom.'&nbsp;</td>
				<td>&nbsp;'.$txt_nb.'&nbsp;</td>
				<td>&nbsp;'.$txt_solde.'&nbsp;</td>
				<td>&nbsp;'.$txt_att.'&nbsp;</td>
				<td>&nbsp;'.$txt_def.'&nbsp;</td></tr>
			<tr class="font_classement3">
				<td colspan="6"></td>
			</tr>'.$tab_unite;
			
		if($i > 1) {
			$tab_unite .= '<tr class="tableau_fond2"><td colspan="5"></td></tr>';
	$tab_unite .= '<tr class="gras">
		<td>&nbsp;Total&nbsp;</td>
		<td class="centrer">&nbsp;'.nbf($nb).'&nbsp;</td>
		<td class="droite">&nbsp;&nbsp;</td>
		<td class="droite">&nbsp;'.nbf($attaque).' '.img('images/attaques/dague.png', 'attaque').'&nbsp;</td>
		<td class="droite">&nbsp;'.nbf($defense).' '.img('images/attaques/bouclier.png', 'defense').'&nbsp;</td>
				</tr>';
		}
		
		$tab_unite .= '</table><br/>';
	}
}

$tab_bat = '';

	$defense = 0;
	$terrain = 0;
	$nb = 0;
	$i = 0;
foreach($constructions as $bat => $value) {		
	if(($value -> type == 2) && ($value -> nb > 0)) {
		if($i != 0) {
				$tab_bat .= '<tr class="tableau_fond2"><td colspan="4"></td></tr>';
		}
	$tab_bat .= '<tr class="tableau_fond'.($i%2).'">
<td class="gauche">&nbsp;<a href="Construire-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'" class="centre_armee">'.$batiments[$value -> nom2]['nom'].'</a>&nbsp;</td>
<td class="droite">&nbsp;'.nbf($value -> nb).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($value -> terrain*$value -> nb).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($value -> defense*$value -> nb).' '.img('images/attaques/bouclier.png', 'defense').'&nbsp;</td>
		</tr>';
		$nb				+= $value -> nb;
		$terrain	+= $value -> terrain*$value -> nb;
		$defense	+= $value -> defense*$value -> nb;
		$i++;
	}
}

if($def_mur >  0) {
	if($i != 0) {
			$tab_bat .= '<tr class="tableau_fond2"><td colspan="4"></td></tr>';
	}
	$tab_bat .= '<tr class="tableau_fond'.($i%2).'">
<td class="gauche">&nbsp;<a href="Temples-poseidon" class="centre_armee">Mur de Poseidon</a>&nbsp;</td>
<td class="droite">&nbsp;1&nbsp;</td>
<td class="droite">&nbsp;0&nbsp;</td>
<td class="droite">&nbsp;'.nbf($def_mur).' '.img('images/attaques/bouclier.png', 'defense').'&nbsp;</td>
		</tr>';
		$nb				+= 1;
		$terrain	+= 0;
		$defense	+= $def_mur;
		$i++;
}

if(!empty($tab_bat)) {
$tab_bat .= '<tr class="tableau_fond2"><td colspan="4"></td></tr>';

$tab_bat = '<br/>
		<table class=\'tableau2 centrer_tableau\'>
			<tr class=\'tableau_header\'>
		<td>&nbsp;'.$txt_batiment.'&nbsp;</td>
		<td>&nbsp;'.$txt_nombre.'&nbsp;</td>
		<td>&nbsp;'.$txt_terrain.'&nbsp;</td>
		<td>&nbsp;'.$txt_def.'&nbsp;</td></tr>'.$tab_bat;

	if($i > 1) {
$tab_bat .= '<tr class="font_classement'.($i%2).' gras">
<td>&nbsp;Total&nbsp;</td>
<td class="droite">&nbsp;'.nbf($nb).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($terrain).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($defense).' '.img('images/attaques/bouclier.png', 'defense').'&nbsp;</td>
		</tr>';
	}
	
	$tab_bat .= '</table>';
}

if(empty($tab_unite) && empty($tab_bat)) {
	echo '<div class="centrer ligne"><b>Vos armées sont vides</b></div>';
}
else {
	echo $tab_unite;
	
	echo $tab_bat;
}

?>