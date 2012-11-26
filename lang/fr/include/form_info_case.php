<?php

if(!empty($info->id_c) && $info->id_c == $paquet->getid()) {
	if($info->id_x == $info->cap_x && $info->id_y == $info->cap_y) {
		echo '
		<div class="ligne centrer">
			<b>'.$info->drachmes.'</b> 
			<img src="images/ress/gold.png" alt="Or" title="Or en stock" />';		
		echo '</div>';
	}

	echo '<div class="ligne"><br/><table>';
	
	if($info->unite1 > 0) {
		echo '<tr>
		<td class="droite">&nbsp;'.$info->unite1.'&nbsp;</td>
		<td>&nbsp;Birème(s)</td>
		</tr>';
	}
	
	if($info->unite2 > 0) {
		echo '<tr>
		<td class="droite">&nbsp;'.$info->unite2.'&nbsp;</td>
		<td>&nbsp;Trirème(s)</td>
		</tr>';
	}
	
	if($info->unite3 > 0) {
		echo '<tr>
		<td class="droite">&nbsp;'.$info->unite3.'&nbsp;</td>
		<td>&nbsp;Quadrirème(s) lourde(s)</td>
		</tr>';
	}
	
	if($info->unite4 > 0) {
		echo '<tr>
		<td class="droite">&nbsp;'.$info->unite4.'&nbsp;</td>
		<td>&nbsp;Léviathan(s)</td>
		</tr>';
	}
	
	if($info->bat > 0) {
		echo '<tr>
		<td class="droite">&nbsp;'.$info->bat.'&nbsp;</td>
		<td>&nbsp;Tour(s) à baliste</td>
		</tr>';
	}
	
	echo '</table><br/></div>';
	print_r($info);
	if($info->id_x == $info->cap_x && $info->id_y == $info->cap_y) {
		echo '<table>';
		for($i=1;$i<=4;$i++) {
			$case = 'unite'.$i;
			echo '<tr>
			<td align=\'left\' rowspan="2" valign="top">
				<a href="#" title="'.$info->unite->$case->description.'" ><b>'.$info->unite->$case->nom.'</b></a>
			</td>
			<td class="centrer">'.$donnees4['prix'].' <img src="images/gold.png" alt="Prix en or" title="Prix en or" /></td>
			<td class="droite">'.$donnees4['attaque'].' '.img('images/dague.png', 'attaque').'</td>
			<td class="droite">'.$donnees4['defense'].' '.img('images/bouclier.png', 'défense').'</td>
			</tr>
			<tr>
			<td class="centrer" colspan="3" valign="middle">
				<form method="post" action="partie-'.$do['id_b'].'">
					<input type=\'text\' name=\'unite'.$i.'\' size=\'5\' maxlength=\'5\' class="form" placeholder="0" />
					<input type="image" name="bouton" src="fr/images/boutons/engager.png" style="margin-bottom:-6px;"/>
				</form>
			</td>
			</tr>';
		}
		echo '</table>';
	}
}
else {
	echo '<div class="ligne centrer">
			<br/><br/>
			Aucune autre information sur cette case
			<br/><br/><br/>
			</div>';
}

?>