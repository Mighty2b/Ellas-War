<?php

echo '<title>'._('Jeu de dés').'</title>
<meta name="description"
      content="'._('Jeu de dés').'" />';

if(!empty($_POST['mise'])) {
	$paquet -> add_action('des', array($_POST['mise']));
}
?>

