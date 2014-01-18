<?php

include('../header.php');

if(!empty($_GET['id'])) {
	
	$paquet = new EwPaquet();
	$paquet -> add_action('arbre_incremente', array($_GET['id']));
	$paquet -> send_actions();
	
	echo $paquet->get_answer('arbre_incremente')->{1};
}
else {
	echo '0';
}

?>