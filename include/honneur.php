<?php

$classement = $paquet->get_answer('get_classementh')->{1};
$dernier    = $paquet->get_answer('get_classementh')->{2};

echo '<h1>'._('Classement de l\'honneur').'</h1><br/>';

echo '<div class="centrer">'._(
'Chaque semaine, le joueur ayant le plus d\'honneur gagne une récompense.<br/>'.
'L\'honneur est remis à zéro tous les dimanches matin à minuit. ').
'<br/><br/></div>

<table>
<thead>
	<tr class=\'tableau_header\'>
		<td>&nbsp;'._('N°').'&nbsp;</td>
		<td>&nbsp;'._('Pseudo').'&nbsp;</td>
		<td>&nbsp;'._('Niveau').'&nbsp;</td>
		<td>&nbsp;'._('XP').'&nbsp;</td>
		<td>&nbsp;'._('Victoires').'&nbsp;</td>
		<td>&nbsp;'._('Défaites').'&nbsp;</td>
		<td>&nbsp;'._('Terrain').'&nbsp;</td>
		<td>&nbsp;'._('Alliance').'&nbsp;</td>
		<td>&nbsp;'._('Honneur').'&nbsp;</td>
	</tr>
</thead><tfoot></tfoot><tbody>';
$i=1;
foreach($classement as $j) {
echo '
<tr>
	<td>&nbsp;'.$i.'&nbsp;</td>
	<td>&nbsp;<a href=\''._('profilsjoueur').'-'.$j->id.'\'>'.$j->login.'</a>&nbsp;</td>
	<td>&nbsp;'.($j->lvl).'&nbsp;</td>
	<td>&nbsp;'.nbf(round($j->points)).'&nbsp;</td>
	<td>&nbsp;'.nbf($j->victoires).'&nbsp;</td>
	<td>&nbsp;'.nbf($j->defaites).'&nbsp;</td>
	<td>&nbsp;'.nbf($j->terrain).'&nbsp;</td>
	<td>&nbsp;<a href=\''._('profilsalliance').'-'.$j->alliance.'\'>'.ucfirst(stripslashes($j->nom)).'</a>&nbsp;</td>
	<td>&nbsp;'.nbf($j->honneur).'&nbsp;</td>
</tr>';
	$i++;
}

echo '</tbody></table>';

if(!empty($dernier)) {
	echo '<br/><div class="ligne centrer">
	'._('Dernier vainqueur').' : <a href="'.
	_('profilsjoueur').'-'.$dernier->joueur.'" class="interdit sous">'.$dernier->login.'</a>
	</div>';
}

echo '<h2 class="centrer"><a href=\''.
     _('classementghonneur').'\'>'._('Classement général de l\'honneur').
     '</a></h2>';

?>