<?php

include('../header.php');

$paquet = new EwPaquet('joueurs_chat');

$rep = $paquet->getRetour();

if(!empty($rep)) {
	foreach($rep as $j) {
		echo '<b><a href="'.trad_to_page('profilsjoueur').'-'.$j->id.'"
								target="_blank"
								'.($j->admin?'class="erreur"':'').'>'.$j->login.'</a></b><br/>';
	}
}

?>