<?php

echo '<title>'._('Classement des cités d\'EllasWar').'</title>
<meta name="description"
      content="'._('Classement des cités d\'EllasWar').'" />';

if(!empty($_POST['joueur'])) {
	$joueur = htmlentities(trim(addslashes($_POST['joueur'])));
}
else {
	$joueur = '';
}

if (isset($_GET['var1']) && is_numeric($_GET['var1']) ) {
  $page = $_GET['var1'];
}
else {
  $page = 1; // On se met sur la page 1 (par défaut)
}

if(!empty($_GET['var3']) && is_numeric($_GET['var3'])) {
	$alliance = round(abs($_GET['var3']));
	$alliance_lien = '-'.$alliance;
}
else {
	$alliance = 0;
	$alliance_lien = '';
}

if(!empty($_GET['var2'])) {
	$par = $_GET['var2'];
}
else {
	$par = 'niveau';
}

$paquet -> add_action('get_classementj',
                      array($par, $page, $joueur, $alliance));

?>