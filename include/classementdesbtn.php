<?php

$classement    = $paquet->get_answer('get_classementbtn')->{1};
$nombreDePages = $paquet->get_answer('get_classementbtn')->{2};

$writepseudo='<a href="'._('classementdesbtn').'-'.$page.'-pseudo"
                 class="titre_tab">Pseudo</a>';
$writeniveau='<a href="'._('classementdesbtn').'-'.$page.'-niveau"
                 class="titre_tab">Niveau</a>';
$writep='<a href="'._('classementdesbtn').'-'.$page.'"
		        class="titre_tab">Score</a>';
$writeppub='<a href="'._('classementdesbtn').'-'.$page.'-pub"
               class="titre_tab">Score publics</a>';
$writeppriv='<a href="'._('classementdesbtn').'-'.$page.'-priv" 
                class="titre_tab">Score privés</a>';
$writealliance='<a href="'._('classementdesbtn').'-'.$page.'-alliance"
                   class="titre_tab">Alliance</a>';

if ($par == 'alliance') {
	$writealliance='<span class="jaune">'._('Alliance').'</span>';
}
elseif ($par == 'pseudo') {
	$writepseudo='<span class="jaune">'._('Pseudo').'</span>';
}
elseif ($par == 'niveau') {
	$writeniveau='<span class="jaune">'._('Niveau').'</span>';
}
elseif($par == 'pub') {
	$writeppub='<span class="jaune">'._('Score publics').'</span>';
}
elseif($par == 'priv') {
	$writeppriv='<span class="jaune">'._('Score privés').'</span>';
}
else {
	$par == 'total';
	$writep='<span class="jaune">'._('Score général').'</span>';
}

echo '<h1>'._('Classement des batailles navales').'</h1>

<div class="min_ban2">
	<div class="form_rech5">';

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
		echo '<a href="'._('classementdesbtn').'-1-'.$par.'" class="sans_soulign">1</a>  ... ';
	}

	for ($j = $num ; $j <= $numl ; $j++) {
		if($pageread == $j) {
			echo '<span class="gras">'.$j.'</span> ';
		}
		else {
			echo '<a href="'._('classementdesbtn').'-' . $j . '-'.$par.'" class="sans_soulign">' . $j . '</a> ';
		}
	}

	if ($numl < $nombreDePages) {
		echo '... <a href="'._('classementdesbtn').'-'.$nombreDePages.'-'.$par.'" class="sans_soulign">'.$nombreDePages.'</a> ';
	}
}

echo '
	</div>
</div>

<div id="cadre_classement">
<div id="class_gauche">';

if(($page > 1) && empty($joueur)) {
	echo '<a href="'._('classementdesbtn').'-' . ($page-1) . '-'.$par.'"><img src="images/menu/fleche_gauche.png" alt="Flèche Gauche" title="Flèche Gauche" /></a>';
}

echo '</div>
<div id="class_centre">';

echo '<table><thead>
	<tr class="centrer">
		<td>N°&nbsp;</td>
		<td>'.$writepseudo.'</td>';

if($paquet->get_infoj('statu') == 1) {
	echo	'<td>'.$writeniveau.'</td>
		<td>'.$writealliance.'</td>';
}

echo '<td>'.$writeppub.'</td>
		<td>'.$writeppriv.'</td>
		<td>'.$writep.'</td>		
	</tr></thead><tfoot></tfoot><tbody>';

foreach($classement as $do) {

echo '<tr>
<td class="droite">&nbsp;'.$i.'&nbsp;</td>
<td class="gauche">&nbsp;<a href="'._('profilsjoueur').'-'.$do->id.'"
                            class="login_class">'.ucfirst($do->login).'</a>&nbsp;</td>';

if($paquet->get_infoj('statu') == 1) {
	echo	'<td class="centrer">&nbsp;'.($do->lvl).'&nbsp;</td>';
	
	if(!empty($do->nom)) {
		echo '<td>&nbsp;<a href="'._('profilsalliance').'-'.$do->alliance.'"
		                   class="sans_soulign">'.ucfirst(stripslashes($do->nom)).'</a>&nbsp;</td>';
	}
	else {
		echo '<td class="sans_soulign">&nbsp;Aucune&nbsp;</td>';
	}
}
echo '<td class="centrer">&nbsp;'.nbf($do->pub).'&nbsp;</td>
<td class="centrer">&nbsp;'.nbf($do->priv).'&nbsp;</td>
<td class="centrer">&nbsp;'.nbf($do->total).'&nbsp;</td></tr>';

	$i++;
}
echo'</tbody></table><br/>
</div>
<div id="class_droite">';

if(($page < $nombreDePages) && empty($joueur)) {
	echo '<a href="'._('classementdesbtn').'-'.
	                ($page+1).'-'.$par.'"><img src="images/menu/fleche_droite.png"
	                                           alt="'._('Flèche Droite').'" 
	                                           title="'._('Flèche Droite').'" /></a>';
}

echo '</div>
</div>';

?>