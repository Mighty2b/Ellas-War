<?php

echo '<title>'._('Les guerres de votre alliance').'</title>
<meta name="description"
      content="'._('Les guerres de votre alliance').'" />';

if(!empty($_POST['choix'])) {
	$paquet -> add_action('action_ultimatum', array($_POST['id'], $_POST['choix']));
}
elseif(!empty($_GET['var1']) && !empty($_GET['var2']) && $_GET['var1'] == _('annuler')) {
	$paquet -> add_action('annuler_guerre', array($_GET['var2']));
}

$paquet -> add_action('info_mes_guerres');
$paquet -> add_action('infoalliance');

?>