<?php

include('../header.php');

if(!empty($_GET['id'])) {
	$paquet = new EwPaquet();
	$paquet -> add_action('get_programme',array($_GET['id']));
	$paquet -> send_actions();

	$programme = $paquet->get_answer('get_programme');
	
	if(!empty($programme)) {
		$do = $programme->{1};
		echo '<h2 class="centrer">'.$do->login.'</h2><br/>' .
				'<div class="centrer ligne">
				'.$do->programme.'</div>';
	}
}

?>
