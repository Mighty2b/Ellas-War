<?php

echo '<title>'._('Donner des ressources').'</title>
<meta name="description"
      content="'._('Donner des ressources').'" />';

$paquet -> add_action('infoalliance');

if(!empty($_POST['joueur']) && !empty($_POST['somme'])) {
	$paquet -> add_action('donner', array($_POST['joueur'],$_POST['somme']));
}

$paquet -> add_action('info_donner');

?>