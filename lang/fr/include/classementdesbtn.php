<?php

// Maintenant on va définir les variables selon le type de classement voulut

$writepseudo="<a href=\"classementdesbtn-$page-pseudo\" class='titre_tab' >Pseudo</a>";
$writeniveau="<a href=\"classementdesbtn-$page-niveau\" class='titre_tab' >Niveau</a>";
$writep="<a href=\"classementdesbtn-$page\" class='titre_tab' >Points</a>";
$writeppub="<a href=\"classementdesbtn-$page-pub\" class='titre_tab' >Points publics</a>";
$writeppriv="<a href=\"classementdesbtn-$page-priv\" class='titre_tab' >Points privés</a>";
$writealliance="<a href=\"classementdesbtn-$page-alliance\" class='titre_tab' >Alliance</a>";

if ($par == 'alliance') {
	$writealliance="<span class='jaune'>Alliance</span>";
}
elseif ($par == 'pseudo') {
	$writepseudo="<span class='jaune'>Pseudo</span>";
}
elseif ($par == 'niveau') {
	$writeniveau="<span class='jaune'>Niveau</span>";
}
elseif($par == 'pub') {
	$writeppub="<span class='jaune'>Points publics</span>";
}
elseif($par == 'priv') {
	$writeppriv="<span class='jaune'>Points privés</span>";
}
else {
	$par == 'total';
	$writep="<span class='jaune'>Points</span>";
}

?>
<h1 class="title_faq">Classement des batailles navales</h1>

<div class="min_ban2">
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
		echo '<a href="classementdesbtn-1-'.$par.'" class="sans_soulign">1</a>  ... ';
	}

	for ($j = $num ; $j <= $numl ; $j++) {
		if($pageread == $j) {
			echo '<span class="gras">'.$j.'</span> ';
		}
		else {
			echo '<a href="classementdesbtn-' . $j . '-'.$par.'" class="sans_soulign">' . $j . '</a> ';
		}
	}

	if ($numl < $nombreDePages) {
		echo '... <a href="classementdesbtn-'.$nombreDePages.'-'.$par.'" class="sans_soulign">'.$nombreDePages.'</a> ';
	}
}
?>
	</div>
</div>

<div id="cadre_classement">
<div id="class_gauche">
<?php

if(($page > 1) && empty($joueur)) {
	echo '<a href="classementdesbtn-' . ($page-1) . '-'.$par.'"><img src="images/menu/fleche_gauche.png" alt="Flèche Gauche" title="Flèche Gauche" /></a>';
}

echo '</div>
<div id="class_centre">';

echo "<table class='tableau'>
	<tr class='tableau_header'>
		<td>&nbsp;N°&nbsp;</td>
		<td>&nbsp;".$writepseudo."&nbsp;</td>
		<td>&nbsp;".$writeniveau."&nbsp;</td>
		<td>&nbsp;".$writep."&nbsp;</td>
		<td>&nbsp;".$writeppub."&nbsp;</td>
		<td>&nbsp;".$writeppriv."&nbsp;</td>
		<td>&nbsp;".$writealliance."&nbsp;</td>
	</tr>";

foreach($classement as $do) {
	if($i != 0) {
			echo'<tr class="tableau_fond2"><td colspan="9"></td></tr>';
	}
	
echo '<tr class="tableau_fond'.($i%2).'">
<td class="droite">&nbsp;'.$i.'&nbsp;</td>
<td class="gauche">&nbsp;<a href=\'profilsjoueur-'.$do->id.'\' class="login_class">'.ucfirst($do->login).'</a>&nbsp;</td>
<td class="centrer">&nbsp;'.($do->lvl).'&nbsp;</td>
<td class="droite">&nbsp;'.nbf($do->total).'&nbsp;</td>
<td class="centrer">&nbsp;'.nbf($do->pub).'&nbsp;</td>
<td class="centrer">&nbsp;'.nbf($do->priv).'&nbsp;</td>';

if(!empty($do->nom)) {
	echo '<td>&nbsp;<a href=\'profilsalliance-'.$do->alliance.'\' class="sans_soulign">'.ucfirst(stripslashes($do->nom)).'</a>&nbsp;</td>';
}
else {
	echo '<td class="sans_soulign">&nbsp;Aucune&nbsp;</td>';
}

echo '</tr>';

	$i++;
}
echo'</table><br/>
</div>
<div id="class_droite">';
if(($page < $nombreDePages) && empty($joueur)) {
	echo '<a href="classementdesbtn-' . ($page+1) . '-'.$par.'"><img src="images/menu/fleche_droite.png" alt="Flèche Droite" title="Flèche Droite" /></a>';
}

?>
</div>
</div>