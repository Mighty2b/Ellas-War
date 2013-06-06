<?php

if(!empty($carte)) {
	foreach($carte as $do) {
	  if($do->id_x == 1) {
	    echo '<br/>';
	  }
	
		$affiche_case = true;
		echo '<img src="/images/btn/oqp_'.$do->couleur.'.png" ';
			
		if(!empty($do->login)) {
			echo ' alt="Case de '.$do->login.'" title="Case de '.$do->login.' ('.$do->id_x.';'.$do->id_y.')" ';
		}
		else {
			if(!(($do->id_x <= 6 && $do->id_y <= 6) or 
			($do->id_x >= 14 && $do->id_y >= 14) or
			($do->id_x >= 14 && $do->id_y <= 6) or 
			($do->id_x <= 6 && $do->id_y >= 14))) {
				echo ' alt="Case vide" title="Case vide ('.$do->id_x.';'.$do->id_y.')"';
			}
			else {
				$affiche_case = false;
			}
		}
		
		if($affiche_case == true) {
			echo ' onclick="javascript:info_case('.$do->id_b.', '.$do->id_x.', '.$do->id_y.');" />';
		}
		else {
			echo ' />';
		}
	}
}

?>