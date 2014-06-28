<?php

include('include/menu_monalliance.php');

if($paquet->get_infoj('periode_essai') > 0) {
	echo '<div class="ligne rouge_goco centrer">'._(
	'Vous êtes en période d\'essai, vous n\'avez donc pas accès aux attaques en guerre').
	'</div>
	<div class="clear"></div>';
}

echo '
<div>
	<table>
		<thead><tr>
			<td></td>
			<td>'._('Niveau').'</td>
			<td>'._('XP').'</td>
			<td>'._('Victoires').'</td>
			<td>'._('Défaites').'</td>
			<td>'._('Terrain').'</td>
			<td>'._('Poste').'</td>
			<td>'._('Activité').'</td>';

	if(($paquet->get_infoj('droits_alliance')->accepter_joueur == 0) or 
	   (!empty($nombre_futur) && ($mon_alliance -> nb_membre <= 2)) or
	   ($mon_alliance -> nb_membre == 1)) {
		echo '</tr></thead>';
	}
	else {
		echo '<td>&nbsp;&nbsp;</td></tr></thead>';
	}

	echo '<tfoot></tfoot><tbody>';

	$temps      = time();
	$temps_mois = $temps - 20*24*3600;

	foreach ($liste_membres as $do) {
		echo '<tr id="ligne_'.$do->id.'"><td>';

		if(!empty($do->timestamp)) {
			$image='<img src="images/utils/mb_connecter.png"
			             alt="'._('Joueur Connecté').'" />';
		}
		else {
			$image='<img src="images/utils/mb_deconnecter.png"
			             alt="'._('Joueur Déconnecté').'" />';
		}
		
		switch($do->statu) {
			case 2:
				$classe='joueur_manque';
				$title=ucfirst($do->login).', '._('bloqué pour manque de ressources');
			break;
			
			case 3:
				$classe='joueur_bloque';
				$title=ucfirst($do->login).', '._('bloqué par le staff');
			break;
			
			case 4:
				$classe='joueur_pause';
				$title=ucfirst($do->login).', '._('en pause');
			break;
			
			default:
				$classe='';
				$title=ucfirst($do->login);
			break;
		}
		
		echo $image.'&nbsp;<a href="'._('profilsjoueur').'-'.$do->id.'"
		     title="'.$title.'"
		'.(!empty($classe)?'class="'.$classe.'"':'').'>'.ucfirst($do->login),'</a>';

		if(!empty($do->temps)) {
			echo '<font color="purple" title="'.date('d/m/y', $do->temps).'">*</font>';
		}

		if(!empty($do->periode_essai)) {
			echo '<font color="lawngreen" title="'._('Période d\'essai').'">*</font>';
		}
		
		if(empty($do->periode_essai)) {
			if(!empty($do->greve)) {
				echo '<font color="red" title="'._('En grève').'">*</font>';
			}
		}
		elseif($paquet->get_infoj('droits_alliance')->accepter_joueur > 0 && $do->periode_essai > $temps) {
			echo '
			<img src="images/alliance/adept_reinstall.png"
			     class="cursor"
			     onClick="if (window.confirm(\''.addslashes(_('Valider la période d\'essai')).' ?\')) { valider_periode('.$do->id.') } else { return false; }"
			     id="periode_'.$do->id.'"
			     alt="'._('Valider la période d\'essai').'"
			     title="'._('Valider la période d\'essai').'"  />';			
		}

		echo '&nbsp;</td>
<td class="droite">&nbsp;'.($do->lvl).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($do->points).'&nbsp;</td>
<td class="droite">'.nbf($do->victoires).'&nbsp;</td>
<td class="droite">'.$do->defaites.'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($do->terrain).'&nbsp;</td>
<td class="gauche">&nbsp;'.stripslashes($do->nom).'&nbsp;</td>
<td>&nbsp;'.display_date($do->date,2).'&nbsp;</td>';

		if($paquet->get_infoj('droits_alliance')->accepter_joueur > 0 &&
		   ($mon_alliance -> nb_membre > 1)) {
		  
		  if($do->id != $paquet->get_infoj('id') && $do->periode_essai > $temps) {
					echo '<td><a href="javascript:expulser('.$do->id.');"
					             onClick="if (window.confirm(\''._('Expulser').' '.$do->login.' ?\')) { this.disabled=\'true\';} else { return false; }"
					             title="'._('Expulser').' '.$do->login.'"><img src="images/attaques/cross.png"
					                                                           alt="'._('Expulser').'"/></a></td></tr>';    
		  }
		  elseif(($do->id == $paquet->get_infoj('id')) or 
				 (!empty($nombre_futur) && ($mon_alliance -> nb_membre <= 2))) {
				echo '<td>&nbsp;</td></tr>';
			}
			else
			{
				if(($nombre_guerres > 0) && ($do->date > $temps_mois))
				{
					if(empty($do->temps)) {
						echo '<td><a href="javascript:expulser_urgence('.$do->id.');"
						             onClick="if (window.confirm(\''.addslashes(_('Utiliser l\'expulsion d\'urgence sur').' '.$do->login).' ?\')) { this.disabled=\'true\';} else { return false; }"><img src="images/attaques/cross.png"
						             alt="'._('Expulsion d\'urgence').'"
						             title="'._('Utiliser l\'expulsion d\'urgence sur').' '.$do->login.'"/></a></td></tr>';
					}
					else {
						echo '<td></td>';
					}
				}
				else
				{
					echo '<td><a href="javascript:expulser('.$do->id.');"
					             onClick="if (window.confirm(\''.addslashes(_('Expulser').' '.$do->login).' ?\')) { this.disabled=\'true\';} else { return false; }"><img src="images/attaques/cross.png"
					                                                                                                                                          alt="'._('Expulser').'"/></a></td></tr>';
				}
			}
		}
		else {
			echo '</tr>';
		}
	}

