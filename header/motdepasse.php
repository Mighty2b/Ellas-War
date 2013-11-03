<?php

echo '
<title>'._('Changer de mot de passe').'</title>
<meta name="description" content="'._('Changer de mot de passe.').'" />';

if(!empty($_POST['ancien']) && !empty($_POST['nouveau']) &&
	 !empty($_POST['confirmation'])) {
	$paquet -> add_action('changer_pwd',
	                      array($_POST['ancien'], $_POST['nouveau'],
	                            $_POST['confirmation']));
}

?>