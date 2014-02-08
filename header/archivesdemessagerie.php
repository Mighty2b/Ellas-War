<?php

echo '<title>'._('Archives de messagerie').'</title>
<meta name="description"
      content="'._('Archives de messagerie').'" />';

if(empty($_GET['var1'])) {
	$_GET['var1'] = 1;
}

if(empty($_POST['recherche'])) {
	$_POST['recherche'] = '';
}

$paquet -> add_action('messagerie_archives', 
                      array($_GET['var1'], $_POST['recherche']));

?>