<div id="menu_alliance_cadre">
	<table class="centrer_tableau">
		<tr class='titre_tab'>
			<td>&nbsp;</td>
			<td>&nbsp;Pseudo&nbsp;</td>
			<td>&nbsp;Niveau&nbsp;</td>
			<td>&nbsp;XP&nbsp;</td>
			<td>&nbsp;Victoires&nbsp;</td>
			<td>&nbsp;Défaites&nbsp;</td>
			<td>&nbsp;Terrain&nbsp;</td>
			<td>&nbsp;Poste&nbsp;</td>
			<td>&nbsp;Activité&nbsp;</td>
	<?php

	if(($paquet->peut_accepter_joueur() == 0) or (!empty($nombre_futur) && ($mon_alliance -> nb_membre <= 2)))
	{
		echo "</tr>";
	}
	else {
		echo '<td>&nbsp;&nbsp;</td></tr>';
	}

	$temps_mois = time() - 20*24*3600;

	foreach ($liste_membres as $do) {
		echo '<tr id="ligne_'.$do->id.'"><td>';

		if(!empty($do->timestamp)) {
			$image='<img src="images/mb_connecter.png" alt="Joueur Connecté" /></td>
<td>';
		}
		else {
			$image='<img src="images/mb_deconnecter.png" alt="Joueur Déonnecté\" /></td><td>';
		}
		
		echo $image.'&nbsp;<a href=\'profilsjoueur-'.$do->id.'\'>';
		
		if($do->statu == 3) {
			echo '<font color=\'red\'><b>',ucfirst($do->login),'</b></font></a>';
		}
		elseif($do->statu == 2)	{
			echo '<font color=\'green\'><b>',ucfirst($do->login),'</b></font></a>';
		}
		elseif($do->statu == 4)	{
			echo '<font color=\'brown\'><b>',ucfirst($do->login),'</b></font></a>';
		}
		else {
			echo ucfirst($do->login),'</a>';
		}

		if(!empty($do->temps)) {
			echo '<font color=\'purple\' title=\''.date('d/m/y', $do->temps).'\'>*</font>';
		}

		echo '&nbsp;</td>
<td class="droite">&nbsp;'.($do->lvl).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($do->points).'&nbsp;</td>
<td class="droite">'.nbf($do->victoires).'&nbsp;</td>
<td class="droite">'.$do->defaites.'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($do->terrain).'&nbsp;</td>
<td class="gauche">&nbsp;'.stripslashes($do->nom).'&nbsp;</td>
<td>&nbsp;'.date('d/m/y', $do->date).'&nbsp;</td>';

		if ($paquet->peut_accepter_joueur() > 0) {
			if(($do->id == $paquet->getid()) or 
				 (!empty($nombre_futur) && ($mon_alliance -> nb_membre <= 2))) {
				echo '<td>&nbsp;</td></tr>';
			}
			else
			{
				if(($nombre_guerres > 0) && ($do->date > $temps_mois))
				{
					echo '<td>&nbsp;</td></tr>';
				}
				else
				{
					echo '<td><a href="javascript:expulser('.$do->id.');" onClick="if (window.confirm(\'Expulser '.$do->login.' ?\')) { this.disabled=\'true\';} else { return false; }"><img src=\'images/attaques/cross.png\' alt=\'Supr\'/></a></td></tr>';
				}
			}
		}
		else
			echo '</tr>';
	}

	?>
	</table>

	<table class="centrer_tableau">
		<tr>
			<td class="centrer" width="50%"><h2>Coffre de l'alliance</h2></td>
			<?php
				if($nombre_guerres > 0) {
					echo '<td class="centrer" width="50%"><h2>Guerres en cours</h2></td>';
				}
				elseif(!empty($liste_pactes) && sizeof($liste_pactes) > 0) {
					echo '<td class="centrer" width="50%"><h2>Pactes de l\'alliance</h2></td>';
				}
			?>
		</tr>
		<tr>
			<td>
<table class="centrer_tableau">
	<tr><td>
	<?php
		echo imress('drachme').' </td>
<td class="droite"> '.number_format(floor($mon_alliance -> drachme), 0, ',', ' ').'</td></tr>
<tr><td>'.imress('nourriture').' </td>
<td class="droite"> '.number_format(floor($mon_alliance -> nourriture), 0, ',', ' ').'</td></tr>
<tr><td>'.imress('eau').' </td>
<td class="droite"> '.number_format(floor($mon_alliance -> eau), 0, ',', ' ').'</td></tr>
<tr><td>'.imress('bois').' </td>
<td class="droite"> '.number_format(floor($mon_alliance -> bois), 0, ',', ' ').'</td></tr>
<tr><td>'.imress('fer').' </td>
<td class="droite"> '.number_format(floor($mon_alliance -> fer), 0, ',', ' ').'</td></tr>
<tr><td>'.imress('argent').' </td>
<td class="droite"> '.number_format(floor($mon_alliance -> argent), 0, ',', ' ').'</td></tr>
<tr><td>'.imress('pierre').' </td>
<td class="droite"> '.number_format(floor($mon_alliance -> pierre), 0, ',', ' ').'</td></tr>
<tr><td>'.imress('marbre').' </td>
<td class="droite"> '.number_format(floor($mon_alliance -> marbre), 0, ',', ' ').'</td></tr>
<tr><td>'.imress('raisin').' </td>
<td class="droite"> '.number_format(floor($mon_alliance -> raisin), 0, ',', ' ').'</td></tr>
<tr><td>'.imress('vin').' </td>
<td class="droite"> '.number_format(floor($mon_alliance -> vin), 0, ',', ' ').'</td></tr>
<tr><td>'.imress('or').' </td>
<td class="droite"> '.number_format(floor($mon_alliance -> gold), 0, ',', ' '); ?></td></tr>
</table>
			</td>
<?php

if($nombre_guerres > 0 && !empty($liste_guerres)) {
	echo '<td valign="top"><table class="centrer_tableau">';

	foreach($liste_guerres as $do) {
		if($do->vattaque > $do->vdefense) {
			echo '<tr>
			<td bgcolor="green">&nbsp;'.stripslashes($do->at).'&nbsp;</td>
			<td align="center">'.$do->vattaque.' - '.$do->vdefense.'</td>
			<td bgcolor="red">&nbsp;'.stripslashes($do->def).'&nbsp;</td>
			</tr>';
		}
		elseif($do->vattaque < $do->vdefense) {
			echo '<tr>
			<td bgcolor="red">&nbsp;'.stripslashes($do->at).'&nbsp;</td>
			<td align="center">'.$do->vattaque.' - '.$do->vdefense.'</td>
			<td bgcolor="green">&nbsp;'.stripslashes($do->def).'&nbsp;</td>
			</tr>';
		}
		else {
			echo '<tr>
			<td>&nbsp;'.stripslashes($do->at).'&nbsp;</td>
			<td align="center">'.$do->vattaque.' - '.$do->vdefense.'</td>
			<td>&nbsp;'.stripslashes($do->def).'&nbsp;</td>
			</tr>';
		}
	}
}
elseif(!empty($liste_pactes) && sizeof($liste_pactes) > 0) {
	echo '<td valign="top">
	<table class="centrer_tableau">';
		foreach($liste_pactes as $value) {
			echo '<tr><td>'.$value->nom.'</td></tr>';
		}
}
?>
</table>
</td>
		</tr>
</table>
</div>