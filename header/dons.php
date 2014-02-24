<?php

echo '<title>'._('Donner des ressources').'</title>
<meta name="description"
      content="'._('Donner des ressources').'" />';

if(!empty($_POST['joueur']) && !empty($_POST['ressource']) && 
	 !empty($_POST['somme'])) {
	$paquet -> add_action('dons_parain',
												array($_POST['joueur'], $_POST['ressource'],
	                            $_POST['somme']));
}

$paquet -> add_action('get_mes_filleuls', array(5));

?>