<?php

$election     = $paquet->get_answer('info_oracle')->{1};
$vote         = $paquet->get_answer('info_oracle')->{3};
$oracle       = $paquet->get_answer('info_oracle')->{2};
$peut_oracle  = $paquet->get_answer('info_oracle')->{4};

if(!empty($oracle)) {
	echo '<h1>'._(
	     'Oracle actuel').' : <a href="
	     '._('profilsjoueur').'-'.$oracle->id.'">'.$oracle->login.'</a></h1>
	<br/><br/>';
}

echo '
<div id="cadre_milieu_petit">
	<div id="cadre_haut_petit"><img src="images/attaques/cross.png"
	                                alt="Fermer" title="Fermer" 
	                                class="cursor" 
	                                style="margin-top:10px;margin-right:10px;" 
	                                onclick="javascript:fermer_pacte();"/></div>
	<div id="cadre_centre_petit">
	
	</div>
	<div id="cadre_bas_petit"></div>
</div>
<div class="ligne_80 ligne90 justify">'._(
'L\'oracle est le représentant des joueurs auprès des dieux. '.
'Tous les débuts de mois une nouvelle campagne commence pour '.
'une durée d\'un mois. À la fin de celui-ci, le joueur ayant '.
'eu le plus de votes devient oracle pour un mois. '.
'Celui-ci obtient l’accès à une nouvelle partie '.
'sur le forum où il est en contact direct avec le staff. '.
'Son objectif est de faire remonter plus efficacement les '.
'idées des joueurs.').'</div>';

if(sizeof($election) > 0) {

	echo '<h2 class="centrer">'._('Candidats').'</h2>
	<div class="ligne80 centrer">
	<b>'._('Votez pour le candidat qui vous représentera le mieux, '.
	       'vous pourrez changer votre choix à n\'importe quel moment').
	'</b></div><br/>
	<form method="post" action="">
		<table class="none">';

		foreach($election as $elec) {
			if($elec->id == $paquet->get_infoj('id')) {
				$mon_programme = $elec->programme;
			}
			echo '<tr>
			<td><input type="radio" name="candidat" value="'.$elec->id.'" 
			'.(($vote == $elec->id)?' checked="checked"':'').'></td>
			<td>';
			
			if($elec->id == ID_ADMIN) {
        echo _('Vote blanc').'</td>
			<td></td>';
      }
      else {
  			echo '<a href="'._('profilsjoueur').'-'.$elec->id.'">'.
  			     $elec->login.'</a></td>
				     <td><img src="images/alliance/archives.png"
				              alt="'._('Programme').'" 
				              title="'._('Programme').'" 
				              class="cursor" 
				              onclick="javascript:programme('.$elec->id.');" /></td>';
			}
			
			if($paquet->get_infoj('lvl2') >= 4) {
				echo '<td> '.$elec->nb.' ('.$elec->prcent.'%)</td>';
			}
			
			echo '</tr>';
		}
		echo '</table>
		<br/>
		<div class="bouton_classique"><input class="bouton_classique2"
		                                     type="submit" 
		                                     value="'._('VOTER').'" /></div>
	</form>';
}

if($peut_oracle) {
	echo '<div class="ligne">
	      <br/><a href="javascript:affiche_cache(\'devenir_candidat\');">
	      <div class="bouton_classique">';
	
	if(!empty($mon_programme)) {
		echo '<input type="submit" value="'._('Mon programme').'" />';
	}
	else {
		$mon_programme = '';
		echo '<input type="submit" value="'._('Se Présenter').'" />';
	}
	
	echo '</div></a><br/>
	      <div id="devenir_candidat" style="display:none" class="centrer">
			  <form method="post" action="#">
				  <textarea placeholder="Votre programme" 
				            required="required" 
				            class="form_retirer" 
				            name="programme" 
				            style="width:600px;height:150px;margin-bottom:5px;">'.$mon_programme.'</textarea><br/>
				  <div class="bouton_classique"><input type="submit" 
					                                     value="'._('VALIDER').'" /></div>
			  </form>
	      </div>
	</div>';
}

?>