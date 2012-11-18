<?php

if(empty($_POST['recherche'])) {
	$_POST['recherche'] = '';
}

if(!empty($_POST['suppr_mp'])) {
	$paquet = new EwPaquet('supprimer_mp', array($_POST['suppr_mp']));
}
elseif(!empty($_GET['var1']) && $_GET['var1'] == 'supprimer' 
	 && !empty($_GET['var2'])) {
	$paquet = new EwPaquet('supprimer_mp_envoi', array($_GET['var2']));
}
else {
	if(empty($_GET['var1'])) {
		$_GET['var1'] = 1;
	} 
	$paquet = new EwPaquet('boite_envoie', array($_GET['var1'], $_POST['recherche']));
}

$nombre_pages = $paquet->getRetour();
$messages     = $paquet->getRetour(2);

include('lang/'.LANG.'/include/boiteenvoie.php');

?>