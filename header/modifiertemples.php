<?php

echo '<title>'._('Modifier mes temples').'</title>
<meta name="description"
      content="'._('Modifier mes temples').'" />';

if(!empty($_POST['temple']) && !empty($_POST['nouveau'])) {
	$paquet -> add_action('changer_temple',
												array($_POST['temple'], $_POST['nouveau']));
}

$paquet -> add_action('possible_changer_temple');

?>