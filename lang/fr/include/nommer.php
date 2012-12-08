<?php

if(empty($_GET['var1']) or !is_numeric($_GET['var1'])) {

	echo '<center><h1>Gerer les rangs de votre alliance</h1>
	<br/>';
	
	if($paquet->getid() == $paquet->getidchef()) {
		echo '<a href="changer_grandchef" class="details_ress">Changer de grand chef</a><br/><br/>';
	}
	
	echo '<table class="centrer_tableau"><tr class=\'titre_tab\'>
			<td>Pseudo</td>
	<td>Rang</td>
	<td>Droits</td>
	<td></td></tr>';
	$taille_tableau = sizeof($tableau_droit);
	foreach($liste_membres as $do) {
		$droit = '';
		for($i=0;$i<$taille_tableau;$i++) {
			if(!empty($do->$tableau_droit[$i])) {
				$droit .= img('images/'.$do->$tableau_droit[$i].'/'.($i+1).'.png', $nom_droit[$i]);
			}
		}
		
		if($do->id == $paquet->getidchef()) {
			$droit = 'Tous';
		}
		elseif(empty($droit)) {
			$droit = 'Aucun';
		}
		echo '<tr><td class="gauche">&nbsp;'.$do->login.'&nbsp;</td>
	<td>&nbsp;'.stripslashes($do->nom).'&nbsp;</td>
	<td align=\'center\'>'.$droit.'</td>
	<td><a href="Nommer-'.$do->id.'"><div class="bouton_classique"><input class="bouton_classique2" type="submit" name="MODIFIER" value="MODIFIER"/></div></a></td></tr>';
	}
	
	echo '</table></center>';
}
else {
			if(empty($droits)) {
				redirect();
			}
			else {
				echo '<div class="centrer">';
					if($paquet->getid() == $paquet->getidchef() && 
						 $droits->id == $paquet->getidchef()) {
					 ?> <h1><?php echo $droits->login; ?></h1><br/>
					 <form action="Nommer-<?php echo $droits->id; ?>" method='post' >
					 <b>Nom du rang : </b>
					 <?php
echo '<input type=\'text\' name=\'rang\' 
						 value="'.stripslashes($droits->nom).'" 
						 class="form_retirer" /><br/><br/>
					 		<br/>
		<input type="hidden" name="cg" value="1" />
		<div class="bouton_classique"><input class="bouton_classique2" type="submit" name=\'Modifier\' value=\'Modifier\' /></div>
		</form>';				
					}
					elseif($droits->id != $paquet->getidchef()) {
					 ?> <h1><?php echo $droits->login; ?></h1>
					 <br/><form action="Nommer-<?php echo $droits->id; ?>" method='post' >
					 <b>Nom du rang : </b>
					 <?php if($paquet->getid() == $paquet->getidchef()) {
					 echo '<input type=\'text\' 
					 							name=\'rang\' 
					 							value="'.stripslashes($droits->nom).'" 
					 							class="form_retirer" />';
					 }
					 else {
						 echo '<h1>'.stripslashes($droits->nom).'</h1>';
					 }

			if($paquet->getidchef() == $paquet->getid()) {
				if($droits->id == $paquet->getidsschef())
					echo '<input type="checkbox" name="sous_chef" checked="checked" id="second"/> <b>Second</b><br/>';
				else
					echo '<input type="checkbox" name="sous_chef" id="second" /> <b>Second</b><br/>';
			}

		$taille_tableau = sizeof($tableau_droit);

		echo '<br/><br/>
<table class="centrer_tableau"><tr class=\'titre_tab\'><td>&nbsp;Pouvoir&nbsp;</td>
<td>&nbsp;Utiliser&nbsp;</td>
<td>&nbsp;Transmettre&nbsp;</td>
<td>&nbsp;Aucun&nbsp;</td></tr>';
$droits_alliance = $paquet->get_droits_alliance();
			for($i=0;$i<$taille_tableau;$i++)
			{
				if(($droits_alliance->$tableau_droit[$i] == 2) or 
					 ($paquet->getidchef() == $paquet->getid())) {
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
					else
						echo 'Erreur';
				}
			}
		echo '</table>
		<br/>
		<input type="hidden" name="cg" value="1" />
		<div class="bouton_classique"><input class="bouton_classique2" type="submit" name=\'Modifier\' value=\'Modifier\' /></div>
		</form><br/><br/><a href=\'Nommer\'>Retour</a>';
				}
				echo '</div>';
		}
	
	if($paquet->getidchef() == $paquet->getid()) {
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