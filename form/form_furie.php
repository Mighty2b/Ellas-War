<?php

include('../header.php');

if(!empty($_GET['ciblej'])) {

	$paquet = new EwPaquet();
  $paquet -> add_action('furie', array($_GET['ciblej']));
  $paquet -> send_actions();
	
	$error = $paquet->get_answer('furie')->{2};
	
	if(!empty($error)) {
		$paquet->error('furie', 2);
	}
	else {
		echo $paquet->get_answer('furie')->{1};
		echo '
		<script type="text/javascript">
		$(function(){
			$("#bouton_furie_'.$_GET['ciblej'].'").hide("slow");
		});
		</script>';
	}
}

?>
