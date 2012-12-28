<br/><center>
<font color="red">
<b>
<?php

if(empty($_GET['erreur']))
	$_GET['erreur'] = 0;

switch($_GET['erreur']){
	case '500':
		$s='Erreur interne au serveur ou serveur saturé';break;
	default:
		$s='Nous sommes désolés votre requête n\'a pu aboutir, être vous sur de l\'url de la page ?';
}

echo $s;
?>
</b>
</font>
</center>
