<?php

include('../header.php');

if(!empty($_GET['id'])) {

	$paquet = new EwPaquet();
	$paquet -> add_action('archive_publier', array($_GET['id']));
	$paquet -> send_actions();

	if($paquet->get_answer('archive_publier')->{1} == 1) {
		echo '<img src="/images/utils/mb_connecter.png"
		           alt="'._('Archive publique').'" 
		           title="'._('Archive publique').'" 
		           class="cursor" />';
	}
	else {
		echo '<img src="/images/utils/mb_deconnecter.png" 
		           alt="'._('Archive privée').'" 
		           title="'._('Archive privée').'" 
		           class="cursor" />';
	}

}
?>
