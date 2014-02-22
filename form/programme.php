<?php

include('../header.php');

if(!empty($_GET['id'])) {
	$paquet = new EwPaquet();
	$paquet -> add_action('get_programme',array($_GET['id']));
	$paquet -> send_actions();

	if(!empty($paquet->get_answer('get_programme'))) {
		$do = $paquet->get_answer('get_programme')->{1};
		echo '<h2 class="centrer">'.$do->login.'</h2><br/>' .
				'<div class="centrer ligne">
				'.$do->programme.'</div>';
	}
}

?>
