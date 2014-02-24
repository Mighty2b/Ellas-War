<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('passer_lvlalliance');
$paquet -> send_actions();

$mon_alliance  = $paquet->get_infoj('alliance');
$retour = $paquet->get_answer('passer_lvlalliance')->{1};

if($retour) {

echo '
<center>
<h2>Votre alliance vient de passer niveau '.$mon_alliance->level.', félicitation</h2>

<table class="none">';

switch($mon_alliance->level) {
	case 2:
	 echo '<tr><td>'._('<b>Calendrier</b> afin d\'organiser votre alliance').'</td></tr>
	 <tr><td>'._('Possibilité de retirer <b>toutes les ressources</b> du coffre d\'alliance').'</td></tr>
	 <tr><td>'._('Possibilité de recevoir <b>des contrats</b>').'</td></tr>
	 <tr><td>'._('Possibilité de recevoir <b>des blocus</b>').'</td></tr>
	 <tr><td>'._('Possibilité d\'annuler une guerre déclarée par votre alliance, pendant <b>2 heures</b> après la déclaration').'</td></tr>
	 <tr><td>'._('Activation de la cotisation en négatif').'</td></tr>
	';
	
	break;
	case 3:
	 echo '<tr><td>'._('Possiblité de <b>doubler la cotisation').'</b></td></tr>
	 	 <tr><td>'._('Possibilité de lancer <b>des contrats').'</b></td></tr>
	 <tr><td>'._('Possibilité de recevoir une <b>3<sup>ème</sup> guerre</b> si vous êtes la source des deux en cours').'</td></tr>
	 <tr><td>'._('Augmentation de 5% des <b>Drachmes</b> obtenus lors d\'une guerre').'</td></tr>
	 ';
	break;

	case 4:
	 echo '
	 <tr><td>'._('Possibilité de lancer des <b>blocus</b>').'</td></tr>
	 <tr><td>'._('Possibilité pour vos membres d\'acheter une <b>armurerie</b>').'</td></tr>
	 <tr><td>'._('Possibilité pour les membres de cotiser volontairement des drachmes').'</td></tr>
	 <tr><td>'._('Nouveau mode de <b>cotisation</b>').'</td></tr>
	 <tr><td>'._('Augmentation de 10% des <b>Drachmes</b> obtenus lors d\'une guerre').'</td></tr>
	 ';
	break;

	case 5:
	 echo '
	 <tr><td>'._('Possibilité d\'annuler une guerre déclarée par votre alliance, pendant <b>12 heures</b> après la déclaration').'</td></tr>
	 <tr><td>'._('Baisse de 20% des prix des bonus de <b>l\'armurerie</b>').'</td></tr>
	 <tr><td>'._('Augmentation de 20% des <b>Drachmes</b> obtenus lors d\'une guerre').'</td></tr>
	 ';
	break;
}

echo '</table>
<br/>
<a href="/"><div class="bouton_classique"><input type="submit" value="'._('Continuer').'" name="Continuer" /></div></a>
<br/>
</center>';

}
else {
	echo '<div class="ligne centrer">'._('Vous ne pouvez pas passer niveau').' '.($mon_alliance->level+1).'</div>';
}

?>
