<?php

include('include/menu_monalliance.php');

if($mon_alliance->level >= 3) {
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

$do = $paquet->get_answer('get_cotisation')->{1};

echo '<h1>'._('Cotisation actuelle').'</h1><br/>
<form action="Cotisations" method="post">';

if($paquet->get_infoj('droits_alliance')->changer_cotise != 0) {

if($mon_alliance->level >= 4) {
echo '<div class="centrer">
Cotisation volontaire : 
<input type="text"
       name="cotise_volontaire" 
       maxlength="2"
			 size="2" 
			 value="'.$paquet->get_cotise_volontaire().'"/>% '.
imress('drachme').' '._('gagnés').' ('._('max').' : 25%)</div>
<br/><br/>
<div class="bouton_classique"><input type="submit"
			 name="'._('Changer').'" value="'._('Changer').'" /></div></p></form>
<form action="Cotisations" method="post">';
}

echo '<div class="centrer">
'._('Niveau minimal').' : 
<input type="text" name="super_grade_mini" 
			 maxlength="2" size="2" value="'.$mon_alliance->lvl_mini.'" 
			 required="required" /><br/>';
if($mon_alliance->level >= 4) {
	if($mon_alliance->mode == 1) {
		echo '<input type="checkbox" name="mode" checked="checked" /> '.
		     _('Mode sans déficit');
	}
	else {
		echo '<input type="checkbox" name="mode" /> '.
		     _('Mode sans déficit');
	}
}

echo '<br/><br/></div>';

echo '<table>
	<thead><tr>
	<td>'._('Ressource').'</td>
<td>'._('Quantité').'</td>
<td>'._('Maximum').'</td>
<td>'._('Stocks').'</td></tr></thead>
<tfoot></tfoot><tbody>
<tr align="center">
	<td>'.imress('drachme').'</td>
<td>&nbsp;<input type="text"
                 name="drachme" 
                 maxlength="6"
                 size="7" 
                 value="'.$do -> drachme.'"/>&nbsp;</td>
<td align="right">&nbsp;'.nbf($max_ses).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($mon_alliance->drachme).'&nbsp;</td></tr>
	<tr align="center">
	<td>'.imress('nourriture').'</td>
<td>&nbsp;<input type="text"
                 name="nourriture" 
                 maxlength="6"
                 size="7" 
                 value="'.$do -> nourriture.'" />&nbsp;</td>
<td align="right">&nbsp;'.nbf($max_nou).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($mon_alliance->nourriture).'&nbsp;</td>
	</tr>
	<tr align="center">
	<td>'.imress('eau').'</td>
<td>&nbsp;<input type="text"
                 name="eau" 
                 maxlength="6" 
                 size="7" 
                 value="'.$do -> eau.'" />&nbsp;</td>
<td align="right">&nbsp;'.nbf($max_eau).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($mon_alliance->eau).'&nbsp;</td></tr>
	<tr align="center">
	<td>'.imress('bois').'</td>
<td>&nbsp;<input type="text" 
                 name="bois" 
                 maxlength="6" 
                 size="7" 
                 value="'.$do -> bois.'" />&nbsp;</td>
<td align="right">&nbsp;'.nbf($max_boi).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($mon_alliance->bois).'&nbsp;</td></tr>
	<tr align="center">
	<td>'.imress('fer').'</td>
<td>&nbsp;<input type="text" 
                 name="fer" 
                 maxlength="6" 
                 size="7" 
                 value="'.$do -> fer.'" />&nbsp;</td>
<td align="right">&nbsp;'.nbf($max_fer).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($mon_alliance->fer).'&nbsp;</td></tr>
	<tr align="center">
	<td>'.imress('argent').'</td>
<td>&nbsp;<input type="text" 
                 name="argent" 
                 maxlength="6" 
                 size="7" 
                 value="'.$do -> argent.'" />&nbsp;</td>
<td align="right">&nbsp;'.nbf($max_arg).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($mon_alliance->argent).'&nbsp;</td></tr>
	<tr align="center">
	<td>'.imress('pierre').'</td>
<td>&nbsp;<input type="text" 
                 name="pierre" 
                 maxlength="6" 
                 size="7" 
                 value="'.$do -> pierre.'" />&nbsp;</td>
<td align="right">&nbsp;'.nbf($max_pie).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($mon_alliance->pierre).'&nbsp;</td></tr>
	<tr align="center">
	<td>'.imress('marbre').'</td>
<td>&nbsp;<input type="text" 
                 name="marbre" 
                 maxlength="6" 
                 size="7" 
                 value="'.$do -> marbre.'" />&nbsp;</td>
<td align="right">&nbsp;'.nbf($max_mar).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($mon_alliance->marbre).'&nbsp;</td></tr>
	<tr align="center">
	<td>'.imress('raisin').'</td>
<td>&nbsp;<input type="text" 
                 name="raisin" 
                 maxlength="6" 
                 size="7" 
                 value="'.$do -> raisin.'" />&nbsp;</td>
<td align="right">&nbsp;'.nbf($max_rai).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($mon_alliance->raisin).'&nbsp;</td></tr>
<tr align="center">
	<td>'.imress('vin').'</td>
<td>&nbsp;<input type="text" 
                 name="vin" 
                 maxlength="6" 
                 size="7" 
                 value="'.$do -> vin.'" />&nbsp;</td>
<td align="right">&nbsp;'.nbf($max_vin).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($mon_alliance->vin).'&nbsp;</td></tr>
	<tr align="center">
	<td>'.imress('gold').'</td>
<td>&nbsp;<input type="text" 
                 name="gold" 
                 maxlength="6" 
                 size="7" 
                 value="'.$do -> gold.'" />&nbsp;</td>
<td align="right">&nbsp;'.nbf($max_orr).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($mon_alliance->gold).'&nbsp;</td></tr></tbody>
</table>';

}
else
{

echo '<div class="centrer">'._('Niveau minimal').' : '.$mon_alliance->lvl_mini.'<br/><br/>';

if($mon_alliance->level >= 4) {
	echo 'Cotisation volontaire : 
	<input type="text"
				 maxlength="2" size="2"
				 value="'.$paquet->get_cotise_volontaire().'"/>% '.
	imress('drachme').' gagnés (max : 25%)
	<br/><br/>';
	if($mon_alliance->mode == 1) {
		echo _('Mode : sans déficit').'<br/>';
	}
	else {
		echo _('Mode : classique').'<br/>';
	}
}

echo '<table>
	<thead><tr>
	<td>'._('Ressource').'</td>
<td>'._('Quantité').'</td>
<td>'._('Maximum').'</td>
<td>'._('Stocks').'</td></tr></thead>
<tfoot></tfoot><tbody>
<tr align="center">
	<td class="centrer">'.imress('drachme').'</td>
<td>&nbsp;'.nbf($do -> drachme).'&nbsp;</td>
<td>&nbsp;'.nbf($mon_alliance->drachme).'&nbsp;</td>
</tr>
<tr class="centrer">
	<td class="centrer">'.imress('nourriture').'</td>
<td>&nbsp;'.nbf($do -> nourriture).'&nbsp;</td>
<td>&nbsp;'.nbf($mon_alliance->nourriture).'&nbsp;</td>
</tr>
<tr class="centrer">
	<td class="centrer">'.imress('eau').'</td>
<td>&nbsp;'.nbf($do -> eau).'&nbsp;</td>
<td>&nbsp;'.nbf($mon_alliance->eau).'&nbsp;</td>
</tr>
<tr class="centrer">
	<td class="centrer">'.imress('bois').'</td>
<td>&nbsp;'.nbf($do -> bois).'&nbsp;</td>
<td>&nbsp;'.nbf($mon_alliance->bois).'&nbsp;</td>
</tr>
<tr class="centrer">
	<td class="centrer">'.imress('fer').'</td>
<td>&nbsp;'.nbf($do -> fer).'&nbsp;</td>
<td>&nbsp;'.nbf($mon_alliance->fer).'&nbsp;</td>
</tr>
<tr class="centrer">
	<td class="centrer">'.imress('argent').'</td>
<td>&nbsp;'.nbf($do -> argent).'&nbsp;</td>
<td>&nbsp;'.nbf($mon_alliance->argent).'&nbsp;</td>
</tr>
<tr class="centrer">
	<td class="centrer">'.imress('pierre').'</td>
<td>&nbsp;'.nbf($do -> pierre).'&nbsp;</td>
<td>&nbsp;'.nbf($mon_alliance->pierre).'&nbsp;</td>
</tr>
<tr class="centrer">
	<td class="centrer">'.imress('marbre').'</td>
<td>&nbsp;'.nbf($do -> marbre).'&nbsp;</td>
<td>&nbsp;'.nbf($mon_alliance->marbre).'&nbsp;</td>
</tr>
<tr class="centrer">
	<td class="centrer">'.imress('raisin').'</td>
<td>&nbsp;'.nbf($do -> raisin).'&nbsp;</td>
<td>&nbsp;'.nbf($mon_alliance->raisin).'&nbsp;</td>
</tr>
<tr class="centrer">
	<td class="centrer">'.imress('vin').'</td>
<td>&nbsp;'.nbf($do -> vin).'&nbsp;</td>
<td>&nbsp;'.nbf($mon_alliance->vin).'&nbsp;</td>
</tr>
<tr class="centrer">
	<td class="centrer">'.imress('or').'</td>
<td>&nbsp;'.nbf($do -> gold).'&nbsp;</td>
<td>&nbsp;'.nbf($mon_alliance->gold).'&nbsp;</td>
</tr>
</tbody>
</table>';
}

if($paquet->get_infoj('droits_alliance')->changer_cotise != 0 or $mon_alliance->level >= 4) {
	echo '<p><div class="bouton_classique"><input type="submit"
	                                              name="'._('Changer').'" 
	                                              value="'._('Changer').'"/></div></p></form>';
}

?>