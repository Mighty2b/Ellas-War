<?php

$j = $paquet->get_answer('profils_joueur')->{1};

if(!empty($_GET['var2']) && $_GET['var2'] == _('ajouter')) {
	redirect(_('amis'));
}
elseif(empty($j)) {
	redirect();
}

echo '<h1>'.$j->login.'</h1>';

if(!empty($j->nomalliance)) {
	echo '<div class="centrer"><a href="'._('profilsalliance').'-'.$j->alliance.'"
	                              class="non_souligne titre_profils ligne">';
  if($j->id == $j->chef) {
    echo '<img src="images/joueurs/mini_laurier.png" 
               alt="'._('Grand chef').'" 
               title="'._('Grand chef').'"/> ';
  }
	echo $j->nomalliance.'</a></div><br/><br/>';
}

if($paquet->get_infoj('statu') == 1 && 
   $j->id != $paquet->get_infoj('id')) {
	echo '<div class="ligne droite">
	<a href="'._('profilsjoueur').'-'.$j->id.'-'._('ajouter').'"
	   class="sous">'._('Ajouter comme amis').'</a> | 
	<a href="'._('profilsjoueur').'-'.$j->id.'-'._('ajouterl').'-2"
	   class="sous">'._('Ignorer le membre').'</a> | 
	<a href="'._('profilsjoueur').'-'.$j->id.'-'._('ajouterl').'-3" 
	   class="sous">'._('Filtrer ses messages').'</a> | 
	<a href="'._('profilsjoueur').'-'.$j->id.'-'._('dedicacer').'" 
	   class="sous">'._('Laisser une dédicace').'</a>
	</div>';
}

echo '
<div class="ligne gauche">
	<div id="cadre_espace_profils">
		<div id="cadre_avatar">
			<br/>';

	if(is_file('avatarjoueur/'.$j->id.'.jpg')) {
		echo '<img src=\'avatarjoueur/'.$j->id.'.jpg\' 
		           alt="'._('Avatar du joueur').' '.$j->login.'" 
		           width="200px"/>';
	}
	elseif(is_file('avatarjoueur/'.$j->id.'.png')) {
		echo '<img src=\'avatarjoueur/'.$j->id.'.png\'
		           alt="'._('Avatar du joueur').' '.$j->login.'" 
		           width="200px"/>';
	}
	else {
		echo '<img src="images/joueurs/avatar.png"
		           alt="'._('Avatar par défaut').'" />';
	}

echo '</div>
		<div id="cadre_info_joueur">
			<br/><b>'._('Niveau').' : </b> '.$j->lvl.'
			<br/><b>'._('Expérience').' : </b>'.nbf($j->xp).'
			<br/><b>'.(($j->victoire>1)?_('Victoires'):_('Victoire')).' : </b>'.
			nbf($j->victoire).'
			<br/><b>'.(($j->defaite>1)?_('Défaites'):_('Défaite')).' : </b> '.
			$j->defaite.'
			<br/><b>'._('Terrain').' : </b>'.nbf($j->terrain);
			
			if(!empty($j->nomalliance)) {
			  echo '<br/><b>'._('Rang').' :</b> '.$j->rang;
			  if(!empty($j->droit)) {
    			echo '<br/><b>'._('Pouvoirs').' : </b> '.$j->droit;
    		}
  		}
  		
  		$nb_tour_force = sizeof($j->tourforce);

  		if($nb_tour_force > 1) {
  			echo '<br/><b>'._('Tours de force').' :</b> '.$nb_tour_force;
  		}
  		else {
  			echo '<br/><b>'._('Tour de force').' :</b> '.$nb_tour_force;
  		}
  		
  		if($nb_tour_force > 0) {
  			echo ' (<a href="'._('tour_de_force').'-'.$j->id.'"
  			           class="rouge_goco">'._('Détails').'</a>)';
  		}
  		
  		echo '
			<br/><b>'.(($j->nb_fil>1)?_('Filleuls'):_('Filleul')).' : </b>'.$j->nb_fil.'
			<br/>
			<br/><div class="fb-like" style="width:100px;"
			          data-href="'.SITE_URL.'/'._('profilsjoueur').'-'.$j->id.'" 
			          data-send="false" 
			          data-layout="button_count" 
			          data-width="450" 
			          data-show-faces="true"></div>
		</div>

		<div class="ligne gauche">
			<div id="cadre_info_perso">
				<b>'._('Âge').' : </b>'.$j->age.' '._('ans');

		if($j->ville != '') {
			echo '<br/><b>'._('Localication').' : </b>'.$j->ville;
		}

		if($j->emplois != '') {
			echo '<br/><b>'._('Emplois').' : </b>'.$j->emplois;
		}

		if($paquet->get_infoj('statu') != 0) {
			echo '<br/><b>'._('Date d\'inscription').' : </b>'.
			     display_date($j->insc,2);
		}
		
		'</div>
	<div id="cadre_contact">';

		if($paquet->get_infoj('statu') == 1) {
			echo '<a href="'._('nouveaumessage').'-'.$j->id.'">'.
			     '<div class="bouton_classique"><input type="BUTTON" 
			                                           value="'._('Contacter').'" /></div></a>';
		}

echo '</div>
		</div>
	</div>
	<div id="description_profils"><br/>'.$j->description.'
	</div>
</div>';

	if($paquet->get_infoj('statu') == 1 && 
	   !empty($_GET['var2']) && $_GET['var2'] == _('dedicacer') && 
	   $j->id != $paquet->get_infoj('id')) {
		echo '<br/><h2 class="centrer">'._('Laisser une dédicace').' : </h2>';
		echo '<div class="ligne centrer">
		<form action="#" method="post" name="profils" >
			<textarea name="pro_texte" 
			          class="cadre_dedi">'.((!empty($j->mess))?stripslashes(trim($j->mess)):'').'</textarea><br/><br/>
			<div class="bouton_classique"><input type="submit" 
			                                     value="'._('Valider').'" 
			                                     name="VALIDER" /></div>
		</form>
		</div>';
	}
	else {
		if(sizeof($j->dedi) > 0) {
			echo '<h2 class="centrer">'._('Dédicaces').'</h2>';

			foreach($j->dedi as $dedi) {
				echo '<div class="ligne centrer"><b>'._(
				     'Par').' <a href="'._('profilsjoueur').'-'.$dedi->idj2.' 
				                 class="lien">'.$dedi->login.'</a> '.
				     display_date($dedi->time,3).'</b>';
					if($paquet->get_infoj('statu') == 1 && 
					   (($dedi->idj2 == $paquet->get_infoj('id')) or 
					    ($j->id == $paquet->get_infoj('id')))) {
			echo '<a href="'._('profilsjoueur').'-'.$j->id.'-'._('supprdedi').'-'.$dedi->id.'" 
			         class="lien"><img src="images/utils/supprimer_mp.png"
			         alt="supprimer" title="'._('Supprimer').'"></a>';
					}
				echo'<br/>'.stripslashes($dedi->mess).'<br/><br/></div>';
			}
			if($paquet->get_infoj('statu') == 1 && 
	  		 $j->id != $paquet->get_infoj('id')) {
				echo '<div class="ligne centrer"><a href="'._('profilsjoueur').'-'.$j->id.'-'._('dedicacer').'" 
				                                    class="lien_rouge">'._('Laisser une dédicace').'</a></div>';
			}
		}
	}

echo '
<script type="text/javascript">
    $(document).ready(function() {
        document.title = \'Profil de '.$j->login.'\';
    });
</script>';

?>