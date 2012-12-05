<?php
if($obj1 == $taille) {
?>
<center>
<h2>Vous venez de passer niveau 1, félicitation</h2>

Vous avez désormais accés aux attaques, vous pouvez aussi rejoindre une alliance<br/> qui vous aidera dans votre progression.
<br/><br/>
<table>
<tr><td>Nouveaux bâtiments disponibles : <b>ferme</b> et <b>hutte</b></td></tr>
<tr><td>Nouvelles unités disponibles : <b>volontaire</b> et <b>homme d'argent</b></td></tr>
<tr><td>Plafond de votre trésor à <b><?php echo nbf(400000).'</b> '.imress('drachme'); ?></td></tr>
<tr><td>Bonus de <b><?php echo nbf(10000).'</b> '.imress('nourriture').' et <b>'.nbf(50000).'</b> '.imress('drachme'); ?></td></tr>
<tr><td>50 <b>Espions</b></td></tr>
<tr><td><b>Nouvelles missions</b></td></tr>
<tr><td>Nouveau jeu : Le <b>loto</b></td></tr>
</table>
<br/>
<a href="/"><div class="bouton_classique"><input class="bouton_classique2" type="submit" value="Continuer" name="Continuer" /></div></a>
<br/>
</center>
<?php
}
else {
	echo '<div class="ligne centrer">Vous ne pouvez pas passer niveau 1</div>';
}

?>
