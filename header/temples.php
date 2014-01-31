<?php

include('donnees/donnees.php');

echo '<title>'._('Temples').'</title>
<meta name="description"
      content="'._('Honorez les dieux en leur bâtissant un temple').'" />';

if(empty($_GET['var1'])) {
	$_GET['var1'] = '';
}

if(!empty($_GET['var1'])) {
	if($_GET['var1'] == 'poseidon' && !empty($_POST['action'])) {
		$paquet -> add_action('achat_mur_poseidon');
	}
	elseif($_GET['var1'] == 'demeter' AND !empty($_POST['foudre'])) {
		$paquet -> add_action('achat_furie', array($_POST['foudre']));
	}
	elseif($_GET['var1'] == 'zeus' AND !empty($_POST['foudre'])) {
		$paquet -> add_action('achat_foudre', array($_POST['foudre']));
	}
	elseif($_GET['var1'] == 'hermes' or $_GET['var1'] == 'apollon' or 
	   $_GET['var1'] == 'demeter') {
		$paquet -> add_action('batir_temple1', array($_GET['var1']));
	}
	elseif($_GET['var1'] == 'ares' or $_GET['var1'] == 'athena') {
		$paquet -> add_action('batir_temple2', array($_GET['var1']));
	}
	elseif($_GET['var1'] == 'artemis' or $_GET['var1'] == 'dionysos' or $_GET['var1'] == 'hephaistos') {
		$paquet -> add_action('batir_temple3', array($_GET['var1']));
	}
	elseif($_GET['var1'] == 'zeus' or $_GET['var1'] == 'hades' or $_GET['var1'] == 'poseidon') {
		$paquet -> add_action('batir_temple4', array($_GET['var1']));
	}
}

$paquet -> add_action('info_temples');

?>