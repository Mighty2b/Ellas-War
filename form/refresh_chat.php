<?php

include('../header.php');

$paquet = new EwPaquet('refresh_chat', array($_GET['clean']));

$rep = $paquet->getRetour();

if(!empty($rep)) {
	foreach($rep as $texte) {
		if(empty($texte->date)) {
			echo '<img src="images/joueurs/signaler.png" 
		    	       alt="signaler" 
		        	   onclick="signaler_chat(\''.$texte->joueur.'\', \''.$texte->temps.'\');"
			           class="chat_signaler" />';
		}
		echo '<b>'.$texte->login.'</b> : '.$texte->texte.'<br/>';
	}
}

?>