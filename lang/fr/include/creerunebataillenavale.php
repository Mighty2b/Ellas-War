<?php

$paquet->display();

?>
<div class="ligne80 justifier">Les parties privées sont créées directement par les chefs des cités. Elles vous permettent de choisir précisément vos adversaires et de tester vos stratégies. 
Ces parties ne comptent pas dans vos statistiques mais vous pouvez en avoir jusqu'à 4 simultanément et la récompense est de 80% du prix d'entrée payé par l'ensemble des joueurs de la partie.</div>
<div class="ligne80 centrer">
<br/>
<form action='#' method='post'>
	<b>Description de la partie que vous allez créer</b><br/>
	<input type='text' name='description' maxlength='50' size='50' class="form_retirer"><br/><br/>
	<b>Prix d'entrée</b><br/>
	<input type="number" name="prime" required="required" class="form_retirer" size="15" > 
	(minimum <?php echo nbf(50000).' '.imress('drachme'); ?>)
	<br/><br/>
	<div class="bouton_classique"><input class="bouton_classique2" type="submit" name="valider" value="VALIDER" /></div>
</form>

<br/>
<br/>
<a href="Batailles Navales">Retour</a>
</div>