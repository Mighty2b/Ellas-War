<?php

if($paquet -> getlvl() != 8) {
	redirect();
}

?>
<center>
<h1>Vos objectifs pour passer niveau 9</h1>
<br/>
<br/>
<table>
<tr>
	<td>
	<b>Construction de 50 ateliers de battage de la monnaie</b><br/>
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
	<b>Recrutement de 5'000 hoplites</b><br/>
	<i>Actuellement : <?php echo nbf($actu[1]);?> hoplites</i>
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
	<b>750 victoires</b><br/>
	<i>Actuellement : <?php echo $actu[4];?> victoires
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
	<b><?php echo nbf(50000);?> XP</b><br/>
	<i>Actuellement : <?php echo nbf(round($actu[2]));?> XP
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
	<b>Construction de votre troisième temple</b><br/>
	<i>Actuellement : <?php 
		if(!empty($obj[5])) {
			if($actu[5] == 'artemis') {
				echo 'Temple d\'Artémis';
			}
			elseif($actu[5] == 'hephaistos') {
				echo 'Temple d\'Héphaïstos';
			}
			else {
				echo 'Temple de Dionysos';
			}
		}
		else {
			echo 'Aucun temple';
		}
		?></i>
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
	<b>Toutes vos ressources en positif</b><br/>
	<i>Actuellement : <?php echo ((!empty($obj[3]))?'ressources en positif':'au moins une des ressources n\'est pas en positif');?>
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
</table>
<?php

if(array_sum($obj) == sizeof($obj)) {
	echo '<br/><div class="bouton_classique"><input class="bouton_classique2" type="button" value="PASSER NIVEAU 9" onclick="javascript:passer_lvl(8);"/></div>';
}

?>
<h3>Après votre passage niveau 9 :</h3>
<table>
<tr>
	<td>Nouveaux bâtiments disponible : <b>Académie</b>, <b>Atelier de pressage</b>, <b>Mines d'or</b> et <b>Palais</b></td>
</tr>
	<tr>
		<td>Nouvelle unité disponible : <b>Hoplite à cheval</b></td>
	</tr>
</table>
</center>
