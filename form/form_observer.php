<?php

include('../header.php');

if(!empty($_GET['ciblej'])) {
  $paquet = new EwPaquet();
	$paquet -> add_action('observer', array($_GET['ciblej']));
	$paquet -> send_actions();
	
	$paquet->error('observer', 2);
	echo $paquet->get_answer('observer')->{1};
}

?>