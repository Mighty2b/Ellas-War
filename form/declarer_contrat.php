<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('possible_contrat', array($_GET['alliance']));
$paquet -> send_actions();

$cible = $paquet->get_answer('possible_contrat')->{1};

echo '<h1>'.ucfirst(stripslashes($cible -> nom)).'</h1>';

echo '<form action="'._('lesalliances').'" method="post">
<div class="ligne justify">';
printf(_(
'Vous êtes sur le point de mettre un contrat sur cette alliance. '.
'La première alliance qui gagnera une guerre<br/>contre %s remportera '.
'la recompense. La taxe de mise sur le marché du contrat et la '.
'confidentialité vous couteront 5%% supplémentaire sur la recompense '.
'(10%% au total), vous pouvez retirer à tout moment votre contrat.'),
stripslashes($cible->nom));

echo '</div><br>
<table class="none">
<tr>
	<td><input type="checkbox" name="confidence" /></td>
	<td><b>'._('Anonymat').'</b></td></td></tr></td></td>
</tr>
<tr>
	<td align="left"><input type="text"
	                        name="drachmes" 
	                        size="9" 
	                        value="0" 
	                        maxlength="9"/></td>
	<td align="right">'.imress('drachme').
	' ('._('Min').' : <b>10.000.000</b>)</td>
</tr>
<tr>
	<td align="left"><input type="text"
	                        name="or" 
	                        size="9" 
	                        value="0" 
	                        maxlength="8" /></td>
	<td align="left">'.imress('gold').'</td>
</tr>
</table>
	<input name="contrat" 
	       type="hidden" 
	       value="'.$cible->id.'">
<br/><br/>
<div class="bouton_classique"><input type="submit" 
                                     value="'._('Valider').'" /></div>
</form>';

?>