<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('get_passage_lvl0');
$paquet -> send_actions();

$obj = unserialize($paquet->get_answer('get_passage_lvl0')->{2});
$obj1 = array_sum($obj);
$taille = sizeof($obj);

if($obj1 == $taille) {

echo '
<center>
<h2>'._('Vous venez de passer niveau 1, félicitation').'</h2>
'._(
'Vous avez désormais accés aux attaques, vous pouvez aussi '.
'rejoindre une alliance<br/> qui vous aidera dans votre progression.').
'<br/><br/>
<table class="none">
<tr><td>'._(
'Nouveaux bâtiments disponibles : <b>ferme</b> et <b>hutte</b>').
'</td></tr>
<tr><td>'._(
'Nouvelles unités disponibles : <b>volontaire</b> et <b>homme d\'argent</b>').
'</td></tr>
<tr><td>'._(
'Plafond de votre trésor à ').
'<b>'.nbf(400000).'</b> '.imress('drachme').'</td></tr>
<tr><td>'._(
'Bonus de ').'<b>'.nbf(10000).'</b> '.imress('nourriture').' '._('et').' <b>'.
nbf(50000).'</b> '.imress('drachme').
'</td></tr>
<tr><td>'._(
'50 <b>Espions</b>').
'</td></tr>
<tr><td><b>'._(
'Nouvelles missions').
'</b></td></tr>
<tr><td>'._(
'Nouveau jeu : Le <b>loto</b>').
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
	     'Vous ne pouvez pas passer niveau 1').'</div>';
}

?>
