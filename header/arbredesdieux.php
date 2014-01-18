<?php

echo '
<title>'._('Arbre des dieux').'</title>
<meta name="description"
      content="'._('Arbre des dieux').'" />';

if(!empty($_GET['var1'])) {
	$paquet -> add_action('reset_arbredesdieux');
}

$paquet -> add_action('arbredesdieux');

?>