<?php

$paquet->is_active_bonus_xp();

$writeniveau="<a href=\"Attaquer-$page_num-niveau-$recupcible".constr_get('recherche', $recherche)."\" class=\"titre_tab\">Niveau</a>";
$writevictoire="<a href=\"Attaquer-$page_num-victoire-$recupcible".constr_get('recherche', $recherche)."\" class=\"titre_tab\">Victoire</a>";
$writedefaite="<a href=\"Attaquer-$page_num-defaite-$recupcible".constr_get('recherche', $recherche)."\" class=\"titre_tab\">Défaite</a>";
$writeterrain="<a href=\"Attaquer-$page_num-terrain-$recupcible".constr_get('recherche', $recherche)."\" class=\"titre_tab\">Terrain</a>";
$writepseudo="<a href=\"Attaquer-$page_num-login-$recupcible".constr_get('recherche', $recherche)."\" class=\"titre_tab\">Pseudo</a>";
$writexp="<a href=\"Attaquer-$page_num-xp-$recupcible".constr_get('recherche', $recherche)."\" class=\"titre_tab\">XP</a>";

if($par == 'niveau') {
	$writeniveau='<font color=\'#77461B\'>Niveau</font>';
}
elseif($par == 'victoire') {
	$writevictoire='<font color=\'#77461B\'>Victoire</font>';
}
elseif($par == 'defaite') {
	$writedefaite='<font color=\'#77461B\'>Défaite</font>';
}
elseif($par == 'terrain') {
	$writeterrain='<font color=\'#77461B\'>Terrain</font>';
}
elseif($par == 'login') {
	$writepseudo='<font color=\'#77461B\'>Pseudo</font>';
}
elseif($par == 'xp') {
	$writexp='<font color=\'#77461B\'>XP</font>';
}
else {
	$par = 'niveau';
	$writeniveau='<font color=\'#77461B\'>Niveau</font>';
}

$nb_ate = ($paquet -> getlvl()-1)*6;

$num = $page_num - 3;
$numl = $page_num + 2;

if($num < 1) {
	$num = 1;
}

echo '
<div id="cadre_milieu_petit">
	<div id="cadre_haut_petit"><img src="images/attaques/cross.png" alt="Fermer" title="Fermer" class="supr_messagerie" style="margin-top:10px;margin-right:10px;" onclick="javascript:fermer_pacte();"/></div>
	<div id="cadre_centre_petit">
	
	</div>
	<div id="cadre_bas_petit"></div>
</div>';

if($nombreDePages > 1) {
	if($numl > $nombreDePages) {
		$numl = $nombreDePages;
	}
	
	echo '<div class="ligne centrer">';
	
	if($num > 1) {
		echo '<a href="Attaquer-1-'.$par.constr_get('recherche', $recherche).'">1</a>  ... ';
	}
	
	if(empty($recupcible)) {
		for ($i = $num ; $i <= $numl ; $i++) {
			if($page_num == $i) {
				echo '<b>'.$i.'</b> ';
			}
			else {
				echo '<a href="Attaquer-' . $i . '-'.$par.constr_get('recherche', $recherche).'">' . $i . '</a> ';
			}
		}
		
		if($numl < $nombreDePages) {
			echo '... <a href="Attaquer-'.$nombreDePages.'-'.$par.constr_get('recherche', $recherche).'">'.$nombreDePages.'</a> ';
		}
	}
	else {
		for ($i = $num ; $i <= $numl ; $i++) {
			if($page_num == $i) {
				echo '<b>'.$i.'</b> ';
			}
			else {
				echo '<a href="Attaquer-' . $i . '-'.$par.'-'.$recupcible.constr_get('recherche', $recherche).'">' . $i . '</a> ';
			}
		}

		if($numl < $nombreDePages) {
			echo '... <a href="Attaquer-'.$nombreDePages.'-'.$par.'-'.$recupcible . constr_get('recherche', $recherche).'">'.$nombreDePages.'</a> ';
		}
	}
	echo '</div>';
}

?>
<div class="ligne centrer cadre">
<form action="#" method="post">
<input type='hidden' name='page' value='liste' />
<input type="text" name="recherche" class="form_retirer cadre" style="margin-top:3px;margin-left:48px;margin-right:5px;" required="required" /> <div class="bouton_classique cadre"><input class="bouton_classique2" type="submit" value="RECHERCHER" name="rechercher" /></div>
</form>
	<div style="float:right;position:relative;margin-right:50px;">
		<a href="Diamant"><img src="images/attaques/diamant.png" alt="Diamant des dieux" title="Diamant des dieux" /></a>
	</div>
</div>
<?php

$paquet->display();

if(!empty($liste_guerres) && sizeof($liste_guerres) > 0) {
	echo '<div class="ligne centrer cadre">';
	if(sizeof($liste_guerres) > 1) {
		echo '<b>Guerres en cours :</b> ';
	}
	else {
		echo '<b>Guerre en cours :</b> ';
	}
	
	foreach($liste_guerres as $all) {
		echo '<a href="Attaquer-1-niveau-'.$all->id.constr_get('recherche', $recherche).'">'.$all->nom.'</a> ';
	}
	echo '</div>';
}

echo '<br/>';

