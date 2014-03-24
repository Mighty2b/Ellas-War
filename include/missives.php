<?php

$oracle = $paquet->get_answer('page_missives')->{1};
$prix   = $paquet->get_answer('page_missives')->{2};
$liste  = $paquet->get_answer('page_missives')->{3};

if(empty($prix)) {
	$prix = 0;
}

$paquet->error('poster_missive', 1);

if($paquet->get_infoj('lvl') >= 1) {
  echo '<div class="ligne80 centrer">
  '._('Prix').' : '.nbf($prix).' '.imress('drachme').
	' ('._('Maximum 255 caractères').') <br/><br/>

<form action="#" method="POST">
<input name="message"
       type="text" 
       size="70" /><br/>';

if($oracle == true) {
  echo '<input type="checkbox"
               name="oracle" /> <b>'._('Missive oracle').'</b><br/>';
}

echo '<br/>
<div class="bouton_classique"><input value="'._('Envoyer').'"
                                     name="envoyer" 
                                     type="submit" /></div><br/><br/>
</form></div>';

}

echo '<div class="gauche">
<font size="1">';

$i = 0;

foreach($liste as $do_mes) {
	if(!empty($i)) {
		echo '<hr/>';
	}
	
	echo '<b><u><a href="'._('profilsjoueur').'-'.$do_mes->joueur.'">'.
			 $do_mes->login.'</a></u> :</b>  '.
			 stripslashes(stripslashes($do_mes->message));	
	
	if($paquet->get_infoj('lvl2') >= 2) {
		echo ' <a href="missives-'.$do_mes->id.'">'.
		     '<img src="images/utils/supprimer_mp.png"
		           alt="'._('Supprimer').'" /></a>';
	}
	$i++;
}

?>
</font>
</div>