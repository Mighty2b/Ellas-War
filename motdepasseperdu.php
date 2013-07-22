<?php

include('header.php');

echo '
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="fr" >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link style="text/css" rel="stylesheet" href="css/css_popup.css" />
</head>
	<body bgcolor="#EAE7E1">';

?>
<b>Entrez votre identifiant ou votre adresse mail et votre nouveau mot de passe vous sera envoyé sur votre adresse mail d'inscription. Celui-ci ne sera actif qu'après confirmation. Vous serez en suite connecté automatiquement sur votre compte.</b><br/>
<form action="#" method="post">
<table>
<tr>
  <td><input type="text" name="mail" size="10" class="mail" /></td>
  <td><div class="bouton_classique"><input class="bouton_classique2" type="submit" value="ENVOYER" name="Envoyer" /></div></td>
</tr>
</table>
</form>
<?php

if(!empty($_POST['mail'])) {
  if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
    $paquet = new EwPaquet('mdp_perdu_mail',array($_POST['mail']));
  }
  else {
    $paquet = new EwPaquet('mdp_perdu_login',array($_POST['mail']));
  }
  
  if($paquet->hasErreur()) {
  	$paquet->display();
  }
  elseif($paquet->getstatu() != 0) {
  	$paquet->display(242);
  }
}
?>
</body>
</html>
