<?php

echo '<title>'._('Boîte d\'envoi').'</title>
<meta name="description"
      content="'._('Boîte d\'envoi').'" />';

if(empty($_GET['var1'])) {
	$_GET['var1'] = 1;
}

if(empty($_POST['recherche'])) {
	$_POST['recherche'] = '';
}

$paquet -> add_action('messagerie_envoi', 
                      array($_GET['var1'], $_POST['recherche']));

?>