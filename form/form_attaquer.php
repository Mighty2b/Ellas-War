<?php

include('../header.php');

if(!empty($_GET['ciblej'])) {
	
	$paquet = new EwPaquet();
  $paquet -> add_action('attaquer', array($_GET['ciblej']));
  $paquet -> send_actions();
	
  $attaque = $paquet->get_answer('attaquer');
  
  if(!empty($attaque)) {
  
		$error = $attaque->{2};
		
		if(empty($error)) {
			echo $attaque->{1};
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
}

?>