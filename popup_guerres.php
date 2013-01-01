<?php

include('header.php');

$paquet = new EwPaquet('historique_guerre', array($_GET['id']));
$info  = $paquet->getRetour();
$liste = $info->liste;
$txt = array("a perdu", "a gagné");

echo '
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" >
<head><title>Historique attaques</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link style="text/css" rel="stylesheet" href="css/css_popup.css" />
</head>
	<body bgcolor="#EAE7E1">';

echo '<h2 class="centrer">'.stripslashes($info->attaquant).' contre '.stripslashes($info->defenseur).'</h2>';

if(!empty($liste) && sizeof($liste) > 0) {
	echo '<table class="centrer_tableau">';
	foreach($liste as $h) {
		echo '<tr style="color:'.$h->color.'">
		<td><td><b>'.$h->attaquant.'</b> </td>
		<td> '.$txt[$h->statu].' contre </td>
		<td> <b>'.$h->defenseur.'</b>.</td>
		<td> <b> le '.date("d/m/Y à H:i:s", $h->date).'</b></td>
		</tr>';
	}
	echo '</table>';
}

?>

</body>
</html>
