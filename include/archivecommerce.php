<?php

if($paquet->peut_commerce() == false) {
	$paquet->display(95);
}
else {
	$mes_ventes = $paquet->get_answer('archives_com')->{2};
	$mes_achats = $paquet->get_answer('archives_com')->{1};
	
	if(sizeof($mes_achats) > 0) {
		echo '<h2 class="centrer">'._('Mes derniers achats').'</h2><br/>
		<table class="centrer_tableau">';
		foreach($mes_achats as $do) {
			echo '<tr><td class="droite">'.
					nbf($do->nbvente).' </td><td> '.imress($do->typevente).' '._('pour').' '.
					nbf($do->prixvente).' '.imress('drachme').' '.
					display_date($do->date,3).'</td></tr>';
		}
		echo '</table>
		<br/><br/>';
	}
	
	if(sizeof($mes_ventes) > 0) {
	 echo '<h2 class="centrer">'._('Mes dernières ventes').'</h2><br/>
	 <table class="centrer_tableau">';
	 foreach($mes_ventes as $do) {
	    echo '<tr><td class="droite">'.
	    nbf($do->nbvente).' </td><td> '.imress($do->typevente).' '._('pour').' '.
	    nbf($do->prixvente).' '.imress('drachme').' '.
	    display_date($do->date,3).'</td></tr>';
	  }
	  echo '</table>
	  <br/><br/>';
	}
	
	echo '<div class="ligne erreur centrer"><br/>'._(
	'Si vous rachetez un de vos propres lots, celui-ci ne sera pas affiché '.
	'dans vos archives commerciales.').'</div>';
}

?>