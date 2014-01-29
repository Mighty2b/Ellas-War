<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('get_ticket');
$paquet -> send_actions();

$nb     = $paquet->get_answer('get_ticket')->{1};
$alea   = $paquet->get_answer('get_ticket')->{2};

if($paquet->get_infoj('statu') != 1) {
	exit();
}

if($nb >= 0) {
	
	$image_larg = 15;
	$image_haut = 15;
	
	if($nb > 0) {
		echo '<div class="bouton_classique"><input type="button"
		                                           value="'._('Prendre un ticket').'" 
		                                           onclick="javascript:prendre_ticket();"/></div>
		<br/><br/>';
	}
	
	echo '<div class="clear"></div>';
	echo '<div class="ligne centrer">';

	for($i=0;$i<$image_haut;$i++) {
		for($j=0;$j<$image_larg;$j++) {
			echo '<img src="/images/jeux/grilles/grattez.png"
			           style="position:absolute;margin-top:'.($i*10).'px;margin-left:'.($j*10).'px;width:10px;height:10px;cursor:hand;" 
			           onmouseover="this.style.visibility=\'hidden\';" 
			           onmouseout="this.style.visibility=\'hidden\';gain_ticket();">';
		}
	}
	
	echo '<img src="images/jeux/grilles/'.$alea.'.gif" 
	           width="150" height="150" 
	           alt="Grille de morpion">
	<br/><br/>';
	
	if($nb > 1) {
  	printf('<b>'._('Il vous reste %s tickets').'</b>', $nb);
  }
  else {
  	printf('<b>'._('Il vous reste %s ticket').'</b>', $nb);
  }
  
  echo '</div>';

}
else {
	echo '<div class="centrer">'.
	     '<b>'._('Il ne vous reste plus de tickets').'</b></div>';
}

?>