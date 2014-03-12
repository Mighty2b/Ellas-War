<?php

if($paquet->peut_commerce() == false) {
	echo '<div class="erreur">';
	echo display_error(95);
	echo '</div>';
}
else {

	if(!empty($minimum_lvl_ress[$ress]) && 
	   ($paquet->get_infoj('lvl') < $minimum_lvl_ress[$ress])) {
		redirect();
	}
	
	$nb_lots    = $paquet->get_answer('get_commercem')->{1};
	$liste_lots = $paquet->get_answer('get_commercem')->{2};
	
	if($paquet->get_answer('get_commercem')->{3} == true) {
		echo '<div class="erreur">';
		echo display_error(228);
		echo '</div>';
	}
	else {
		$titre_qtt    = '<a href="'._('commerce').'-'.$ress.'-'.$nb_page.'-qtt"
		                    class="sous">'._('Quantité').'</a>';
		$titre_taux   = '<a href="'._('commerce').'-'.$ress.'-'.$nb_page.'-taux" 
		                    class="sous">'._('Taux').'</a>';
		$titre_prix   = '<a href="'._('commerce').'-'.$ress.'-'.$nb_page.'-prix" 
		                    class="sous">'._('Prix').'</a>';
		$titre_vendeur= '<a href="'._('commerce').'-'.$ress.'-'.$nb_page.'-vendeur" 
		                    class="sous">'._('Vendeur').'</a>';

		if(!empty($_GET['var3']) && $_GET['var3'] == 'qtt') {
		  $titre_qtt     = _('Quantité');
		}
		elseif(!empty($_GET['var3']) && $_GET['var3'] == 'prix') {
		  $titre_prix    = _('Prix');
		}
		elseif(!empty($_GET['var3']) && $_GET['var3'] == 'vendeur') {
		  $titre_vendeur = _('Vendeur');
		}
		else {
		  $titre_taux    = _('Taux');
		}

		echo '
		<div class="centrer">
			<a href="'._('commerce').'-nourriture">'.imress('nourriture').'</a> 
		&nbsp;	<a href="'._('commerce').'-eau">'.imress('eau').'</a> 
		&nbsp;	<a href="'._('commerce').'-bois">'.imress('bois').'</a> 
		&nbsp;	<a href="'._('commerce').'-fer">'.imress('fer').'</a> 
		&nbsp;	<a href="'._('commerce').'-argent">'.imress('argent').'</a>
		';

if($paquet->get_infoj('lvl') >= $minimum_lvl_ress['pierre'])
	echo ' &nbsp; <a href=\''._('commerce').'-pierre\'>'.imress('pierre').'</a> ';

if($paquet->get_infoj('lvl') >= $minimum_lvl_ress['marbre'])
	echo ' &nbsp; <a href=\''._('commerce').'-marbre\'>'.imress('marbre').'</a> ';

if($paquet->get_infoj('lvl') >= $minimum_lvl_ress['raisin'])
	echo ' &nbsp; <a href=\''._('commerce').'-raisin\'>'.imress('raisin').'</a> ';

if($paquet->get_infoj('lvl') >= $minimum_lvl_ress['vin'])
	echo ' &nbsp; <a href=\''._('commerce').'-vin\'>'.imress('vin').'</a> ';

if($paquet->get_infoj('lvl') >= $minimum_lvl_ress['gold'])
	echo ' &nbsp; <a href=\''._('commerce').'-gold\'>'.imress('gold').'</a> ';

echo ' &nbsp; <a href=\''._('commerce').'-faveur\'>'.imress('faveur').'</a></div>';

if ($ress == 'gold') {
	echo '<h2 class="centrer">'._('Or').'</h2>';
}
else {
	echo '<h2 class="centrer">'.ucfirst($ress).'</h2>';
}

echo '<br/>';

$paquet->error('acheter_lotm');

$tp=time()-$temps_lots;

$nb_lot_ress = ceil($nb_lots/$nb_par_page);

if($nb_lot_ress == 0)
	echo '<br/><br/>
			<div class="centrer ligne">'._('Ce marché est vide').'</div>
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
		echo '<a href="'._('commerce').'-'.$ress.'-'.$i.'-'.$_GET['var3'].'">'.$i.'</a>';
	}
}

echo '<br/><br/>
    <table>
    <thead>
    <tr class="titre_tab">
      <td align="center">'.$titre_qtt.'</td>
      <td>'.$titre_taux.'</td>
      <td>'.$titre_prix.'</td>
      <td>'.$titre_vendeur.'</td>
      <td></td>
    </tr> </thead><tfoot></tfoot><tbody>';

foreach($liste_lots as $do) {
	if(!empty($do->alliance) && empty($do->anonyme)) {
		$alliance = ' ('.stripslashes($do->nom).')';
	}
	else {
		$alliance = '';
	}
	
	if(!empty($do->anonyme)) {
		$do->vendeur = _('Anonyme');
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
	
	if($do->vend == $paquet->get_infoj('id')) {
	echo '
	<tr class=\'text_commerce\'>
	<td>&nbsp;'.nbf(round($do->nbvente,2)).'&nbsp;</td>
	<td>&nbsp;'.$do->tauxvente.'&nbsp;</td>
	<td align=\'right\'>&nbsp;'.nbf(round($do->prixvente,2)).'&nbsp;</td>
	<td align=\'left\'>&nbsp;'.$do->vendeur.$alliance.'&nbsp;</td>
	<td><a href=\''._('commerce').'-'.$ress.'-1-'.$_GET['var3'].'-'.$do->id.'\'>'.img('images/com/cart_delete.png', _('reprendre')).'</a></td></tr>';
	}
	elseif($do->temps > $tp)
	{
	echo '
	<tr class=\'text_commerce\'>
	<td>&nbsp;'.nbf(round($do->nbvente,2)).'&nbsp;</td>
	<td>&nbsp;'.$do->tauxvente.'&nbsp;</td>
	<td align=\'right\'>&nbsp;'.nbf(round($do->prixvente,2)).'&nbsp;</td>
	<td align=\'left\'>&nbsp;'.$do->vendeur.$alliance.'&nbsp;</td>
	<td>'.img('images/com/cart_error.png', _('impossible')).'</td></tr>';
	}
	else
	{
	echo '
	<tr class=\'text_commerce\'>
	<td>&nbsp;'.nbf(round($do->nbvente,2)).'&nbsp;</td>
	<td>&nbsp;'.$do->tauxvente.'&nbsp;</td>
	<td align=\'right\'>&nbsp;'.nbf(round($do->prixvente,2)).'&nbsp;</td>
	<td align=\'left\'>&nbsp;'.$do->vendeur.$alliance.'&nbsp;</td><td>';
	
		if($paquet->get_infoj('lvl') > 0) {
			echo '
			<a href=\''._('commerce').'-'.$ress.'-1-'.$_GET['var3'].'-'.$do->id.'\'>'.img('images/com/cart_add.png', _('prendre')).'</a>&nbsp;
			<a href=\''._('commerce').'-'.$ress.'-1-'.$_GET['var3'].'-'.$do->id.'-1\'>'.img('images/com/achat_anonyme.png', _('Acheter anonymement')).'</a>';
		}
		
		echo '</td></tr>';
	}
}

echo '</tbody></table><br/></center>';
	}
	
  $paquet -> is_active_bonus_commerce();

  echo '<br/>
  <div class="ligne centrer">
  	<a href="'._('obtenirdesfaveurs').'" 
  	   class="erreur">'._('Obtenir des faveurs').'</a>
  </div>';
	}
}

?>