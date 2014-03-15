<?php

include('include/menu_monalliance.php');

$conditions = $paquet->get_answer('condition_niveau')->{1};
$actu       = $paquet->get_answer('condition_niveau')->{2};
$remplie    = $paquet->get_answer('condition_niveau')->{3};
$necessaire = $paquet->get_answer('condition_niveau')->{4};

if($mon_alliance->level < 5) {
	
echo '
<div id="cadre_milieu_petit">
	<div id="cadre_haut_petit"></div>
	<div id="cadre_centre_petit">
	
	</div>
	<div id="cadre_bas_petit"></div>
</div>';

	echo '<h1>'._('Passage niveau').' '.($mon_alliance->level+1).'</h1>
	<div class="centrer">
	<h3>Votre alliance doit posséder :</h3>
	<table class="none">
	<tr><td class="gauche">
	<ul>
	';
	
	if($conditions->xp > 0) {
		echo '<li>';
		
		if($actu->xp < $conditions->xp) {
			echo '<font color="red">'.nbf($conditions->xp).' '._('XP').'</font>';
		}
		else {
			echo nbf($conditions->xp).' XP';
		}	
		
		echo ' ('._('Actuellement').' : '.nbf($actu->xp).')</li>';
	}
	
	if($conditions->mb >0) {
		echo '<li>';
		
		if($actu->mb < $conditions->mb) {
			echo '<font color="red">'.nbf($conditions->mb).' '._('membres niveau 7 ou supérieur').'</font>';
		}
		else {
			echo nbf($conditions->mb).' '._('membres niveau 7 ou supérieur');
		}
		
		echo ' ('._('Actuellement').' : '.nbf($actu->mb).')</li>';
	}
	
	if($conditions->vic >0) {
		echo '<li>';
		
		if($actu->vic < $conditions->vic) {
			echo '<font color="red">'.nbf($conditions->vic).' '._('victoires').'</font>';
		}
		else {
			echo nbf($conditions->vic).' '._('victoires');
		}
		
		echo ' ('._('Actuellement').' : '.nbf($actu->vic).')</li>';
	}
	
	if($conditions->contrat_rempli >0) {
		echo '<li>';
	
		if($actu->contrat_rempli < $conditions->contrat_rempli) {
			echo '<font color="red">'.nbf($conditions->contrat_rempli).' '._('contrats remplis').'</font>';
		}
		else {
			echo nbf($conditions->contrat_rempli).' '._('contrats remplis');
		}
	
		echo ' ('._('Actuellement').' : '.nbf($actu->contrat_rempli).')</li>';
	}
	
	if($conditions->contrat_donne >0) {
		echo '<li>';
	
		if($actu->contrat_donne < $conditions->contrat_donne) {
			echo '<font color="red">'.nbf($conditions->contrat_donne).' '._('contrats proposés').'</font>';
		}
		else {
			echo nbf($conditions->contrat_donne).' '._('contrats proposés');
		}
	
		echo ' ('._('Actuellement').' : '.nbf($actu->contrat_donne).')</li>';
	}
	
	if($conditions->ses >0) {
		echo '<li>';
		if($actu->ses < $conditions->ses or 
		   $paquet->get_infoj('droits_alliance')->voir_coffre == 0) {
			echo '<font color="red">'.nbf($conditions->ses).' '.imress('drachme').'</font>';
		}
		else {
			echo nbf($conditions->ses).' '.imress('drachme');
		}
		
		if($paquet->get_infoj('droits_alliance')->voir_coffre > 0) {
			echo ' ('._('Actuellement').' : '.nbf($actu->ses).')</li>';
		}
		else {
			echo '</li>';
		}
	}
	
	if($conditions->fer >0) {
		echo '<li>';
		if($actu->fer < $conditions->fer or 
		   $paquet->get_infoj('droits_alliance')->voir_coffre == 0) {
			echo '<font color="red">'.nbf($conditions->fer).' '.imress('fer').'</font>';
		}
		else {
			echo nbf($conditions->fer).' '.imress('fer');
		}
		
		if($paquet->get_infoj('droits_alliance')->voir_coffre > 0) {
			echo ' ('._('Actuellement').' : '.nbf($actu->fer).')</li>';
		}
		else {
			echo '</li>';
		}
	}
	
	if($conditions->arg >0) {
		echo '<li>';
		if($actu->arg < $conditions->arg or 
		   $paquet->get_infoj('droits_alliance')->voir_coffre == 0) {
			echo '<font color="red">'.nbf($conditions->arg).' '.imress('argent').'</font>';
		}
		else {
			echo nbf($conditions->arg).' '.imress('argent');
		}
		
		if($paquet->get_infoj('droits_alliance')->voir_coffre > 0) {
			echo ' ('._('Actuellement').' : '.nbf($actu->arg).')</li>';
		}
		else {
			echo '</li>';
		}
	}
	
	if($conditions->gol >0) {
		echo '<li>';
		if($actu->gol < $conditions->gol or 
		   $paquet->get_infoj('droits_alliance')->voir_coffre == 0) {
			echo '<font color="red">'.nbf($conditions->gol).' '.imress('gold').'</font>';
		}
		else {
			echo nbf($conditions->gol).' '.imress('gold');
		}
		
		if($paquet->get_infoj('droits_alliance')->voir_coffre > 0) {
			echo ' ('._('Actuellement').' : '.nbf($actu->gol).')</li>';
		}
		else {
			echo '</li>';
		}
	}
	
	if($conditions->boi >0) {
		echo '<li>';
		if($actu->boi < $conditions->boi or 
		   $paquet->get_infoj('droits_alliance')->voir_coffre == 0) {
			echo '<font color="red">'.nbf($conditions->boi).' '.imress('bois').'</font>';
		}
		else {
			echo nbf($conditions->boi).' '.imress('bois');
		}
		
		if($paquet->get_infoj('droits_alliance')->voir_coffre > 0) {
			echo ' ('._('Actuellement').' : '.nbf($actu->boi).')</li>';
		}
		else {
			echo '</li>';
		}
	}
	
	if($conditions->pie >0) {
		echo '<li>';
		if($actu->pie < $conditions->pie or 
		   $paquet->get_infoj('droits_alliance')->voir_coffre == 0) {
			echo '<font color="red">'.nbf($conditions->pie).' '.imress('pierre').'</font>';
		}
		else {
			echo nbf($conditions->pie).' '.imress('pierre');
		}
		
		if($paquet->get_infoj('droits_alliance')->voir_coffre > 0) {
			echo ' ('._('Actuellement').' : '.nbf($actu->pie).')</li>';
		}
		else {
			echo '</li>';
		}
	}
	
	if($conditions->mar >0) {
		echo '<li>';
		if($actu->mar < $conditions->mar or 
		   $paquet->get_infoj('droits_alliance')->voir_coffre == 0) {
			echo '<font color="red">'.nbf($conditions->mar).' '.imress('marbre').'</font>';
		}
		else {
			echo nbf($conditions->mar).' '.imress('marbre');
		}
		
		if($paquet->get_infoj('droits_alliance')->voir_coffre > 0) {
			echo ' ('._('Actuellement').' : '.nbf($actu->mar).')</li>';
		}
		else {
			echo '</li>';
		}
	}
	
	if($conditions->nou >0) {
		echo '<li>';
		if($actu->nou < $conditions->nou or 
		   $paquet->get_infoj('droits_alliance')->voir_coffre == 0) {
			echo '<font color="red">'.nbf($conditions->nou).' '.imress('nourriture').'</font>';
		}
		else {
			echo nbf($conditions->nou).' '.imress('nourriture');
		}
		
		if($paquet->get_infoj('droits_alliance')->voir_coffre > 0) {
			echo ' ('._('Actuellement').' : '.nbf($actu->nou).')</li>';
		}
		else {
			echo '</li>';
		}
	}
	
	if($conditions->eau >0) {
		echo '<li>';
		if($actu->eau < $conditions->eau or 
		   $paquet->get_infoj('droits_alliance')->voir_coffre == 0) {
			echo '<font color="red">'.nbf($conditions->eau).' '.imress('eau').'</font>';
		}
		else {
			echo nbf($conditions->eau).' '.imress('eau');
		}
		
		if($paquet->get_infoj('droits_alliance')->voir_coffre > 0) {
			echo ' ('._('Actuellement').' : '.nbf($actu->eau).')</li>';
		}
		else {
			echo '</li>';
		}
	}
	
	if($conditions->rai >0) {
		echo '<li>';
		if($actu->rai < $conditions->rai or 
		   $paquet->get_infoj('droits_alliance')->voir_coffre == 0) {
			echo '<font color="red">'.nbf($conditions->rai).' '.imress('raisin').'</font>';
		}
		else {
			echo nbf($conditions->rai).' '.imress('raisin');
		}
		
		if($paquet->get_infoj('droits_alliance')->voir_coffre > 0) {
			echo ' ('._('Actuellement').' : '.nbf($actu->rai).')</li>';
		}
		else {
			echo '</li>';
		}
	}
	
	if($conditions->vin >0) {
		echo '<li>';
		if($actu->vin < $conditions->vin or 
		   $paquet->get_infoj('droits_alliance')->voir_coffre == 0) {
			echo '<font color="red">'.nbf($conditions->vin).' '.imress('vin').'</font>';
		}
		else {
			echo nbf($conditions->vin).' '.imress('vin');
		}
		
		if($paquet->get_infoj('droits_alliance')->voir_coffre > 0) {
			echo ' ('._('Actuellement').' : '.nbf($actu->vin).')</li>';
		}
		else {
			echo '</li>';
		}
	}
	
	echo '
	</ul>
	</td></tr></table>';
	
	echo '<b>'._('Vous avez rempli').' '.$remplie;
	
	if($remplie > 1) {
	  echo ' '._('Objectifs');
	}
	else {
	  echo ' '._('Objectif');
	}
	
	echo ' sur '.$necessaire.'</b></div>';
	
	
	if($paquet->get_infoj('id') == $mon_alliance->id_chef && 
	   $remplie == $necessaire) {
		echo '<br/><div class="bouton_classique"><input type="button"
																										value="'._('PASSER VOTRE ALLIANCE NIVEAU').' '.($mon_alliance->level+1).'" 
																										onclick="javascript:passer_lvlalliance();"/></div>';
	}
	
	
	echo '<div class="centrer">
				<h2>'._('Après le passage de votre alliance niveau').' '.
				($mon_alliance->level+1).'</h2></div>
				<table class="none">';
	
	switch($mon_alliance->level) {
		case 1:
		 echo '<tr><td>'._('<b>Calendrier</b> afin d\'organiser votre alliance').'</td></tr>
		 <tr><td>'._('Possibilité de retirer <b>toutes les ressources</b> du coffre d\'alliance').'</td></tr>
		 <tr><td>'._('Possibilité de recevoir <b>des contrats</b>').'</td></tr>
		 <tr><td>'._('Possibilité de recevoir <b>des blocus</b>').'</td></tr>
		 <tr><td>'._('Possibilité d\'annuler une guerre déclarée par votre alliance, pendant <b>2 heures</b> après la déclaration').'</td></tr>
		 <tr><td>'._('Activation de la cotisation en négatif').'</td></tr>
		';
		
		break;
		case 2:
		 echo '<tr><td>'._('Possiblité de <b>doubler la cotisation').'</b></td></tr>
		 	 <tr><td>'._('Possibilité de lancer <b>des contrats').'</b></td></tr>
		 <tr><td>'._('Possibilité de recevoir une <b>3<sup>ème</sup> guerre</b> si vous êtes la source des deux en cours').'</td></tr>
		 <tr><td>'._('Augmentation de 5% des <b>Drachmes</b> obtenus lors d\'une guerre').'</td></tr>
		 ';
		break;
	
		case 3:
		 echo '
		 <tr><td>'._('Possibilité de lancer des <b>blocus</b>').'</td></tr>
		 <tr><td>'._('Possibilité pour vos membres d\'acheter une <b>armurerie</b>').'</td></tr>
		 <tr><td>'._('Possibilité pour les membres de cotiser volontairement des drachmes').'</td></tr>
		 <tr><td>'._('Nouveau mode de <b>cotisation</b>').'</td></tr>
		 <tr><td>'._('Augmentation de 10% des <b>Drachmes</b> obtenus lors d\'une guerre').'</td></tr>
		 ';
		break;
	
		case 4:
		 echo '
		 <tr><td>'._('Possibilité d\'annuler une guerre déclarée par votre alliance, pendant <b>12 heures</b> après la déclaration').'</td></tr>
		 <tr><td>'._('Baisse de 20% des prix des bonus de <b>l\'armurerie</b>').'</td></tr>
		 <tr><td>'._('Augmentation de 20% des <b>Drachmes</b> obtenus lors d\'une guerre').'</td></tr>
		 ';
		break;
	}
	
	echo '</table>';
}
else {
	echo '<div class="centrer rouge_goco">'.
	_('Votre alliance a atteint le niveau 5, félicitation.').
	'</div>';
}

echo '<script type="text/javascript">

function passer_lvlalliance() {
   $.ajax({
     type: "GET",
     url: "form/formlvlalliance.php",
     success: function(msg){ $("#cadre_centre_petit").html(msg);$("#cadre_milieu_petit").show("slow"); }
   });
}
</script>';

?>