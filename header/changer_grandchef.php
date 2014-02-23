<?php

echo '<title>'._('Changer de grand chef').'</title>
<meta name="description"
      content="'._('Changer de grand chef').'" />';

$paquet -> add_action('infoalliance');

if(!empty($_POST['chef'])) {
	$paquet -> add_action('changer_chef', array($_POST['chef']));
}

$paquet -> add_action('possibles_chefs');

?>