<?php

$info = array();
$info['raison'] = $paquet->get_infoj('raison');
$info['ban']    = $paquet->get_infoj('ban');

echo '<center><br/><br/>
	<b>'._('Votre compte a été bloqué par un membre du staff.').'</b>
	<br/><br/>';

if(!empty($info['raison'])) {
	echo $info['raison'].'<br/><br/>';
}

if(!empty($paquet->get_infoj('sortie')) && $paquet->get_infoj('sortie') > time()) {
	echo '<b>';
	printf(_('Votre compte sera automatiquement débloqué %s'),
	display_date($paquet->get_infoj('sortie'),3));
}

if($info['ban'] == false) {
  echo '<br/>
  		<a href="'._('accueil_bloque').'-recommencer">'._('Recommencer une partie').'</a>';
}

echo '<br/><br/><br/><br/>
</center>';

?>