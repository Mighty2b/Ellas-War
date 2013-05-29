<?php

if($paquet->getlvl() >= 5) {
  echo '<div class="ligne80 centrer">
  Prix : '.nbf($prix).' '.imress('drachme').
	' (Maximum 255 caractères) <br/><br/>

<form action="#" method="POST">
<input name="message" type="text" class="form_retirer" size="70" /><br/>';

if($oracle == true) {
  echo '<input type="checkbox" name="oracle" /> <b>Missive oracle</b><br/>';
}

echo '<br/>
<div class="bouton_classique"><input class="bouton_classique2" value="Envoyer" name="envoyer" type="submit" /></div><br/><br/>
</form></div>';

}

echo '<div class="gauche">
<font size="1">';

$i = 0;

foreach($liste as $do_mes) {
	if(!empty($i)) {
		echo '<hr/>';
	}
	
	echo '<b><u><a href="profilsjoueur-'.$do_mes->joueur.'">'.
			 $do_mes->login.'</a></u> :</b>  '.
			 stripslashes(stripslashes($do_mes->message));	
	
	if($paquet->getlvl2() >= 2) {
		echo ' <a href="Missives-'.$do_mes->id.'"><img src="images/joueurs/supprimer_mp.png" alt="Supprimer" /></a>';
	}
	$i++;
}

?>
</font>
</div>