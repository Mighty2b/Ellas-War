<?php

include('../header.php');

if(!empty($_GET['ress']) && !empty($_GET['taux']) && !empty($_GET['qtt'])) {
	
	$paquet = new EwPaquet();
	$paquet -> add_action('acheter_debarras',
	                      array($_GET['ress'],$_GET['taux'],$_GET['qtt']));
	$paquet -> send_actions();
	
	echo '<br/><br/>';
	
	$paquet->error('acheter_debarras');
}

?>