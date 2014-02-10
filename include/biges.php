<?php

if($paquet->get_infoj('lvl') <= 1 or ($paquet->get_infoj('drachme') < 1000)) {
	echo '<div class="erreur">';
	echo display_error(120);
	echo '</div>';
}

echo '<div class="ligne centrer">
<br/>
<img src="images/jeux/biges_200.png"
     alt="'._('Biges').'" 
     title="'._('Biges').'" />
<br/><br/>
</div>';

if(!empty($paquet->get_answer('biges')) && 
   !empty($paquet->get_answer('biges')->{2})) {
	$paquet->error('biges', 1,array($paquet->get_answer('biges')->{2}));
}

echo '<div class="ligne80 centrer">';
printf(_('Venez participer aux biges, ces fantastiques courses de chars à '.
'deux chevaux et remportez %s'), nbf(4000).' '.imress('drachme'));

echo '<br/><br/>
<form method="post" action="#">
<b>'._('Choisissez l\'attelage sur lequel vous allez miser').
nbf(1000).' '.imress('drachme').
'</b><br/>
<table class="none">
<tr>
	<td align="left">
		<label><input type="radio"
		              name="cheval" 
		              value="1" />'._('Rouge').'</label>
	</td>
</tr>
<tr>
	<td align="left">
		<label><input type="radio" 
		              name="cheval" 
		              value="4" />'._('Bleu').'</label>
	</td>
</tr>
<tr>
	<td align="left">
		<label><input type="radio" 
		              name="cheval" 
		              value="2" />'._('Vert').'</label>
	</td>
</tr>
<tr>
	<td align="left">
		<label><input type="radio" 
		              name="cheval" 
		              value="3" />'._('Jaune').'</label>
	</td>
</tr>
</table>
<br/>
<div class="bouton_classique"><input type="submit" 
                                     name="jouer" 
                                     value="'._('Jouer').'"/></div>

</form>
</div>';

?>