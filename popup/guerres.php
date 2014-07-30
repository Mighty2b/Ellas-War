<?php

include('../header.php');

if(!empty($_GET['id'])) {
	$paquet = new EwPaquet();
	$paquet -> add_action('historique_guerre', array($_GET['id']));
	$paquet -> send_actions();
	
	if(!empty($paquet -> get_answer('historique_guerre'))) {
		$liste     = $paquet -> get_answer('historique_guerre')->{1}->liste;
		$attaquant = $paquet -> get_answer('historique_guerre')->{1}->attaquant;
		$defenseur = $paquet -> get_answer('historique_guerre')->{1}->defenseur;
	}
}
else {
	$liste = array();
}

$txt = array(_('a perdu'), _('a gagné'));

echo '
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" >
<head><title>'._('Historique attaques').'</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <style type="text/css">
		body {
		  padding:0;
		  margin:10;
		  font-family: \'Times New Roman\';
		  font-size:12px;
		}
		
		
		input.mail {
		  background-color: #EAE7E1;
		  border: 1px solid #857061;
		  width: 147px;
		}
		
		.bouton_classique {
		  border:1px solid #000;
		  background-color:#d9d2bf;
		  display: table;
		  margin:auto;
		}
		
		.bouton_classique:hover {
		  -moz-box-shadow:0 0 3px #000 inset;
		  -webkit-box-shadow:0 0 3px #000 inset;
		  box-shadow:0 0 3px #000 inset;
		}
		
		.bouton_classique2 {
		  border: 1px solid #cac3b1;
		  margin: 1px 2px 1px 2px;
		  padding:0px 3px 0px 3px;
		  font-size:1.2em;
		  color:#0c0400;
		  background-image:linear-gradient(#f0e9d6, #d2c9ac); /* Norme W3C */
		  background:-moz-linear-gradient(#f0e9d6, #d2c9ac); /* Firefox */
		  background:-webkit-linear-gradient(top, #f0e9d6 0%, #d2c9ac 100%); /* Chrome, Safari */
		  background-image:-o-linear-gradient(#f0e9d6, #d2c9ac); /* Opera */
		  background-image:-ms-linear-gradient(#f0e9d6, #d2c9ac); /* IE */
		  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr=\'#f0e9d6\', endColorstr=\'#d2c9ac\',GradientType=0 );
		  cursor : pointer;
		  font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
		}
		
		.centrer {
		  text-align:center;
		}
		
		.centrer_tableau {
		  margin:auto;
		}
		
	</style>
</head>
	<body bgcolor="#EAE7E1">';

if(!empty($liste) && sizeof($liste) > 0) {
	
echo '<h2 class="centrer">'.
stripslashes($attaquant).' '._('contre').' '.stripslashes($defenseur).
'</h2>';

	echo '<table class="centrer_tableau">';
	foreach($liste as $h) {
		echo '<tr style="color:'.$h->color.'">
		<td><td><b>'.$h->attaquant.'</b> </td>
		<td> '.$txt[$h->statu].' contre </td>
		<td> <b>'.$h->defenseur.'</b>.</td>
		<td> <b> le '.display_date($h->date,3).'</b></td>
		</tr>';
	}
	echo '</table>';
}
else {
	echo _('Vous avez pas accés à ces informations ou cette guerre est déjà terminée');
}

?>

</body>
</html>
