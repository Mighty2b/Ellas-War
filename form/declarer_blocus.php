<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('possible_blocus', array($_GET['alliance']));
$paquet -> send_actions();

$cible = $paquet->get_answer('possible_blocus')->{1};

echo '<h1>'.ucfirst(stripslashes($cible -> nom)).'</h1>';

echo '<div align="justify">'.
_('Vous êtes sur le point d\'imposer un blocus commercial à l\'alliance').
' : <b>'.stripslashes($cible -> nom).'</b> '._(
'Réfléchissez bien aux conséquences de vos actes. ').
_('Une fois le blocus mis en place vous ne pourrez plus '.
'accéder au commerce au bout de 48 heures. Mais le risque '.
'en vaut la chandelle, si vous arrivez à faire abdiquer l\'alliance ennemis, 
elle perdra 10% de son XP et vous récupérerez la moitié de celle-ci.').
'<br/><br/></div>
<form action="lesalliances" method="post">
	<input name="alliance" type="hidden" value="'.$cible->id.'">
	<div class="bouton_classique"><input type="submit" 
	                                     value="'._('Imposer').'" 
	                                     name="imposer" /></div>
</form>';

?>