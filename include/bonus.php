<?php

$bonus = $paquet->get_infoj('bonus_connexion');
$info  = $paquet->get_infoj('bonus_info');

echo '<h1>'._('Bonus divins').'</h1>';

echo '
<div class="ligne">
	<div class="cadre_50 droite" style="margin-top:3px;">
		<b>'._('Avancée du bonus divin').' :</b>
	</div>
	<div class="cadre_50">
	  <div class="progress-bar">
	    <div class="progress-bar3" id="bar_hf_2">
	      <div class="progress-bar2 rouge">
	      </div>
	    </div>
	    <div class="progress-bar-txt"></div>
	  </div>
	</div>
</div>

<div class="ligne80 justifier">
'._('Les bonus divins vous sont octroyés lors de votre connexion sur 
le jeu et récompensent votre fidélité. 
Lorsqu\'un bonus divin vous est accordé, 
vous aurez le choix entre un ou plusieurs bonus. 
Si vous ne l\'utilisez pas immédiatement celui-ci est conservé. 
Vous ne pouvez pas avoir plus de 3 bonus divins non utilisés, 
dans le cas contraire vous ne pourrez pas en avoir de nouveaux. 
Les bonus ayant des effets similaires se cumulent avec ceux 
obtenus par les faveurs. Les 200 unités de temples que vous 
pouvez obtenir ne permettent pas de dépasser la limite qui vous 
est imposée.').'<br/><br/></div>';

if(!empty($bonus) && sizeof($bonus) > 0) {
	echo '<table class="centrer_tab">';
	
	foreach($bonus as $b) {
		echo '<tr>
				<td>&nbsp;';
		switch($b) {
			case 1:
				echo nbf(10000).' '.imress('fer');
			break;
			case 2:
				echo nbf(10000).' '.imress('argent');
			break;
			case 3:
				echo nbf(10000).' '.imress('bois');
			break;
			case 4:
				echo nbf(2000).' '.imress('raisin');
			break;
			case 5:
				echo nbf(10000).' '.imress('pierre');
			break;
			case 6:
				echo nbf(250).' '.imress('marbre');
			break;
			case 7:
				echo nbf(2000).' '.imress('vin');
			break;
			case 8:
				echo nbf(2000).' '.imress('gold');
			break;
			case 9:
				echo nbf(1).' '.imress('faveur');
			break;
			case 10:
				echo _('80 spartiates');
			break;
			case 11:
				echo _('200 unités de votre 3ème temple');
			break;
			case 12:
				echo _('200 espions');
			break;
			case 13:
				echo _('6 heure de retrait sans taxe dans votre trésor');
			break;
			case 14:
				echo _('licence de grand commerçant pour un jour');
			break;
			case 15:
				echo _('2 attaques suplémentaires');
			break;
			case 16:
				echo _('L\'Appui d\'Éros durant 6 heures');
			break;
			default:
				echo _('erreur');
			break;
		}
		echo '&nbsp;</td>
				<td><a href="'._('Bonus').'-'.$b.'" class="sous"><div class="bouton_classique"><input class="bouton_classique2" type="button" name="Utiliser" value="'._('Utiliser').'" /></div></a></td>
				</tr>';
	}
	
	echo '</table>';
}
else {
	echo '<div class="centrer">
					<b>'._('Aucun bonus n\'est actuellement disponible').'</b>
				</div>';
}

echo '
<script type="text/javascript">
$(function(){';
echo '
		$("#bar_hf_2").css("width", "'.round(250*$info).'px");';
echo '
  $(".progress-bar").animate({"width": "250px"}, { duration: 2000});
});
</script>';

?>