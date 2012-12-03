<?php

include('../header.php');

$paquet = new EwPaquet('joueurs_chat');

$rep = $paquet->getRetour();

if(!empty($rep)) {
	foreach($rep as $j) {
		echo '<br/><b>'.$j->login.'</b>';
	}
}

?>