<?php

if(!empty($_POST['joueur'])) {
	$joueur = htmlentities(trim(addslashes($_POST['joueur'])));
}
else {
	$joueur = '';
}

if (isset($_GET['var1']) && is_numeric($_GET['var1'])) {
  $page = $_GET['var1'];
  $i=25*($page-1)+1;
}
else {
  $page = 1; // On se met sur la page 1 (par défaut)
  $i=1;// On met dans une variable le nombre de messages qu'on veut par page
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

$paquet = new EwPaquet('get_classementj',
											 array($par, $page, $joueur, $alliance));
$classement = $paquet->getretour();
$nombreDePages=$paquet->getretour(2);

include('lang/'.LANG.'/include/classementdesjoueurs.php');

?>