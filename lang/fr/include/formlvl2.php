<?php

if($obj1 == $taille) {
?>
<center>
<h2>Vous venez de passer niveau 3, félicitation</h2>

<br/>
<table>
<tr>
	<td>Nouveaux bâtiments disponibles : <b>École d'archers</b> et <b>Tour d'observation</b></td>
</tr>
<tr><td>Nouvelle unité disponible : <b>Frondeur</b></td></tr>
<tr><td>Plafond de votre trésor à <b><?php echo nbf(800000).'</b> '.imress('drachme'); ?></td></tr>
<tr><td>Bonus de <b><?php echo nbf(100000).'</b> '.imress('drachme'); ?></td></tr>
</table>
<br/><br/>

<br/>
<a href="/"><div class="bouton_classique"><input class="bouton_classique2" type="submit" value="Continuer" name="Continuer" /></div></a>
<br/>

</center>
<?php
}
else {
	echo '<div class="ligne centrer">Vous ne pouvez pas passer niveau 3</div>';
}

?>
