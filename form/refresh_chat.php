<?php

include('../header.php');
if(empty($_GET['clean'])) {
	$_GET['clean'] = 0;
}
$paquet = new EwPaquet('refresh_chat', array($_GET['clean']));

$rep = $paquet->getRetour();

if(!empty($rep)) {
	foreach($rep as $texte) {
		if(empty($texte->date)) {
			echo '<img src="/images/joueurs/signaler.png" 
		    	       alt="signaler" 
			           title="signaler" 
		        	   onclick="signaler_chat(\''.$texte->joueur.'\', \''.$texte->temps.'\');"
			           class="chat_signaler" />';
		}
		echo '<b>'.$texte->login.'</b> : '.$texte->texte;
		
		if($paquet->getlvl2() >= 2) {
			echo ' <img src="/images/joueurs/supprimer_mp.png" 
			            alt="Supprimer" 
			            title="Supprimer" 
			            class="chat_signaler"
			            onclick="supprimer_chat(\''.$texte->joueur.'\', \''.$texte->temps.'\');" />';
		}
		
		echo '<br/>';
	}
}

?>