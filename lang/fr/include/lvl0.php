<?php

if($paquet -> getlvl() != 0) {
	redirect();
}

?>
<center>
<h1>Vos objectifs pour passer niveau 1</h1>
<br/>
<br/>
<table>
<tr>
	<td>
	<b>Construction de 10 ateliers de battage de la monnaie</b><br/>
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
	<b>Construction de 3 mines d'argent</b><br/>
	<i>Actuellement : <?php echo $actu[1];?> mines d'argent</i>
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
	<b>Construction de 6 mines de fer</b><br/>
	<i>Actuellement : <?php echo $actu[3];?> mines de fer</i>
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
	<b>Construction de 10 puits</b><br/>
	<i>Actuellement : <?php echo $actu[2];?> puits</i>
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
	<b>Construction de 10 scieries</b><br/>
	<i>Actuellement : <?php echo $actu[4];?> scieries</i>
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
	<b>Construction de 10 tours de guet</b><br/>
	<i>Actuellement : <?php echo $actu[7];?> tours de guet</i>
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
	<b>Toutes vos ressources en positif</b><br/>
	<i>Actuellement : <?php echo ((!empty($obj[5]))?'ressources en positif':'au moins une des ressources n\'est pas en positif');?></i>
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
	<b><?php echo nbf(50000).' '.imress('drachme'); ?> dans votre trésor</b><br/>
	<i>Actuellement : <?php echo nbf(floor($actu[6])).' '.imress('drachme'); ?> dans votre trésor</i>
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
	<b>Finir toutes les missions</b><br/>
	<i>Actuellement : mission <?php echo $actu[8];?> sur 15</i>
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
	echo '<br/><div class="bouton_classique"><input class="bouton_classique2" type="button" value="PASSER NIVEAU 1" onclick="javascript:passer_lvl(0);"/></div>';
}

?>

<h3>Après votre passage niveau 1 :</h3>
<table>
<tr><td>Nouveaux bâtiments disponibles : <b>ferme</b> et <b>hutte</b></td></tr>
<tr><td>Nouvelles unités disponibles : <b>volontaire</b> et <b>homme d'argent</b></td></tr>
<tr><td>Plafond de votre trésor à <b><?php echo nbf(400000).'</b> '.imress('drachme'); ?></td></tr>
<tr><td>Bonus de <b><?php echo nbf(10000).'</b> '.imress('nourriture').' et <b>'.nbf(50000).'</b> '.imress('drachme'); ?></td></tr>
<tr><td>50 <b>Espions</b></td></tr>
<tr><td><b>Nouvelles missions</b></td></tr>
<tr><td>Nouveau jeu : Le <b>loto</b></td></tr>
</table>
</center>
