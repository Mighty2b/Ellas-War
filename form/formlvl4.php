<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('get_passage_lvl4');
$paquet -> send_actions();
											 
$obj = unserialize($paquet->get_answer('get_passage_lvl4')->{2});
$obj1 = array_sum($obj);
$taille = sizeof($obj);


if($obj1 == $taille) {

echo '
<center>
<h2>'._('Vous venez de passer niveau 5, félicitation').'</h2>

<br/>
<table class="none">
<tr><td>'._(
	'Nouvelle unité disponible : <b>Archer à arc long</b>').
'</td></tr>
<tr><td>'._(
	'Plafond de votre trésor à').
	' <b>'.nbf(2000000).'</b> '.imress('drachme').'</td></tr>
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
	     'Vous ne pouvez pas passer niveau 5').'</div>';
}

?>