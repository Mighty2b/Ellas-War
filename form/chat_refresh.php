<?php

include('../header.php');

if(empty($_GET['clean'])) {
	$_GET['clean'] = 0;
}

$rep_refresh = apc_fetch(APC_PREFIX.'rep_refresh');

if(!$rep_refresh) {
	$paquet = new EwPaquet();
	$paquet -> add_action('refresh_chat', array($_GET['clean']));
	$paquet -> send_actions();
	
	$refresh = $paquet->get_answer(APC_PREFIX.'refresh_chat');
	
	if(!empty($refresh)) {
		$rep_refresh   = $refresh->{1};
		apc_store('rep_refresh', serialize($rep_refresh), 5);
	}
}
else {	
	$rep_refresh = unserialize($rep_refresh);
}

$moi   = 0;
$autre = 0;

if(!empty($rep_refresh)) {
	foreach($rep_refresh as $texte) {
		if(!empty($_COOKIE['my_id']) && $texte->joueur == $_COOKIE['my_id']) {
			$moi++;
		}
		else {
			$autre++;
		}
		/*
		if(empty($texte->date)) {
			echo '<img src="/images/joueurs/signaler.png" 
		    	       alt="signaler" 
			           title="signaler" 
		        	   onclick="signaler_chat(\''.$texte->joueur.'\', \''.$texte->temps.'\');"
			           class="chat_signaler" />';
		}*/
		echo '<b>'.$texte->login.'</b> : '.$texte->texte;
		/*
		if($paquet->getlvl2() >= 2) {
			echo ' <img src="/images/joueurs/supprimer_mp.png" 
			            alt="Supprimer" 
			            title="Supprimer" 
			            class="chat_signaler"
			            onclick="supprimer_chat(\''.$texte->joueur.'\', \''.$texte->temps.'\');" />';
		}*/
		
		echo '<br/>';
	}
	
	/*
	if(empty($_GET['clean'])) {
		if($paquet->get_answer('refresh_chat')->{3} > 0) {
			echo '<script type="text/javascript">
			$("#cadre_chat_titre2").css("color", "red");
			</script>';
			
			if($paquet->get_answer('refresh_chat')->{2} == 0 && 
			   !empty($_COOKIE['signalement'])) {
				switch($_COOKIE['signalement']) {
					case 1: $file='bip1'; break;
					case 2: $file='pet1'; break;
				}
				
				if(!empty($file)) {
echo '
<audio autoplay="autoplay"> 
  <source src="sound/'.$file.'.mp3" />
</audio>';
				}
			}			
		}
		elseif($moi > 0) {
			echo '<script type="text/javascript">
			$("#cadre_chat_titre2").css("color", "black");
			</script>';
		}
	}	*/
}

?>