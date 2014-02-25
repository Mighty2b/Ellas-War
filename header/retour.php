<?php

echo '<title>'._('Obtenir un nouveau mot de passe').'</title>
<meta name="description"
      content="'._('Obtenir un nouveau mot de passe').'" />';

if(empty($_GET['var1'])) {
	$_GET['var1'] = '';
}

$paquet -> add_action('valider_nv_mdp', array($_GET['var1']));


?>