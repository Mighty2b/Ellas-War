<?php

echo '<title>'._('Informations de votre cité').'</title>
<meta name="description" content="'._('Informations de votre cité').'" />';

$paquet -> add_action('info_temples');
$paquet -> add_action('get_news', array(5));
$paquet -> add_action('nb_tickets');
$paquet -> add_action('info_btn');
$paquet -> add_action('info_oracle');
$paquet -> add_action('get_breves', array(5));
$paquet -> add_action('arbredesdieux');
$paquet -> add_action('get_hf');
$paquet -> add_action('get_mes_filleuls_actifs');
$paquet -> add_action('list_archives', array(0,0,0,10));

?>