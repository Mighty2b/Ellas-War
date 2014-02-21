<?php

$classement   = $paquet->get_answer('get_classementa')->{1};
$nombreDePages= $paquet->get_answer('get_classementa')->{2};

$page_nom = '<a href="'._('classementdesalliances').'-1-nom"
                class="titre_tab">'._('Nom').'</a>';
$page_chef= '<a href="'._('classementdesalliances').'-1-chef"
                class="titre_tab">'._('Chef').'</a>';
$page_mbs = '<a href="'._('classementdesalliances').'-1-mbs"
                class="titre_tab">'._('Mbs').'</a>';
$page_lvl = '<a href="'._('classementdesalliances').'-1-lvl"
                class="titre_tab">'._('Niveau').'</a>';
$page_xp	= '<a href="'._('classementdesalliances').'-1-xp"
                class="titre_tab">'._('XP').'</a>';
$page_vic	= '<a href="'._('classementdesalliances').'-1-vic"
                class="titre_tab">'._('Victoires').'</a>';
$page_def	=	'<a href="'._('classementdesalliances').'-1-def"
                class="titre_tab">'._('Défaites').'</a>';

echo '<h1>'._('Classement des alliances').'</h1>';

if($nombreDePages > 1) {
$pageread = $page;

$num = $pageread - 3;
$numl = $pageread + 2;

if ($num < 1)
{
$num = 1;
}

if ($numl > $nombreDePages)
{
	$numl = $nombreDePages;
}

echo '<div class="min_ban3">';

if ($num > 1)
{
	echo '<a href="'._('classementdesalliances').'-1-'.$type.'" >1</a>  ... ';
}

	for ($j = $num ; $j <= $numl ; $j++)
	{

		if ($pageread == $j)
		{
			echo '<span class="gras">'.$j.'</span> ';
		}
		else
		{
			 echo '<a href="'._('classementdesalliances').'-' . $j . '-'.$type.'" class="sans_soulign">' . $j . '</a> ';
		}
	}

	if ($numl < $nombreDePages)
	{
		echo '... <a href="'._('classementdesalliances').'-'.$nombreDePages.'-'.$type.'">'.$nombreDePages.'</a> ';
	}
echo '</div>';
}

echo '
<div id="cadre_classement">
<div id="class_gauche">';

if($page > 1) {
	echo '<a href="'._('classementdesalliances').'-' . ($page-1) . '-'.$type.'"><img src="images/menu/fleche_gauche.png" alt="Flèche Gauche" title="Flèche Gauche" /></a>';
}
if($type == 'nom') {
	$page_nom = '<span class="jaune">'._('Nom').'</span>';
}
elseif($type == 'chef') {
	$page_chef= '<span class="jaune">'._('Chef').'</span>';
}
elseif($type == 'mbs') {
	$page_mbs = '<span class="jaune">'._('Mbs').'</span>';
}
elseif($type == 'xp') {
	$page_xp	= '<span class="jaune">'._('XP').'</span>';
}
elseif($type == 'vic') {
	$page_vic	= '<span class="jaune">'._('Victoires').'</span>';
}
elseif($type == 'def') {
	$page_def	=	'<span class="jaune">'._('Défaites').'</span>';
}
elseif($type == 'trophees1' or $type == 'trophees2' or $type == 'trophees3' or
			 $type == 'trophees4' or $type == 'trophees5' or $type == 'trophees6' or
			 $type == 'trophees7') {

}
else {
	$page_lvl = '<span class="jaune">'._('Niveau').'</span>';
}

echo '</div>
<div id="class_centre">
<table><thead>
	<tr>
<td>N°</td>
<td>'.$page_nom.'</td>
<td>'.$page_chef.'</td>';

if($paquet->get_infoj('statu') == 1) {
	echo '<td>'.$page_mbs.'</td>';
}

echo '<td>'.$page_lvl.'&nbsp;</td>
<td>'.$page_xp.'</td>
<td>'.$page_vic.'</td>';

