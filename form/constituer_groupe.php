<?php

include('../header.php');

if(!empty($_GET['id'])) {
	$paquet = new EwPaquet();
	$paquet -> add_action('constituer_groupe', array($_GET['id']));
	$paquet -> send_actions();
	
	$membre      = $paquet->get_answer('constituer_groupe')->{1};
	$info_groupe = $paquet->get_answer('constituer_groupe')->{2};
	$nb_membre   = $paquet->get_answer('constituer_groupe')->{3};

	if(empty($info_groupe)) {
		echo '<div class="erreur centrer">'._(
		'Le groupe n\'existe pas, vérifiez que vous êtes bien connecté.').
		'</div>';
	}
	elseif($info_groupe->etape == 0 or !empty($info_groupe->mnom)) {
		echo '
		<div id="erreur_sanctuaire"></div>
		<div id="sanctuaire_menu_gauche">';

		if(sizeof($membre) >= $nb_membre) {
			echo '<b>'._('Membres du groupe').' :</b>';
		}
		else {
			echo '<b>'._('Membres en attente').' :</b>';
		}

		echo '<br/>
		<table class="none">
		<tr class="gras">
		<td>&nbsp;'._('Joueur').'&nbsp;</td>
		<td>&nbsp;'._('Prêt').'&nbsp;</td>
		</tr>';

		foreach($membre as $mb) {
			
			echo '<tr><td class="gauche">&nbsp;'.$mb->login.'&nbsp;</td><td>&nbsp;';
			
			if($mb->id_joueur == $paquet->get_infoj('id')) {
				$mon_statu = $mb->action;
			}

			if($mb->action == 1) {
				echo '<img src="/images/joueurs/mb_connecter.png" 
				           alt="'._('Joueur prêt').'" 
				           title="'._('Joueur prêt').'"/>';
			}
			else {
				echo '<img src="/images/joueurs/mb_deconnecter.png" 
				           alt="'._('Joueur non prêt').'" 
				           title="'._('Joueur non prêt').'" />';
			}
			
			echo '&nbsp;';
			
			if($info_groupe->etape == 0 &&
			   ($mb->id_joueur == $paquet->get_infoj('id') or 
			    $info_groupe->chef == $paquet->get_infoj('id'))) {
				echo '<img src="/images/joueurs/supprimer_mp.png"
				           atl="'._('Sortir du sanctuaire').'"
				           title="'._('Sortir du sanctuaire').'"
				           style="width:10px;"
				           onclick="sortir_sanctuaire('.$mb->id_joueur.');"
				           class="chat_signaler" />';
			}

		echo '&nbsp;</td></tr>';
	}
	
	echo '</table><br/><div class="centrer">';

	if(sizeof($membre) >= $nb_membre) {
		if($info_groupe->nb_pret >= $nb_membre) {
			if($info_groupe->chef == $paquet->get_infoj('id')) {
				if($info_groupe->etape == 0) {
					echo '<div class="bouton_classique"><input type="submit" 
					                                           id="bouton_continuer_groupe" 
					                                           value="'._('CONTINUER').'" 
					                                           name="'._('CONTINUER').'" 
					                                           onclick="javascript:continuer_groupe();"/></div>';
				}
				else {
					echo '<div class="bouton_classique"><input type="submit" 
					                                           id="bouton_continuer_groupe" 
					                                           value="'._('Attaquer').'" 
					                                           name="'._('Attaquer').'" 
					                                           onclick="javascript:continuer_groupe();"/></div>';
				}
			}
			else {
				echo _('En attente du chef de groupe');
			}
		}
		elseif($mon_statu == 1) {
			echo _('En attente des autres membres');
		}
		else {
			echo '<div class="bouton_classique" 
			           id="bouton_je_suis_pret"><input type="submit" 
			                                           value="'._('JE SUIS PRÊT').'" 
			                                           name="'._('JE SUIS PRÊT').'" 
			                                           onclick="javascript:je_suis_pret()"/></div>';
		}
	}

	echo '</div></div>
	<div id="sanctuaire_menu_droite">';

	if($info_groupe->etape == 0) {
		echo '<h1>'.stripslashes($info_groupe->nom).'</h1>';
		echo stripslashes($info_groupe->description);
	}
	else {
		echo '<h1>'.stripslashes($info_groupe->mnom).'</h1>';
		echo stripslashes($info_groupe->mdescription);
	}
		echo '</div>';
	}
	else {
		echo '
		<h1>'.stripslashes($info_groupe->nom).'</h1>
		<div class="erreur centrer">'._('Vous avez terminé ce sanctuaire').'</div>';
	}
}

?>