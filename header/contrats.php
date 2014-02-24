<?php

echo '<title>'._('Gestion des contrats').'</title>
<meta name="description"
      content="'._('Gestion des contrats').'" />';

if(!empty($_GET['var1'])) {
	if(!empty($_GET['var2'])) {
		if($_GET['var2'] == 'valider') {
			$paquet = new EwPaquet('valider_contrat', array($_GET['var1']));
		}
		else {
			$paquet = new EwPaquet('annuler_contrat', array($_GET['var1']));
		}
	}
}

$paquet -> add_action('info_contrats');
$paquet -> add_action('infoalliance');

?>