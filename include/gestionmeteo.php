<?php

$meteo       = $paquet->get_infoj('meteo');
$bonus_meteo = $paquet->get_infoj('bonus_meteo');

$paquet->error('anti_meteo');
$paquet->error('annuler_anti_meteo');

if(empty($meteo)) {
	$meteo = _('soleil');
}

echo '<h1>'._('Météo').' : '.$meteo.'</h1><br/><br/>';

echo '<div class="ligne_80">
<b>'._('La météo est la volonté des dieux.').' '. 
_('Elle influencera votre cité, vos productions et vos consommations. '.
'Grâce à elle vous pourrez remporter des victoires impossibles '.
'mais faites attention tout peut se retourner contre vous.').'</b>
<br/>
<p>'._(
'Si vous avez peur que celle-ci ait un effet néfaste sur votre cité, '.
'vous pouvez faire une offrande aux dieux. '.
'Après cette offrande votre cité ne subira plus la météo durant une semaine.').'
</p>

<p class="centrer">
<b>'._('Prix').' :</b> 
'.nbf(200000).' '.imress('drachme').' 
'.nbf(4000000).' '.imress('eau').' 
'.nbf(2000000).' '.imress('nourriture').' 
</p>
<p class="centrer">
<a href="'._('gestionmeteo-1').'" class="rouge_goco">'._('Ne plus subir la météo').'</a>
</p>';

if(!empty($bonus_meteo) && ($bonus_meteo > time())) {
	echo '<p>'._('Fin de l\'immunité').' : '.display_date($bonus_meteo,3).
' (<a href="'._('gestionmeteo').'-2" class="rouge_goco">'._('Annuler').'</a>)</p>';
}

echo '</div>';

?>
