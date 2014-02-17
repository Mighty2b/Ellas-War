<?php

echo '<title>'._('Écrire un nouveau message').'</title>
<meta name="description"
      content="'._('Écrire un nouveau message').'" />';

if(!empty($_POST['changer']) && !empty($_POST['dest'])) {
	if(empty($_POST['titre'])) {
		$_POST['titre'] = _('Nouveau message');
	}

	$paquet->add_action('nouveaux_messages',
	                    array($_POST['dest'], $_POST['titre'], 
	                          $_POST['texte']));
}

if(!empty($_GET['var3'])) {
	$paquet -> add_action('profils_alliance', array($_GET['var3']));
}

$mon_alliance  = $paquet->add_action('infoalliance');

?>