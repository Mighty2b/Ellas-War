<?php

include('include/menu_monalliance.php');

if($paquet->get_infoj('droits_alliance')->voir_coffre > 0) {
echo '<div id=\'menu_affaires\'
           class="gauche">
<h1>'._('Stocks').'</h1><br/>
<table class="none">
<tr><td>'.imress('drachme').' </td>
<td class="droite"> '.nbf($mon_alliance->drachme).'</td></tr>
<tr><td>'.imress('nourriture').' </td>
<td class="droite"> '.nbf($mon_alliance->nourriture).'</td></tr>
<tr><td>'.imress('eau').' </td>
<td class="droite"> '.nbf($mon_alliance->eau).'</td></tr>
<tr><td>'.imress('bois').' </td>
<td class="droite"> '.nbf($mon_alliance->bois).'</td></tr>
<tr><td>'.imress('fer').' </td>
<td class="droite"> '.nbf($mon_alliance->fer).'</td></tr>
<tr><td>'.imress('argent').' </td>
<td class="droite"> '.nbf($mon_alliance->argent).'</td></tr>
<tr><td>'.imress('pierre').' </td>
<td class="droite"> '.nbf($mon_alliance->pierre).'</td></tr>
<tr><td>'.imress('marbre').' </td>
<td class="droite"> '.nbf($mon_alliance->marbre).'</td></tr>
<tr><td>'.imress('raisin').' </td>
<td class="droite"> '.nbf($mon_alliance->raisin).'</td></tr>
<tr><td>'.imress('vin').' </td>
<td class="droite"> '.nbf($mon_alliance->vin).'</td></tr>
<tr><td>'.imress('or').' </td>
<td class="droite"> '.nbf($mon_alliance->gold).'</td></tr>
</table>
</div>
<div id=\'corps_affaires\'>';

}
else {
	echo '<div class="ligne">';
}

echo '<center>';

echo '<h1>'._('Demander').'</h1><br/>
<form action=\'coffre\' method=\'post\' >
<input type=\'text\' name=\'qtt\' required="required"> 
<select name=\'choix\' >
    <option value=\'drachme\'>'._('Drachmes').'</option>';

	if($mon_alliance->level >= 2)
		echo '<option value=\'nourriture\'>'._('Nourriture').'</option>
	<option value=\'eau\'>'._('Eau').'</option>
	<option value=\'bois\''._('>Bois').'</option>
	<option value=\'fer\'>'._('Fer').'</option>
	<option value=\'argent\'>'._('Argent').'</option>
	<option value=\'pierre\'>'._('Pierre').'</option>
	<option value=\'marbre\'>'._('Marbre').'</option>
	<option value=\'raisin\'>'._('Raisin').'</option>
	<option value=\'vin\'>'._('Vin').'</option>
	<option value=\'gold\'>'._('Or').'</option>';
	
	echo '</select>
	<br/><br/>
	<div class="bouton_classique"><input type="submit"
	                                     name="'._('Demander').'" 
	                                     value="'._('Demander').'"/></div>
	</form>';

	if($paquet->get_infoj('droits_alliance')->accepter_demande > 0) {
		$liste_demandes = $paquet->get_answer('coffre_alliance')->{3};

		if(sizeof($liste_demandes) > 0) {
			echo '<br/><br/><b>'._('Demandes en cours').' : </b>';
			foreach($liste_demandes as $de) {
				echo '<div id="cadre_demande_'.$de->id.'">
				'.number_format($de->nombre).' '.imress($de->type).
				' '._('par').' '.$de->login.' '.display_date($de->date_d,1);

				if($de->demande != $paquet->get_infoj('id')) {
					echo ' <a href="javascript:accepter_demande('.$de->id.', 1);">'.
					     img('images/alliance/adept_reinstall.png', _('Accepter')).'</a>
									<a href="javascript:accepter_demande('.$de->id.', 2);">'.
					     img('images/alliance/agt_uninstall-product.png', _('Refuser')).'</a>';
				}
				else {
					echo ' <a href="javascript:accepter_demande('.$de->id.', 3);">'.
					img('images/alliance/agt_uninstall-product.png', _('Annuler')).'</a>';
				}
				echo '</div>';
			}
		}
	}
	
	$liste_demande_moi = $paquet->get_answer('coffre_alliance')->{2};

	if(!empty($liste_demande_moi) && sizeof($liste_demande_moi) > 0)	{
		echo '<br/><br/><b>'._('Mes demandes en cours').' : </b>';
	
		foreach($liste_demande_moi as $cc => $de) {
			echo '<br/>'.nbf($de->nombre).' '.imress($de->type).' '.
			display_date($de->date_d,1).
			' <a href="javascript:accepter_demande('.$de->id.', 3);">'.
			img('images/alliance/agt_uninstall-product.png', _('Annuler')).'</a>';
		}
	}

echo '</div>

<script type="text/javascript">
function accepter_demande(demande, action) {
   $.ajax({
     type: "GET",
     url: "form/coffre_demande.php",
     data: "demande="+demande+"&action="+action,
     success: function(msg){ $("#cadre_demande_"+demande).hide("slow");}
   });
}
</script>';

?>