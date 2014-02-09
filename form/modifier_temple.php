<?php

include('../header.php');
include('../donnees/donnees.php');

$paquet = new EwPaquet();
$paquet -> add_action('info');
$paquet -> send_actions();

if($paquet->get_infoj('statu') != 1) {
	exit();
}

if(!empty($_GET['id'])) {
	$id = addslashes(htmlentities($_GET['id']));
	
	if(!empty($id) && in_array($id, $paquet->get_infoj('temples'))) {
	
		if(in_array($id, $liste_temples1)) {
			$tab = $liste_temples1;
		}
		elseif(in_array($id, $liste_temples2)) {
			$tab = $liste_temples2;
		}
		elseif(in_array($id, $liste_temples3)) {
			$tab = $liste_temples3;
		}
		elseif(in_array($id, $liste_temples4)) {
			$tab = $liste_temples4;
		}

		if(!empty($tab)) {
			if(sizeof($tab) > 2) {
				echo '
				<option value="">&nbsp;</option>';
			}
			foreach($tab as $index) {
				if(!in_array($index, $paquet->get_infoj('temples'))) {
					echo '<option value="'.$index.'">'.$temples_donnees[$index]['nom'].'</option>';
				}
			}
		}
		else {
			echo '<option value="">&nbsp;</option>';
		}
	}
	else {
		echo '<option value="">&nbsp;</option>';
	}
}
else {
	echo '<option value="">&nbsp;</option>';
}
?>