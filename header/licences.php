<?php

echo '<title>'._('Achat des licences').'</title>
<meta name="description"
      content="'._('Achat des licences').'" />';

if((isset($_GET['var1'])) && (!empty($_GET['var1']))) {
	$paquet -> add_action('achat_licence', array($_GET['var1']));
}

$paquet -> add_action('licence');

?>