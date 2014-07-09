<?php

include('include/menu_monalliance.php');

$bientot = $paquet->get_answer('info_mes_guerres')->{1}->bientot;
$encours = $paquet->get_answer('info_mes_guerres')->{1}->encours;

$txt = array('d' => _('a perdu'), 'v' => _('a gagné'));

if(!empty($_POST['choix'])) {
	if($_POST['choix'] == 'accepte') {
		echo '<div class="erreur centrer">'._('La guerre vient d\'être annulée').'</div>';
	}
	else {
		echo '<div class="erreur centrer">'._('Vous avez refusé de payer ! Préparez vous à la bataille.').'</div>';
	}
}

if(sizeof($bientot) > 0 or sizeof($encours) > 0) {

	if (sizeof($bientot) > 0) {
		echo '<p class="centrer">';
		
		printf(_('Il y a <b>%s</b> guerre sur le point de démarrer'), sizeof($bientot));
		echo ' :</p><p>';

		foreach($bientot as $details) {
			
			echo '<fieldset class="cadre_guerre_bientot centrer">
					<b>'.stripslashes($details->attaquant).'</b> '._('contre').' <b>'.
					stripslashes($details->defenseur).'</b>
						<p> '._('Début de la guerre').' : <b>'.
						display_date($details->temps+24*3600,5).'</b></p>';

			if ($details->iddefenseur == $mon_alliance->id) {
				$write = _('L\'ennemi');
			}
			else {
				$write = _('Notre alliance');
			}
			
			if($details->peut_annuler) {
				if($paquet->get_infoj('id') == $mon_alliance->id_chef) {
					echo '<a href="'._('guerres').'-annuler-'.$details->id.'">'._('Annuler la guerre').'</a>';
				}
			}
			elseif($details->peut_payer) {
				
				echo '<p>'.$details->attaquant.' '._('demande').' <b>'.$details->drachme.
				     '</b> '.imress('drachme').' et <b>'.$details->gold.'</b> '.
				     imress('gold').' '._('contre la paix').'</p>';
				
				if($details->peut_payer2 && $paquet->get_infoj('id') == $mon_alliance->id_chef) {
					echo '<b>'._('Vous pouvez').' : </b>
							<p><form action="guerres" method="post" enctype="multipart/form-data">.
							<input type="radio" name="choix" value="accepte" /> '._('Accepter').'
							<input type="radio" name="choix" value="refuse" /> '._('Refuser').'
							<input type="hidden" name="id" value="'.$details->id.'"> </p><p>
							<div class="bouton_classique"><input type="submit" value="'._('Valider').'" /></div>
							</p></form>';
				}
			}
			echo '</fieldset><p>';
		}
	}

	if (sizeof($encours) > 0) {
		foreach($encours as $do) {	
			if($do->nous < 2)
				$writev = _('victoire');
			else
				$writev = _('victoires');
	
			if($do->eux < 2)
				$writev1 = _('victoire');
			else
				$writev1 = _('victoires');
	
		echo '<fieldset class="ligne80 centrer">
		      <b><a href="'._('profilsalliance').'-'.$do->idattaquant.'">'.
		      stripslashes($do->attaquant).'</b></a> '._('contre').
		      ' <a href="'._('profilsalliance').'-'.$do->iddefenseur.'"><b>'.
		      stripslashes($do->defenseur).'</b></a>';
		//echo '<P>Lancement de la guerre par : <b>'.$nomattaquant.'</b></P><P> Date et Heure de la provocation: <b>'.date("d/m/Y \à H:i:s", $do->provocation).'</b></P>';
		echo '<p>'._('Etat').' : <b>'._('En cours').'</b></p>';
		echo '<p>'._('La guerre a commencé depuis').' '.display_date($do->provocation+24*3600,4).'</p>';
		echo '<fieldset>';
		echo '<center><b>'._('Score').'</b></center>';
		echo '<P>'._('Votre alliance').' : <font color=green><b>'.$do->nous.'</b> '.$writev.'</font> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo _('Ennemis').' : <font color=red><b>'.$do->eux.'</b> '.$writev1.'</font></P>';
		echo '<P><b>'.$do->but.'</b> '._('victoires sont nécessaires pour gagner une guerre').'<p>';
		
		if(!empty($do->histo)) {
			echo '<center><b>'.sizeof($do->histo).' '._('dernières attaques').'</b></center>';
			echo '<P>';
				foreach($do->histo as $histo) {
					echo '<font color ="'.$histo->color.'"><b>'.$histo->attaquant.'</b> '.
					$txt[$histo->res].' '._('contre').' <b>'.$histo->defenseur.'</b>. '.
					_('Date et Heure').' : <b>'.display_date($histo->temps, 4).'</b></font><br>';
			
				}
				echo '<p><a href="#"
				            onclick="window.open(\'popup/guerres.php?id='.$do->id.'\',\''._('Historique attaques').'\',\'toolbar=0, location=0, directories=0, status=0, scrollbars=1, resizable=0, copyhistory=0, menuBar=0, width=800, height=500\');">'._('Voir toutes les attaques').'</a></p></fieldset></fieldset>';
			}
		}
	}
}
else {
	echo '<div class="ligne erreur centrer"><h2>'._('Vous n\'avez aucune guerre en cours').'</h2></div>';
}
?>