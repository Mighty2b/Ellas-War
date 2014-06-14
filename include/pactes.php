<?php

include('include/menu_monalliance.php');

$tp = time() - 2*30*24*3600;

if(sizeof($liste_pactes) > 0) {
	echo'<center>
	<h1>'._('Pactes').'</h1>
	<br/>'._('Signer un pacte vous coutera').' '.
	nbf(250000).' '.imress('drachme');

	echo'<br/><br/><table>
	<thead>
	<tr class=\'titre_tab\'>
<td>'._('Nom').'</td>
<td>'._('Chef').'</td>
<td>'._('Signature').'</td>';

	if($paquet->get_infoj('droits_alliance')->pacte > 0) {
		echo '<td>'._('Action(s)').'</td>';
	}
	
	echo '</tr></thead><tfoot></tfoot><tbody>';
	
	if(!empty($liste_pactes)) {
	foreach($liste_pactes as $do) {
		if(empty($do->date)) {
			$signature = _('En cours');
		}
		else {
			$signature = display_date($do->date,2);
		}

		if($do->demandeur == $mon_alliance->id) {
			echo '<tr>
	<td>&nbsp;<a href="'._('profilsalliance').'-'.$do->id.'">'.
	stripslashes($do->nom).'</a>&nbsp;</td>
	<td>&nbsp;<a href="'._('profilsjoueur').'-'.
	$do->idchef.'">'.$do->loginchef.'</a>&nbsp;</td>
	<td>&nbsp;'.$signature.'&nbsp;</td>';
			if(empty($do->date)) {
				if($paquet->get_infoj('droits_alliance')->pacte > 0)	{
					echo '<td>&nbsp;<a href="javascript:gestion_pacte('.$do->pacte_id.', \'signer\');">'._('Signer').'</a>&nbsp;
										&nbsp;<a href="javascript:gestion_pacte('.$do->pacte_id.', \'refuser\');">'._('Refuser').'</a>&nbsp;</td></tr>';
				}
				else {
					echo '<td>&nbsp;&nbsp;</td></tr>';
				}
			}
			else
			{
				if($paquet->get_infoj('droits_alliance')->pacte > 0) {
					echo '<td>&nbsp;<a href="javascript:gestion_pacte('.$do->pacte_id.', \'briser\');">'._('Annuler').'</a>&nbsp; ';
				
					if((empty($liste_fusion) or sizeof($liste_fusion) == 0) && $paquet->get_infoj('id') == $mon_alliance->id_chef && ($tp > $do->date)) {
						echo '<a href="javascript:demander_fusion('.$do->id.');">'._('Demander une fusion').'</a>';
					}
				
					echo '&nbsp;</td></tr>';
				}
				else {
					echo '<td>&nbsp;&nbsp;</td></tr>';
				}
			}
		}
		else
		{
			echo '<tr>
	<td>&nbsp;<a href="'._('profilsalliance').'-'.$do->id.'">'.stripslashes($do->nom).'</a>&nbsp;</td>
	<td>&nbsp;<a href="'._('profilsjoueur').'-'.$do->idchef.'">'.$do->loginchef.'</a>&nbsp;</td>
	<td>&nbsp;'.$signature.'&nbsp;</td>';
			if(empty($do->date))
			{
				if($paquet->get_infoj('droits_alliance')->pacte > 0)
					echo '<td>&nbsp;<a href="javascript:gestion_pacte('.$do->pacte_id.', \'annuler\');">'._('Annuler').'</a>&nbsp;</td></tr>';
				else
					echo '<td>&nbsp;&nbsp;</td></tr>';
			}
			else
			{
				if($paquet->get_infoj('droits_alliance')->pacte > 0) {
					echo '<td>&nbsp;<a href="javascript:gestion_pacte('.$do->pacte_id.', \'briser\');">'._('Annuler').'</a>&nbsp;';

					if((empty($liste_fusion) or sizeof($liste_fusion) == 0) && $paquet->get_infoj('id') == $mon_alliance->id_chef && ($tp > $do->date)) {
						echo '<a href="javascript:demander_fusion('.$do->id.');">'._('Demander une fusion').'</a>';
					}
				
					echo '&nbsp;</td></tr>';
				}
				else {
					echo '<td>&nbsp;&nbsp;</td></tr>';
				}
			}
		}
	}
	}
	echo '</tbody></table><br/><br/>';
	
	if(!empty($liste_fusion) && sizeof($liste_fusion) > 0) {
		foreach($liste_fusion as $k => $demande) {
			echo '<div class="ligne erreur">'._('Demande de fusion avec').' '.$demande->nom.' (<a href="javascript:annuler_fusion('.$demande->destination.');">'._('Annuler').'</a>)</div>';
		}
	}
	
	if(!empty($liste_fusion2) && sizeof($liste_fusion2) > 0) {
		foreach($liste_fusion2 as $k => $demande) {
			echo '<div class="ligne erreur">'._('Demande de fusion de l\'alliance').' '.$demande->nom.' (<a>'._('Accepter').'</a> - <a href="javascript:annuler_fusion('.$demande->source.');">'._('Refuser').')</a></div>';
		}
	}
	
}
else {
	echo '<div class="ligne erreur centrer"><h2>'._('Vous n\'avez aucun pacte en cours').'</h2></div>';
}

echo '
<script type="text/javascript">
function gestion_pacte(id, action) {
	$.ajax({
		type: "GET",
		url: "form/gestion_pacte.php",
		data: "id="+id+"&action="+action,
		success: function(msg){ location.reload(); }
	});
}

function demander_fusion(id) {
	$.ajax({
		type: "GET",
		url: "form/demander_fusion.php",
		data: "id="+id,
		success: function(msg){ location.reload(); }
	});
}

function annuler_fusion(id) {
	$.ajax({
		type: "GET",
		url: "form/annuler_fusion.php",
		data: "id="+id,
		success: function(msg){ location.reload(); }
	});
}
</script>';

?>