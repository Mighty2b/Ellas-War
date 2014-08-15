<?php

if($paquet->peut_commerce() == false) {
	echo '<div class="erreur">';
	echo display_error(95);
	echo '</div>';
}
elseif($paquet->get_answer('mes_ventes')->{3} == true) {
	echo '<div class="erreur">';
	echo display_error(228);
	echo '</div>';
}
else {

	echo '﻿<h1>'._('Vendre').'</h1>';
	
	$paquet->error('vendre_lot');
	
	echo '
	<p class="ligne_80 justifier"><br/>'._(
	'Lors d\'une vente vous avez deux choix pour le prix de vos ressources. '.
	'Le prix par taux représente le prix d\'une unité de ressource de votre lot, '.
	'le prix total par contre sera le prix pour le lot en entier.').'<br/>
	'._('La vente flash vous permet de vendre un lot plus gros que la quantité '.
	'maximale autorisée. '.
	'En contre-partie celui-ci ne restera sur le commerce que 12 heures. '.
	'De plus vous aurez besoin d\'une licence pour l\'activer.').'</p>';
	
	echo '<p class="centrer ligne">'._(
	'Vous pouvez en échange de 5% du prix, vendre de façon anonyme.').'</p>';
	
	$paquet -> is_active_bonus_commerce();
	$licence = $paquet->get_answer('licence');
	
	if(!empty($licence) &&
	   $licence->{1} > $paquet->get_infoj('timestamp')) {
		echo '<div class="erreur">';
		echo _('Votre licence finit').' '.
		     display_date($licence->{1},4);
		echo '</div>';
	}
	  
	echo '
	<div class="ligne_50"><br/>
	<form action="#" method="post" name="vendre">
	<table class="none">
	<tr>';
	
	if(empty($licence) or $licence->{1} < $paquet->get_infoj('timestamp')) {
		echo '<td colspan="2" class="rouge_goco centrer gras">'.
	_('Vente flash').' ? <a href="'._('licences').'">'._('acheter une licence').'</a>';
	}
	else {
echo '<td><b>'._('Vente flash').' (<a href="'._('licences').'" 
                                      class="rouge_goco">'._('Licences').'</a>)</b></td>
	 	<td><input type="checkbox" name="flash" id="vente_flash">';
	}

	echo '</td></tr>
	<tr>
		<td align="left">&nbsp;<b>'._('Quantité').' </b>&nbsp;</td>
		<td align="left"><input name="nbressource" 
		                        class="form_retirer" 
		                        required="required" ></td>
	</tr>
	<tr>
		<td align="left">&nbsp;<b>'._('Prix').' </b>&nbsp;</td>
		<td align="left"><input name="prixressource" 
		                        class="form_retirer" 
		                        required="required" ></td>
	</tr>
	<tr><td align="left">&nbsp;<b>'._('Type').' </b>&nbsp;</td><td align="left">
	<select type="text" name="vente" class="form_retirer">
	<option value="taux"">&nbsp;'._('Prix par taux').'&nbsp;</option>
	<option value="total"">&nbsp;'._('Prix total').'&nbsp;</option>
	 </select></td></tr>
	 <tr><td align="left">&nbsp;<b>'._('Ressource').'</b>&nbsp;</td><td align="left">
	 <select type="text" name="type" class="form_retirer">

	 <option value="nourriture">&nbsp;'._('Nourriture').'&nbsp;</option>
	 <option value="eau">&nbsp;'._('Eau').'&nbsp;</option>
	 <option value="bois">&nbsp;'._('Bois').'&nbsp;</option>
	 <option value="fer">&nbsp;'._('Fer').'&nbsp;</option>
	 <option value="argent">&nbsp;'._('Argent').'&nbsp;</option> 
	 <option value="pierre">&nbsp;'._('Pierre').'&nbsp;</option>
	 <option value="marbre">&nbsp;'._('Marbre').'&nbsp;</option>
	 <option value="raisin">&nbsp;'._('Raisin').'&nbsp;</option>
	 <option value="vin">&nbsp;'._('Vin').'&nbsp;</option>
	 <option value="gold">&nbsp;'._('Or').'&nbsp;</option>
	 <option value="faveur">&nbsp;'._('Faveur').'&nbsp;</option>
	 </select></td></tr>
	 <tr>
	 	<td align="left">&nbsp;<b>'._('Nombre de lots').'</b>&nbsp;</td>
	 	<td align="left">
	<select type="text" name="cle" class="form_retirer">';

	if(in_array('hermes', $paquet -> get_infoj('temples')))
		$max = 10;
	else
		$max = 8;
	
	$i=1;

	for($i=1; $i<=$max;$i++)
		echo '<option value=\''.$i.'\'>&nbsp;'.$i.'&nbsp;</option>';

echo '
	 </select></td></tr>
	 
	 <tr>
	 	<td><b>'._('Vendre anonymement').'</b></td>
	 	<td><input type="checkbox" name="anonyme"></td>
	 </tr>	 
	 </table>
	<br/>';

	if($paquet->get_infoj('lvl') > 0) {
		echo '<div class="bouton_classique"><input type="submit" 
		                                           name="achatforum" 
		                                           value="'._('Vendre').'"/></div>';
	}
	else {
		echo '<font color="red">'._(
		'Vous pourrez vendre des lots à partir du niveau 1').'</font>';
	}
	
echo '</form>
	</div>
	<div class="ligne_50"><br/>	

		<table>
	<thead>
		<tr>
			<td></td>
			<td>'._('Mini PL').'</td>
			<td>'._('Maxi PL').'</td>
			<td>'._('Seuil').'</td>
			<td>'._('Seuil Flash').'</td>
		</tr>
	</thead>
	<tfoot></tfoot>
	<tbody>';
	$i = 0;

	$prix_commerce = $paquet->get_answer('prix_commerce')->{1};
	if(!empty($prix_commerce)) {
		foreach($prix_commerce as $valeur) {
			if($valeur->nom == 'Faveur') {
				$coef = 1;
			}
			else {
				$coef = 5;
			}
			echo '
			<tr>
			<td align="left">&nbsp;'.$valeur->nom.'&nbsp;</td>
			<td class="droite">&nbsp;'.nbf($valeur->petittaux,4).'&nbsp;</td>
			<td class="droite">&nbsp;'.nbf($valeur->petitmax,4).'&nbsp;</td>
			<td class="droite">&nbsp;'.nbf($valeur->qtt).'&nbsp;</td>
			<td class="droite">&nbsp;'.nbf($valeur->qtt*$coef).'&nbsp;</td>
			</tr>
			';
		}
	}
	echo '</tbody>
	</table>
	</div>
<div class="ligne centrer"><br/><br/>
	<a class="rouge_goco gras"
	   href="'._('licences').'">'.ucfirst(_('acheter une licence')).'</a></div>';

}

?>