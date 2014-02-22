<?php

$jour = date('N');

if($jour < 6) {
	echo '<h2 class="centrer">'._('Débarras fermé').'</h2>';
}
else {
	echo '<h2 class="centrer">'._('Débarras ouvert').'</h2>';
}

$paquet->error('vendre_debarras', 1);

echo '<div class="ligne_80 justify">'._(
'Le débarras accepte les dépôts en ressources le lundi, mardi, mercredi '.
'et jeudi. Il les met en vente le mercredi, samedi et dimanche. Les ' .
'ressources au même taux sont rassemblée en un seul gros lot et seul le lot '.
'ayant le taux le plus faible est affiché. Lors d\'un achat, Vous pouvez '.
'choisir la quantité de ressources que vous désirez.').
' '._(
'Le dimanche soir à minuit, les invendus reviennent sur les comptes des joueurs '.
'avec un malus de 5%').'</div>

	<div class="ligne_50">
	<h2 class="centrer">'._('Poser des ressources au débarras').'</h2>
	<br/>
	<form action="#" method="post" name="vendre">
	<table class="none">
	<tr>
		<td align="left">&nbsp;<b>'._('Quantité').' </b>&nbsp;</td>
		<td align="left"><input name="nbressource" 
		                        class="form_retirer" 
		                        required="required" ></td>
	</tr>
	<tr>
		<td align="left">&nbsp;<b>'._('Taux').' </b>&nbsp;</td>
		<td align="left"><input name="prixressource" 
		                        class="form_retirer" 
		                        required="required" ></td>
	</tr>
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
	 </select></td></tr>	 
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
	<div class="ligne_50">
	<h2 class="centrer">'._('La semaine derniere').'</h2>
	<br/>
	<table>
		<thead><tr>
			<td></td>
			<td>Taux moyen</td>
		</tr></thead>
		<tfoot></tfoot>
		<tbody>
		</tbody>
	</table>
	</div>';

?>