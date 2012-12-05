<?php
	echo '<h1>'.ucfirst(stripslashes($cible -> nom));
?></h1>
<form action="LesAlliances" method='post' enctype='multipart/form-data'>
<div class="ligne centrer">
Vous êtes sur le point de mettre un contrat sur cette alliance. La première alliance qui gagnera une guerre<br/>contre <?php echo ucfirst(stripslashes($cible->nom)); ?> remportera la recompense. La taxe de mise sur le marché du contrat et la confidentialité vous couteront 5% supplémentaire sur la recompense (10% au total), vous pouvez retirer à tout moment votre contrat.</div><br>
<table class="centrer_tableau">
<tr>
	<td><input type="checkbox" name="confidence" /></td>
	<td><b>Anonymat</b></td></td></tr></td></td>
</tr>
<tr>
	<td align='left'><input type="text" name="drachmes" size="9" value="0" maxlength="9" class="form_retirer" /></td>
	<td align='right'> <?php echo imress('drachme'); ?> (Min : <b>10.000.000</b>)</td>
</tr>
<tr>
	<td align='left'><input type="text" name="or" size="9" value="0" maxlength="8" class="form_retirer" /></td>
	<td align='left'> <?php echo imress('gold'); ?> </td>
</tr>
</table>
	<input name="contrat" type="hidden" value="<?php echo $cible->id; ?>">
<br/><br/>
<div class="bouton_classique"><input class="bouton_classique2" type="submit" value="VALIDER" /></div>
	</form>
