<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('joueurs_chat');
$paquet -> send_actions();

$rep = $paquet->get_answer('joueurs_chat')->{1};

if(!empty($rep)) {
	foreach($rep as $j) {
		echo '<b><a href="'._('profilsjoueur').'-'.$j->id.'"
								target="_blank"
								'.($j->admin?'class="erreur"':'').'>'.$j->login.'</a></b><br/>';
	}
}

?>