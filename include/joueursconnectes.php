<?php

if(!$get_joueurs_co) {
	
	if(!empty($paquet->get_answer('get_joueurs_co'))) {
		$get_joueurs_co = $paquet->get_answer('get_joueurs_co')->{1};
	}
	
	if(empty($get_joueurs_co)) {
		$get_joueurs_co = array();
	}
	else {
		apc_store(APC_PREFIX.'get_joueurs_co', serialize($get_joueurs_co), 10);
	}
}
else {
	$get_joueurs_co = unserialize($get_joueurs_co);
	
	if(empty($get_joueurs_co)) {
		$get_joueurs_co = array();
	}
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

foreach($get_joueurs_co as $do) {
	echo'<tr>
	<td>&nbsp;<a href=\'/'._('profilsjoueur').'-'.$do->id.'\'>'.$do->login.'</a> ';
	
	if($do->id == $do->chef) {
		echo img('images/joueurs/mini_laurier.png', _('Grand chef'));
	}
	
	echo '&nbsp;</td>
	<td align=\'right\'>&nbsp;'.$do->lvl.'&nbsp;</td>
	<td align=\'right\'>&nbsp;'.nbf($do->terrain).'&nbsp;</td>
	<td>&nbsp;';
	if(!empty($do->alliance)) {
		echo '<a href="'._('profilsalliance').'-'.$do->alliance.'">'.$do->nom.'</a>';
	}
	else {
		echo _('Aucune');
	}
	echo '&nbsp;</td></tr>';
}

echo '</tbody>
</table>
<br/>';

?>