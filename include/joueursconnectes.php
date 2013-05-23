<?php

$paquet = new EwPaquet('get_joueurs_co');

echo '<h1>'.$txt_titre_co.'</h1><br/><br/>
		<div class="ligne centrer gras">';
echo construct_phrase('joueurs_co', $paquet->getRetour(2));
echo '</div><br/><br/><br/>
<table class="centrer_tableau">
	<tr class=\'titre_tab\'>
		<td>'.$txt_titre_pseudo.'</td>
		<td>'.$txt_titre_lvl.'</td>
		<td style="min-width:60px;">'.$txt_titre_terrain.'</td>
		<td style="min-width:100px;" class="gauche">'.$txt_titre_alliance.'</td>
	</tr>';

foreach($paquet->getRetour() as $do) {
	echo'<tr>
	<td>&nbsp;<a href=\'/'.trad_to_page('profilsjoueur').'-'.$do->id.'\'>'.$do->login.'</a> ';
	
	if($do->id == $do->chef) {
		echo img('images/joueurs/mini_laurier.png', 'Grand chef');
	}
	
	echo '&nbsp;</td>
	<td align=\'right\'>&nbsp;'.$do->lvl.'&nbsp;</td>
	<td align=\'right\'>&nbsp;'.nbf($do->terrain).'&nbsp;</td>
	<td>&nbsp;';
	if(!empty($do->alliance)) {
		echo '<a href="'.trad_to_page('profilsalliance').'-'.$do->alliance.'">'.$do->nom.'</a>';
	}
	else {
		echo $do->nom;
	}
	echo '&nbsp;</td></tr>';
}

echo '</table>
<br/>';

?>