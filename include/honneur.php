<?php

$paquet = new EwPaquet('get_classementh');
$classement = $paquet -> getRetour();
$dernier    = $paquet -> getRetour(2);

echo '<h1>'.$titre_classement_honneur.'</h1><br/>';

echo '<div class="centrer">'.$txt_desc.'<br/><br/></div>';

echo '<table class=\'tableau centrer_tableau\'>
	<tr class=\'tableau_header\'>
		<td>&nbsp;'.$txt_n.'&nbsp;</td>
		<td>&nbsp;'.$txt_pseudo.'&nbsp;</td>
		<td>&nbsp;'.$txt_lvl.'&nbsp;</td>
		<td>&nbsp;'.$txt_xp.'&nbsp;</td>
		<td>&nbsp;'.$txt_victoire.'&nbsp;</td>
		<td>&nbsp;'.$txt_defaite.'&nbsp;</td>
		<td>&nbsp;'.$txt_terrain.'&nbsp;</td>
		<td>&nbsp;'.$txt_alli.'&nbsp;</td>
		<td>&nbsp;'.$txt_h.'&nbsp;</td>
	</tr>';
$i=1;
foreach($classement as $j) {
if($i != 0) {
	echo'<tr class="tableau_fond2"><td colspan="9"></td></tr>';
}

echo '
<tr class="tableau_fond'.($i%2).'">
	<td>&nbsp;'.$i.'&nbsp;</td>
	<td>&nbsp;<a href=\''.trad_to_page('profilsjoueur').'-'.$j->id.'\'>'.$j->login.'</a>&nbsp;</td>
	<td>&nbsp;'.($j->lvl).'&nbsp;</td>
	<td>&nbsp;'.nbf(round($j->points)).'&nbsp;</td>
	<td>&nbsp;'.nbf($j->victoires).'&nbsp;</td>
	<td>&nbsp;'.nbf($j->defaites).'&nbsp;</td>
	<td>&nbsp;'.nbf($j->terrain).'&nbsp;</td>
	<td>&nbsp;<a href=\''.trad_to_page('profilsalliance').'-'.$j->alliance.'\'>'.ucfirst(stripslashes($j->nom)).'</a>&nbsp;</td>
	<td>&nbsp;'.nbf($j->honneur).'&nbsp;</td>
</tr>';
	$i++;
}

echo '</table>';

if(!empty($dernier)) {
	echo '<br/><div class="ligne centrer">
	Dernier vainqueur : <a href="profilsjoueur-'.$dernier->joueur.'" class="interdit sous">'.$dernier->login.'</a>
	</div>';
}

echo '<div class="centrer gras">
<br/><br/><a href=\''.trad_to_page('classementghonneur').'\'>'.$lien_classement_honneur.'</a>
</div>';

?>