if($paquet->get_infoj('statu') == 1) {
echo '<td>'.$page_def.'</td>
<td valign="middle"><a href="'._('classementdesalliances').'-1-trophees7"><img src="images/alliance/mini-laurier.png" alt="'._('Trophée du conflit titanesque').'" title="'._('Trophée du conflit titanesque').'" /></a></td>
<td valign="middle"><a href="'._('classementdesalliances').'-1-trophees6"><img src="images/alliance/mini-laurier-argent.png" alt="'._('Trophée de l\'archarnement divin').'" title="'._('Trophée de l\'archarnement divin').'" /></a></td>
<td valign="middle"><a href="'._('classementdesalliances').'-1-trophees5"><img src="images/alliance/mini-laurier-bronze.png" alt="'._('Trophée de l\'honneur destructeur').'" title="'._('Trophée de l\'honneur destructeur').'" /></a></td>
<td valign="middle"><a href="'._('classementdesalliances').'-1-trophees4"><img src="images/alliance/mini-laurier-vert.png" alt="'._('Trophée de la cruauté').'" title="'._('Trophée de la cruauté').'" /></a></td>
<td valign="middle"><a href="'._('classementdesalliances').'-1-trophees3"><img src="images/alliance/mini-laurier-bleu.png" alt="'._('Trophée de la loyauté').'" title="'._('Trophée de la loyauté').'" /></a></td>
<td valign="middle"><a href="'._('classementdesalliances').'-1-trophees2"><img src="images/alliance/mini-laurier-noir.png" alt="'._('Trophée de l\'orgueil naïf').'" title="'._('Trophée de l\'orgueil naïf').'" /></a></td>
<td valign="middle"><a href="'._('classementdesalliances').'-1-trophees1"><img src="images/alliance/mini-laurier-indigo.png" alt="'._('Trophée du massacre incompréhensible').'" title="'._('Trophée du massacre incompréhensible').'" /></a></td>';
}

echo '
</tr></thead><tfoot></tfoot><tbody>';

foreach($classement as $donnees) {

echo'<tr>
	<td class="droite">&nbsp;'.$i.'&nbsp;</td>
	<td class="gauche">&nbsp;<a href="'._('profilsalliance').'-'.$donnees->id.'" class="login_class">'.stripslashes($donnees->nom).'</a></td>
	<td>&nbsp;<a href=\''._('profilsjoueur').'-'.$donnees->chef.'\' class="sans_soulign">'.$donnees->login.'</a></td>';

if($paquet->get_infoj('statu') == 1) {
	echo '<td class="centrer">&nbsp;'.$donnees->nbmembre.'</td>';
}

echo '<td class="centrer">&nbsp;'.$donnees->level.'</td>
	<td>&nbsp;'.nbf(round($donnees->xp)).'</td>
	<td class="centrer">&nbsp;'.$donnees->victoires.'</td>';

if($paquet->get_infoj('statu') == 1) {
echo '<td class="centrer">&nbsp;'.$donnees->defaites.'</td>
	<td class="centrer">&nbsp;'.$donnees->trophees7.'</td>
	<td class="centrer">&nbsp;'.$donnees->trophees6.'</td>
	<td class="centrer">&nbsp;'.$donnees->trophees5.'</td>
	<td class="centrer">&nbsp;'.$donnees->trophees4.'</td>
	<td class="centrer">&nbsp;'.$donnees->trophees3.'</td>
	<td class="centrer">&nbsp;'.$donnees->trophees2.'</td>
	<td class="centrer">&nbsp;'.$donnees->trophees1.'</td>';
}

echo '</tr>';

}
echo'</tbody></table><br/>
</div>
<div id="class_droite">';

if($nombreDePages > 1 && $page < $nombreDePages) {
	echo '<a href="'._('classementdesalliances').'-' . ($page+1) . '-'.$type.'"><img src="images/menu/fleche_droite.png" alt="'._('Flèche Droite').'" title="'._('Flèche Droite').'" /></a>';
}

echo '</div>
</div>';

?>