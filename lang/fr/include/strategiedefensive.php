<?php

if($i%$largeur != 0) {
  while($i%$largeur != 0) {
	  $tableau .='<td></td>';
	  $i++;
  }

  $tableau .= '<td>
  		<table width="100%"><tr><td>&nbsp;</td><td class="case_suppr_strat">&nbsp;</td></tr>';

  for($j=0;$j<$nb_vague;$j++) {
	  $tableau .= '<tr>
	  <td>&nbsp;'.nbf($total).' '.img('images/attaques/bouclier.png', 'defense').'&nbsp;</td>
	  <td class="case_suppr_strat droite">&nbsp;<a href="StrategieDefensive-'.($j+1).'"><img src="images/joueurs/supprimer_mp.png" alt="supprimer" /></a>&nbsp;</td></tr>';
  }

  $tableau .= '</table></td></tr>';
}

$paquet->display();
echo '<h1>Stratégie défensive</h1><br/>';

if($nb_vague < 50) {
echo '<div style="text-align:right;"> <a href="StrategieDefensive-0">Ajouter une vague</a> </div>';
}

echo '<form method="post" action="#">
<table width="100%"><tr><td valign="top"><br/>'.$liste.'</td>
<td>
'.$tableau.'
<tr>
<td></td><td></td>
<td class="centrer">
	<div class="bouton_classique"><input class="bouton_classique2" type="submit" value="Enregistrer" name="Enregistrer"/>
</td>
<td></td><td></td>
</table>
</td></tr>
</table></form>';

if($nb_vague < 50) {
	echo '<div style="text-align:right;"> <a href="StrategieDefensive-999999">Ajouter une vague</a> </div>';
}

?>