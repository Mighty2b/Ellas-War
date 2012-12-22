<?php

if($paquet->peut_commerce() == false) {
	$paquet->display(95);
}
else {
	$paquet = new EwPaquet('archives_com');
	$mes_ventes = $paquet->getRetour(2);
	$mes_achats = $paquet->getRetour();
	
	include('lang/'.LANG.'/include/archivecommerce.php');
}

?>