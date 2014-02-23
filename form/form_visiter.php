<?php

include('../header.php');

if(!empty($_GET['ciblej'])) {
	$paquet = new EwPaquet();
	$paquet -> add_action('visiter', array($_GET['ciblej']));
	$paquet -> send_actions();
	
	$paquet->error('visiter', 2);
	echo $paquet->get_answer('visiter')->{1};
}

?>