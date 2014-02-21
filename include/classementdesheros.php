<?php

if (isset($_GET['var1']) && is_numeric($_GET['var1']) ) {
  $page = $_GET['var1'];
  $i=25*($page-1)+1;
}
else {
  $page = 1; // On se met sur la page 1 (par défaut)
  $i=1;// On met dans une variable le nombre de messages qu'on veut par page
}

$classement    = $paquet->get_answer('get_classementheros')->{1};
$nombreDePages = $paquet->get_answer('get_classementheros')->{2};
$classes       = $paquet->get_answer('get_liste_classes')->{1};

$writepseudo='<a href="'._('classementdesheros').'-'.$page.'-pseudo" >'._('Pseudo').'</a>';
$writeniveau='<a href="'._('classementdesheros').'-'.$page.'-niveau" >'._('Niveau').'</a>';
$writexp='<a href="'._('classementdesheros').'-'.$page.'-xp" >'._('XP').'</a>';
$writclasse=_('Classe');

if ($par == 'pseudo') {
	$writepseudo='<span class="jaune">'._('Pseudo').'</span>';
}
elseif ($par =='xp') {
	$writexp='<span class="jaune">'._('XP').'</span>';
}
else {
	$par='niveau'; 
	$writeniveau='<span class="jaune">'._('Niveau').'</span>';
}

echo '
<div id="cadre_classement">
<div id="class_gauche">';

if(($page > 1) && empty($joueur)) {
	echo '<a href="'._('classementdesheros').'-' . ($page-1) . '-'.
	               $par.$alliance_lien.'"><img src="images/utils/fleche_gauche.png"
	                                           alt="'._('Flèche Gauche').'" 
	                                           title="'._('Flèche Gauche').'" /></a>';
}

echo '
</div>
<div id="class_centre">';

echo '<table>
	<thead>
	<tr>
		<td>N°&nbsp;</td>
		<td>'.$writepseudo.'</td>
		<td>'.$writeniveau.'</td>
		<td>'.$writclasse.'</td>
		<td class="centrer">'.$writexp.'</td>
	</tr>
	</thead><tfoot></tfoot><tbody>';

foreach($classement as $do) {
	
echo '<tr>
<td class="droite">&nbsp;'.$i.'&nbsp;</td>
<td class="gauche">&nbsp;<a href="'._('profilsjoueur').'-'.$do->joueur.'"
                            class="login_class">'.ucfirst($do->login).'</a>&nbsp;</td>
<td class="centrer">&nbsp;'.($do->lvl).'&nbsp;</td>
<td class="centrer">&nbsp;'.$classes->{$do->classe_id}->nom.'&nbsp;</td>
<td class="droite">&nbsp;'.nbf(round($do->points)).'&nbsp;</td>';

echo '
</tr>';

}
echo'</tbody></table><br/>
</div>
<div id="class_droite">';
if(($page < $nombreDePages) && empty($joueur)) {
	echo '<a href="'._('classementdesheros').'-' . ($page+1) . '-'.
	               $par.$alliance_lien.'"><img src="images/utils/fleche_droite.png"
	                                           alt="'._('Flèche Droite').'" 
	                                           title="'._('Flèche Droite').'" /></a>';
}

echo '</div>
</div>';

?>