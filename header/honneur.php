<?php

echo '
<title>'._('Classement de l\'honneur').'</title>
<meta name="description"
      content="'._('Classement de l\'honneur').'" />';

$lvl = 0;

if(!empty($_GET['var1'])) {
	$lvl = $_GET['var1'];
}

$paquet->add_action('get_classementh', array($lvl));

?>