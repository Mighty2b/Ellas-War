<?php

include('include/menu_monalliance.php');
include('donnees/donnees.php');

if(empty($_GET['var1']) or !is_numeric($_GET['var1'])) {

	echo '<center>
	<h1>'._('Gerer les rangs de votre alliance').'</h1>
	<br/>';
	
	if($paquet->get_infoj('id') == $mon_alliance->id_chef &&
	   $mon_alliance->nb_membre > 1) {
		echo '<a href="'._('changer_grandchef').'"
		         class="details_ress">'._('Changer de grand chef').'</a>
		      <br/><br/>';
	}
	
	echo '<table>
	<thead>
	<tr class=\'titre_tab\'>
			<td></td>
	<td>'._('Rang').'</td>
	<td>'._('Droits').'</td>
	<td class="none"></td></tr></thead><tfoot></tfoot><tbody>';
	
	$taille_tableau = sizeof($tableau_droit);
	
	foreach($liste_membres as $do) {
		$droit = '';
		for($i=0;$i<$taille_tableau;$i++) {
			if(!empty($do->$tableau_droit[$i])) {
				$droit .= img('images/'.$do->$tableau_droit[$i].'/'.($i+1).'.png',
				              $nom_droit[$i]);
			}
		}
		
		if($do->id == $mon_alliance->id_chef) {
			$droit = _('Tous');
		}
		elseif(empty($droit)) {
			$droit = _('Aucun');
		}
		echo '<tr><td class="gauche">&nbsp;'.$do->login.'&nbsp;</td>
	<td>&nbsp;'.stripslashes($do->nom).'&nbsp;</td>
	<td align="center">'.$droit.'</td>
	<td><a href="'._('nommer').'-'.$do->id.'"><div class="bouton_classique"><input type="submit"
	                                                                      name="'._('Modifier').'" 
	                                                                      value="'._('Modifier').'" /></div></a></td></tr>';
	}
	
	echo '</tbody></table></center>';
}
else {
	$droits = $paquet->get_answer('droits_joueur')->{1};
			if(empty($droits)) {
				redirect();
			}
			else {
				echo '<div class="centrer">';
					if($paquet->get_infoj('id') == $mon_alliance->id_chef && 
						 $droits->id == $mon_alliance->id_chef) {
					 echo '<h1>'.$droits->login.'</h1><br/>
					 <form action="'._('nommer').'-'.$droits->id.'" method="post">
					 <b>'._('Nom du rang').' : </b>
					 <input type=\'text\' name=\'rang\' 
				          value="'.stripslashes($droits->nom).'"/><br/><br/>
					 		<br/>
		<input type="hidden" name="cg" value="1" />
		<div class="bouton_classique"><input type="submit"
		                                     name=\''._('Modifier').'\'
		                                     value=\''._('Modifier').'\' /></div>
		</form>';				
					}
					elseif($droits->id != $mon_alliance->id_chef) {
					 echo '<h1>'.$droits->login.'</h1>
					 <br/>
					 <form action="'._('nommer').'-'.$droits->id.'" method="post">
					 <b>'._('Nom du rang').' : </b>';
					 
					 if($paquet->get_infoj('id') == $mon_alliance->id_chef) {
					 echo '<input type="text"
					 							name="rang"
					 							value="'.stripslashes($droits->nom).'"/>';
					 }
					 else {
						 echo '<h1>'.stripslashes($droits->nom).'</h1>';
					 }

			if($mon_alliance->id_chef == $paquet->get_infoj('id')) {
				if($droits->id == $paquet->get_infoj('sous_chef'))
					echo '<input type="checkbox"
					             name="sous_chef" 
					             checked="checked" 
					             id="second"/> <b>'._('Second').'</b><br/>';
				else
					echo '<input type="checkbox"
					             name="sous_chef" 
					             id="second" /> <b>'._('Second').'</b><br/>';
			}

		$taille_tableau = sizeof($tableau_droit);

		echo '<br/><br/>
<table>
<thead>
<tr class="titre_tab"><td>&nbsp;Pouvoir&nbsp;</td>
<td>&nbsp;'._('Utiliser').'&nbsp;</td>
<td>&nbsp;'._('Transmettre').'&nbsp;</td>
<td>&nbsp;'._('Aucun').'&nbsp;</td></tr></thead>
<tfoot></tfoot><body>';
$droits_alliance = $paquet->get_infoj('droits_alliance');
			for($i=0;$i<$taille_tableau;$i++) {
				if(($droits_alliance->$tableau_droit[$i] == 2) or 
					 ($mon_alliance->id_chef == $paquet->get_infoj('id'))) {
					if(!empty($droits->$tableau_droit[$i]) && $droits->$tableau_droit[$i] == 2)
						echo '<tr><td class="gauche">'.img('images/1/'.($i+1).'.png', $nom_droit[$i]).img('images/2/'.($i+1).'.png', $nom_droit[$i]).' '.$nom_droit[$i].'</td>
<td><input type="radio" name="'.$tableau_droit[$i].'" value="1" class="tableau_droits" /></td>
<td><input type="radio" name="'.$tableau_droit[$i].'" value="2" class="tableau_droits" checked="checked" /></td>
<td><input type="radio" name="'.$tableau_droit[$i].'" value="0" class="tableau_droits" /></td></tr>';
					elseif(!empty($droits->$tableau_droit[$i]) && $droits->$tableau_droit[$i] == 1)
						echo '<tr><td class="gauche">'.img('images/1/'.($i+1).'.png', $nom_droit[$i]).img('images/2/'.($i+1).'.png', $nom_droit[$i]).' '.$nom_droit[$i].'</td>
<td><input type="radio" name="'.$tableau_droit[$i].'" value="1" class="tableau_droits" checked="checked" /></td>
<td><input type="radio" name="'.$tableau_droit[$i].'" value="2" class="tableau_droits" /></td>
<td><input type="radio" name="'.$tableau_droit[$i].'" value="0" class="tableau_droits" /></td></tr>';
					elseif(empty($droits->$tableau_droit[$i]))
						echo '<tr><td class="gauche">'.img('images/1/'.($i+1).'.png', $nom_droit[$i]).img('images/2/'.($i+1).'.png', $nom_droit[$i]).' '.$nom_droit[$i].'</td>
<td><input type="radio" name="'.$tableau_droit[$i].'" value="1" class="tableau_droits" /></td>
<td><input type="radio" name="'.$tableau_droit[$i].'" value="2" class="tableau_droits" /></td>
<td><input type="radio" name="'.$tableau_droit[$i].'" value="0" class="tableau_droits" checked="checked" /></td></tr>';
					else {
						echo _('Erreur');
					}
				}
			}
		echo '</tbody></table>
		<br/>
		<input type="hidden" name="cg" value="1" />
		<div class="bouton_classique"><input type="submit"
		                                     name="'._('Modifier').'"
		                                     value="'._('Modifier').'" /></div>
		</form><br/><br/><a href=\''._('nommer').'\'>'._('Retour').'</a>';
				}
				echo '</div>';
		}
	
	if($mon_alliance->id_chef == $paquet->get_infoj('id')) {
  echo '
  <script type="text/javascript">
    $("#second").click(function () {
    	if($(\'#second\').attr(\'checked\')) {
    		$(\'.tableau_droits\').val([\'2\']);
    	}
    });
  </script>
  ';
	}
}

?>