<?php

$info    = $paquet->get_answer('quetesmissions_info')->{1};
$encours = $paquet->get_answer('quetesmissions_info')->{2};
$stats_j = $paquet->get_answer('stats_tmp')->{1};
$stats   = $paquet->get_answer('stats_tmp')->{2};

echo '<h2 class="centrer">'._('Quêtes').'</h2>';

echo '<div class="ligne_80 centrer"><br/>'._(
'Les quêtes peuvent êtres quotidiennes, hebdomadaires ou mensuelles. '.
'Vous ne pouvez réaliser qu\'une seule quête à la fois.').'<br/><br/></div>';

echo '<div class="ligne_80">';

if($paquet->get_answer('quetesmissions_info')->{3} == 1 &&
   $paquet->get_infoj('lvl') >= 1) {
	echo '
	<div class="ligne">
		<div class="ligne_50">
		<b>'._('La Pythie').'</b> '.
		'('._('Mission quotidienne').', '._('durée').' :</i> 6h)<br/>'._(
		'Apollon souhaite que vous transmettiez les dernières '.
		'consultations de l\'oracle aux cités avoisinantes. ').
		'<br/><i>'._('Récompense').' :</i> distribuée chaque semaine '.nbf(50000).' '.imress('drachme').' par vote. '.
		'La distribution de la récompense se fait au prorata du nombre de fois que la mission a été réalisée.'.
		'<br/><i>'._('Cagnotte').' :</i> '.
		nbf(50000*($stats->jeuxalt_current-$stats->jeuxalt_debut)).' '.imress('drachme').
		'<br/><i>'._('Missions accomplies').' :</i> '.$stats_j->nb_lapythie.'
		<br/><br/></div>
		<div class="ligne_50 centrer"><br/>';

	if(!empty($info->lapythie)) {
		echo _('Mission terminée');
	}
	elseif(!empty($encours)) {
		if($encours->id == 5) {
			echo _('Fin').' : '.display_date($encours->temps,3);
		}
		else {
			echo _('Une mission est déjà en cours');
		}
	}
	else {
		echo '<div class="cursor rouge_goco"
		           onclick="envoyer_mission(\'lapythie\')">'.
		         _('Réaliser la mission').'</div>';
	}

	echo '<br/>
<a target="_blank" 
   href="http://www.jeux-alternatifs.com/Ellas-War-jeu601_hit-parade_1_1.html"><img border="0" src="http://www.jeux-alternatifs.com/im/bandeau/hitP_88x31_v1.gif"></a>
<br/>
<a target="_blank" 
   href="http://www.jeux-alternatifs.com/Ellas-War-jeu601_hit-parade_1_1.html"
   class="rouge_goco">Votez pour faire augmenter la cagnote</a>
			</div>
	</div>';
}

if($paquet->get_infoj('lvl') >= 9) {
	echo '
	<div class="ligne">
		<div class="ligne_50">
		<b>'._('Main de Midas').'</b> '.
		'('._('Mission hebdomadaire').', '._('durée').' :</i> 6h)<br/>'._(
		'Le roi Midas peut transformer n\'importe quel métal en or. '.
		'Une petite visite pourrait être profitable...').
		'<br/><i>'._('Ressources requises').' :</i> 160 000 '.imress('fer').
		'<br/><i>'._('Récompense').' :</i> 500 '.imress('gold').
		'<br/><br/></div>
		<div class="ligne_50 centrer"><br/>';

	if(!empty($info->mainmidas)) {
		echo _('Mission terminée');
	}
	elseif(!empty($encours)) {
		if($encours->id == 1) {
			echo _('Fin').' : '.display_date($encours->temps,3);
		}
		else {
			echo _('Une mission est déjà en cours');
		}
	}
	elseif($paquet->get_infoj('fer') >= 160000) {
		echo '<div class="cursor rouge_goco"
		           onclick="envoyer_mission(\'mainmidas\')">'.
		         _('Réaliser la mission').'</div>';
	}
	else {
		echo 'En attente';
	}

	echo '</div>
	</div>';
}

