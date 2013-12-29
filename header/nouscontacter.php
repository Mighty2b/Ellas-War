<?php

echo '<title>'._('Contacter l\'équipe d\'Ellàs War').'</title>
<meta name="description" content="'._('N\'hésitez pas à contacter l\'équipe d\'Ellàs War.').'" />';

if(!empty($_POST['login']) && !empty($_POST['mail']) && 
   !empty($_POST['titre']) && !empty($_POST['message'])) {
	$paquet -> add_action('nouscontacter', 
	                      array($_POST['login'], $_POST['mail'],
	                            $_POST['titre'], $_POST['message']));
}

?>
