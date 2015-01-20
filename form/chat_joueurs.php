<?php

include('../header.php');

$joueurs_chat = apc_fetch(APC_PREFIX.'joueurs_chat');

if(!$joueurs_chat) {
	$paquet = new EwPaquet();
	$paquet -> add_action('joueurs_chat');
	$paquet -> send_actions();

	$rep = $paquet->get_answer('joueurs_chat');
	
	if(!empty($rep)) {
		$joueurs_chat = $rep->{1};
		if(!empty($joueurs_chat) && sizeof($joueurs_chat) > 0) {
			apc_store(APC_PREFIX.'joueurs_chat', serialize($joueurs_chat), 30);
		}
	}	

	$my_id = $paquet->get_infoj('id');
}
else {
	$joueurs_chat = unserialize($joueurs_chat);
	
	if(!empty($_COOKIE['my_id'])) {
  	$my_id = $_COOKIE['my_id'];
  }
}

if(!empty($joueurs_chat)) {

	if(empty($my_id)) {
		$my_id = 0;
	}
	
	setcookie('my_id', $my_id, ($_SERVER['REQUEST_TIME'] + 3600));
	
	$me  = false;
	
	foreach($joueurs_chat as $j) {
		if($j->id == $my_id) {
			$me = true;
		}
		
		echo '<b><a href="'._('profilsjoueur').'-'.$j->id.'"
								target="_blank"
								'.($j->admin?'class="erreur"':'').'>'.$j->login.'</a></b><br/>';
	}
	
	if($me) {
	echo '<script type="text/javascript">
		$("#cadre_chat_iconeco").attr("src", "images/utils/mb_connecter.png");
		$("#cadre_chat_iconedeco").show();
	</script>';
	}
	else {
	echo '<script type="text/javascript">
		$("#cadre_chat_iconeco").attr("src", "images/utils/mb_deconnecter.png");
		$("#cadre_chat_iconedeco").hide();
	</script>';
	}
}

?>
