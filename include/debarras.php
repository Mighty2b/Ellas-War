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
'avec un malus de 5%').'</div>';

echo '<div id="error"></div>';

if(true != false or $jour != 3 && $jour != 6 && $jour != 7) {
echo
 '<div class="ligne_50">
	<h2 class="centrer">'._('Poser des ressources au débarras').'</h2>
	<br/>';

if(!empty($paquet->get_answer('licence')) &&
   $paquet->get_answer('licence')->{1} > $paquet->get_infoj('timestamp')) {
	echo '<div class="erreur">';
	echo _('Votre licence finie').' '.
	     display_date($paquet->get_infoj('timestamp'),4);
	echo ' (<a href="'._('licences').'">'._('Licences').'</a>)<br/></div>';
}
else {
	echo '<div class="erreur"><a href="'._('licences').'">'._(
	     'Acheter une licence pour pouvoir vendre au debarras.').'</a><br/></div>';
}

echo '
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
	</div>';
}
else {
	echo '<div class="ligne_50">
	<h2 class="centrer">'._('Ressources du débarras').'</h2>
	<div id="debarras_lots">';

	$liste = $paquet->get_answer('liste_debarras')->{1};
	
	echo '<table><thead><tr class="centrer">
	<td></td>
	<td>Taux</td>
	<td>Quantité</td>
	<td class="none"></td>
	</tr></thead><tfoot></tfoot><tbody>';
	$i = 1;
	foreach($liste as $lot) {
		echo '<tr>
		      <td onclick="set_ress('.$i.', '.$lot->restant.')"
		          class="cursor">'.nbf($lot->restant).' '.imress($lot->ressource).'</td>
		      <td>'.nbf($lot->taux,6).'</td>
		      <td><input type="text"
		                 name="lot_'.$lot->ressource.'"
		                 placeholder="0"
		                 id="lot_'.$i.'" /></td>
		      <td><img alt="'._('Prendre').'"
		               title="'._('Prendre').'" 
		               src="images/com/cart_add.png"
		               class="cursor"
		               onclick="debarras_acheter(\''.$lot->ressource.'\',
		                                         '.$i.', '.$lot->taux.')"></td>
		      </tr>';
		$i++;
	}
	echo '</tbody></table>';
 
	echo '</div>
	    </div>';
}

echo '
	<div class="ligne_50">
	<h2 class="centrer">'._('La semaine derniere').'</h2>
	<br/>
	<table>
		<thead><tr>
			<td></td>
			<td>Taux moyen</td>
		</tr></thead>
		<tfoot></tfoot>
		<tbody>';

foreach($paquet->get_answer('archives_debarras')->{1} as $ress => $taux) {
	echo '<tr>
	<td>'.imress($ress).'</td>
	<td class="centrer">'.nbf($taux,4).'</td>
	</tr>';
}

echo '
		</tbody>
	</table>
	</div>

<script type="text/javascript">
function debarras_acheter(ress, id, taux) {
		
   var qtt = $("#lot_"+id).val();
   
   if(qtt > 0) {
	   $.ajax({
	     type: "GET",
	     url: "form/debarras_acheter.php",
	     data: "ress="+ress+"&taux="+taux+"&qtt="+qtt,
	     success: function(msg){
	     		$("#error").html(msg);
	        debarras_reload();
	     }
	   });
   }
}

function debarras_reload() {
   $.ajax({
     type: "GET",
     url: "form/debarras_reload.php",
     success: function(msg){ $("#debarras_lots").html(msg); }
   });
}

function set_ress(id, ress) {
	$("#lot_"+id).val(ress);
}

</script>';

?>