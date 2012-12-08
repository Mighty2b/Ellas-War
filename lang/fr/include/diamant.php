<div class="centrer">
<h2>Informations sur le diamant</h2>
<?php 

if(empty($info_perso->depuis)) {
	echo 'C\'est <a href="profilsjoueur-'.$actuel->id.'">'.$actuel->login.
			 '</a> qui a actuellement le diamant.<br/><br/><br/><br/>';
}
else {
	echo 'Vous avez le diamant depuis le '.date('d/m').'.';
}

if(!empty($temps_perso)) {
	echo 'Vous avez eu le diamant durant ';
	
	if(!empty($tp[2])) {
		echo $tp[2];
		
		if($tp[2] > 1) {
			echo ' jours ';
		}
		else {
			echo ' jour ';
		}
	}
	
	if(!empty($tp[1])) {
		echo $tp[1];
		
		if($tp[1] > 1) {
			echo ' heures ';
		}
		else {
			echo ' heure ';
		}
	}
	
	if(!empty($tp[0])) {
		echo $tp[0];
		
		if($tp[0] > 1) {
			echo ' minutes ';
		}
		else {
			echo ' minute ';
		}
	}
}

if(!empty($temps_alli)) {
	echo 'Votre alliance a eu le diamant durant ';
	
	if(!empty($ta[2])) {
		echo $ta[2];
		
		if($ta[2] > 1) {
			echo ' jours ';
		}
		else {
			echo ' jour ';
		}
	}
	
	if(!empty($ta[1])) {
		echo $ta[1];
		
		if($ta[1] > 1) {
			echo ' heures ';
		}
		else {
			echo ' heure ';
		}
	}
	
	if(!empty($ta[0])) {
		echo $ta[0];
		
		if($ta[0] > 1) {
			echo ' minutes ';
		}
		else {
			echo ' minute ';
		}
	}
}

?>
</div>