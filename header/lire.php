<?php

echo '<title>'._('Lire').'</title>
<meta name="description" content="'._('Lire').'" />';

if(empty($_GET['var1'])) {
	redirect();
}

if(!empty($_POST['texte'])) {
	$paquet -> add_action('messagerie_repondre',
	                      array($_GET['var1'], $_POST['texte']));
}

$paquet -> add_action('messagerie_lire', array($_GET['var1'],$_GET['var2']));

?>