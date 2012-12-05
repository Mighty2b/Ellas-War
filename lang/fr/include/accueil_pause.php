<div class="centrer">
<p><b>Votre compte est actuellement en pause.</b><br/><br/>
Vous pourrez sortir de pause quand vous le voulez 
<?php echo $info['sortie']; ?> heures avant la fin de votre pause.
<br/>Au-delà, la sortie de pause se fera seule.
Si vous le voulez, vous pouvez sortir de pause en utilisant une faveur,
celle-ci vous permettra de revenir sur le jeu plus tôt.</p><br/>

<b>Fin le <?php echo date('d/m/Y \à H\hi', $info['times']); 

echo '</b>';

if($info['sortie_pause'] == true) {
 	echo '<h2 class="supr_messagerie" onclick="javascript:retour_pause();">Sortir de pause</h2>';
}
elseif ($info['faveur'] > 0)
{
	echo '<h2 class="supr_messagerie" onclick="javascript:retour_pause();">Utiliser une faveur</h2>';
}
else
{
	echo '<h2>Vous n\'avez pas de faveurs sur vous</h2>';
}

?>

<a href="Obtenir des faveurs">
<h2 class="joueur_bloque lien">Obtenir une faveur et remettre votre compte en marche</h2>
</a>
</div>