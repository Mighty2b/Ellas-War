<?php

if($paquet -> getlvl() != 2) {
	redirect();
}

?>
<center>
<h1>Vos objectifs pour passer niveau 3</h1>
<br/>
<br/>
<table>
<tr>
	<td>
	<b>Construction de 25 ateliers de battage de la monnaie</b><br/>
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
	<b>Construction de 10 carrières</b><br/>
	<i>Actuellement : <?php echo $actu[4];?> carrières</i>
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
	<b>Construction de votre premier temple</b><br/>
	<i>Actuellement : <?php 
		if(!empty($obj[5])) {
			if($actu[5] == 'hermes') {
				echo 'Temple d\'Hermès';
			}
			elseif($actu[5] == 'apollon') {
				echo 'Temple d\'Apollon';
			}
			else {
				echo 'Temple de Déméter';
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
	<b>50 victoires</b><br/>
	<i>Actuellement : <?php echo $actu[1];?> victoires
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
	<b>Toutes vos ressources en positif</b><br/>
	<i>Actuellement : <?php echo ((!empty($obj[2]))?'ressources en positif':'au moins une des ressources n\'est pas en positif');?>
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
	<b><?php echo nbf(400000).' '.imress('drachme'); ?> dans votre trésor</b><br/>
	<i>Actuellement : <?php echo nbf(floor($actu[3])).' '.imress('drachme'); ?> dans votre trésor</i>
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
	echo '<br/><div class="bouton_classique"><input class="bouton_classique2" type="button" value="PASSER NIVEAU 3" onclick="javascript:passer_lvl(2);"/></div>';
}

?>

<h3>Après votre passage niveau 3 :</h3>
<table>
<tr>
	<td>Nouveaux bâtiments disponibles : <b>École d'archers</b> et <b>Tour d'observation</b></td>
</tr>
<tr><td>Nouvelle unité disponible : <b>Frondeur</b></td></tr>
<tr><td>Plafond de votre trésor à <b><?php echo nbf(800000).'</b> '.imress('drachme'); ?></td></tr>
<tr><td>Bonus de <b><?php echo nbf(100000).'</b> '.imress('drachme'); ?></td></tr>
</table>
</center>
