<?php

echo '
<title>'._('Boîte de reception').'</title>
<meta name="description"
      content="'._('Boîte de reception').'" />';

if(empty($_GET['var1'])) {
	$_GET['var1'] = 1;
}

if(empty($_POST['recherche'])) {
	$_POST['recherche'] = '';
}

$paquet -> add_action('messagerie_reception', 
                      array($_GET['var1'], $_POST['recherche']));

?>