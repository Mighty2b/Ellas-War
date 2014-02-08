<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('get_passage_lvl1');
$paquet -> send_actions();

$obj = unserialize($paquet->get_answer('get_passage_lvl1')->{2});
$obj1 = array_sum($obj);
$taille = sizeof($obj);

if($obj1 == $taille) {

echo '
<center>
<h2>'._('Vous venez de passer niveau 2, félicitation').'</h2>

<br/>
<table>
<tr><td>'._(
'Nouveaux bâtiments disponibles : <b>antre des espions</b>, <b>Camp militaire</b> et <b>carrière</b>').
'</td></tr>
<tr><td>'._(
'Nouvelles unités disponibles : <b>espion</b> et <b>peltaste</b>').
'</td></tr>
<tr><td>'._(
'Plafond de votre trésor à ').
'<b>'.nbf(600000).'</b> '.imress('drachme').'</td></tr>
<tr><td>'._(
'Bonus de ').
'<b>'.nbf(100000).'</b> '.imress('drachme').'</td></tr>
<tr><td>'._(
'Nouveaux jeux : <b>Javelot</b>, <b>Jeux de dés</b>, <b>Batailles navales</b>, <b>Biges</b>, <b>Quadriges</b>').
'</td></tr>
</table>

<br/>
<a href="/"><div class="bouton_classique"><input type="submit"
                                                 value="'._('Continuer').'" 
                                                 name="Continuer" /></div></a>
<br/>
</center>';

}
else {
	echo '<div class="ligne centrer">'._(
	     'Vous ne pouvez pas passer niveau 2').'</div>';
}

?>

