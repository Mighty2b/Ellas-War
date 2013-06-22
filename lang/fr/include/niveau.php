<?php

echo
'<div id="cadre_milieu_petit">
	<div id="cadre_haut_petit"></div>
	<div id="cadre_centre_petit">
	
	</div>
	<div id="cadre_bas_petit"></div>
</div>

<h1>Passage niveau '.($paquet->get_level()+1).'</h1>
<div class="centrer">
<h3>Votre alliance doit posséder :</h3>
<table class="centrer_tableau"><tr><td class="gauche">
<ul>
';

if($conditions->xp > 0) {
	echo '<li>';
	
	if($actu->xp < $conditions->xp) {
		echo '<font color="red">'.nbf($conditions->xp).' XP</font>';
	}
	else {
		echo nbf($conditions->xp).' XP';
	}	
	
	echo ' (Actuellement : '.nbf($actu->xp).')</li>';
}

if($conditions->mb >0) {
	echo '<li>';
	
	if($actu->mb < $conditions->mb) {
		echo '<font color="red">'.nbf($conditions->mb).' membres niveau 7 ou supérieur</font>';
	}
	else {
		echo nbf($conditions->mb).' membres niveau 7 ou supérieur';
	}
	
	echo ' (Actuellement : '.nbf($actu->mb).')</li>';
}

if($conditions->vic >0) {
	echo '<li>';
	
	if($actu->vic < $conditions->vic) {
		echo '<font color="red">'.nbf($conditions->vic).' victoires</font>';
	}
	else {
		echo nbf($conditions->vic).' victoires';
	}
	
	echo ' (Actuellement : '.nbf($actu->vic).')</li>';
}

if($conditions->contrat_rempli >0) {
	echo '<li>';

	if($actu->contrat_rempli < $conditions->contrat_rempli) {
		echo '<font color="red">'.nbf($conditions->contrat_rempli).' contrats remplis</font>';
	}
	else {
		echo nbf($conditions->contrat_rempli).' contrats remplis';
	}

	echo ' (Actuellement : '.nbf($actu->contrat_rempli).')</li>';
}

if($conditions->contrat_donne >0) {
	echo '<li>';

	if($actu->contrat_donne < $conditions->contrat_donne) {
		echo '<font color="red">'.nbf($conditions->contrat_donne).' contrats proposés</font>';
	}
	else {
		echo nbf($conditions->contrat_donne).' contrats proposés';
	}

	echo ' (Actuellement : '.nbf($actu->contrat_donne).')</li>';
}

if($conditions->ses >0) {
	echo '<li>';
	if($actu->ses < $conditions->ses) {
		echo '<font color="red">'.nbf($conditions->ses).' '.imress('drachme').'</font>';
	}
	else {
		echo nbf($conditions->ses).' '.imress('drachme');
	}
	
	echo ' (Actuellement : '.nbf($actu->ses).')</li>';
}

if($conditions->fer >0) {
	echo '<li>';
	if($actu->fer < $conditions->fer) {
		echo '<font color="red">'.nbf($conditions->fer).' '.imress('fer').'</font>';
	}
	else {
		echo nbf($conditions->fer).' '.imress('fer');
	}
	
	echo ' (Actuellement : '.nbf($actu->fer).')</li>';
}

if($conditions->arg >0) {
	echo '<li>';
	if($actu->arg < $conditions->arg) {
		echo '<font color="red">'.nbf($conditions->arg).' '.imress('argent').'</font>';
	}
	else {
		echo nbf($conditions->arg).' '.imress('argent');
	}
	
	echo ' (Actuellement : '.nbf($actu->arg).')</li>';
}

if($conditions->gol >0) {
	echo '<li>';
	if($actu->gol < $conditions->gol) {
		echo '<font color="red">'.nbf($conditions->gol).' '.imress('gold').'</font>';
	}
	else {
		echo nbf($conditions->gol).' '.imress('gold');
	}
	
	echo ' (Actuellement : '.nbf($actu->gol).')</li>';
}

if($conditions->boi >0) {
	echo '<li>';
	if($actu->boi < $conditions->boi) {
		echo '<font color="red">'.nbf($conditions->boi).' '.imress('bois').'</font>';
	}
	else {
		echo nbf($conditions->boi).' '.imress('bois');
	}
	
	echo ' (Actuellement : '.nbf($actu->boi).')</li>';
}

if($conditions->pie >0) {
	echo '<li>';
	if($actu->pie < $conditions->pie) {
		echo '<font color="red">'.nbf($conditions->pie).' '.imress('pierre').'</font>';
	}
	else {
		echo nbf($conditions->pie).' '.imress('pierre');
	}
	
	echo ' (Actuellement : '.nbf($actu->pie).')</li>';
}

