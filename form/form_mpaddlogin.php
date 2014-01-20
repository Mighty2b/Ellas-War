<?php

include('../header.php');

if(!empty($_GET['id'])) {
	$paquet = new EwPaquet();
	$paquet -> add_action('check_login', array($_GET['id']));
	$paquet -> send_actions();
	
	if(!empty($paquet->get_answer('check_login'))) {
		
		$id = $paquet->get_answer('check_login')->{1};
		
		if($id != 0) {
			
			$login = $paquet->get_answer('check_login')->{2};
			
			echo json_encode(array('id'    => $id,
			                       'login' => $login));
		}
	}	
}

?>