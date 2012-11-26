<?php

include('../header.php');

if(!empty($_GET['destination'])) {
	$unite = array();
	for($i=1;$i<=4;$i++) {
		$unite['unite'.$i] = $_GET['unite'.$i];
	}
	
	$paquet = new EwPaquet('deplacer_unite', 
												 array($_GET['btn'], $_GET['x'], $_GET['y'],
												 			 $unite, $_GET['destination']));
}
elseif(!empty($_GET['unite']) && !empty($_GET['nb'])) {
	$paquet = new EwPaquet('achat_unite', 
												 array($_GET['btn'], $_GET['x'], $_GET['y'],
												 			 $_GET['unite'], $_GET['nb']));
}
else {
	if(empty($_GET['x'])){
		$_GET['x']=0;
	}
	
	if(empty($_GET['y'])){
		$_GET['y']=0;
	}
	
	$paquet = new EwPaquet('info_case', 
												 array($_GET['btn'], $_GET['x'], $_GET['y']));
}
$info = $paquet->getRetour();

if(!empty($info->id_c)) {
	echo '<div class="ligne centrer">
	<b>'.$info->login.'</b> ('.$info->id_x.';'.$info->id_y.')<br/><br/>
	</div>';
}

include('../lang/'.LANG.'/include/form_info_case.php');

?>