<?php

echo '<title>'._('Demande et proposition de ressources').'</title>
<meta name="description"
      content="'._('Demande et proposition de ressources').'" />';

$paquet -> add_action('infoalliance');

if(!empty($_POST['type']) && !empty($_POST['qtt']) && 
	 !empty($_POST['choix'])) {
	$paquet -> add_action('do_demande',
												array($_POST['type'],
	                            $_POST['qtt'],
	                            $_POST['choix']));
}
elseif(!empty($_GET['var1'])) {
	$paquet -> add_action('del_demande', array($_GET['var1']));
}

$paquet -> add_action('get_demande');

?>