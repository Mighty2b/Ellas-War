<?php

echo '
<title>'._('Construire').'</title>
<meta name="description" content="'._('Construire votre cité').'" />';

if(!empty($_POST['batiment'])) {
	if(!empty($_POST['achatt'])) {
		$paquet -> add_action('batir', 
		                      array($_POST['batiment'], $_POST['achatt']));
	}
	elseif(!empty($_POST['ventee'])) {
		$paquet -> add_action('detruire', 
		                      array($_POST['batiment'], $_POST['ventee']));
	}
	elseif(isset($_POST['modif'])) {
		$paquet -> add_action('modif_coef_marbre',
		                      array($_POST['modif']));
	}

	$_GET['var1'] = $_POST['batiment'];
}

include('donnees/batiments.php');

?>
