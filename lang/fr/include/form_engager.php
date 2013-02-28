<?php

if(!empty($prod)) {
	$prod = '<br/><b>Production : </b><br/>'.$prod;
}

if(!empty($conso)) {
	$conso = '<br/><b>Consommation : </b><br/>'.$conso;
}
else {
	if(!empty($value -> placen))
		$conso = '<br/><b>Places</b><br/>'.nbf($value -> placen, 0).' Normales';
	elseif(!empty($value -> placel))
		$conso = '<br/><b>Places</b><br/>'.nbf($value -> placel, 0).' Luxueuses';
	elseif(!empty($value -> placeg))
		$conso = '<br/><b>Places</b><br/>'.nbf($value -> placeg, 0).' Souterraines';
}

$logement = '';
if(!empty($value -> logement)) {
	$logement .= '<br/><b>Logement :</b><br/>';

	if($value -> logement == 'luxe') {
		$logement .= 'Palais';
		$max=min($max,floor($paquet->get_placel()-$paquet->get_placel_nb()));
	}
	elseif($value -> logement == 'normal') {
		$logement .= 'Huttes et habitations';
		$max=min($max,floor($paquet->get_placen()-$paquet->get_placen_nb()));
	}
	elseif($value -> logement == 'grotte') {
		$logement .= 'Grottes';
		$max=min($max,floor($paquet->get_placeg()-$paquet->get_placeg_nb()));
	}
	else {
		$logement .= 'Aucun';
	}
}

echo '<div class="gauche_batiment">';
if($value->type_att == 9) {
	echo '<img src="images/bat/'.$unites[$bat]['img'].'.png"
			 			 alt="'.$unites[$bat]['nom'].'"
			 			 title="'.$unites[$bat]['nom'].'" /></div>';
}
else {
	echo '<img src="images/unite/'.$unites[$bat]['img'].'.png"
			 			 alt="'.$unites[$bat]['nom'].'"
			 			 title="'.$unites[$bat]['nom'].'" />';
}
echo '</div>
<div class="droite_batiment">';

echo '<div class=\'texte1\'>'.$txt_description_unites[$bat];

$paquet->display();
	
echo	'</div>
<form method="post" action="Engager-'.$unites[$bat]['aff'].'-'.$bat.'">
<table><tr>
<td align=\'left\' valign="top">
<b>Engagement : </b>'.
$prix.'<br/><b>Ressources récupérables : </b>'.
$prix2.$conso.$prod.$logement;

if($unites[$bat]['aff'] == 4) {
	echo '<br/><b>Terrain : </b><br/>'.
	$paquet->get_batiments()->$bat->terrain.'<br/>';
}

echo	'</td>
<td>&nbsp;&nbsp;&nbsp;</td>

<td valign="top">';

if(!empty($value -> attaque)) {
	echo '<b>'.$value -> attaque.'</b> '.img('images/attaques/dague.png', 'attaque').' ';
}

if(!empty($value -> defense)) {
	echo '<b>'.nbf(round($value -> defense, 2), 2).'</b> '.img('images/attaques/bouclier.png', 'défense').'</b><br/>';
}
			
$temples = $paquet -> getTemples();

if(($bat == 'spartiate' && !in_array('ares', $temples)) or empty($value->max)) {
	echo '<br/>';
}
else {
  echo '<b>Max :</b> '.nbf($value->max).'<br/>';
  $max = min($max, $value->max-$value->nb);
}

if($max < 0) {
	$max = 0;
}

echo '<b>Actuellement :</b> '.nbf($value->nb).'<br/>';

echo '<input type="hidden" name="batiment" value="'.$bat.'" />
		<input type="hidden" name="type" value="'.$unites[$bat]['aff'].'" />
<table>';

if($bat != 'spartiate' or in_array('ares', $temples)) {
echo '<tr>
<td valign="middle"><input type="text" id="'.$bat.'_achat" name="achatt" placeholder="0" size="10" class="form_retirer droite" /></td>
<td valign="middle">&nbsp;<a href="javascript:engager_nb(\''.$bat.'_achat\', '.$max.');" class="lien_faq">/ '.nbf($max).'</a>&nbsp;</td>
<td valign="middle"><div class="bouton_classique"><input class="bouton_classique2" type="submit" value="ENGAGER" name="achat" style="width:80px;"/></div></td></tr>';
}

echo '<tr>
<td valign="middle"><input type="text" id="'.$bat.'_vente" name="ventee" placeholder="0" size="10" class="form_retirer droite" /></td>
<td valign="middle">&nbsp;<a href="javascript:engager_nb(\''.$bat.'_vente\', '.$value->nb.');" class="lien_faq">/ '.nbf($value->nb).'</a>&nbsp;</td>
<td valign="middle"><div class="bouton_classique"><input class="bouton_classique2" type="submit" value="LIBÉRER" name="vente" style="width:80px;"/></div></td></tr>
</table>';

if($bat == 'carriere') {
echo '
<br/>
		<b>Balance de production réservée au marbre</b><br/>
	<table>
		<tr>
			<td>
<input type="text" class="form_retirer droite" size="3" maxlenght="3" value="'.$paquet->getcoef_marbre().'" name="modif" required="required" /> % 
</td>
<td>
	<div class="bouton_classique"><input class="bouton_classique2" type="submit" name="Modifier" value="Modifier" /></div>
</td>
	</tr>
	</table>';
}
?>