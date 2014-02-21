<?php

echo '<title>'._('Héros').'</title>
<meta name="description" content="'._('Héros').'" />
<script type="text/javascript" src="js/scripts_heros.js" ></script>';

$paquet -> add_action('get_hero');
$paquet -> add_action('get_possibles_classes');

?>