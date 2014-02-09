<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('get_passage_lvl9');
$paquet -> send_actions();
											 
$obj = unserialize($paquet->get_answer('get_passage_lvl9')->{2});
$obj1 = array_sum($obj);
$taille = sizeof($obj);


if($obj1 == $taille) {

echo '
<center>
<h2>'._('Vous venez de passer niveau 10, félicitation').'</h2>

<br/>
<table class="none">
<tr>
	<td>'._('Nouveau bâtiment disponible : <b>Grotte maudite</b> et <b>Tour à miroir</b>').'</td>
</tr>
	<tr>
		<td>'._('Accés à l\'autel des dieux').'</td>
	</tr>
	<tr>
		<td>'._('Nouvelle unité disponible : <b>Hoplite d\'élite</b>').'</td>
	</tr>
	<tr>
		<td>'._('Possibilité de bâtir un nouveau temple').'</td>
	</tr>
</table>

<br/><br/>

<br/>
<a href="/"><div class="bouton_classique"><input type="submit"
                                                 value="'._('Continuer').'" 
                                                 name="Continuer" /></div></a>
<br/>
</center>';

}
else {
	echo '<div class="ligne centrer">'._(
	     'Vous ne pouvez pas passer niveau 10').'</div>';
}

?>