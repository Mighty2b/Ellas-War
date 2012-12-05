<?php

if($obj1 == $taille) {
?>
<center>
<h2>Vous venez de passer niveau 2, félicitation</h2>

<br/>
<table>
<tr><td>Nouveaux bâtiments disponibles : <b>antre des espions</b>, <b>Camp militaire</b> et <b>carrière</b></td></tr>
<tr><td>Nouvelles unités disponibles : <b>espion</b> et <b>peltaste</b></td></tr>
<tr><td>Plafond de votre trésor à <b><?php echo nbf(600000).'</b> '.imress('drachme'); ?></td></tr>
<tr><td>Bonus de <b><?php echo nbf(100000).'</b> '.imress('drachme'); ?></td></tr>
<tr><td>Nouveaux jeux : <b>Javelot</b>, <b>Jeux de dés</b>, <b>Batailles navales</b>, <b>Biges</b>, <b>Quadriges</b></td></tr>
</table>

<br/>
<a href="/"><div class="bouton_classique"><input class="bouton_classique2" type="submit" value="Continuer" name="Continuer" /></div></a>
<br/>

</center>
<?php
}
else {
	echo '<div class="ligne centrer">Vous ne pouvez pas passer niveau 2</div>';
}

?>
