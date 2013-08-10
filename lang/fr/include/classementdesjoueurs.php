<?php

// Maintenant on va définir les variables selon le type de classement voulut

if(!empty($joueur)) {
	$writepseudo="<a href=\"classementdesjoueurs-$page-pseudo$alliance_lien\" class='titre_tab' >Pseudo</a>";
	$writeniveau="<a href=\"classementdesjoueurs-$page-niveau$alliance_lien\" class='titre_tab' >Niveau</a>";
	$writevictoires="<a href=\"classementdesjoueurs-$page-victoires$alliance_lien\" class='titre_tab' >Victoires</a>";
	$writedefaites="<a href=\"classementdesjoueurs-$page-defaites$alliance_lien\" class='titre_tab' >Défaites</a>";
	$writeterrain="<a href=\"classementdesjoueurs-$page-terrain$alliance_lien\" class='titre_tab' >Terrain</a>";
	$writexp="<a href=\"classementdesjoueurs-$page-xp$alliance_lien\" class='titre_tab' >XP</a>";
	$writealliance="<a href=\"classementdesjoueurs-$page-alliance$alliance_lien\" class='titre_tab' >Alliance</a>";
	$writeparrain = '<a href="classementdesjoueurs-'.$page.'-filleuls'.$alliance_lien.'" class="titre_tab" >Filleuls</a>';
}
else {
	$writepseudo="<a href=\"classementdesjoueurs-$page-pseudo$alliance_lien\" class='titre_tab' >Pseudo</a>";
	$writeniveau="<a href=\"classementdesjoueurs-$page-niveau$alliance_lien\" class='titre_tab' >Niveau</a>";
	$writevictoires="<a href=\"classementdesjoueurs-$page-victoires$alliance_lien\" class='titre_tab' >Victoires</a>";
	$writedefaites="<a href=\"classementdesjoueurs-$page-defaites$alliance_lien\" class='titre_tab' >Défaites</a>";
	$writeterrain="<a href=\"classementdesjoueurs-$page-terrain$alliance_lien\" class='titre_tab' >Terrain</a>";
	$writexp="<a href=\"classementdesjoueurs-$page-xp$alliance_lien\" class='titre_tab' >XP</a>";
	$writealliance="<a href=\"classementdesjoueurs-$page-alliance$alliance_lien\" class='titre_tab' >Alliance</a>";
	$writeparrain = '<a href="classementdesjoueurs-'.$page.'-filleuls'.$alliance_lien.'" class="titre_tab" >Filleuls</a>';
}

if ($par == 'victoires') {
	$writevictoires="<span class='jaune'>Victoires</span>";
}
elseif ($par == 'defaites') {
	$writedefaites="<span class='jaune'>Défaites</span>";
}
elseif ($par == 'terrain') {
	$writeterrain="<span class='jaune'>Terrain</span>";
}
elseif ($par == 'alliance') {
	$writealliance="<span class='jaune'>Alliance</span>";
}
elseif ($par == 'pseudo') {
	$writepseudo="<span class='jaune'>Pseudo</span>";
}
elseif ($par =='xp') {
	$writexp="<span class='jaune'>XP</span>";
}
elseif ($par =='filleuls') {
	$writeparrain="<span class='jaune'>Filleuls</span>";
}
else {
	$par="niveau"; 
	$writeniveau="<span class='jaune'>Niveau</span>";
}
?>
<h1 class="title_faq">Classement des chefs de cité</h1>

<div class="min_ban2">
<form action="classementdesjoueurs" method="post" name="classement">
	<div class="form_rech3"><input type="text" name="joueur" class="form_rech" required="required"/></div>
	<div class="form_rech4">
		<div class="bouton_classique"><input class="bouton_classique2" type="submit" value="RECHERCHER" name="RECHERCHER"/></div>
	</div>
	<div class="form_rech5">
<?php
if(($nombreDePages > 1) && empty($joueur)) {
	$pageread = $page;
	$num = $pageread - 3;
	$numl = $pageread + 2;
	if ($num < 1) {
		$num = 1;
	}
	if ($numl > $nombreDePages) {
		$numl = $nombreDePages;
	}

	if ($num > 1) {
		echo '<a href="classementdesjoueurs-1-'.$par.$alliance_lien.'" class="sans_soulign">1</a>  ... ';
	}

	for ($j = $num ; $j <= $numl ; $j++) {
		if($pageread == $j) {
			echo '<span class="gras">'.$j.'</span> ';
		}
		else {
			echo '<a href="classementdesjoueurs-' . $j . '-'.$par.$alliance_lien.'" class="sans_soulign">' . $j . '</a> ';
		}
	}

	if ($numl < $nombreDePages) {
		echo '... <a href="classementdesjoueurs-'.$nombreDePages.'-'.$par.$alliance_lien.'" class="sans_soulign">'.$nombreDePages.'</a> ';
	}
}
?>
	</div>
</form>
</div>

<div id="cadre_classement">
<div id="class_gauche">
<?php
if(($page > 1) && empty($joueur)) {
	echo '<a href="classementdesjoueurs-' . ($page-1) . '-'.$par.$alliance_lien.'"><img src="images/menu/fleche_gauche.png" alt="Flèche Gauche" title="Flèche Gauche" /></a>';
}
?>
</div>
<div id="class_centre">
<?php

echo "<table class='tableau'>
	<tr class='tableau_header'>
		<td>&nbsp;N°&nbsp;</td><td>&nbsp;".$writepseudo."&nbsp;</td><td>&nbsp;".$writeniveau."&nbsp;</td><td class=\"centrer\">&nbsp;".$writexp."&nbsp;</td><td>&nbsp;".$writevictoires."&nbsp;</td><td>&nbsp;".$writedefaites."&nbsp;</td><td>&nbsp;".$writeterrain."&nbsp;</td><td>&nbsp;".$writealliance."&nbsp;</td>
<td>&nbsp;".$writeparrain."&nbsp;</td>
	</tr>";

foreach($classement as $do) {
	if($i != 0) {
			echo'<tr class="tableau_fond2"><td colspan="9"></td></tr>';
	}
	
echo '<tr class="tableau_fond'.($i%2).'">
<td class="droite">&nbsp;'.$i.'&nbsp;</td>
<td class="gauche">&nbsp;<a href=\'profilsjoueur-'.$do->id.'\' class="login_class">'.ucfirst($do->login).'</a>&nbsp;</td>
<td class="centrer">&nbsp;'.($do->lvl).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf(round($do->points)).'&nbsp;</td>
<td class="centrer">&nbsp;'.nbf($do->victoires).'&nbsp;</td>
<td class="centrer">&nbsp;'.$do->defaites.'&nbsp;</td>
<td class="centrer">&nbsp;'.nbf($do->terrain).'&nbsp;</td>';

if(!empty($do->nom)) {
	echo '<td>&nbsp;<a href=\'profilsalliance-'.$do->alliance.'\' class="sans_soulign">'.ucfirst(stripslashes($do->nom)).'</a>&nbsp;</td>';
}
else {
	echo '<td class="sans_soulign">&nbsp;Aucune&nbsp;</td>';
}

echo '<td class="centrer">&nbsp;'.$do->nb_fil.'&nbsp;</td>
</tr>';

	$i++;
}
echo'</table><br/>
</div>
<div id="class_droite">';
if(($page < $nombreDePages) && empty($joueur)) {
	echo '<a href="classementdesjoueurs-' . ($page+1) . '-'.$par.$alliance_lien.'"><img src="images/menu/fleche_droite.png" alt="Flèche Droite" title="Flèche Droite" /></a>';
}

?>
</div>
</div>