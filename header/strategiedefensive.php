<?php

echo '<title>'._('Stratégie défensive').'</title>
<meta name="description"
      content="'._('Stratégie défensive').'" />';

if(!empty($_POST)) {
	unset($_POST['Enregistrer']);
	$paquet -> add_action('maj_vagues', array(serialize($_POST)));
}
else {
	if(isset($_GET['var1']) && ($_GET['var1']==0 or $_GET['var1']==999999)) {
		if($_GET['var1'] == 999999) {
			$paquet -> add_action('ajout_vague', array($_GET['var1']));
		}
		else {
			$paquet -> add_action('ajout_vague');
		}
	}
	elseif(!empty($_GET['var1'])) {
		$paquet -> add_action('supprimer_vague', array($_GET['var1']));
	}
}

$paquet -> add_action('get_vagues');

?>