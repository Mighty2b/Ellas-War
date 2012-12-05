<?php

if($paquet -> getlvl() != 5) {
	redirect();
}

?>
<center>
<h1>Vos objectifs pour passer niveau 6</h1>
<br/>
<br/>
<table>
<tr>
	<td>
	<b>Construction de 35 ateliers de battage de la monnaie</b><br/>
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
	<b>Recrutement de 5'000 archers à arc long</b><br/>
	<i>Actuellement : <?php echo nbf($actu[1]);?> archers à arc long</i>
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
	<b>Construction de 250 habitations</b><br/>
	<i>Actuellement : <?php echo $actu[2];?> habitations</i>
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
	<b>250 victoires</b><br/>
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
</table>
<?php

if(array_sum($obj) == sizeof($obj)) {
	echo '<br/><div class="bouton_classique"><input class="bouton_classique2" type="button" value="PASSER NIVEAU 6" onclick="javascript:passer_lvl(5);"/></div>';
}

?>
<h3>Après votre passage niveau 6 :</h3>
<table>
<tr>
	<td>Nouveau bâtiment disponible : <b>École de cavalerie</b></td>
</tr>
	<tr>
		<td>Nouvelle unité disponible : <b>Hippeis</b></td>
	</tr>
	<tr>
		<td>Possibilité de bâtir <b>un nouveau temple</b></td>
	</tr>
	<tr>
		<td>Suppression du plafond de votre <b>trésor</b></td>
	</tr>
	<tr>
	  <td>Appui d'<b>Hébé</b></td>
	</tr>
</table>
</center>
