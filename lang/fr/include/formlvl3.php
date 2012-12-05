<?php

if($obj1 == $taille) {
?>
<center>
<h2>Vous venez de passer niveau 4, félicitation</h2>

<br/>
<table>
<tr>
	<td>Nouveaux bâtiments disponibles : <b>Ferme vinicole</b> et <b>Habitation</b></td>
</tr>
<tr><td>Nouvelle unité disponible : <b>Archer à arc court</b></td></tr>
<tr><td>Plafond de votre trésor à <b><?php echo nbf(1000000).'</b> '.imress('drachme'); ?></td></tr>
</table>
<br/><br/>

<br/>
<a href="/"><div class="bouton_classique"><input class="bouton_classique2" type="submit" value="Continuer" name="Continuer" /></div></a>
<br/>

</center>
<?php
}
else {
	echo '<div class="ligne centrer">Vous ne pouvez pas passer niveau 4</div>';
}

?>
