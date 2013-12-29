<?php

if(!empty($paquet->get_answer('get_joueurs_co'))) {
	$liste = $paquet->get_answer('get_joueurs_co')->{1};
}
else {
	$liste = array();
}

echo '<h1>'._('Joueurs connectés').'</h1>
<br/>
<table class="centrer_tableau">
	<thead>
	<tr class=\'titre_tab\'>
		<td>'._('Joueur').'</td>
		<td>'._('Niveau').'</td>
		<td style="min-width:60px;">'._('Terrain').'</td>
		<td style="min-width:100px;" class="gauche">'._('Alliance').'</td>
	</tr>
	</thead>
	<tfoot></tfoot>
	<tbody>';

foreach($liste as $do) {
	echo'<tr>
	<td>&nbsp;<a href=\'/'.trad_to_page('profilsjoueur').'-'.$do->id.'\'>'.$do->login.'</a> ';
	
	if($do->id == $do->chef) {
		echo img('images/joueurs/mini_laurier.png', _('Grand chef'));
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

echo '</tbody>
</table>
<br/>';

?>