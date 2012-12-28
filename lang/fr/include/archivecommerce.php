<?php

if(sizeof($mes_achats) > 0) {
	echo '<h2 class="centrer">Mes derniers achats</h2><br/>
	<table class="centrer_tableau">';
	foreach($mes_achats as $do) {
		echo '<tr><td class="droite">'.
				nbf($do->nbvente).' </td><td> '.imress($do->typevente).' pour '.
				nbf($do->prixvente).' '.imress('drachme').' le '.
				strftime('%A %d %B', $do->date).' à '.
				strftime('%Hh %M', $do->date).'</td></tr>';
	}
	echo '</table>
	<br/><br/>';
}

if(sizeof($mes_ventes) > 0) {
 echo '<h2 class="centrer">Mes dernières ventes</h2><br/>
 <table class="centrer_tableau">';
 foreach($mes_ventes as $do) {
    echo '<tr><td class="droite">'.
    nbf($do->nbvente).' </td><td> '.imress($do->typevente).' pour '.
    nbf($do->prixvente).' '.imress('drachme').' le '.
    strftime('%A %d %B', $do->date).' à '.
    strftime('%Hh %M', $do->date).'</td></tr>';
  }
  echo '</table>
  <br/><br/>';
}

?>
<div class="ligne erreur centrer">Si vous rachetez un de vos propres lots, celui-ci ne sera pas affiché dans vos archives commerciales.</div>