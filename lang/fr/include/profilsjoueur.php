<?php

if(!empty($j->nomalliance)) {
	echo '<div class="centrer"><a href="profilsalliance-'.$j->alliance.'" class="non_souligne titre_profils ligne">';
  if($j->id == $j->chef) {
    echo '<img src="images/joueurs/mini_laurier.png" alt="Grand chef" title="Grand chef"/> ';
  }
	echo $j->nomalliance.'</a></div><br/><br/>';
}

if($paquet->getstatu() == 1 && 
   $j->id != $paquet -> getid()) {
	echo '<div class="cadre_droite">
	<a href="profilsjoueur-'.$j->id.'-ajouter" class="sous">Ajouter comme amis</a> | 
	<a href="profilsjoueur-'.$j->id.'-ajouterl-2" class="sous">Ignorer le membre</a> | 
	<a href="profilsjoueur-'.$j->id.'-ajouterl-3" class="sous">Filtrer ses messages</a>';
	echo	' | <a href="profilsjoueur-'.$j->id.'-dedicacer" class="sous">Laisser une dédicace</a>';
	echo '</div>';
}
?>
<div class="cadre_gauche">
	<div id="cadre_espace_profils">
		<div id="cadre_avatar">
			<div id="cadre_avatar2"><br/>
		<?php

	if(is_file('avatarjoueur/'.$j->id.'.jpg')) {
		echo '<img src=\'avatarjoueur/'.$j->id.'.jpg\' alt="Avatar du joueur '.$j->login.'" width="200px"/>';
	}
	elseif(is_file('avatarjoueur/'.$j->id.'.png')) {
		echo '<img src=\'avatarjoueur/'.$j->id.'.png\' alt="Avatar du joueur '.$j->login.'" width="200px"/>';
	}
	else {
		echo '<img src="images/joueurs/avatar.png" alt="Avatar par défaut" />';
	}
?>
			</div>
		</div>
		<div id="cadre_info_joueur">
			<br/><b>Niveau : </b> <?php echo $j->lvl; ?>
			<br/><b>Expérience : </b> <?php echo number_format($j->xp, 0, ',', ' '); ?>
			<br/><b><?php echo (($j->victoire>1)?'Victoires':'Victoire').' : </b>'.number_format($j->victoire, 0, ',', ' '); ?>
			<br/><b><?php echo (($j->defaite>1)?'Défaites':'Défaite').' : </b> '.$j->defaite; ?>
			<br/><b>Terrain : </b> <?php echo number_format($j->terrain, 0, ',', ' '); 
			if(!empty($j->nomalliance)) {
			  echo '<br/><b>Rang :</b> '.$j->rang;
			  if(!empty($j->droit)) {
    			echo '<br/><b>Pouvoirs : </b> '.$j->droit;
    		}
  		}
  		$nb_tour_force = sizeof($j->tourforce);

  		if($nb_tour_force > 1) {
  			echo '<br/><b>Tours de force :</b> '.$nb_tour_force;
  		}
  		else {
  			echo '<br/><b>Tour de force :</b> '.$nb_tour_force;
  		}
  		
  		if($nb_tour_force > 0) {
  			echo ' (<a href="tour_de_force-'.$j->id.'" class="lien_rouge">Détails</a>)';
  		}
  		
  		echo '
			<br/><b>'.(($j->nb_fil>1)?'Filleuls':'Filleul');?> : </b> <?php echo $j->nb_fil; ?>
			<br/>
			<br/><div class="fb-like" style="width:100px;" data-href="<?php echo SITE_URL.'/profilsjoueur-'.$j->id; ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true"></div>
		</div>

		<div class="cadre_gauche">
			<div id="cadre_info_perso">
				<b>Âge : </b> <?php echo $j->age;?> ans
				<br/><b>Localication : </b> <?php echo $j->ville;?>
				<br/><b>Emplois : </b> <?php echo $j->emplois;?>
				<br/><b>Date d'inscription : </b> <?php echo date('d/m/Y', $j->insc); ?>
			</div>
			<div id="cadre_contact">
			<?php
				if($paquet -> getstatu() == 1) {
					echo '<a href="NouveauMessage-'.$j->id.'"><div class="bouton_classique"><input class="bouton_classique2" type="BUTTON" value="CONTACTER" /></div></a>';
				}
			?>
			</div>
		</div>
	</div>
	<div id="description_profils"><br/>
	<?php echo $j->description;?>
	</div>
</div>
<?php
	if($paquet -> getstatu() == 1 && !empty($_GET['var2']) && $_GET['var2'] == 'dedicacer' && $j->id != $paquet -> getid()) {
		echo '<br/><h2 class="centrer">Laisser une dédicace : </h2>';
		echo '<div class="ligne centrer">
		<form action=\'#\' method=\'post\' name=\'profils\' >
			<textarea name=\'pro_texte\' class="cadre_dedi">'.((!empty($j->mess))?stripslashes(trim($j->mess)):'').'</textarea><br/><br/>
			<div class="bouton_classique"><input class="bouton_classique2" type="submit" value="VALIDER" name="VALIDER" /></div>
		</form>
		</div>';
	}
	else {
		if(sizeof($j->dedi) > 0) {
			echo '<h2 class="centrer">Dédicaces : </h2>';

			foreach($j->dedi as $dedi) {
				echo '<div class="ligne centrer"><b>Par <a href=\'profilsjoueur-'.$dedi->idj2.'\' class="lien">'.$dedi->login.'</a> '.date('\à H\h i \l\e d/m/y', $dedi->time).'</b>';
					if($paquet ->getstatu() == 1 && (($dedi->idj2 == $paquet -> getid()) or ($j->id == $paquet->getid())))
					{
			echo '<a href="profilsjoueur-'.$j->id.'-supprdedi-'.$dedi->id.'" class="lien"><img src=\'images/joueurs/supprimer_mp.png\' alt="supprimer" title="Supprimer"></a>';
					}
				echo'<br/>'.stripslashes($dedi->mess).'<br/><br/></div>';
			}
			if($paquet->getstatu() == 1 && 
	  		 $j->id != $paquet -> getid()) {
				echo '<div class="ligne centrer"><a href="profilsjoueur-'.$j->id.'-dedicacer" class="lien_rouge">Laisser une dédicace</a></div>';
			}
		}
	}
?>