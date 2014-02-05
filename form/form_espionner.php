<?php

include('../header.php');

if(!empty($_GET['ciblej'])) {
	
  $paquet = new EwPaquet();
	$paquet -> add_action('espionner', array($_GET['ciblej']));
	$paquet -> send_actions();
	
	$paquet->error('espionner', 2);
	echo $paquet->get_answer('espionner')->{1};
	
}

?>