echo '</tbody></table>

	<table class="none">
		<tr>';
		
		if($paquet->get_infoj('droits_alliance')->voir_coffre > 0) {
			echo '<td class="centrer"
			          width="50%"><h2>'._('Coffre de l\'alliance').'</h2></td>';
		}
		
		if($nombre_guerres > 0) {
			echo '<td class="centrer" width="50%">
			      <h2>'._('Guerres en cours').'</h2></td>';
		}
		elseif(!empty($liste_pactes) && sizeof($liste_pactes) > 0) {
			echo '<td class="centrer"
			          width="50%"><h2>'._('Pactes de l\'alliance').'</h2></td>';
		}

echo '</tr>
		<tr>';

if($paquet->get_infoj('droits_alliance')->voir_coffre > 0) {
	echo '
			<td>
<table class="none">
	<tr><td>'.imress('drachme').' </td>
<td class="droite"> '.nbf($mon_alliance -> drachme).'</td></tr>
<tr><td>'.imress('nourriture').' </td>
<td class="droite"> '.nbf($mon_alliance -> nourriture).'</td></tr>
<tr><td>'.imress('eau').' </td>
<td class="droite"> '.nbf($mon_alliance -> eau).'</td></tr>
<tr><td>'.imress('bois').' </td>
<td class="droite"> '.nbf($mon_alliance -> bois).'</td></tr>
<tr><td>'.imress('fer').' </td>
<td class="droite"> '.nbf($mon_alliance -> fer).'</td></tr>
<tr><td>'.imress('argent').' </td>
<td class="droite"> '.nbf($mon_alliance -> argent).'</td></tr>
<tr><td>'.imress('pierre').' </td>
<td class="droite"> '.nbf($mon_alliance -> pierre).'</td></tr>
<tr><td>'.imress('marbre').' </td>
<td class="droite"> '.nbf($mon_alliance -> marbre).'</td></tr>
<tr><td>'.imress('raisin').' </td>
<td class="droite"> '.nbf($mon_alliance -> raisin).'</td></tr>
<tr><td>'.imress('vin').' </td>
<td class="droite"> '.nbf($mon_alliance -> vin).'</td></tr>
<tr><td>'.imress('or').' </td>
<td class="droite"> '.nbf($mon_alliance -> gold).'</td></tr>
</table>
			</td>';
	}
	
if($nombre_guerres > 0 && !empty($liste_guerres)) {
	echo '<td valign="top"><table class="none">';

	foreach($liste_guerres as $do) {
		if($do->vattaque > $do->vdefense) {
			echo '<tr>
			<td><a class="sousligne"
			       href="profilsalliance-'.$do->idattaque.'">'.
			stripslashes($do->at).'</a></td>
			<td align="center">&nbsp;&nbsp;'.
			$do->vattaque.' - '.$do->vdefense.
			'&nbsp;&nbsp;</td>
			<td><a href="profilsalliance-'.$do->idefense.'">'.
			stripslashes($do->def).'</a></td>
			</tr>';
		}
		elseif($do->vattaque < $do->vdefense) {
			echo '<tr>
			<td><a href="profilsalliance-'.$do->idattaque.'">'.
			stripslashes($do->at).'</a></td>
			<td align="center">&nbsp;&nbsp;'.
			$do->vattaque.' - '.$do->vdefense.
			'&nbsp;&nbsp;</td>
			<td><a class="sousligne"
			       href="profilsalliance-'.$do->idefense.'">'.
			stripslashes($do->def).'</a></td>
			</tr>';
		}
		else {
			echo '<tr>
			<td><a href="profilsalliance-'.$do->idattaque.'">'.
			stripslashes($do->at).'</a></td>
			<td align="center">&nbsp;&nbsp;'.
			$do->vattaque.' - '.$do->vdefense.
			'&nbsp;&nbsp;</td>
			<td><a href="profilsalliance-'.$do->idefense.'">'.
			stripslashes($do->def).'</a></td>
			</tr>';
		}
	}
	echo '</table></td>';
}
elseif(!empty($liste_pactes) && sizeof($liste_pactes) > 0) {
	echo '<td valign="top">
	<table class="centrer_tableau">';
		foreach($liste_pactes as $value) {
			echo '<tr><td>'.$value->nom.'</td></tr>';
		}
	echo '</td>';
}

echo '
		</tr>
</table>
</div>

<script type="text/javascript">
function expulser(id) {
	$.ajax({
		type: "GET",
		url: "form/expulser_membre.php",
		data: "id="+id
	});
	$("#ligne_"+id).hide("slow");
}

function expulser_urgence(id) {
	$.ajax({
		type: "GET",
		url: "form/expulser_urgence_membre.php",
		data: "id="+id
	});
}

function valider_periode(id) {
   $.ajax({
     type: "GET",
     url: "form/valider_periode.php",
     data: "joueur="+id,
     success: function(msg){ $("#periode_"+id).hide(); $("#periode2_"+id).hide(); }
   });
}
</script>';

?>
