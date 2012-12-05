<?php

if($paquet -> getlvl() != 6) {
	redirect();
}

?>
<center>
<h1>Vos objectifs pour passer niveau 7</h1>
<br/>
<br/>
<table>
<tr>
	<td>
	<b>Construction de 40 ateliers de battage de la monnaie</b><br/>
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
	<b>Recrutement de 6'000 hippeis</b><br/>
	<i>Actuellement : <?php echo nbf($actu[1]);?> hippeis</i>
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
	<b>350 victoires</b><br/>
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
	<b>Construction de votre deuxième temple</b><br/>
	<i>Actuellement : <?php 
		if(!empty($obj[2])) {
			if($actu[2] == 'ares') {
				echo 'Temple d\'Arès';
			}
			else {
				echo 'Temple d\'Athéna';
			}
		}
		else {
			echo 'Aucun temple';
		}
		?></i>
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
	echo '<br/><div class="bouton_classique"><input class="bouton_classique2" type="button" value="PASSER NIVEAU 7" onclick="javascript:passer_lvl(6);"/></div>';
}

?>
<h3>Après votre passage niveau 7 :</h3>
<table>
	<tr>
		<td>Nouvelle unité disponible : <b>Archer à cheval</b></td>
	</tr>
</table>
</center>
