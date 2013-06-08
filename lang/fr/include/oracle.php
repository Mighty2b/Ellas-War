<?php

if(!empty($oracle)) {
	echo '<h1>Oracle actuel : <a href="profilsjoueur-'.$oracle->id.'">'.$oracle->login.'</a></h1>
	<br/><br/>';
}

?>
<div id="cadre_milieu_petit">
	<div id="cadre_haut_petit"><img src="images/attaques/cross.png" alt="Fermer" title="Fermer" class="supr_messagerie" style="margin-top:10px;margin-right:10px;" onclick="javascript:fermer_pacte();"/></div>
	<div id="cadre_centre_petit">
	
	</div>
	<div id="cadre_bas_petit"></div>
</div>
<div class="ligne80 justifier">L'oracle est le représentant des joueurs auprès des dieux. Tous les débuts de mois une nouvelle campagne commence pour une durée d'un mois. À la fin de celui-ci, le joueur ayant eu le plus de votes devient oracle pour un mois. Celui-ci obtient l’accès à une nouvelle partie sur le forum où il est en contact direct avec le staff. Son objectif est de faire remonter plus efficacement les idées des joueurs.</div>

<?php

if(sizeof($election) > 0) {

	echo '<h2 class="centrer">Candidats</h2>
	<div class="ligne80 centrer"><b>Votez pour le candidat qui vous représentera le mieux, vous pourrez changer votre choix à n\'importe quel moment</b></div><br/>
	<form method="post" action="">
		<table class="centrer_tableau">';

		foreach($election as $elec) {
			if($elec->id == $paquet->getid()) {
				$mon_programme = $elec->programme;
			}
			echo '<tr>
			<td><input type="radio" name="candidat" value="'.$elec->id.'" 
			'.(($vote == $elec->id)?' checked="checked"':'').'></td>
			<td>';
			
			if($elec->id == ID_ADMIN) {
        echo 'Vote blanc</td>
			<td></td>';
      }
      else {
  			echo '<a href="profilsjoueur-'.$elec->id.'">'.$elec->login.'</a></td>
			<td><img src="images/alliance/archives.png" alt="Programme" title="Programme" class="supr_messagerie" onclick="javascript:programme('.$elec->id.');" /></td>';
			}
			
			if($paquet->getlvl2() >= 4) {
				echo '<td> '.$elec->nb.' ('.$elec->prcent.'%)</td>';
			}
			
			echo '</tr>';
		}
		echo '</table>
		<br/>
		<div class="bouton_classique"><input class="bouton_classique2" type="submit" value="VOTER" /></div>
	</form>';
}

  echo '<div class="ligne">
  <br/>';

  if(!empty($mon_programme)) {
	  echo '<a href="javascript:affiche_cache(\'devenir_candidat\');"><div class="bouton_classique"><div class="bouton_classique2">Mon programme</div></div></a>';
  }
  else {
  	$mon_programme = '';
	  echo '<a href="javascript:affiche_cache(\'devenir_candidat\');"><div class="bouton_classique"><div class="bouton_classique2">Se Présenter</div></div></a>';
  }

  echo '<br/>
	  <div id="devenir_candidat" style="display:none" class="centrer">
		  <form method="post" action="#">
			  <textarea placeholder="Votre programme" required="required" class="form_retirer" name="programme" style="width:600px;height:150px;margin-bottom:5px;">'.$mon_programme.'</textarea><br/>
			  <div class="bouton_classique"><input class="bouton_classique2" type="submit" value="VALIDER" /></div>
		  </form>
	  </div>
  </div>';

?>