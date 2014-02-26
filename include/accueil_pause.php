<?php

echo '<div class="centrer ligne">
<b>'._('Votre compte est actuellement en pause').'.</b><br/><br/>';

printf(_('Vous pourrez sortir de pause quand vous le voulez %s
 heures avant la fin de votre pause.'), $paquet->get_infoj('sortie'));
 
echo '<br/>'._('Au-delà, la sortie de pause se fera seule.
Si vous le voulez, vous pouvez sortir de pause en utilisant une faveur,
celle-ci vous permettra de revenir sur le jeu plus tôt.').'<br/><br/>

<b>'._('Fin le').' '.display_date($paquet->get_infoj('times'),4); 

echo '</b><br/><br/>';

if($paquet->get_infoj('sortie_pause') == true) {
 	echo '<h2 class="cursor"
 	          onclick="javascript:retour_pause();">'._('Sortir de pause').'</h2>';
}
elseif ($paquet->get_infoj('faveur') > 0)
{
	echo '<h2 class="cursor"
	          onclick="javascript:retour_pause();">'._('Utiliser une faveur').'</h2>';
}
else
{
	echo '<h2>'._('Vous n\'avez pas de faveurs sur vous').'</h2>';
}

echo '<br/><br/>
<a href="'._('obtenirdesfaveurs').'">
<h2 class="joueur_bloque lien">'._(
'Obtenir une faveur et remettre votre compte en marche').'</h2>
</a>
</div>';

?>