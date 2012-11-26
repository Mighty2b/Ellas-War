<?php

$paquet->display();

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

if($info->unite1 > 0 or $info->unite2 > 0 or $info->unite3 > 0 or $info->unite4 > 0) {
	echo '<div class="ligne centrer" id="btn_deplacer">
	<b>Attaquer/Déplacer</b>
	<br/>
	<form method="POST" action="partie-'.$info->id_b.'">
	<table class="centrer_tableau">
	<tr class=\'titre_tab\'>
		<td>&nbsp;Nom&nbsp;</td>
		<td>&nbsp;Attaque&nbsp;</td>
		<td>&nbsp;Défense&nbsp;</td>
		<td></td>
	</tr>';

	for($i=1;$i<=4;$i++) {
			$case = 'unite'.$i;
		if(!empty($info->$case)) {
			echo '<tr>
			<td align=\'left\'>
				&nbsp;<a href="#" title="'.$info->unite->$case->description.'" ><b>'.$info->unite->$case->nom.'</b></a>
			</td>
			<td class="droite">'.$info->unite->$case->attaque.' '.img('images/attaques/dague.png', 'attaque').'</td>
			<td class="droite">'.$info->unite->$case->defense.' '.img('images/attaques/bouclier.png', 'défense').'</td>
			<td>
				<input type=\'text\' name=\'unite'.$i.'\' size=\'5\' maxlength=\'5\' placeholder="0" class="form_retirer" id="unite'.$i.'" /> / <a class="lien_faq" href="javascript:engager_nb(\'unite'.$i.'\', '.$info->$case.');">'.$info->$case.'</a>
			</td>
			</tr>';
		}
		else {
			echo '<input type=\'hidden\' name=\'unite'.$i.'\' value="0" />';
		}
		$i++;
	}
	echo '</table><br/>
	<input type="hidden" name="depart" value="'.$info->id_x.';'.$info->id_y.'" />
	Destination : <select name="destination" class="form_retirer" id="destination">';

	//On récupere les cases des environs
	foreach($info->possible as $case) {
			echo '<option value="'.$case->x.';'.$case->y.'">&nbsp;'.$case->x.';'.$case->y.'&nbsp;</option>';
	}
	echo '</select><br/><br/>
<div class="bouton_classique"><input class="bouton_classique2" 
																		 type="button" 
																		 value="Envoyer" 
																		 type="image" 
																		 src="fr/images/boutons/envoyer.png" 
																		 onclick="deplacer_unite('.$_GET['btn'].', '.$_GET['x'].', '.$_GET['y'].');"/></div>
	</form>
	</div>';
	}
	
	if($info->id_x == $info->cap_x && $info->id_y == $info->cap_y) {
		echo '<table>';
		for($i=1;$i<=4;$i++) {
			$case = 'unite'.$i;
			echo '<form method="post" action="partie-'.$info->id_b.'"><tr>
			<td align=\'left\' valign="middle">
				<a href="#" title="'.$info->unite->$case->description.'" ><b>'.$info->unite->$case->nom.'</b></a>
			</td>
			<td class="centrer">
				'.$info->unite->$case->prix.' <img src="images/ress/gold.png" alt="Prix en or" title="Prix en or" />
			</td>
			<td class="droite">'.$info->unite->$case->attaque.' '.img('images/attaques/dague.png', 'attaque').'</td>
			<td class="droite">'.$info->unite->$case->defense.' '.img('images/attaques/bouclier.png', 'défense').'</td>
			<td class="centrer" valign="middle">	
					<input id="engager_unite'.$i.'" type=\'text\' name=\'unite'.$i.'\' size=\'5\' maxlength=\'5\' class="form_retirer" placeholder="0" />
			</td><td>
<div class="bouton_classique"><input class="bouton_classique2" type="button" value="Engager" type="image" src="fr/images/boutons/envoyer.png" onclick="achat_unite('.$_GET['btn'].', '.$_GET['x'].', '.$_GET['y'].', \''.$case.'\');" /></div>
				
			</td>
			</tr></form>';
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