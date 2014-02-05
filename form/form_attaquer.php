<?php

include('../header.php');

if(!empty($_GET['ciblej'])) {
	
	$paquet = new EwPaquet();
  $paquet -> add_action('attaquer', array($_GET['ciblej']));
  $paquet -> send_actions();
	
	$error = $paquet->get_answer('attaquer')->{2};
	
	if(empty($error)) {
		echo $paquet->get_answer('attaquer')->{1};
		echo '
		<script type="text/javascript">
		$(function(){
			$("#bouton_attaquer_'.$_GET['ciblej'].'").hide("slow");
		});
		</script>';
	}
	else {
		$paquet->error('attaquer', 2);
	}
}

?>