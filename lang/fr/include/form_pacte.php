<?php

if(empty($_GET['alliance']) or !is_numeric($_GET['alliance']))
	redirect();

$paquet = new EwPaquet('form_pacte', array($_GET['alliance']));
$alliance = $paquet->getRetour();
$possible = $paquet->getRetour(2);

if($possible == false or empty($alliance -> nom))
	redirect();

	?>
<center>
<b>Mettez vos motivations pour demander un pacte à l'alliance <?php echo $alliance -> nom; ?>.<br/>
Un pacte vous coûtera <?php echo nbf(750000).' '.imress('drachme'); ?>.</b><br><br>
<form action="#" method="post">
<input type="hidden" name="alliance" value="<?php echo $alliance->id; ?>" />
<textarea name="motivation" rows="8" cols="45" class="form_retirer" required="required"></textarea><br/><br/>
<div class="bouton_classique"><input class="bouton_classique2" type="submit" name="DEMANDER" value="DEMANDER" /></div>
</form>
