<?php

$paquet->display();

echo '<div class="centre">';

if(empty($liste) or sizeof($liste) == 0) {
		echo '<br/><br/>Il n\'y a aucune partie privée en préparation<br/><br/>';
}
else {
	echo '
<h2>Liste des batailles navales privées</h2>	
	<br/><br/>
	<table class="centrer_tableau">
		<tr class=\'titre_tab\'>
			<td>&nbsp;Titre&nbsp;</td> 
			<td>&nbsp;Créateur&nbsp;</td> 
			<td>&nbsp;Places&nbsp;</td> 
			<td>&nbsp;Prix d\'entrée&nbsp;</td>
			<td>&nbsp;&nbsp;</td> </tr>';

	foreach($liste as $do) {
		echo '<tr> 
				<td class="gauche">&nbsp;'.$do->titre.'&nbsp;</td> 
				<td>&nbsp;'.$do->createur.'&nbsp;</td> 
				<td>&nbsp;'.$do->places.'/8&nbsp;</td>
		        <td>&nbsp;'.nbf($do->prime).' '.imress('drachme').'&nbsp;</td>';

		if(empty($do->id)) {
			echo '<td>&nbsp;&nbsp;</td> </tr>';
		}
		else {
			echo '<td>&nbsp;<a href=\'Liste Batailles Navales-'.$do->id.'\'>Rejoindre</a>&nbsp;</td> </tr>';
		}
	}
	echo '</table>';
}

echo '
<br/>
<br/>
<a href="Batailles Navales">Retour</a>
</div>';

?>