<?php

include('../header.php');

if(!empty($_GET['id'])) {
	$paquet = new EwPaquet();
	$paquet -> add_action('check_login', array($_GET['id']));
	$paquet -> send_actions();
	
	$check = $paquet->get_answer('check_login');
	
	if(!empty($check)) {
		
		$id = $check->{1};
		
		if($id != 0) {
			
			$login = $check->{2};
			
			echo json_encode(array('id'    => $id,
			                       'login' => $login));
		}
	}	
}

?>