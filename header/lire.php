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

if(empty($_GET['var2']) or $_GET['var2'] != 2) {
	$_GET['var2'] = 1;
}
else {
	$_GET['var2'] = 2;
}

$paquet -> add_action('messagerie_lire', array($_GET['var1'],$_GET['var2']));

?>