if(empty($liste) or sizeof($liste) == 0) {
	echo '<br/><div class="centrer"><br/><br/><br/><b>Votre liste d\'attaque est vide</b></div><br/>';
}
else {
	$i=0;
	echo '<br/><table class=\'tableau centrer_tableau\'>
	<tr class=\'tableau_header\'><th>&nbsp;'.$writepseudo.'&nbsp;</th> <th>&nbsp;'.$writeniveau.'&nbsp;</th> <th>&nbsp;'.$writevictoire.'&nbsp;</th> <th>&nbsp;'.$writedefaite.'&nbsp;</th> <th>&nbsp;'.$writexp.'&nbsp;</th> <th>&nbsp;'.$writeterrain.'&nbsp;</th> <th>&nbsp;Alliance&nbsp;</th><th>&nbsp;&nbsp;</th></tr>';
	foreach($liste as $donneees) {
		if($donneees->co) {
			$image='<img src="images/joueurs/mb_connecter.png" alt="Joueur Connecté" title="Joueur Connecté"/>';
		}
		else {
			$image='<img src="images/joueurs/mb_deconnecter.png" alt="Joueur Déonnecté" title="Joueur Déonnecté" />';
		}
		
		if($i != 0) {
			echo'<tr class="tableau_fond2"><td colspan="9"></td></tr>';
		}
		
		echo '<tr class="tableau_fond'.($i%2).'">';
		if($donneees->statu == 4) {
			echo '<td align=\'left\'>&nbsp;'.$image.' <a href=\'profilsjoueur-'.$donneees->id.'\'><font color=\'brown\'>'.ucfirst($donneees->login).'</font></a>&nbsp;</td>
								<td class="centrer">&nbsp;'.($donneees->lvl).'&nbsp;</td>
								<td class="centrer">&nbsp;'.nbf($donneees->victoires).'&nbsp;</td>
								<td class="centrer">&nbsp;'.$donneees->defaites.'&nbsp;</td>
								<td class="centrer">&nbsp;'.nbf($donneees->points).'&nbsp;</td>
								<td  class="centrer">&nbsp;'.nbf($donneees->terrain).'&nbsp;</td>
								<td align=\'left\'>&nbsp;';
		}
		else {
			echo '<td align=\'left\'>&nbsp;'.$image.' <a href=\'profilsjoueur-'.$donneees->id.'\'>'.ucfirst($donneees->login).'</a>&nbsp;</td>
								<td class="centrer">&nbsp;'.($donneees->lvl).'&nbsp;</td>
								<td class="centrer">&nbsp;'.nbf($donneees->victoires).'&nbsp;</td>
								<td class="centrer">&nbsp;'.$donneees->defaites.'&nbsp;</td>
								<td class="centrer">&nbsp;'.nbf($donneees->points).'&nbsp;</td>
								<td class="centrer">&nbsp;'.nbf($donneees->terrain).'&nbsp;</td>
								<td align=\'left\'>&nbsp;';
		}

		if(empty($donneees->nom)) {
			echo '<a href=\'Attaquer-1-niveau-1'.constr_get('recherche', $recherche).'\'>Aucune</a>';
		}
		else {
			echo ' <a href="Attaquer-1-niveau-'.$donneees->alliance.constr_get('recherche', $recherche).'">'.stripslashes($donneees->nom).'</a> ';
		}
		echo '&nbsp;</td><td class="gauche">&nbsp;';

		if(empty($donneees->times) or ($donneees->times < time())) {
			if(in_array('apollon', $temples)) {
				echo ' <img height=\'25px\' src=\'images/attaques/eyes.gif\' alt="Espionner" title="Espionner" class="supr_messagerie" onclick="javascript:observer('.$donneees->id.');"/> ';
			}
			elseif(in_array('hades', $temples)) {
				echo ' <img height=\'25px\' src=\'images/attaques/hades.gif\' alt="Visiter" title="Visiter" class="supr_messagerie" onclick="javascript:visiter('.$donneees->id.');"/> ';
			}
			echo ' <img src=\'images/attaques/xeyes.png\' alt="Espionner" title="Espionner" class="supr_messagerie" onclick="javascript:espionner('.$donneees->id.');"/> ';
			if(!empty($donneees->furie)) {
				echo ' <img src=\'images/attaques/vignette102.gif\' alt=\'Déclencher\' title=\'Déclencher\' height=\'32px\' class="supr_messagerie" onclick="if(window.confirm(\'Envoyer la furie de Demeter ?\')) { furie('.$donneees->id.'); } else { return false; }" id="bouton_furie_'.$donneees->id.'" /> ';
			}
		}

		if($donneees->lvl <= 2) {
			$max = 1;
		}
		elseif($donneees->lvl < 9) {
			$max = $donneees->lvl - 1;
		}
		else {
			$max=8;
		}

		if($donneees->possible) {
			echo ' <img height=\'25px\' src=\'images/attaques/epee_s.gif\' alt="Attaquer" title="Attaquer" class="supr_messagerie" onclick="javascript:preparer('.$donneees->id.');" id="bouton_attaquer_'.$donneees->id.'" /> ';
		}
		echo '</td></tr>';
	}
	echo '</table>';
	$i++;
}

if($nombreDePages > 1) {
	echo '<div class="centrer"><br/>Page : ';
	if(empty($recupcible)) {
		for ($i = 1 ; $i <= $nombreDePages ; $i++) {
			if(($page_num==$i)) {
				echo '<font color=\'#77461B\'>' . $i . '</font> ';
			}
			else {
				echo '<a href="Attaquer-' . $i . '-'.$par.constr_get('recherche', $recherche).'">' . $i . '</a> ';
			}
		}
	}
	else {
		for ($i = 1 ; $i <= $nombreDePages ; $i++) {
			if(($page_num==$i)) {
				echo '<font color=\'#77461B\'>' . $i . '</font> ';
			}
			else {
				echo '<a href="Attaquer-' . $i.'-'.$par . '-'.$recupcible.constr_get('recherche', $recherche).'">' . $i . '</a> ';
			}
		}
	}
	echo '</div>';
}

?>