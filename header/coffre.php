<?php

echo '<title>'._('Coffre de l\'alliance').'</title>
<meta name="description"
      content="'._('Coffre de l\'alliance').'" />';

$paquet -> add_action('infoalliance');

if(!empty($_POST['qtt']) && !empty($_POST['choix'])) {
	$paquet -> add_action('demander_alliance',
												 array($_POST['qtt'], $_POST['choix']));
}

$paquet -> add_action('coffre_alliance');

?>