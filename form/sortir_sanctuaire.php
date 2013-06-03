<?php

include('../header.php');

if(empty($_GET['joueur'])) {
	$_GET['joueur'] = 0;
}

$paquet = new EwPaquet('sortir_sanctuaire', array($_GET['joueur']));

echo $paquet->getid();

?>