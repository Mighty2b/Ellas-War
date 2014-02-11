<?php 

//objet : id -> id du joueur qui a le diamant login -> son login
$actuel      = $paquet->get_answer('info_diamant')->{1};
//0 si on a jamais eu le diamant
//objet : temps -> temps durant lequel on a eu le diamant
//        depuis-> si on a le diamant, date à laquelle on l'a eu
$info_perso = $paquet->get_answer('info_diamant')->{2};
$temps_perso= $info_perso->temps;

//Temps en secondes durant lequel mon alliance a eu le diamant
$temps_alli  = $paquet->get_answer('info_diamant')->{3};

if(!empty($info_perso->depuis)) {
	$temps_alli += ($paquet->get_infoj('timestamp')-$info_perso->depuis);
	$temps_perso += ($paquet->get_infoj('timestamp')-$info_perso->depuis);
}

if(!empty($temps_perso)) {
	//Heure, minutes, jours
	$tp = array(0,0,0);
	
	$tp[2] = floor($temps_perso/86400);
	$temps_perso -= ($tp[2]*86400);
	$tp[1] = floor($temps_perso/3600);
	$temps_perso -= ($tp[1]*3600);
	$tp[0] = floor($temps_perso/60);
	//$temps_perso -= ($tp[0]*60);
}

if(!empty($temps_alli)) {
	//Heure, minutes, jours
	$ta = array(0,0,0);
	
	$ta[2] = floor($temps_alli/86400);
	$temps_alli -= ($ta[2]*86400);
	$ta[1] = floor($temps_alli/3600);
	$temps_alli -= ($ta[1]*3600);
	$ta[0] = floor($temps_alli/60);
	//$temps_perso -= ($tp[0]*60);
}

$last_player  = $paquet->get_answer('info_diamant')->{4};
$total_player = $paquet->get_answer('info_diamant')->{5};
$total_alli   = $paquet->get_answer('info_diamant')->{6};

echo '<div class="centrer">
<h2>'._('Informations sur le diamant').'</h2>';

if(empty($info_perso->depuis)) {
	printf(_('C\'est <a href="profilsjoueur-%s</a> qui a actuellement le diamant'),
	       $actuel->id.'">'.$actuel->login);
	echo '.<br/><br/><br/><br/>';
}
else {
	echo _('Vous avez le diamant depuis'). display_date($info_perso->depuis, 3).'.';
}

if(!empty($temps_perso)) {
	echo _('Vous avez eu le diamant durant').' ';
	
	if(!empty($tp[2])) {
		echo $tp[2];
		
		if($tp[2] > 1) {
			echo ' '._('jours').' ';
		}
		else {
			echo ' '._('jour').' ';
		}
	}
	
	if(!empty($tp[1])) {
		echo $tp[1];
		
		if($tp[1] > 1) {
			echo ' '._('heures').' ';
		}
		else {
			echo ' '._('heure').' ';
		}
	}
	
	if(!empty($tp[0])) {
		echo $tp[0];
		
		if($tp[0] > 1) {
			echo ' '._('minutes').' ';
		}
		else {
			echo ' '._('minute').' ';
		}
	}
}

if(!empty($temps_alli)) {
	echo _('Votre alliance a eu le diamant durant').' ';
	
	if(!empty($ta[2])) {
		echo $ta[2];
		
		if($ta[2] > 1) {
			echo ' '._('jours').' ';
		}
		else {
			echo ' '._('jour').' ';
		}
	}
	
	if(!empty($ta[1])) {
		echo $ta[1];
		
		if($ta[1] > 1) {
			echo ' '._('heures').' ';
		}
		else {
			echo ' '._('heure').' ';
		}
	}
	
	if(!empty($ta[0])) {
		echo $ta[0];
		
		if($ta[0] > 1) {
			echo ' '._('minutes').' ';
		}
		else {
			echo ' '._('minute').' ';
		}
	}
}

if(!empty($last_player) or !empty($total_player) or !empty($total_alli)) {
	echo '</div>
	<div class="centrer">
		<h2>'._('La semaine dernière').'</h2>
		
		<br/>';
	
	if(!empty($last_player)) {
	echo '<b>'._('Dernier possesseur du diamant').' : </b> 
		<a href="'._('profilsjoueur').'-'.$last_player->joueur.'">'.$last_player->login.'</a>
		<br/>';
	}
	
	if(!empty($total_player)) {
	echo '<b>'._('Joueur le plus combatif').' : </b> 
		<a href="'._('profilsjoueur').'-'.$total_player->joueur.'">'.$total_player->login.'</a>
		<br/>';
	}
	
	if(!empty($total_alli)) {
	echo '<b>'._('Alliance la plus combative').' : </b> 
		<a href="'._('profilsalliance').'-'.$total_alli->id.'">'.$total_alli->nom.'</a>';
	}
}

echo '</div>';

?>