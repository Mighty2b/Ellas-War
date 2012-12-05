<?php

if($paquet -> getlvl() != 1) {
	redirect();
}

?>
<center>
<h1>Vos objectifs pour passer niveau 2</h1>
<br/>
<br/>
<table>
<tr>
	<td>
	<b>Construction de 20 ateliers de battage de la monnaie</b><br/>
	<i>Actuellement : <?php echo $actu[0];?>  ateliers de battage de la monnaie</i>
	</td>
	<td class="centrer">
	<?php

	if(!empty($obj[0])) {
		echo '<b><font color=\'green\'>&nbsp;Objectif accompli&nbsp;</font></b>';
	}
	else {
	  echo '<b><font color=\'red\'>&nbsp;Objectif non accompli&nbsp;</font></b>';
	}
	?>
	</td>
</tr>
<tr>
	<td>
	<b>Construction de 10 fermes</b><br/>
	<i>Actuellement : <?php echo $actu[1];?> fermes</i>
	</td>
	<td class="centrer">
	<?php
	if(!empty($obj[1])) {
		echo '<b><font color=\'green\'>&nbsp;Objectif accompli&nbsp;</font></b>';
	}
	else {
	  echo '<b><font color=\'red\'>&nbsp;Objectif non accompli&nbsp;</font></b>';
	}
	?>
	</td>
</tr>
<tr>
	<td>
	<b>Construction de 20 huttes</b><br/>
	<i>Actuellement : <?php echo $actu[2];?> huttes</i>
	</td>
	<td class="centrer">
	<?php
	if(!empty($obj[2])) {
		echo '<b><font color=\'green\'>&nbsp;Objectif accompli&nbsp;</font></b>';
	}
	else {
	  echo '<b><font color=\'red\'>&nbsp;Objectif non accompli&nbsp;</font></b>';
	}
	?>
	</td>
</tr>
<tr>
	<td>
	<b>Construction de 1 agora</b><br/>
	<i>Actuellement : <?php echo $actu[7];?> agora</i>
	</td>
	<td class="centrer">
	<?php
	if(!empty($obj[7])) {
		echo '<b><font color=\'green\'>&nbsp;Objectif accompli&nbsp;</font></b>';
	}
	else {
	  echo '<b><font color=\'red\'>&nbsp;Objectif non accompli&nbsp;</font></b>';
	}
	?>
	</td>
</tr>
<tr>
	<td>
	<b>20 victoires</b><br/>
	<i>Actuellement : <?php echo $actu[3];?> victoires
	</td>
	<td class="centrer">
	<?php
	if(!empty($obj[3])) {
		echo '<b><font color=\'green\'>&nbsp;Objectif accompli&nbsp;</font></b>';
	}
	else {
	  echo '<b><font color=\'red\'>&nbsp;Objectif non accompli&nbsp;</font></b>';
	}
	?>
	</td>
</tr>
<tr>
	<td>
	<b>6'000 de défense</b><br/>
	<i>Actuellement : <?php echo $actu[6];?> de défense
	</td>
	<td class="centrer">
	<?php
	if(!empty($obj[6])) {
		echo '<b><font color=\'green\'>&nbsp;Objectif accompli&nbsp;</font></b>';
	}
	else {
	  echo '<b><font color=\'red\'>&nbsp;Objectif non accompli&nbsp;</font></b>';
	}
	?>
	</td>
</tr>
<tr>
	<td>
	<b>Toutes vos ressources en positif</b><br/>
	<i>Actuellement : <?php echo ((!empty($obj[4]))?'ressources en positif':'au moins une des ressources n\'est pas en positif');?>
	</td>
	<td class="centrer">
	<?php
	if(!empty($obj[4])) {
		echo '<b><font color=\'green\'>&nbsp;Objectif accompli&nbsp;</font></b>';
	}
	else {
	  echo '<b><font color=\'red\'>&nbsp;Objectif non accompli&nbsp;</font></b>';
	}
	?>
	</td>
</tr>
<tr>
	<td>
	<b><?php echo nbf(200000).' '.imress('drachme'); ?> dans votre trésor</b><br/>
	<i>Actuellement : <?php echo nbf(floor($actu[5])).' '.imress('drachme'); ?> dans votre trésor</i>
	</td>
	<td class="centrer">
	<?php
	if(!empty($obj[5])) {
		echo '<b><font color=\'green\'>&nbsp;Objectif accompli&nbsp;</font></b>';
	}
	else {
	  echo '<b><font color=\'red\'>&nbsp;Objectif non accompli&nbsp;</font></b>';
	}
	?>
	</td>
</tr>
<tr>
	<td>
	<b>Finir toutes les missions</b><br/>
	<i>Actuellement : mission <?php echo $actu[8];?> sur 10</i>
	</td>
	<td class="centrer">
	<?php
	if(!empty($obj[8])) {
		echo '<b><font color=\'green\'>&nbsp;Objectif accompli&nbsp;</font></b>';
	}
	else {
	  echo '<b><font color=\'red\'>&nbsp;Objectif non accompli&nbsp;</font></b>';
	}
	?>
	</td>
</tr>
</table>
<?php

if(array_sum($obj) == sizeof($obj)) {
	echo '<br/><div class="bouton_classique"><input class="bouton_classique2" type="button" value="PASSER NIVEAU 2" onclick="javascript:passer_lvl(1);"/></div>';
}

?>

<h3>Après votre passage niveau 2 :</h3>
<table>
<tr><td>Nouveaux bâtiments disponibles : <b>antre des espions</b>, <b>Camp militaire</b> et <b>carrière</b></td></tr>
<tr><td>Nouvelles unités disponibles : <b>espion</b> et <b>peltaste</b></td></tr>
<tr><td>Plafond de votre trésor à <b><?php echo nbf(600000).'</b> '.imress('drachme'); ?></td></tr>
<tr><td>Bonus de <b><?php echo nbf(100000).'</b> '.imress('drachme'); ?></td></tr>
<tr><td>Nouveaux jeux : <b>Javelot</b>, <b>Jeux de dés</b>, <b>Batailles navales</b>, <b>Biges</b>, <b>Quadriges</b></td></tr>
</table>
</center>
