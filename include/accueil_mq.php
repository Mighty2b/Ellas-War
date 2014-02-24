<?php

if(empty($paquet->get_answer('free_bloque_ress'))) {
	redirect(_('accueil_mq'));
}

if($paquet->get_answer('free_bloque_ress')->{1} == 1) {
  echo '<div class="ligne centrer erreur">'.
_('Promotion : Remettez votre compte en route gratuitement !').
'<br/><br/>
  </div>';
}

echo '<div class="ligne centrer">
<h2>'._('Votre compte est actuellement inactif pour cause de manque de 
		ressources.').'</h2>
'._('Vous récupérer votre compte en utilisant une faveur, '.
'celle-ci vous permettra d\'obtenir 4 jours supplémentaires pour '.
'combler votre déficit.<br/>Elle peut être achetée sur le site ou '.
'donnée par un de vos amis. Vous pouvez aussi recommencer votre partie.').'
</div>
<div class="ligne">
<br/><br/><br/>
<table class="none" width="80%">
<tr class="centrer"><td>';

if($paquet->get_answer('free_bloque_ress')->{1} == 1) {
  echo '<h3 class="cursor"
            onclick="javascript:retour_pause();">'._('Revenir sur le jeu').'</h3>';
}
elseif($paquet->get_infoj('faveur') > 0) {
	echo '<h3 class="cursor" 
	          onclick="javascript:retour_pause();">'._('Utiliser une faveur').'</h3>';
}
else {
	echo '<a href="'._('obtenirdesfaveurs').'" ><h3 class="supr_messagerie">'._('Obtenir une faveur').'</h3></a>';
}

echo '</td><td>
	<h3 class="cursor"
	    onClick="if (window.confirm(\''._('Confirmer le reset de votre compte ?').'\')) { reset();return false; } else { return false; }" >'._('Recommencer une partie').'</h3>
</td></tr>

</table>
</div>

<script type="text/javascript">
function reset() {
   $.ajax({
     type: "GET",
     url: "form/reset.php",
     success: function(msg){ window.location.href=\''.SITE_URL.'\'; }
   });
}

function retour_pause() {
   $.ajax({
     type: "GET",
     url: "form/retour_pause.php",
     /*data: "jeu="+id,*/
     success: function(msg){ window.location.href=\''.SITE_URL.'\'; }
   });
}
</script>';

?>