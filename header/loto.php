<?php

echo '<title>'._('Loto').'</title>
<meta name="description"
      content="'._('Jouez au loto et gagnez des drachmes.').'" />';


if(!empty($_POST['ticket'])) {
	$paquet -> add_action('jouer_loto', array($_POST['ticket']));
}

$paquet -> add_action('info_loto');

?>