<?php

include('../header.php');

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
			$prix = $batiment_prix_temple1;
			$prix_faveur = 1;
		}
		elseif(in_array($id, $liste_temples2)) {
			$prix = $batiment_prix_temple2;
			$prix_faveur = 2;
		}
		elseif(in_array($id, $liste_temples3)) {
			$prix = $batiment_prix_temple3;
			$prix_faveur = 3;
		}
		elseif(in_array($id, $liste_temples4)) {
			$prix = $batiment_prix_temple4;
			$prix_faveur = 4;
		}

		if(!empty($prix)) {
			echo '<br/>';
			foreach($prix as $ress => $qtt) {
				if(!empty($qtt)) {
					echo nbf($qtt*2).' '.imress($ress).'&nbsp; ';
				}
			}

			echo $prix_faveur.' '.imress('faveur');
		}
	}
}
?>