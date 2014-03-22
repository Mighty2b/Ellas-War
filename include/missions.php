<?php

echo '<h2 class="centrer">'._('Missions').'</h2>';

echo '<div class="ligne_80 centrer"><br/>'._(
'Les missions sont des quêtes que vous pouvez réaliser chaque semaine. '.
'La remise à zéro se fait toutes les semaines le dimanche matin à minuit.').'<br/><br/></div>';

echo '<div class="ligne_80">
<div class="ligne">
	<div class="ligne_50">
	<b>'._('Vendredi 13').'</b><br/>
	Jouer 100 tickets au loto
	<br/><i>Récompense :</i> 50 000 '.imress('drachme').'
	<br/><br/></div>
	<div class="ligne_50 centrer"><br/>';

if($paquet->get_answer('stats_tmp')->{1}->vendredi_valide == 0) {
	if($paquet->get_answer('stats_tmp')->{1}->vendredi < 100) {
		echo _('Actuellement').' : '.
		     nbf($paquet->get_answer('stats_tmp')->{1}->vendredi);
	}
	else {
		echo '<div class="cursor rouge_goco"
		           onclick="valider_mission(\'vendredi\', 1)">'._('Valider la mission').'</div>';
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
     		window.location.href = \''._('missions').'\';
     }
   });
}

</script>';

?>