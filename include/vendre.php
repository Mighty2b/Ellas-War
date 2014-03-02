<?php

if($paquet->peut_commerce() == false) {
	echo '<div class="erreur">';
	echo display_error(95);
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
	'De plus vous aurez besoin d\'une licence pour l\'activer. '.
	'Si vous avez une licence et que vous oubliez de cocher la case, la '.
	'vente flash s\'activera automatiquement.').'</p>';
	
	echo '<p class="centrer ligne">'._(
	'Vous pouvez en échange de 5% du prix, vendre de façon anonyme.').'</p>';
	
	$paquet -> is_active_bonus_commerce();
	
	if(!empty($paquet->get_answer('licence')) &&
	   $paquet->get_answer('licence')->{1} > $paquet->get_infoj('timestamp')) {
		echo '<div class="erreur">';
		echo _('Votre licence finie').' '.
		     display_date($paquet->get_infoj('timestamp'),4);
		echo '</div>';
	}
	  
	echo '
	<div class="ligne_50"><br/>
	<form action="#" method="post" name="vendre">
	<table class="none">
	<tr>';
	if($paquet->get_answer('licence')->{1} > 0) {
		echo '<td colspan="2" class="rouge_goco centrer">'.
	_('Vente flash ?').' <a href="'._('licences').'">'._('acheter une licence').'</a>';
	}
	else {
echo '<td><b>'._('Vente flash').' (<a href="'._('licences').'">'._('Licences').'</a>)</b></td>
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
	<div class="ligne_50"><br/>';
	
echo '<div id="vente_flash_off">
		<table>
	<thead>
		<tr>
			<td></td>
			<td>'._('Mini PL').'</td>
			<td>'._('Maxi PL').'</td>
			<td>'._('Seuil').'</td>
		</tr>
	</thead>
	<tfoot></tfoot>
	<tbody>';
	$i = 0;

	$prix_commerce = $paquet->get_answer('prix_commerce')->{1};
	if(!empty($prix_commerce)) {
		foreach($prix_commerce as $valeur) {
			echo '
			<tr>
			<td align="left">&nbsp;'.$valeur->nom.'&nbsp;</td>
			<td class="droite">&nbsp;'.nbf($valeur->petittaux,4).'&nbsp;</td>
			<td class="droite">&nbsp;'.nbf($valeur->petitmax,4).'&nbsp;</td>
			<td class="droite">&nbsp;'.nbf($valeur->qtt).'&nbsp;</td>
			</tr>
			';
		}
	}
	echo '</tbody>
	</table></div>';
	
echo '<div id="vente_flash_on" style="display:none">
		<table>
	<thead>
		<tr>
			<td></td>
			<td>'._('Mini PL').'</td>
			<td>'._('Maxi PL').'</td>
			<td>'._('Seuil').'</td>
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
			<td class="droite">&nbsp;'.nbf($valeur->qtt*$coef).'&nbsp;</td>
			</tr>
			';
		}
	}
	echo '</tbody>
	</table></div>';
	
	echo '</div>
<div class="ligne"><br/><br/></div>
<script type="text/javascript">
	$("#vente_flash").change(function () {
		if( $("input[name=flash]").is(":checked") ){
			$("#vente_flash_on").show();
			$("#vente_flash_off").hide();
		}
		else {
			$("#vente_flash_on").hide();
			$("#vente_flash_off").show();
		}
	});
</script>';
}

?>