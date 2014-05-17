<?php

echo '<div class="ligne centrer">
<br/>
<img src="images/jeux/quadriges_200.png"
     alt="'._('Quadriges').'" 
     title="'._('Quadriges').'" />
<br/>
</div>';

if($paquet->get_infoj('lvl') <= 1 or ($paquet->get_infoj('drachme') < 1000)) {
	echo '<div class="erreur">';
	echo display_error(120);
	echo '</div>';
}

$quadriges = $paquet->get_answer('quadriges');

if(!empty($quadriges) && 
   !empty($quadriges->{2})) {
	$paquet->error('quadriges', 1,array($quadriges->{2}));
}

echo '<div class="ligne80 centrer">';
printf(_('Les quadriges sont des courses de chars tirés par quatre puissants chevaux.<br/>
Il y a plus d\'attelages que lors des biges mais ces courses peuvent rapporter %s'), 
nbf(80000).' '.imress('drachme'));

echo '<br/><br/>
<form method="post" action="#">
<b>'._('Choisissez l\'attelage sur lequel vous allez miser').' '.
nbf(10000).' '.imress('drachme').
'</b><br/>
<table class="none">
<tr>
<td align="left"><label><input type="radio"
                               name="cheval" 
                               value="1" />'._('Rouge').'</label></td>

<td align="left"><label><input type="radio" 
                               name="cheval" 
                               value="4" />'._('Bleu').'</label></td>
</tr>
<tr>
<td align="left"><label><input type="radio" 
                               name="cheval" 
                               value="2" />'._('Vert').'</label></td>

<td align="left"><label><input type="radio" 
                               name="cheval" 
                               value="3" />'._('Jaune').'</label></td>
</tr>
<tr>
<td align="left"><label><input type="radio" 
                               name="cheval" 
                               value="5" />'._('Violet').'</label></td>

<td align="left"><label><input type="radio" 
                               name="cheval" 
                               value="6" />'._('Marron').'</label></td>
</tr>
<tr>
<td align="left"><label><input type="radio" 
                               name="cheval" 
                               value="7" />'._('Rose').'</label></td>

<td align="left"><label><input type="radio" 
                               name="cheval" 
                               value="8" />'._('Orange').'</label></td>
</tr>	
</table>
<br/>
<div class="bouton_classique"><input type="submit" 
                                     name="jouer" 
                                     value="'._('Jouer').'"/></div>

</form>
</div>';

?>