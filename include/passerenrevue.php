<?php

$def_mur = $paquet->get_answer('get_def_mur')->{1};

include('donnees/unites.php');
include('donnees/batiments.php');

$liste_unites = $paquet->get_infoj('liste_unites');
$constructions = $paquet->get_infoj('liste_batiments');

if(sizeof($liste_unites) > 0) {

	$tab_unite = '';

	$attaque = 0;
	$defense = 0;
	$nb = 0;
	$i = 0;

	foreach($liste_unites as $unit => $value) {
		if(($value -> nb > 0) && ($value -> type_att != 9))	{
$tab_unite .= '<tr>
	<td>&nbsp;<a href="'._('engager').'-'.$unites[$value -> nom2]['aff'].'-'.$unit.'">'.$unites[$value -> nom2]['nom'].'</a>&nbsp;</td>
	<td class="centrer">&nbsp;'.nbf($value -> nb).'&nbsp;</td>
	<td>&nbsp;';

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
	<td class="droite">&nbsp;'.nbf($value -> attaque*$value -> nb).' '.img('images/attaques/dague.png', _('attaque')).'&nbsp;</td>
	<td class="droite">&nbsp;'.nbf(round($value -> defense*$value -> nb,2)).' '.img('images/attaques/bouclier.png', _('defense')).'&nbsp;</td>
			</tr>';
			$nb				+= $value -> nb;
			$attaque	+= $value -> attaque*$value -> nb;
			$defense	+= $value -> defense*$value -> nb;
			$i++;			
		}
	}

	if(!empty($tab_unite)) {
		
		if($i > 1) {
	$tab_unite_bas = '<tr>
		<td>&nbsp;'._('Total').'&nbsp;</td>
		<td class="centrer">&nbsp;'.nbf($nb).'&nbsp;</td>
		<td>&nbsp;&nbsp;</td>
		<td class="droite">&nbsp;'.nbf($attaque).' '.img('images/attaques/dague.png', _('attaque')).'&nbsp;</td>
		<td class="droite">&nbsp;'.nbf($defense).' '.img('images/attaques/bouclier.png', _('defense')).'&nbsp;</td>
				</tr>';
		}
		else {
			$tab_unite_bas = '';
		}
		
		$tab_unite = '
		<table class="centrer_tableau">
			<thead>
			<tr class=\'titre_tab\'>
				<td>'._('Unité').'</td>
				<td>'._('Nombre').'</td>
				<td>'._('Solde').'</td>
				<td>'._('Attaque').'</td>
				<td>'._('Défense').'</td></tr>
			</thead>
			<tfoot>'.$tab_unite_bas.'</tfoot>
			<tbody>
				'.$tab_unite;
		
		$tab_unite .= '</tbody></table><br/>';
	}
}

$tab_bat = '';

	$defense = 0;
	$terrain = 0;
	$nb = 0;
	$i = 0;
foreach($constructions as $bat => $value) {		
	if(($value -> type == 2) && ($value -> nb > 0)) {
	$tab_bat .= '<tr>
<td>&nbsp;<a href="'._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'">'.$batiments[$value -> nom2]['nom'].'</a>&nbsp;</td>
<td class="centrer">&nbsp;'.nbf($value -> nb).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($value -> terrain*$value -> nb).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($value -> defense*$value -> nb).' '.img('images/attaques/bouclier.png', _('defense')).'&nbsp;</td>
		</tr>';
		$nb				+= $value -> nb;
		$terrain	+= $value -> terrain*$value -> nb;
		$defense	+= $value -> defense*$value -> nb;
		$i++;
	}
}

if($def_mur >  0) {
	$tab_bat .= '<tr class="tableau_fond'.($i%2).'">
<td>&nbsp;<a href="'._('temples').'-'._('poseidon').'" 
             class="centre_armee">'._('Mur de Poseidon').'</a>&nbsp;</td>
<td class="centrer">&nbsp;1&nbsp;</td>
<td class="droite">&nbsp;0&nbsp;</td>
<td class="droite">&nbsp;'.nbf($def_mur).' '.img('images/attaques/bouclier.png', _('defense')).'&nbsp;</td>
		</tr>';
		$nb				+= 1;
		$terrain	+= 0;
		$defense	+= $def_mur;
		$i++;
}

if(!empty($tab_bat)) {


	if($i > 1) {
$tab_bat_bas = '<tr>
<td>&nbsp;'._('Total').'&nbsp;</td>
<td class="centrer">&nbsp;'.nbf($nb).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($terrain).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($defense).' '.img('images/attaques/bouclier.png', 'defense').'&nbsp;</td>
		</tr>';
	}
	else {
		$tab_bat_bas = '';
	}
	
$tab_bat = '<br/>
		<table>
			<thead>
			<tr>
		<td>'._('Bâtiment').'</td>
		<td>'._('Nombre').'</td>
		<td class="droite">'._('Terrain').'</td>
		<td class="droite">'._('Défense').'</td></tr>
		</thead>
		<tfoot>'.$tab_bat_bas.'</tfoot>
		<tbody>'.$tab_bat;
		
	$tab_bat .= '</tbody></table>';
}

if(empty($tab_unite) && empty($tab_bat)) {
	echo '<div class="centrer ligne">
	        <b>'._('Vos armées sont vides').'</b>
	      </div>';
}
else {
	echo $tab_unite;
	
	echo $tab_bat;
}

?>