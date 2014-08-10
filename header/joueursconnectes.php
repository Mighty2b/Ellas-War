<?php

echo '<title>'._('Joueurs connectés').'</title>';
echo '<meta name="description" content="'._('Joueurs connectés sur Ellàs War').'" />';

$get_joueurs_co = apc_fetch(APC_PREFIX.'get_joueurs_co');

if(!$get_joueurs_co) {
	$paquet -> add_action('get_joueurs_co');
}

?>