<?php

include('../header.php');

if(empty($_GET['joueur'])) {
	$_GET['joueur'] = 0;
}

$paquet = new EwPaquet();
$paquet -> add_action ('sortir_sanctuaire', array($_GET['joueur']));
$paquet -> send_actions();

echo $paquet->get_infoj('id')

?>