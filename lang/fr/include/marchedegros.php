<?php

$titre_qtt    = '<a href="MarcheDeGros-'.$ress.'-'.$nb_page.'-qtt" class="sous">Quantité</a>';
$titre_taux   = '<a href="MarcheDeGros-'.$ress.'-'.$nb_page.'-taux" class="sous">Taux</a>';
$titre_prix   = '<a href="MarcheDeGros-'.$ress.'-'.$nb_page.'-prix" class="sous">Prix</a>';
$titre_vendeur= '<a href="MarcheDeGros-'.$ress.'-'.$nb_page.'-vendeur" class="sous">Vendeur</a>';

if(!empty($_GET['var3']) && $_GET['var3'] == 'qtt') {
  $titre_qtt    = 'Quantité';
}
elseif(!empty($_GET['var3']) && $_GET['var3'] == 'prix') {
  $titre_prix    = 'Prix';
}
elseif(!empty($_GET['var3']) && $_GET['var3'] == 'vendeur') {
  $titre_vendeur    = 'Vendeur';
}
else {
  $titre_taux = 'Taux';
}

echo '
<div class="centrer">
	<a href="MarcheDeGros-nourriture"><img src="images/ress/nourriture.jpg" title="Nourriture" alt="Nourriture" /></a> 
&nbsp;	<a href="MarcheDeGros-eau"><img src="images/ress/eau.jpg" title="Eau" alt="Eau" /></a> 
&nbsp;	<a href="MarcheDeGros-bois"><img src="images/ress/bois.jpg" title="Bois" alt="Bois" /></a> 
&nbsp;	<a href="MarcheDeGros-fer"><img src="images/ress/fer.jpg" title="Fer" alt="Fer" /></a> 
&nbsp;	<a href="MarcheDeGros-argent"><img src="images/ress/argent.jpg" title="Argent" alt="Argent" /></a>
';

if($paquet->getlvl() >= $minimum_lvl_ress['pierre'])
	echo ' &nbsp; <a href=\'MarcheDeGros-pierre\'><img src=\'images/ress/pierre.jpg\' title=\'Pierre\' alt=\'Pierre\' /></a> ';

if($paquet->getlvl() >= $minimum_lvl_ress['marbre'])
	echo ' &nbsp; <a href=\'MarcheDeGros-marbre\'><img src=\'images/ress/marbre.jpg\' title=\'Marbre\' alt=\'Marbre\' /></a> ';

if($paquet->getlvl() >= $minimum_lvl_ress['raisin'])
	echo ' &nbsp; <a href=\'MarcheDeGros-raisin\'><img src=\'images/ress/raisin.jpg\' title=\'Raisin\' alt=\'Raisin\' /></a> ';

if($paquet->getlvl() >= $minimum_lvl_ress['vin'])
	echo ' &nbsp; <a href=\'MarcheDeGros-vin\'><img src=\'images/ress/vin.jpg\' title=\'Vin\' alt=\'Vin\' /></a> ';

if($paquet->getlvl() >= $minimum_lvl_ress['gold'])
	echo ' &nbsp; <a href=\'MarcheDeGros-gold\'><img src=\'images/ress/or.jpg\' title=\'Or\' alt=\'Or\' /></a> ';

echo ' &nbsp; <a href=\'MarcheDeGros-faveur\'><img src=\'images/ress/faveur.jpg\' title=\'faveur\' alt=\'faveur\' /></a></div>';

if ($ress == 'gold') {
	echo '<h2 class="centrer">Or</h2>';
}
else {
	echo '<h2 class="centrer">'.ucfirst($ress).'</h2>';
}

echo '<br/>';

$paquet->display();

$tp=time()-$temps_lots;

$nb_lot_ress = ceil($nb_lots/$nb_par_page);

if($nb_lot_ress == 0)
	echo '<br/><br/>
			<div class="centrer ligne">Ce marché est vide</div>
			<br/><br/>';
