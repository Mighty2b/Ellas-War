<?php

if(!empty($_GET['var1']) && in_array($_GET['var1'], $paquet->getTemples())) {
	$paquet = new EwPaquet('set_stv', array($_GET['var1']));
}
else {
	$paquet = new EwPaquet('info_stv');
}

$soutien = $paquet->getRetour();
$missions = $paquet->getRetour(2);
$temples = $paquet->getTemples();

include('lang/'.LANG.'/include/soutien_stv.php');

?>