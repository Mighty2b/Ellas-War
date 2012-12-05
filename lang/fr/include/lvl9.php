<?php

if($paquet -> getlvl() != 9) {
	redirect();
}

?>
<center>
<h1>Vos objectifs pour passer niveau 10</h1>
<br/>
<br/>
<table>
<tr>
	<td>
	<b>Construction de 60 ateliers de battage de la monnaie</b><br/>
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
	<b>Recrutement de 10 000 hoplites à cheval</b><br/>
	<i>Actuellement : <?php echo nbf($actu[1]);?> hoplites à cheval</i>
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
	<b>Construction de 50 ateliers de pressage</b><br/>
	<i>Actuellement : <?php echo $actu[2];?>  ateliers de pressage</i>
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
	<b>Construction de 20 mines d'or</b><br/>
	<i>Actuellement : <?php echo $actu[6];?>  mines d'or</i>
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
	<b>1 000 victoires</b><br/>
	<i>Actuellement : <?php echo nbf($actu[4]);?> victoires
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
	<b><?php echo nbf(100000);?> XP</b><br/>
	<i>Actuellement : <?php echo nbf(round($actu[3]));?> XP
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
	<b>Toutes vos ressources en positif</b><br/>
	<i>Actuellement : <?php echo ((!empty($obj[5]))?'ressources en positif':'au moins une des ressources n\'est pas en positif');?>
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
</table>
<?php

if(array_sum($obj) == sizeof($obj)) {
	echo '<br/><div class="bouton_classique"><input class="bouton_classique2" type="button" value="PASSER NIVEAU 10" onclick="javascript:passer_lvl(9);"/></div>';
}

?>
<h3>Après votre passage niveau 10 :</h3>
<table>
<tr>
	<td>Nouveau bâtiment disponible : <b>Grotte maudite</b> et <b>Tour à miroir</b></td>
</tr>
	<tr>
		<td>Accés à l'autel des dieux</td>
	</tr>
	<tr>
		<td>Nouvelle unité disponible : <b>Hoplite d'élite</b></td>
	</tr>
	<tr>
		<td>Possibilité de bâtir un nouveau temple</td>
	</tr>
</table>
</center>