if($conditions->mar >0) {
	echo '<li>';
	if($actu->mar < $conditions->mar) {
		echo '<font color="red">'.nbf($conditions->mar).' '.imress('marbre').'</font>';
	}
	else {
		echo nbf($conditions->mar).' '.imress('marbre');
	}
	
	echo ' (Actuellement : '.nbf($actu->mar).')</li>';
}

if($conditions->nou >0) {
	echo '<li>';
	if($actu->nou < $conditions->nou) {
		echo '<font color="red">'.nbf($conditions->nou).' '.imress('nourriture').'</font>';
	}
	else {
		echo nbf($conditions->nou).' '.imress('nourriture');
	}
	
	echo ' (Actuellement : '.nbf($actu->nou).')</li>';
}

if($conditions->eau >0) {
	echo '<li>';
	if($actu->eau < $conditions->eau) {
		echo '<font color="red">'.nbf($conditions->eau).' '.imress('eau').'</font>';
	}
	else {
		echo nbf($conditions->eau).' '.imress('eau');
	}
	
	echo ' (Actuellement : '.nbf($actu->eau).')</li>';
}

if($conditions->rai >0) {
	echo '<li>';
	if($actu->rai < $conditions->rai) {
		echo '<font color="red">'.nbf($conditions->rai).' '.imress('raisin').'</font>';
	}
	else {
		echo nbf($conditions->rai).' '.imress('raisin');
	}
	
	echo ' (Actuellement : '.nbf($actu->rai).')</li>';
}

if($conditions->vin >0) {
	echo '<li>';
	if($actu->vin < $conditions->vin) {
		echo '<font color="red">'.nbf($conditions->vin).' '.imress('vin').'</font>';
	}
	else {
		echo nbf($conditions->vin).' '.imress('vin');
	}
	
	echo ' (Actuellement : '.nbf($actu->vin).')</li>';
}

echo '
</ul>
</td></tr></table>';

echo '<b>Vous avez rempli '.$remplie;

if($remplie > 1) {
  echo ' Objectifs';
}
else {
  echo ' Objectif';
}

echo ' sur '.$necessaire.'</b></div>';


if($paquet->getid() == $paquet->getidchef() && $remplie == $necessaire) {
	echo '<br/><div class="bouton_classique"><input class="bouton_classique2" 
																									type="button"
																									value="PASSER VOTRE ALLIANCE NIVEAU '.($paquet->get_level()+1).'" 
																									onclick="javascript:passer_lvlalliance();"/></div>';
}


echo '<div class="centrer">
			<h2>Après le passage de votre alliance niveau '.
			($paquet->get_level()+1).'</h2></div><table class="centrer_tableau">';

switch($paquet->get_level()) {
	case 1:
	 echo '<tr><td><b>Calendrier</b> afin d\'organiser votre alliance</td></tr>
	 <tr><td>Possibilité de retirer <b>toutes les ressources</b> du coffre d\'alliance</td></tr>
	 <tr><td>Possibilité de recevoir <b>des contrats</b></td></tr>
	 <tr><td>Possibilité de recevoir <b>des blocus</b></td></tr>
	 <tr><td>Possibilité d\'annuler une guerre déclarée par votre alliance, pendant <b>2 heures</b> après la déclaration</td></tr>
	 <tr><td>Activation de la cotisation en négatif</td></tr>
	';
	
	break;
	case 2:
	 echo '<tr><td>Possiblité de <b>doubler la cotisation</b></td></tr>
	 	 <tr><td>Possibilité de lancer <b>des contrats</b></td></tr>
	 <tr><td>Possibilité de recevoir une <b>3<sup>ème</sup> guerre</b> si vous êtes la source des deux en cours</b></td></tr>
	';
	break;

	case 3:
	 echo '
	 <tr><td>Possibilité de lancer des <b>blocus</b></td></tr>
	 <tr><td>Possibilité pour vos membres d\'acheter une <b>armurerie</b></td></tr>
	 <tr><td>Possibilité pour les membres de cotiser volontairement des drachmes</b></td></tr>
	 <tr><td>Nouveau mode de <b>cotisation</b></td></tr>
	';
	break;

	case 4:
	 echo '
	<tr><td>Possibilité d\'annuler une guerre déclarée par votre alliance, pendant <b>12 heures</b> après la déclaration</td></tr>
	';
	break;
}

echo '</table>';

?>