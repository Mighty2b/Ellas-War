<?php

include('../header.php');

if(!empty($_GET['ciblej'])) {

	$paquet = new EwPaquet();
  $paquet -> add_action('foudre', array($_GET['ciblej']));
  $paquet -> send_actions();
	
	$error = $paquet->get_answer('foudre')->{2};
	
	if(!empty($error)) {
		$paquet->error('foudre', 2);
	}
	else {
		echo $paquet->get_answer('foudre')->{1};
	}
}

?>