else {
$debutt = ($nb_page-1)*$nb_par_page;

echo '<center>';

if($nb_lot_ress > 1)
{
	for($i=1;$i<=$nb_lot_ress;$i++)
	{
		if($i != 1)
			echo ' | ';
		echo '<a href="MarcheDeGros-'.$ress.'-'.$i.'-'.$_GET['var3'].'">'.$i.'</a>';
	}
}

echo '<br/><br/>
    <table>
    <tr class="titre_tab">
      <td align="center">&nbsp;'.$titre_qtt.'&nbsp;</td>
      <td>&nbsp;'.$titre_taux.'&nbsp;</td>
      <td>&nbsp;'.$titre_prix.'&nbsp;</td>
      <td>&nbsp;'.$titre_vendeur.'&nbsp;</td>
      <td></td>
    </tr>';

foreach($liste_lots as $do) {
	if(!empty($do->alliance) && empty($do->anonyme)) {
		$alliance = ' ('.stripslashes($do->nom).')';
	}
	else {
		$alliance = '';
	}
	
	if(!empty($do->anonyme)) {
		$do->vendeur = 'Anonyme';
	}
	elseif(empty($do->vendeur)) {
	  $do->vendeur = $paquet->getlogin();
	}
	
	if($ress == 'faveur') {
	  $do->tauxvente = nbf($do->tauxvente);
	}
	else {
	  $do->tauxvente = round($do->tauxvente,6);
	}
	
	if($do->vend == $paquet->getid()) {
	echo '
	<tr class=\'text_commerce\'>
	<td>&nbsp;'.nbf(round($do->nbvente,2)).'&nbsp;</td>
	<td>&nbsp;'.$do->tauxvente.'&nbsp;</td>
	<td align=\'right\'>&nbsp;'.nbf(round($do->prixvente,2)).'&nbsp;</td>
	<td align=\'left\'>&nbsp;'.$do->vendeur.$alliance.'&nbsp;</td>
	<td><a href=\'MarcheDeGros-'.$ress.'-1-'.$_GET['var3'].'-'.$do->id.'\'>'.img('images/com/cart_delete.png','reprendre').'</a></td></tr>';
	}
	elseif($do->temps > $tp)
	{
	echo '
	<tr class=\'text_commerce\'>
	<td>&nbsp;'.nbf(round($do->nbvente,2)).'&nbsp;</td>
	<td>&nbsp;'.$do->tauxvente.'&nbsp;</td>
	<td align=\'right\'>&nbsp;'.nbf(round($do->prixvente,2)).'&nbsp;</td>
	<td align=\'left\'>&nbsp;'.$do->vendeur.$alliance.'&nbsp;</td>
	<td>'.img('images/com/cart_error.png','impossible').'</td></tr>';
	}
	else
	{
	echo '
	<tr class=\'text_commerce\'>
	<td>&nbsp;'.nbf(round($do->nbvente,2)).'&nbsp;</td>
	<td>&nbsp;'.$do->tauxvente.'&nbsp;</td>
	<td align=\'right\'>&nbsp;'.nbf(round($do->prixvente,2)).'&nbsp;</td>
	<td align=\'left\'>&nbsp;'.$do->vendeur.$alliance.'&nbsp;</td><td>';
	
		if($paquet->getlvl() > 0) {
			echo '
			<a href=\'MarcheDeGros-'.$ress.'-1-'.$_GET['var3'].'-'.$do->id.'\'>'.img('images/com/cart_add.png','prendre').'</a>&nbsp;
			<a href=\'MarcheDeGros-'.$ress.'-1-'.$_GET['var3'].'-'.$do->id.'-1\'>'.img('images/com/achat_anonyme.png','Acheter anonymement').'</a>';
		}
		
		echo '</td></tr>';
	}
}

echo '</table><br/></center>';
	}
	
  $paquet -> is_active_bonus_commerce();

  echo '<br/>
  <div class="ligne centrer">
  	<a href="Obtenir des faveurs" class="erreur">Obtenir des faveurs</a>
  </div>';
?>