<div class="ligne centrer">
<br/>
<img src="images/jeux/biges_200.png" alt="Biges" title="Biges" />
<br/><br/>
</div>
<?php
if(!empty($erreur)) {
	$paquet -> display($erreur);
}

if(empty($erreur) && !empty($_POST['cheval']) && is_numeric($_POST['cheval'])) {
	$paquet = new EwPaquet('biges', array($_POST['cheval']));
	$paquet -> display();
}
?>
<div class="ligne80 centrer">
Venez participer aux biges, ces fantastiques courses de chars à deux chevaux 
et remportez 4.000 <?php echo imress('drachme'); ?><br/><br/>
<form method="post" action="#">
<b>Choisissez l'attelage sur lequel vous allez miser 1'000 
<?php echo imress('drachme'); ?></b><br/>
<table class="centrer_tableau">
<tr>
	<td align="left">
		<label><input type="radio" name="cheval" value="1" />Rouge</label>
	</td>
</tr>
<tr>
	<td align="left">
		<label><input type="radio" name="cheval" value="4" />Bleu</label>
	</td>
</tr>
<tr>
	<td align="left">
		<label><input type="radio" name="cheval" value="2" />Vert</label>
	</td>
</tr>
<tr>
	<td align="left">
		<label><input type="radio" name="cheval" value="3" />Jaune</label>
	</td>
</tr>
</table>
<br/>
<div class="bouton_classique"><input class="bouton_classique2" type="submit" name="jouer" value="Jouer"/></div>

</form>
</div>