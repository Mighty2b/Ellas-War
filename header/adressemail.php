<?php

echo '
<title>'._('Modifier votre adresse mail').'</title>
<meta name="description" content="'.('Modifier votre adresse mail.').'" />';

if(!empty($_POST['ancien']) && !empty($_POST['nouveau']) &&
	 !empty($_POST['confirmation'])) {
	$paquet -> add_action('changer_mail',
	                      array($_POST['ancien'], $_POST['nouveau'],
	                            $_POST['confirmation']));
}

?>