<?php

echo '<title>'._('Gestion des blocus').'</title>
<meta name="description"
      content="'._('Gestion des blocus').'" />';

if(!empty($_GET['var1'])) {
	$paquet -> add_action('action_blocus', array($_GET['var1']));
}

$paquet -> add_action('info_blocus');
$paquet -> add_action('infoalliance');

?>