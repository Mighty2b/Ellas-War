<div class="ligne centrer">
	<br/>
	<img src="images/jeux/des_200.png" alt="Jeux de dés" title="Jeux de dés" />
	<br/><br/>
</div>
<?php

if(!empty($erreur)) {
	$paquet -> display($erreur);
}

if(empty($erreur) && !empty($_POST['mise']))	{
	$mise=round(abs(htmlentities(trim(addslashes($_POST['mise'])))));

	if(($mise >= 1) AND ($mise <= 100000)) {
		if($mise > $ress['drachme']) {
			$paquet -> display(129);
		}
		else {
			$paquet = new EwPaquet('des', array($_POST['mise']));
		
			$moi  = unserialize($paquet->getRetour());
			$dieu = unserialize($paquet->getRetour(2));
			if(!empty($moi) && !empty($dieu)) {
				echo '<table class="centrer_tableau">
				<tr>
					<td>Vos chiffres : </td>
					<td><b>',$moi[0],'-',$moi[1],'-',$moi[2],'-',$moi[3],' </b> </td>
					<td>&nbsp;&nbsp;Total : <b>',array_sum($moi),'</b></td>
				</tr>
				<tr>
					<td>Les chiffres des dieux : </td>
					<td><b>',$dieu[0],'-',$dieu[1],'-',$dieu[2],'-',$dieu[3],'</b></td>
					<td>&nbsp;&nbsp;Total : <b>',array_sum($dieu),'</b></td>
				</tr>
				</table>';
			}
			$paquet -> display();
		}
	}
}
?>
<div class="ligne80 centrer">
<b>Les dés sont un passe-temps populaire datant des temps préhistoriques,
grâce à eux vous pourrez faire fortune ou tout perdre.
Vous pourrez miser un maximum de 100'000 
<?php echo imress('drachme'); ?></b><br/>

<center>
<form method="post" action="#">
<br/>
<input type="text" name="mise" class="form_retirer" placeholder="Mise" required="required"><br/><br/>
<div class="bouton_classique"><input class="bouton_classique2" type="submit" name="action_des" Value="Lancer les dés"/></div>
</form>
</div>