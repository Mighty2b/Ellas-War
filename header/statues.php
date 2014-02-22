<?php

echo '<title>'._('Statues').'</title>
<meta name="description"
      content="'._('Statues').'" />';

if(empty($_GET['var2'])) {
	if(!empty($_GET['var1'])) {
		$paquet -> add_action('orner', array($_GET['var1']));
	}
}
else {
	if($_GET['var2'] == 'activer' && $_GET['var1'] == 'sacrifice_hera') {
		$paquet->add_action('activer_hera');
	}
	elseif($_GET['var2'] == 'supprimer') {
		$paquet->add_action('supprimer_statue',array($_GET['var1']));
	}
}

$paquet->add_action('conditions_statues');

?>