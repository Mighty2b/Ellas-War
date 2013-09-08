<?php

if(!empty($_POST['message'])) {
	if(!empty($_POST['oracle']) && $_POST['oracle'] == true) {
		$oracle = 1;
	}
	else {
		$oracle = 0;
	}
	
	$paquet = new EwPaquet('poster_missive',array($_POST['message'], $oracle));
}
elseif(!empty($_GET['var1'])) {
	$paquet = new EwPaquet('supprimer_missive',array($_GET['var1']));
}
else {
	$paquet = new EwPaquet('page_missives');
}

$oracle = $paquet->getRetour();
$prix   = $paquet->getRetour(2);
$liste  = $paquet->getRetour(3);

if(empty($prix)) {
	$prix = 0;
}

$ress = $paquet->get_ress();
$paquet->display();

include('lang/'.LANG.'/include/missives.php');

?>