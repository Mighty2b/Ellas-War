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

echo '<div class="gauche_batiment">
<img src="/images/bat/'.$batiments[$bat]['img'].'.png"
		 alt="'.$batiments[$bat]['nom'].'"
		 title="'.$batiments[$bat]['nom'].'" /></div>
<div class="droite_batiment">';

echo '<div class=\'texte1\'>'.$txt_description_bat[$bat];

$paquet->display();
	
echo	'</div>
<form method="post" action="Construire-'.$batiments[$bat]['aff'].'-'.$bat.'">
<table><tr>
<td align=\'left\' valign="top">
<b>Matériaux de construction : </b>'.
$prix.'<br/><b>Matériaux récupérés : </b>'.
$prix2.$conso.$prod.'<br/><b>Terrain : </b><br/>'.
$value -> terrain.'<br/>';

if(!empty($value->type) && ($value->type==2)) {
echo '<b>Défense :</b><br/>
	'.nbf(round($value -> defense, 2), 2).' '.img('images/attaques/bouclier.png', 'defense');
	}
echo	'</td>
<td>&nbsp;&nbsp;&nbsp;</td>

<td valign="top"><b>';

if(!empty($value->nbmax)) {
  echo 'Max : '.$value->nbmax.'<br/>';
}
	
echo 'Actuellement : '.$value->nb.'<br/>';

if($bat == 'atelierf' && $paquet->getlvl() > 1) {
	echo 'Minimum : '.(6*($paquet->getlvl()-1)).'<br/>';
}

echo '</b><input type="hidden" name="batiment" value="'.$bat.'" />
		<input type="hidden" name="type" value="'.$batiments[$bat]['aff'].'" />
<table><tr>
<td valign="middle"><input type="text" name="achatt" placeholder="0" size="10" class="form_retirer droite" /></td>
<td valign="middle"><div class="bouton_classique"><input class="bouton_classique2" type="submit" value="BÂTIR" name="achat" style="width:80px;"/></div></td></tr>
<tr>
<td valign="middle"><input type="text" name="ventee" placeholder="0" size="10" class="form_retirer droite" /></td>
<td valign="middle"><div class="bouton_classique"><input class="bouton_classique2" type="submit" value="DÉTRUIRE" name="vente" style="width:80px;"/></div></td></tr>
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