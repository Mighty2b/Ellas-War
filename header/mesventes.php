<?php

echo '
<title>'._('Ventes en cours').'</title>
<meta name="description" content="'.('Ventes en cours').'" />';

if(!empty($_GET['var1'])) {
	$paquet -> add_action('acheter_lot', array($_GET['var1']));
}

$paquet -> add_action('mes_ventes');

?>