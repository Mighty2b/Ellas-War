<?php

$ress = $paquet->get_ress();

echo '
<div class="ligne centrer">
	<br/>
	<img src="images/jeux/des_200.png"
	     alt="'._('Jeux de dés').'" 
	     title="'._('Jeux de dés').'" />
	<br/><br/>
</div>';

if($paquet->get_infoj('lvl') <= 1 or 
   $paquet->get_infoj('drachme') < 1) {
	echo '<div class="erreur">';
	echo display_error(120);
	echo '</div>';
}

if(empty($erreur) && !empty($_POST['mise']))	{
	$mise=round(abs(htmlentities(trim(addslashes($_POST['mise'])))));

	$moi  = unserialize($paquet->get_answer('des')->{1});
	$dieu = unserialize($paquet->get_answer('des')->{2});
	
	if(!empty($moi) && !empty($dieu)) {
		echo '<table class="none">
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
	
	$paquet->error('des', 3);
}

echo '<div class="ligne_80 centrer">
<b>'._('Les dés sont un passe-temps populaire datant des temps préhistoriques, '.
'grâce à eux vous pourrez faire fortune ou tout perdre. '.
'Vous pourrez miser un maximum de 100\'000 ').imress('drachme').'</b><br/>

<form method="post" action="#">
<br/>
<input type="text"
       name="mise" 
       placeholder="'._('Mise').'" 
       required="required" /><br/><br/>
<div class="bouton_classique"><input type="submit" 
                                     name="action_des" 
                                     Value="'._('Lancer les dés').'"/></div>
</form>
</div>';

?>