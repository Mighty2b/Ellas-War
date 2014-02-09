<?php

echo '<title>'._('Jeu du javelot').'</title>
<meta name="description"
      content="'._('Jeu du javelot').'" />';

$paquet->add_action('javelot');


if(!empty($_POST['lancer'])) {
	$paquet->add_action('lancer_javelot');
}

?>