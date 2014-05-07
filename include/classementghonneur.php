<?php

$classement = $paquet -> get_answer('get_classementgh')->{1};

echo '<h1>'._('Classement général de l\'honneur').'</h1><br/>';

echo '<div class="centrer">'._(
'Chaque semaine, le joueur ayant le plus d\'honneur gagne une récompense.<br/>
L\'honneur est remis à zéro tous les dimanches matin à minuit. ').
'<br/><br/></div>';

echo '<table>
	<thead>
	<tr class=\'tableau_header\'>
		<td>'._('N°').'</td>
		<td>'._('Pseudo').'</td>
		<td>'._('Niveau').'</td>
		<td>'._('XP').'</td>';

if($paquet->get_infoj('statu') == 1) {
echo '
		<td>'._('Victoires').'</td>
		<td>'._('Défaites').'</td>
		<td>'._('Terrain').'</td>';
}

echo '
		<td>'._('Alliance').'</td>
		<td>'._('Honneur').'</td>
	</tr>
	</thead><tfoot></tfoot><tbody>';
$i=1;
foreach($classement as $j) {
echo '
<tr>
	<td>&nbsp;'.$i.'&nbsp;</td>
	<td>&nbsp;<a href=\''._('profilsjoueur').'-'.$j->id.'\'>'.
	$j->login.'</a>&nbsp;</td>
	<td class="centrer">&nbsp;'.($j->lvl).'&nbsp;</td>
	<td class="centrer">&nbsp;'.nbf(round($j->points)).'&nbsp;</td>';

if($paquet->get_infoj('statu') == 1) {
echo '
	<td class="centrer">&nbsp;'.nbf($j->victoires).'&nbsp;</td>
	<td class="centrer">&nbsp;'.nbf($j->defaites).'&nbsp;</td>
	<td class="centrer">&nbsp;'.nbf($j->terrain).'&nbsp;</td>';
}

echo '
	<td>&nbsp;<a href=\''._('profilsalliance').'-'.$j->alliance.'\'>'.
	ucfirst(stripslashes($j->nom)).'</a>&nbsp;</td>
	<td class="centrer">&nbsp;'.nbf($j->honneur).'&nbsp;</td>
</tr>';
	$i++;
}

echo '</tbody></table>';

if($paquet->get_infoj('statu') == 1) {
echo '
	<div class="centrer gras"><br/>
	<a href=\''._('honneur').'\'>'._('Classement de l\'honneur').'</a><br/><br/>
	</div>';
}

?>
