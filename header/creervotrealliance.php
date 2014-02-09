<?php

echo '<title>'._('Créer votre alliance').'</title>
<meta name="description"
      content="'._('Créer votre alliance').'" />';

if(!empty($_POST)) {
	$paquet -> add_action('creer_alliance',
	                      array($_POST['nom'], $_POST['description']));
}

$paquet->add_action('get_listealliances');

?>