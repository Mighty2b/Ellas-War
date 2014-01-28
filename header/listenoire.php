<?php

echo '
<title>'._('Liste noire').'</title>
<meta name="description"
      content="'._('Liste noire').'" />';

if(!empty($_GET['var1'])) {
	$paquet -> add_action('supr_listenoire', array($_GET['var1']));
}

$paquet -> add_action('get_listenoire');

?>