<?php

echo '
<title>'._('Vendre des ressources sur le marché').'</title>
<meta name="description"
      content="'._('Vendre des ressources sur le marché').'" />';

$paquet -> add_action('prix_commerce');
$paquet -> add_action('licence');

if(!empty($_POST['cle'])) {
	if(empty($_POST['anonyme'])) {
		$_POST['anonyme'] = '';
	}
	
	$paquet -> add_action('vendre_lot',
												array(str_replace(' ', '', $_POST['nbressource']), $_POST['type'],
	                            $_POST['vente'], $_POST['prixressource'],
	                            $_POST['cle'], $_POST['anonyme']));
}

?>