echo '
<div class="ligne">
	<div class="ligne_50">
	<b>'._('Aidons les Danaïdes').'</b> '.
	'('._('Mission quotidienne').', '._('durée').' :</i> 6h)<br/>'._(
	'Les Danaïdes furent condamnées à remplir éternellement d\'eau un '.
	'tonneau percé. Hadès est connu pour être riches, peut-être '.
	'tomberez vous sur l\'un de ses coffres.').
	'<br/><i>'._('Ressources requises').' :</i> 200 000 '.imress('eau').
	'<br/><i>'._('Récompense').' :</i> 25 000 '.imress('drachme').
	'<br/><br/></div>
		<div class="ligne_50 centrer"><br/>';

	if(!empty($info->danaides)) {
		echo _('Mission terminée');
	}
	elseif(!empty($encours)) {
		if($encours->id == 2) {
			echo _('Fin').' : '.display_date($encours->temps,3);
		}
		else {
			echo _('Une mission est déjà en cours');
		}
	}
	elseif($paquet->get_infoj('eau') >= 200000) {
				echo '<div class="cursor rouge_goco"
		           onclick="envoyer_mission(\'danaides\')">'.
		         _('Réaliser la mission').'</div>';
	}
	else {
		echo 'En attente';
	}
	
	echo '</div>
	</div>';

echo '
<div class="ligne">
	<div class="ligne_50">
	<b>'._('Visite en Laurion').'</b> '.
	'('._('Mission quotidienne').', '._('durée').' :</i> 6h)<br/>'._(
	'Les mines du Laurion sont pleines d\'argent, '.
	'une expédition sur ces terres pourrait nous permettre '.
	'd\'agrandir nos stocks').
	'<br/><i>'._('Récompense').' :</i> 20 000 '.imress('argent').
	'<br/><br/></div>
		<div class="ligne_50 centrer"><br/>';

	if(!empty($info->laurion)) {
		echo _('Mission terminée');
	}
	elseif(!empty($encours)) {
		if($encours->id == 3) {
			echo _('Fin').' : '.display_date($encours->temps,3);
		}
		else {
			echo _('Une mission est déjà en cours');
		}
	}
	else {
				echo '<div class="cursor rouge_goco"
		           onclick="envoyer_mission(\'laurion\')">'.
		         _('Réaliser la mission').'</div>';
	}

	echo '</div>
	</div>';

if($paquet->get_infoj('lvl') >= 9) {
	echo '
	<div class="ligne">
		<div class="ligne_50">
		<b>'._('Préparons les Dionysies').'</b> '.
		'('._('Mission hebdomadaire').', '._('durée').' :</i> 6h)<br/>'._(
		'Les fêtes de Dionysos approchent et nous n\'aurons pas assez de vin. '.
		'J\'ai entendu parler d\'un homme qui pourrait peut-être nous aider. '.
		' Apportez lui de l\'eau et nous verrons s\'il peut vraiment la '.
		'transformer en vin.').
		'<br/><i>'._('Ressources requises').' :</i> 120 000 '.imress('eau').
		'<br/><i>'._('Récompense').' :</i> 500 '.imress('vin').
		'<br/><br/></div>
		<div class="ligne_50 centrer"><br/>';

	if(!empty($info->dionysies)) {
		echo _('Mission terminée');
	}
	elseif(!empty($encours)) {
		if($encours->id == 4) {
			echo _('Fin').' : '.display_date($encours->temps,3);
		}
		else {
			echo _('Une mission est déjà en cours');
		}
	}
	elseif($paquet->get_infoj('eau') >= 120000) {
				echo '<div class="cursor rouge_goco"
		           onclick="envoyer_mission(\'dionysies\')">'.
		         _('Réaliser la mission').'</div>';
	}
	else {
		echo 'En attente';
	}
	
	echo '</div>
	</div>';
}

echo '</div>

<script type="text/javascript">

function envoyer_mission(mission) {
   $.ajax({
     type: "GET",
     url: "form/envoyer_mission.php",
     data: "mission="+mission,
     success: function(msg){
     		window.location.href = \''._('missionsquetes').'\';
     }
   });
}

</script>';

?>