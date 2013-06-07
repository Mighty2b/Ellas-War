<?php

echo '<h1>Cotisation actuelle</h1><br/>
<form action=\'Cotisations\' method=\'post\'>';

if($paquet->peut_cotise() != 0) {

if($info->level >= 4) {
echo '<div class="centrer">
Cotisation volontaire : 
<input type="text" name="cotise_volontaire" maxlength="2"
			 size="2" 
			 value="'.$paquet->get_cotise_volontaire().'"
			 class="form_retirer" />% '.imress('drachme').' gagnés (max : 25%)</div>
<br/><br/>
<div class="bouton_classique"><input class="bouton_classique2" type="submit"
			 name="Changer" value="Changer" /></div></p></form>
<form action="Cotisations" method="post">';
}

echo '<div class="centrer">
Niveau minimal : 
<input type="text" name="super_grade_mini" 
			 maxlength="2" size="2" value="'.$info->lvl_mini.'" 
			 class="form_retirer" required="required" /><br/>';
if($info->level >= 4) {
	if($info->mode == 1) {
		echo '<input type="checkbox" name="mode" checked="checked" /> Mode sans déficit';
	}
	else {
		echo '<input type="checkbox" name="mode" /> Mode sans déficit';
	}
}

echo '<br/><br/></div>';

echo "<table class='centrer_tableau'>
	<tr align='center'>
	<td><b>Ressource</b></td>
<td>&nbsp;<b>Quantité</b>&nbsp;</td>
<td>&nbsp;<b>Maximum</b>&nbsp;</td>
<td>&nbsp;<b>Stocks</b>&nbsp;</td></tr>
<tr align='center'>
	<td>".imress('drachme')."</td>
<td>&nbsp;<input type='text' name='drachme' maxlength='6' size='7' value='".$do -> drachme."' class='form_retirer' />&nbsp;</td>
<td align='right'>&nbsp;$max_ses&nbsp;</td>
<td class=\"droite\">&nbsp;".nbf($info->drachme)."&nbsp;</td></tr>
	<tr align='center'>
	<td>".imress('fer')."</td>
<td>&nbsp;<input type='text' name='fer' maxlength='6' size='7' value='".$do -> fer."'class='form_retirer' />&nbsp;</td>
<td align='right'>&nbsp;$max_fer&nbsp;</td>
<td class=\"droite\">&nbsp;".nbf($info->fer)."&nbsp;</td></tr>
	<tr align='center'>
	<td>".imress('argent')."</td>
<td>&nbsp;<input type='text' name='argent' maxlength='6' size='7' value='".$do -> argent."'class='form_retirer' />&nbsp;</td>
<td align='right'>&nbsp;$max_arg&nbsp;</td>
<td class=\"droite\">&nbsp;".nbf($info->argent)."&nbsp;</td></tr>
	<tr align='center'>
	<td>".imress('gold')."</td>
<td>&nbsp;<input type='text' name='gold' maxlength='6' size='7' value='".$do -> gold."'class='form_retirer' />&nbsp;</td>
<td align='right'>&nbsp;$max_orr&nbsp;</td>
<td class=\"droite\">&nbsp;".nbf($info->gold)."&nbsp;</td></tr>
	<tr align='center'>
	<td>".imress('bois')."</td>
<td>&nbsp;<input type='text' name='bois' maxlength='6' size='7' value='".$do -> bois."'class='form_retirer' />&nbsp;</td>
<td align='right'>&nbsp;$max_boi&nbsp;</td>
<td class=\"droite\">&nbsp;".nbf($info->bois)."&nbsp;</td></tr>
	<tr align='center'>
	<td>".imress('pierre')."</td>
<td>&nbsp;<input type='text' name='pierre' maxlength='6' size='7' value='".$do -> pierre."'class='form_retirer' />&nbsp;</td>
<td align='right'>&nbsp;$max_pie&nbsp;</td>
<td class=\"droite\">&nbsp;".nbf($info->pierre)."&nbsp;</td></tr>
	<tr align='center'>
	<td>".imress('marbre')."</td>
<td>&nbsp;<input type='text' name='marbre' maxlength='6' size='7' value='".$do -> marbre."'class='form_retirer' />&nbsp;</td>
<td align='right'>&nbsp;$max_mar&nbsp;</td>
<td class=\"droite\">&nbsp;".nbf($info->marbre)."&nbsp;</td></tr>
	<tr align='center'>
	<td>".imress('nourriture')."</td>
<td>&nbsp;<input type='text' name='nourriture' maxlength='6' size='7' value='".$do -> nourriture."'class='form_retirer' />&nbsp;</td>
<td align='right'>&nbsp;$max_nou&nbsp;</td>
<td class=\"droite\">&nbsp;".nbf($info->nourriture)."&nbsp;</td>
	</tr><tr align='center'>
	<td>".imress('eau')."</td>
<td>&nbsp;<input type='text' name='eau' maxlength='6' size='7' value='".$do -> eau."'class='form_retirer' />&nbsp;</td>
<td align='right'>&nbsp;$max_eau&nbsp;</td>
<td class=\"droite\">&nbsp;".nbf($info->eau)."&nbsp;</td></tr>
	<tr align='center'>
	<td>".imress('raisin')."</td>
<td>&nbsp;<input type='text' name='raisin' maxlength='6' size='7' value='".$do -> raisin."'class='form_retirer' />&nbsp;</td>
<td align='right'>&nbsp;$max_rai&nbsp;</td>
<td class=\"droite\">&nbsp;".nbf($info->raisin)."&nbsp;</td></tr><tr align='center'>
	<td>".imress('vin')."</td>
<td>&nbsp;<input type='text' name='vin' maxlength='6' size='7' value='".$do -> vin."'class='form_retirer' />&nbsp;</td>
<td align='right'>&nbsp;$max_vin&nbsp;</td>
<td class=\"droite\">&nbsp;".nbf($info->vin)."&nbsp;</td></tr></table>";

}
else
{

echo '<div class="centrer">Niveau minimal : '.$info->lvl_mini.'<br/><br/>';

if($info->level >= 4) {
	echo "Cotisation volontaire : 
	<input type='text' name='cotise_volontaire' 
				 maxlength='2' size='2'
				 value='".$paquet->get_cotise_volontaire()."'
				 class='form_retirer' />% ".imress('drachme')." gagnés (max : 25%)
	<br/><br/>";
	if($info->mode == 1) {
		echo 'Mode : sans déficit<br/>';
	}
	else {
		echo 'Mode : classique<br/>';
	}
}

echo '</div>
	<table class="centrer_tableau" ><trclass="centrer">
	<td><b>Ressource</b></td>
<td>&nbsp;<b>Quantité</b>&nbsp;</td>
<td>&nbsp;<b>Stocks</b>&nbsp;</td></tr><trclass="centrer">
	<td class="centrer">'.imress('drachme').'</td>
<td>&nbsp;'.nbf($do -> drachme).'&nbsp;</td>
<td>&nbsp;'.nbf($info->drachme).'&nbsp;</td></tr><trclass="centrer">
	<td class="centrer">'.imress('fer').'</td>
<td>&nbsp;'.nbf($do -> fer).'&nbsp;</td>
<td>&nbsp;'.nbf($info->fer).'&nbsp;</td></tr><trclass="centrer">
	<td class="centrer">'.imress('argent').'</td>
<td>&nbsp;'.nbf($do -> argent).'&nbsp;</td>
<td>&nbsp;'.nbf($info->argent).'&nbsp;</td></tr><trclass="centrer">
	<td class="centrer">'.imress('or').'</td>
<td>&nbsp;'.nbf($do -> gold).'&nbsp;</td>
<td>&nbsp;'.nbf($info->gold).'&nbsp;</td></tr><trclass="centrer">
	<td class="centrer">'.imress('bois').'</td>
<td>&nbsp;'.nbf($do -> bois).'&nbsp;</td>
<td>&nbsp;'.nbf($info->bois).'&nbsp;</td></tr><trclass="centrer">
	<td class="centrer">'.imress('pierre').'</td>
<td>&nbsp;'.nbf($do -> pierre).'&nbsp;</td>
<td>&nbsp;'.nbf($info->pierre).'&nbsp;</td></tr><trclass="centrer">
	<td class="centrer">'.imress('marbre').'</td>
<td>&nbsp;'.nbf($do -> marbre).'&nbsp;</td>
<td>&nbsp;'.nbf($info->marbre).'&nbsp;</td></tr><trclass="centrer">
	<td class="centrer">'.imress('nourriture').'</td>
<td>&nbsp;'.nbf($do -> nourriture).'&nbsp;</td>
<td>&nbsp;'.nbf($info->nourriture).'&nbsp;</td></tr><trclass="centrer">
	<td class="centrer">'.imress('eau').'</td>
<td>&nbsp;'.nbf($do -> eau).'&nbsp;</td>
<td>&nbsp;'.nbf($info->eau).'&nbsp;</td></tr><trclass="centrer">
	<td class="centrer">'.imress('raisin').'</td>
<td>&nbsp;'.nbf($do -> raisin).'&nbsp;</td>
<td>&nbsp;'.nbf($info->raisin).'&nbsp;</td></tr><trclass="centrer">
	<td class="centrer">'.imress('vin').'</td>
<td>&nbsp;'.nbf($do -> vin).'&nbsp;</td>
<td>&nbsp;'.nbf($info->vin).'&nbsp;</td></tr></table>';
}

if($paquet-> peut_cotise() != 0 or ($info->level >= 4)) {
	echo '<p><div class="bouton_classique"><input class="bouton_classique2" type="submit" name=\'Changer\' value=\'Changer\'/></div></p></form>';
}
?>