<?php

if(!empty($_GET['var1'])) {
	$paquet = new EwPaquet('get_parrain', array($_GET['var1']));
	$_SESSION['parrain'] = $paquet->getRetour();
}

if(!empty($_POST['Inscription'])) {
	if(empty($_SESSION['parrain'])) {
		$paquet = new EwPaquet('inscription',
		                       array($_POST['pseudo'], $_POST['pass'],
		                             $_POST['pass2'], $_POST['mail'],0));
	}
	else {
		$paquet = new EwPaquet('inscription',
		                       array($_POST['pseudo'], $_POST['pass'],
		                       $_POST['pass2'], $_POST['mail'],
		                       $_SESSION['parrain']->id));
	}
	if($paquet->getstatu() == 1) {
		redirect();
	}
}

?>