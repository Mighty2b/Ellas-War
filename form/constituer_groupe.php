<?php

define('NB_MEMBRE', 2);

include('../header.php');

if(!empty($_GET['id'])) {
	$paquet      = new EwPaquet('constituer_groupe', array($_GET['id']));
	$membre      = $paquet->getRetour();
	$info_groupe = $paquet->getRetour(2);
	
	if(empty($info_groupe)) {
		echo '<div class="erreur centrer">Le groupe n\'existe pas, vérifiez que vous êtes bien connecté.';
	}
	elseif($info_groupe->etape == 0 or !empty($info_groupe->mnom)) {
		echo '<div id="erreur_sanctuaire"></div>';
		
		echo '<div id="sanctuaire_menu_gauche">';
		
		if(sizeof($membre) >= NB_MEMBRE) {
			echo '<b>Membres du groupe :</b>';
		}
		else {
			echo '<b>Membres en attente :</b>';
		}
		
		echo '<br/>
		<table class="centrer_tableau">
		<tr class="gras">
			<td>&nbsp;Joueur&nbsp;</td>
			<td>&nbsp;Prêt&nbsp;</td>
		</tr>';
		
		foreach($membre as $mb) {
			echo '<tr><td class="gauche">&nbsp;'.$mb->login.'&nbsp;</td><td>&nbsp;';
			if($mb->id_joueur == $paquet->getid()) {
				$mon_statu = $mb->action;
			}
			
			if($mb->action == 1) {
				echo '<img src="images/joueurs/mb_connecter.png" alt="Joueur prêt" title="Joueur prêt"/>';
			}
			else {
				echo '<img src="images/joueurs/mb_deconnecter.png" alt="Joueur non prêt" title="Joueur non prêt" />';
			}
	
			echo '&nbsp;</td></tr>';
		}
		
		echo '</table><br/><div class="centrer">';
		
		if(sizeof($membre) >= NB_MEMBRE) {
			if($info_groupe->nb_pret >= NB_MEMBRE) {
				if($info_groupe->chef == $paquet->getid()) {
					if($info_groupe->etape == 0) {
						echo '<div class="bouton_classique"><input id="bouton_continuer_groupe" class="bouton_classique2" type="submit" value="CONTINUER" name="CONTINUER" onclick="javascript:continuer_groupe();"/></div>';
					}
					else {
						echo '<div class="bouton_classique"><input id="bouton_continuer_groupe" class="bouton_classique2" type="submit" value="Attaquer" name="Attaquer" onclick="javascript:continuer_groupe();"/></div>';
					}
				}
				else {
					echo 'En attente du chef de groupe';
				}
			}
			elseif($mon_statu == 1) {
				echo 'En attente des autres membres';
			}
			else {
				echo '<div class="bouton_classique" id="bouton_je_suis_pret"><input class="bouton_classique2" type="submit" value="JE SUIS PRÊT" name="JE SUIS PRÊT" onclick="javascript:je_suis_pret()"/></div>';
			}
		}
		
		echo '</div></div>';
	
		echo '<div id="sanctuaire_menu_droite">';
	
		if($info_groupe->etape == 0) {
			echo '<h1>'.stripslashes($info_groupe->nom).'</h1>';
			echo stripslashes($info_groupe->description);
		}
		else {
			echo '<h1>'.stripslashes($info_groupe->mnom).'</h1>';
			echo stripslashes($info_groupe->mdescription);
		}
	}
	else {
		echo '<h1>'.stripslashes($info_groupe->nom).'</h1>';
		echo '<div class="erreur centrer">Vous avez terminé ce sanctuaire';
	}
	echo '</div>';
}

?>