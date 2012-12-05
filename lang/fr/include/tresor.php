<h1>Trésor</h1>
<br/>
<br/>
<div class="ligne80 justifier">Le trésor vous permettra de mettre à l'abri vos richesses, cependant ce service n'est pas sans contrainte. Jusqu'au niveau 5 celui-ci sera limité, à partir du niveau 6 vous n'aurez plus de limite mais il vous faudra vous acquitter d'une taxe pour pouvoir récupérer vos drachmes. 
<?php
if($paquet->getlvl() > 5) {
	echo 'Le calcul absolu vous permet d\'obtenir exactement la somme que vous souhaitez retirer. Lors d\'un retrait relatif il vous faut déduire les taxes de la somme que vous retirez.';
}

echo '
</div>
<br/>
<h2 class="centrer">Fonds actuels : '.$paquet->getTresor().' '.imress('drachme'); ?></h2>
<div id="simuler" class="centrer"></div>

<div class="ligne cadre">

<div style="width:150px;margin-left:80px;margin-top:30px;float:left;">
	<img src="design/co/soldat1.png" alt="Soldats" title="Soldats" />
</div>

<div style="width:400px;float:left;margin-top:10px;margin-left:10px;">
<form method="post" action="#">
	<table class="tableau_calcul">
		<tr>
			<td valign="bottom" align="left">Montant</td>
			<td colspan="2" align="right">
				<img style="margin-bottom:-4px" title="Casque" alt="Casque" src="design/co/casque.png">
				<br/>
				<input type="text" name="montant" id="montant" value="" class="form_retirer" required="required" /></td>
		</tr>
		<?php
		if($paquet->getlvl() > 5) {
		echo '<tr>
			<td align="left">Calcul</td>
			<td align="left"> <input type="radio" name="calcul" value="relatif" checked="checked" id="calcul" /> Relatif</td>
			<td align="left"> <input type="radio" name="calcul" value="absolu" /> Absolu</td>
		</tr>';
		}
		?>
		<tr>
			<td align="left">Mode de transaction</td>
			<td align="left"> <input type="radio" name="mode" value="deposer" checked="checked" id="mode" /> Déposer</td>
			<td align="left"> <input type="radio" name="mode" value="retirer" /> Retirer</td>
		</tr>
		<tr>
	<?php
	if($paquet->getlvl() > 5) {
		$taxe = $paquet -> getTaxes();
		$taux = 15-0.5*$paquet->getlvl();
		
		echo '<td align="left">Taxe de retrait :</td><td colspan="2" align="center">';
		
		if(empty($taxe)) {
			echo $taux.'% <a href="Faveurs" class="lien_rouge">(Supprimer la taxe)</a>';
		}
		else {
			echo '0% ( Fin le '.date('d/m/Y \à H\hi', $taxe).')';
		}
		echo '</td>';
	}
	else {
		if($paquet->getlvl() < 5) {
			$maximum_drachmes_tresor = ($paquet->getlvl()+1)*200000;
		}
		else {
			$maximum_drachmes_tresor = 2000000;
		}
	echo '<td align="left">Plafond</td>
				<td colspan="2">'.number_format($maximum_drachmes_tresor, 0, ',', ' ').' '.imress('drachme').'</td>';
	}
?>
		</tr>
		
		<tr><td>&nbsp;</td><td></td><td></td></tr>
		
		<tr>
			<td></td>
			<td><div class="bouton_classique"><input class="bouton_classique2" type="submit" value="VALIDER" name="Valider"/></div></td>
			<td>
			<?php
			if($paquet->getlvl() > 5) {
				echo '<div class="bouton_classique"><div class="bouton_classique2" onclick="simuler('.$taux.');" style="cursor : pointer;">SIMULER</div></div>';
			}
			?>
			</td>
		</tr>
	</table>
	</form>
</div>
</div>
<?php

$histo = $paquet->getHistoriqueTresor();

if(sizeof($histo) > 0) {
	echo '<div class="ligne cadre centrer"><br/><br/>
	<b>Dernières actions</b>
	<table class="centrer_tableau">';
	foreach($histo as $do) {
	echo '<tr><td class="gauche">';
		if($do->action == 'retrait') {
		  echo 'Retrait de ';
		}
		else {
		  echo 'Dépôt de ';
		}
		echo '<b>'.nbf($do->montant).'</b> '.imress('drachme').' le '.date('d/m/Y \à H\hi', $do->temps).'</td></tr>';
	}
	echo '</table></div>';
}

?>