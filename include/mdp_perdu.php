<?php

echo '<h1>'._('Mot de passe perdu').'</h1>';

$paquet -> error('mdp_perdu_mail',1);
$paquet -> error('mdp_perdu_login',1);

echo '<div class="gras justify"><br/><br/>'._(
'Entrez votre identifiant ou votre adresse mail et '.
'votre nouveau mot de passe vous sera envoyé sur votre '.
'adresse mail d\'inscription. Celui-ci ne sera actif '.
'qu\'après confirmation. Vous serez en suite connecté '.
'automatiquement sur votre compte.').'</div><br/><br/>
<form action="#" method="post">
<table class="none">
<tr>
  <td><input type="text" name="mail" size="20"  /></td>
  <td><div class="bouton_classique"><input type="submit"
                                           value="'._('Envoyer').'" 
                                           name="Envoyer" /></div></td>
</tr>
</table>
</form>';

?>