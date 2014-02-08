<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('get_passage_lvl2');
$paquet -> send_actions();
											 
$obj = unserialize($paquet->get_answer('get_passage_lvl2')->{2});
$obj1 = array_sum($obj);
$taille = sizeof($obj);


if($obj1 == $taille) {

echo '
<center>
<h2>'._('Vous venez de passer niveau 3, félicitation').'</h2>

<br/>
<table class="none">
<tr>
	<td>'._(
'Nouveaux bâtiments disponibles : <b>École d\'archers</b> et <b>Tour d\'observation').
'</b></td>
</tr>
<tr><td>'._(
'Nouvelle unité disponible : <b>Frondeur</b>').
'</td></tr>
<tr><td>'._(
'Plafond de votre trésor à ').
'<b>'.nbf(800000).'</b> '.imress('drachme').'</td></tr>
<tr><td>'._('Bonus de ').
'<b>'.nbf(100000).'</b> '.imress('drachme').'</td></tr>
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
	     'Vous ne pouvez pas passer niveau 3').'</div>';
}

?>

