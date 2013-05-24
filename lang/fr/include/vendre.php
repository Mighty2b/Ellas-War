<?php

echo '﻿<h1>Vendre</h1>';

$paquet->display();
/*
echo '
	<p class="ligne80 justifier">Si vous vendez des ressources en petites quantités celles-ci apparaîtront sur le marché des petits lots.
		Au contraire si vous vendez des grosses quantités, votre lot apparaîtra dans le marché des gros lots.
		Lors d\'une vente vous avez deux choix pour le prix de vos ressources.
		Le prix par taux représente le prix d\'une unité de ressource de votre lot, le prix total par contre sera le prix pour le lot en entier.</p>';
*/
echo '
<p class="ligne80 justifier">Lorsque vous vendez des lots, ceuxi-ci sont classés en deux catégories. 
Les deux types de lots sont affiché sur le même marche mais une licence de grand commerçant est obligatoire pour vendre des gros lots.
Lors d\'une vente vous avez deux choix pour le prix de vos ressources.
Le prix par taux représente le prix d\'une unité de ressource de votre lot, le prix total par contre sera le prix pour le lot en entier.</p>';

echo '<p class="centrer ligne">Vous pouvez en échange de 5% du prix, vendre de façon anonyme.</p>';
  $paquet -> is_active_bonus_commerce();
  
echo '
	<form action=""#" method="post" name="vendre""><table style="margin:auto;">
	<tr>
		<td align="left">&nbsp;<b>Quantité </b>&nbsp;</td>
		<td align="left"><input  name="nbressource" class="form_retirer" required="required" ></td>
	</tr>
	<tr>
		<td align="left">&nbsp;<b>Prix </b>&nbsp;</td>
		<td align="left"><input  name="prixressource" class="form_retirer" required="required" ></td>
	</tr>
	<tr><td align="left">&nbsp;<b>Type </b>&nbsp;</td><td align="left">
	<select type="text" name="vente" class="form_retirer">
	<option value="taux"">&nbsp;Prix par taux&nbsp;</option>
	<option value="total"">&nbsp;Prix total&nbsp;</option>
	 </select></td></tr>
	 <tr><td align="left">&nbsp;
	 <b>Ressource</b>&nbsp;</td><td align="left">
	 <select type="text" name="type" class="form_retirer">

	 <option value="nourriture">&nbsp;Nourriture&nbsp;</option>
	 <option value="eau">&nbsp;Eau&nbsp;</option>
	 <option value="bois">&nbsp;Bois&nbsp;</option>
	 <option value="fer">&nbsp;Fer&nbsp;</option>
	 <option value="argent">&nbsp;Argent&nbsp;</option> 
	 <option value="pierre">&nbsp;Pierre&nbsp;</option>
	 <option value="marbre">&nbsp;Marbre&nbsp;</option>
	 <option value="raisin">&nbsp;Raisin&nbsp;</option>
	 <option value="vin">&nbsp;Vin&nbsp;</option>
	 <option value="gold">&nbsp;Or&nbsp;</option>
	 <option value="faveur">&nbsp;Faveur&nbsp;</option>
	 </select></td></tr>
	 <tr>
	 	<td align="left">&nbsp;<b>Nombre de lots </b>&nbsp;</td>
	 	<td align="left">
	<select type="text" name="cle" class="form_retirer">';

	if(in_array('hermes', $paquet -> getTemples()))
		$max = 10;
	else
		$max = 8;
	
	$i=1;

	for($i=1; $i<=$max;$i++)
		echo '<option value=\''.$i.'\'>&nbsp;'.$i.'&nbsp;</option>';

echo '
	 </select></td></tr>
	 
	 <tr>
	 	<td><b>Vendre anonymement</b></td>
	 	<td><input type="checkbox" name="anonyme"></td>
	 </tr>	 
	 </table>
	<br/>';

	if($paquet->getlvl() > 0) {
		echo '<div class="bouton_classique"><input class="bouton_classique2" type="submit" name="achatforum" value="Vendre" class="form_co4"/></div>';
	}
	else {
		echo '<font color="red">Vous pourrez vendre des lots à partir du niveau 1</font>';
	}
	
echo '
		              </form>
	<h2 class="centrer">Limites</h2>
	
		<table id="tableau_taux" cellpadding=0 cellspacing=0 margin=0 border=0>
	<tr class="haut_tab_taux">
		<th>Ressource</th>
		<th>Mini PL</th>
		<th>Maxi PL</th>
		<th>Seuil</th>
		<th>Mini GL</th>
		<th>Maxi GL</th>
	</tr>';
	$i = 0;

	foreach($prix_commerce as $cle => $valeur) {
		echo '<tr class="sep_tab_taux"><td colspan="6"></td></tr>
		<tr class="int_tab_taux'.($i%2).'">
		<td align=\'left\'>&nbsp;&nbsp;&nbsp;&nbsp;'.$valeur['nom'].'</td>
		<td class="droite">'.$valeur['petittaux'].'</td>
		<td class="droite">'.$valeur['petitmax'].'</td>
		<td class="droite">'.$valeur['qtt'].'</td>
		<td class="droite">'.$valeur['grostaux'].'</td>
		<td class="droite">'.$valeur['grosmax'].'&nbsp;&nbsp;&nbsp;&nbsp;</td>
		</tr>
		';
	}
	echo '<tr class="bas_tab_taux"><td colspan="6"></td></tr>
	</table>';

	?>