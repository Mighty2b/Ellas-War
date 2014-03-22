<?php

echo '<h2 class="centrer">'._('Poursuites').'</h2>';

echo '<div class="ligne_80 centrer"><br/>'._(
'Les poursuites sont des quêtes que vous pouvez réaliser de façon journalière. '.
'La remise à zéro se fait tous les jours à minuit.').'<br/><br/></div>';

echo '<div class="ligne_80">
<div class="ligne">
	<div class="ligne_50">
	<b>'._('Joueur heureux').'</b><br/>';
	printf(_('Gagner au moins %s en jouant aux jeux'), 
	       nbf(10000). ' '.imress('drachme'));
	echo '<br/><i>Récompense :</i> 2 500 '.imress('drachme').'
	<br/><br/></div>
	<div class="ligne_50 centrer"><br/>';

if($paquet->get_answer('stats_tmp')->{1}->jeux_valide == 0) {
	if($paquet->get_answer('stats_tmp')->{1}->jeux < 10000) {
		echo _('Actuellement').' : '.
		     nbf($paquet->get_answer('stats_tmp')->{1}->jeux).' '.
		     imress('drachme');
	}
	else {
		echo '<div class="cursor rouge_goco"
		           onclick="valider_mission(\'joueur_heureux\', 1)">'._('Valider la mission').'</div>';
	}
}
else {
	echo '<span class="rouge_goco">'._('Mission validée').'</span>';
}

echo '</div>
</div>
<div class="ligne">
	<div class="ligne_50"><b>' ._('Visiteur d\'ailleurs').'</b><br/>
	'._('Visiter le forum').
	'<br/><i>Récompense :</i> 2 500 '.imress('drachme').'
	<br/><br/></div>
	<div class="ligne_50 centrer"><br/>';

if($paquet->get_answer('stats_tmp')->{1}->forum_visite == 0) {
	echo '<a href="'.FORUM_URL.'"
	         onclick="valider_mission(\'visiteur_ailleurs\', 0)"
	         class="rouge_goco"
	         target="_blank">'._('Visiter le forum').'</a>';
}
else {
	echo '<span class="rouge_goco">'._('Mission validée').
	     ' (<a href="'.FORUM_URL.'"
	           target="_blank">'._('Visiter le forum').'</a>)</span>';
}

echo '</div>
</div>

<div class="ligne">
	<div class="ligne_50"><b>' ._('Combattant du dimanche').'</b><br/>
	'._('Effectuer au moins 4 attaques hors guerre').
	'<br/><i>Récompense :</i> 20 000 '.imress('drachme').'
	<br/><br/></div>
	<div class="ligne_50 centrer"><br/>';

if($paquet->get_answer('stats_tmp')->{1}->attaque_valide == 0) {
	if($paquet->get_answer('stats_tmp')->{1}->attaque_hg < 4) {
		echo _('Actuellement').' : '.
		     nbf($paquet->get_answer('stats_tmp')->{1}->attaque_hg);
	}
	else {
		echo '<a href="#"
		         class="cursor rouge_goco"
		         onclick="valider_mission(\'combattant_dimanche\', 1)">'._('Valider la mission').'</a>';
	}
}
else {
	echo '<span class="rouge_goco">'._('Mission validée').'</span>';
}

echo '</div>
</div>

<div class="ligne">
	<div class="ligne_50"><b>' ._('Je gratte, tu grattes...').'</b><br/>
	'._('Gratter au moins 10 tickets').
	'<br/><i>Récompense :</i> 20 000 '.imress('drachme').'
	<br/><br/></div>
	<div class="ligne_50 centrer"><br/>';

if($paquet->get_answer('stats_tmp')->{1}->tickets_valide == 0) {
	if($paquet->get_answer('stats_tmp')->{1}->tickets_gratte < 10) {
		echo _('Actuellement').' : '.
		     nbf($paquet->get_answer('stats_tmp')->{1}->tickets_gratte);
	}
	else {
		echo '<a href="#"
		         class="cursor rouge_goco"
		         onclick="valider_mission(\'jetu_gratte\', 1)">'._('Valider la mission').'</a>';
	}
}
else {
	echo '<span class="rouge_goco">'._('Mission validée').'</span>';
}

echo '</div>
</div>

</div>

<script type="text/javascript">

function valider_mission(mission, hide) {
   $.ajax({
     type: "GET",
     url: "form/valide_quetej.php",
     data: "mission="+mission,
     success: function(msg){
     		window.location.href = \''._('poursuites').'\';
     }
   });
}

</script>';

?>