<?php

include('../header.php');

if(!empty($_GET['ciblej'])) {
	
	$paquet = new EwPaquet();
  $paquet -> add_action('preparer', array($_GET['ciblej']));
  $paquet -> send_actions();
  
  $preparer = $paquet->get_answer('preparer');
  
  $error = $preparer->{3};
  
	echo '<div class="centrer">';
	
	if(empty($preparer) or
	   $preparer->{2} == 0) {
		echo '<div class="erreur">';
		echo display_error(212);
		echo '</div>';
	}
	elseif(empty($error)) {
		$login = $preparer->{1};
		$id    = $preparer->{2};
		
		echo '<div class="erreur">';
		echo display_error(121, $login);
		echo '</div>';
		
	  echo '<div class="ligne centrer" id="encours">

		      </div>

		      <div class="bouton_classique">
		         <input class="bouton_classique2" 
		                type="submit" 
		                alt="'._('Attaquer').'"
		                value="'._('ATTAQUER').'"
		                onclick="javascript:attaquer('.$id.');" 
		                id="bouton_attaquer" />
		      </div>';
	}
	else {
		$paquet->error('espionner', 3);
	}
	
	echo '</div>';
}

?>
