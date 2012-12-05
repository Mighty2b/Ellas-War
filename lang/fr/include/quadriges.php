<div class="ligne centrer">
<br/>
<img src="images/jeux/quadriges_200.png" alt="Quadriges" title="Quadriges" />
<br/>
</div>
<?php
if(!empty($erreur)) {
	$paquet -> display($erreur);
}

if(empty($erreur) && !empty($_POST['cheval']) && is_numeric($_POST['cheval'])) {
	$paquet = new EwPaquet('quadriges', array($_POST['cheval']));
	$paquet -> display();
}
?>
<div class="ligne80 centrer"><br/>
Les quadriges sont des courses de chars tirés par quatre puissants chevaux.<br/>
Il y a plus d'attelages que lors des biges mais ces courses peuvent rapporter 
80.000 <?php echo imress('drachme'); ?><br/><br/>
<form method="post" action="#">
<b>Choisissez l'attelage sur lequel vous allez miser 10'000 
<?php echo imress('drachme'); ?></b><br/>
<table class="centrer_tableau">
<tr>
<td align="left"><label><input type="radio" name="cheval" value="1" />Rouge</label></td>

<td align="left"><label><input type="radio" name="cheval" value="4" />Bleu</label></td>
</tr>
<tr>
<td align="left"><label><input type="radio" name="cheval" value="2" />Vert</label></td>

<td align="left"><label><input type="radio" name="cheval" value="3" />Jaune</label></td>
</tr>
<tr>
<td align="left"><label><input type="radio" name="cheval" value="5" />Violet</label></td>

<td align="left"><label><input type="radio" name="cheval" value="6" />Marron</label></td>
</tr>
<tr>
<td align="left"><label><input type="radio" name="cheval" value="7" />Rose</label></td>

<td align="left"><label><input type="radio" name="cheval" value="8" />Orange</label></td>
</tr>	
</table>
<br/>
<div class="bouton_classique"><input class="bouton_classique2" type="submit" name="jouer" value="Jouer"/></div>

</form>
</div>