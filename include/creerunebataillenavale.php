<?php

if(!empty($_POST['description'])) {
	$_POST['prime'] = str_replace(' ', '', $_POST['prime']);
	$paquet = new EwPaquet('creer_btn', array($_POST['description'], $_POST['prime']));
}

include('lang/'.LANG.'/include/creerunebataillenavale.php');

?>