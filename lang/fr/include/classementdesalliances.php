<?php

$page_nom = '<a href="classementdesalliances-1-nom" class=\'titre_tab\'>Nom</a>';
$page_chef= '<a href="classementdesalliances-1-chef" class=\'titre_tab\'>Chef</a>';
$page_mbs = '<a href="classementdesalliances-1-mbs" class=\'titre_tab\'>Mbs</a>';
$page_lvl = '<a href="classementdesalliances-1-lvl" class=\'titre_tab\'>Niveau</a>';
$page_xp	= '<a href="classementdesalliances-1-xp" class=\'titre_tab\'>XP</a>';
$page_vic	= '<a href="classementdesalliances-1-vic" class=\'titre_tab\'>Victoires</a>';
$page_def	=	'<a href="classementdesalliances-1-def" class=\'titre_tab\'>Défaites</a>';

echo '<h1>Classement des alliances</h1>';

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
	echo '<a href="classementdesalliances-1-'.$type.'" >1</a>  ... ';
}

	for ($j = $num ; $j <= $numl ; $j++)
	{

		if ($pageread == $j)
		{
			echo '<span class="gras">'.$j.'</span> ';
		}
		else
		{
			 echo '<a href="classementdesalliances-' . $j . '-'.$type.'" class="sans_soulign">' . $j . '</a> ';
		}
	}

	if ($numl < $nombreDePages)
	{
		echo '... <a href="classementdesalliances-'.$nombreDePages.'-'.$type.'">'.$nombreDePages.'</a> ';
	}
echo '</div>';
}

echo '
<div id="cadre_classement">
<div id="class_gauche">';

if($page > 1) {
	echo '<a href="classementdesalliances-' . ($page-1) . '-'.$type.'"><img src="images/menu/fleche_gauche.png" alt="Flèche Gauche" title="Flèche Gauche" /></a>';
}
if($type == 'nom') {
	$page_nom = '<span class="jaune">Nom</span>';
}
elseif($type == 'chef') {
	$page_chef= '<span class="jaune">Chef</span>';
}
elseif($type == 'mbs') {
	$page_mbs = '<span class="jaune">Mbs</span>';
}
elseif($type == 'xp') {
	$page_xp	= '<span class="jaune">XP</span>';
}
elseif($type == 'vic') {
	$page_vic	= '<span class="jaune">Victoires</span>';
}
elseif($type == 'def') {
	$page_def	=	'<span class="jaune">Défaites</span>';
}
elseif($type == 'trophees1' or $type == 'trophees2' or $type == 'trophees3' or
			 $type == 'trophees4' or $type == 'trophees5' or $type == 'trophees6' or
			 $type == 'trophees7') {

}
else {
	$page_lvl = '<span class="jaune">Niveau</span>';
}

echo '</div>
<div id="class_centre">
<table class=\'tableau\'>
	<tr class=\'tableau_header\'>
<td>&nbsp;N°&nbsp;</td>
<td>&nbsp;'.$page_nom.'&nbsp;</td>
<td>&nbsp;'.$page_chef.'&nbsp;</td>
<td>&nbsp;'.$page_mbs.'&nbsp;</td>
<td>&nbsp;'.$page_lvl.'&nbsp;</td>
<td>&nbsp;'.$page_xp.'&nbsp;</td>
<td>&nbsp;'.$page_vic.'&nbsp;</td>
<td>&nbsp;'.$page_def.'&nbsp;</td>
<td valign="middle"><a href="classementdesalliances-1-trophees7"><img src="images/alliance/mini-laurier.png" alt="Trophée du conflit titanesque" title="Trophée du conflit titanesque" /></a></td>
<td valign="middle"><a href="classementdesalliances-1-trophees6"><img src="images/alliance/mini-laurier-argent.png" alt="Trophée de l\'archarnement divin" title="Trophée de l\'archarnement divin" /></a></td>
<td valign="middle"><a href="classementdesalliances-1-trophees5"><img src="images/alliance/mini-laurier-bronze.png" alt="Trophée de l\'honneur destructeur" title="Trophée de l\'honneur destructeur" /></a></td>
<td valign="middle"><a href="classementdesalliances-1-trophees4"><img src="images/alliance/mini-laurier-vert.png" alt="Trophée de la crutauté" title="Trophée de la crutauté" /></a></td>
<td valign="middle"><a href="classementdesalliances-1-trophees3"><img src="images/alliance/mini-laurier-bleu.png" alt="Trophée de la loyauté" title="Trophée de la loyauté" /></a></td>
<td valign="middle"><a href="classementdesalliances-1-trophees2"><img src="images/alliance/mini-laurier-noir.png" alt="Trophée de l\'orgueil naïf" title="Trophée de l\'orgueil naïf" /></a></td>
<td valign="middle"><a href="classementdesalliances-1-trophees1"><img src="images/alliance/mini-laurier-indigo.png" alt="Trophée du massacre incompréhensible" title="Trophée du massacre incompréhensible" /></a></td>
</tr>';

foreach($classement as $donnees) {
	if($i != 0) {
			echo'<tr class="tableau_fond2"><td colspan="15"></td></tr>';
	}

echo'<tr class="tableau_fond'.($i%2).'">
	<td class="droite">&nbsp;'.$i.'&nbsp;</td>
	<td class="gauche">&nbsp;<a href="profilsalliance-'.$donnees->id.'" class="login_class">'.stripslashes($donnees->nom).'</a></td>
	<td>&nbsp;<a href=\'profilsjoueur-'.$donnees->chef.'\' class="sans_soulign">'.$donnees->login.'</a></td>
	<td class="centrer">&nbsp;'.$donnees->nbmembre.'</td>
	<td class="centrer">&nbsp;'.$donnees->level.'</td>
	<td>&nbsp;'.nbf(round($donnees->xp)).'</td>
	<td class="centrer">&nbsp;'.$donnees->victoires.'</td>
	<td class="centrer">&nbsp;'.$donnees->defaites.'</td>
	<td class="centrer">&nbsp;'.$donnees->trophees7.'</td>
	<td class="centrer">&nbsp;'.$donnees->trophees6.'</td>
	<td class="centrer">&nbsp;'.$donnees->trophees5.'</td>
	<td class="centrer">&nbsp;'.$donnees->trophees4.'</td>
	<td class="centrer">&nbsp;'.$donnees->trophees3.'</td>
	<td class="centrer">&nbsp;'.$donnees->trophees2.'</td>
	<td class="centrer">&nbsp;'.$donnees->trophees1.'</td>
	</tr>';
	
	$i++;
}
echo'</table><br/>
</div>
<div id="class_droite">';

if($page < $nombreDePages) {
	echo '<a href="classementdesalliances-' . ($page+1) . '-'.$type.'"><img src="images/menu/fleche_droite.png" alt="Flèche Droite" title="Flèche Droite" /></a>';
}

?>
</div>
</div>