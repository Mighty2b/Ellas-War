<?php

if($paquet->getRetour() == 1) {
  echo '<div class="ligne centrer erreur">
  Promotion : Remettez votre compte en route gratuitement !
  </div>';
}

echo '<div class="ligne centrer">
<h2>Votre compte est actuellement inactif pour cause de manque de 
		ressources.</h2>
Vous récupérer votre compte en utilisant une faveur, 
celle-ci vous permettra d\'obtenir 4 jours supplémentaires pour 
combler votre déficit.<br/>Elle peut être achetée sur le site ou 
donnée par un de vos amis. Vous pouvez aussi recommencer votre partie.
</div>
<div class="ligne">
<br/><br/><br/>
<table class="centrer_tableau" width="80%"><tr class="centrer"><td>';

if($paquet->getRetour() == 1) {
  echo '<h3 class="supr_messagerie" onclick="javascript:retour_pause();">Revenir sur le jeu</h3>';
}
elseif($paquet->getFaveurs() > 0) {
	echo '<h3 class="supr_messagerie" onclick="javascript:retour_pause();">Utiliser une faveur</h3>';
}
else {
	echo '<a href="Obtenir des faveurs" ><h3 class="supr_messagerie">Obtenir une faveur</h3></a>';
}
?>
</td><td>
	<h3 class="supr_messagerie" onClick="if (window.confirm('Confirmer le reset de votre compte ?')) { reset();return false; } else { return false; }" >Recommencer une partie</h3>
</td></tr>

</table>
</div>