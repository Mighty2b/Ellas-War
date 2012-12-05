<?php

if($paquet -> getlvl() != 3) {
	redirect();
}

?>
<center>
<h1>Vos objectifs pour passer niveau 4</h1>
<br/>
<br/>
<table>
<tr>
	<td>
	<b>Construction de 20 tours d'observation</b><br/>
	<i>Actuellement : <?php echo $actu[0];?> tours d'observation</i>
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
	<b>Recrutement de 1'000 frondeurs</b><br/>
	<i>Actuellement : <?php echo nbf($actu[3]);?> frondeurs</i>
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
	<b>100 victoires</b><br/>
	<i>Actuellement : <?php echo $actu[2];?> victoires
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
	<i>Actuellement : <?php echo ((!empty($obj[1]))?'ressources en positif':'au moins une des ressources n\'est pas en positif');?>
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
</table>
<?php

if(array_sum($obj) == sizeof($obj)) {
	echo '<br/><div class="bouton_classique"><input class="bouton_classique2" type="button" value="PASSER NIVEAU 4" onclick="javascript:passer_lvl(3);"/></div>';
}

?>
<h3>Après votre passage niveau 4 :</h3>
<table>
<tr>
	<td>Nouveaux bâtiments disponibles : <b>Ferme vinicole</b> et <b>Habitation</b></td>
</tr>
<tr><td>Nouvelle unité disponible : <b>Archer à arc court</b></td></tr>
<tr><td>Plafond de votre trésor à <b><?php echo nbf(1000000).'</b> '.imress('drachme'); ?></td></tr>
</table>
</center>
