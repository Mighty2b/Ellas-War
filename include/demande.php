<?php

include('include/menu_monalliance.php');

$demande = $paquet->get_answer('get_demande')->{1};
$offre   = $paquet->get_answer('get_demande')->{2};

if(!empty($demande) && sizeof($demande)) {
	echo '<h1>'._('Demandes en cours').'</h1>
	<table class="none">';
	
	foreach($demande as $d) {
		echo '<tr>
<td>'.$d->login.'</td>
<td>'.$d->qtt.'</td>
<td>'.imress($d->ress).'</td>
<td>'.display_date($d->date_demande,2).'</td>
<td>';

if($d->joueur == $paquet->get_infoj('id') or 
   $paquet->get_infoj('id') == $mon_alliance->id_chef) {
	echo '<a href="'._('demande').'-'.$d->id.'"><img src="images/attaques/cross.png"
	                                                 alt="'._('Annuler').'" 
	                                                 title="'._('Annuler').'"/></a>';
}

echo '</td>
</tr>';
	}
	echo '</table><br/>';
}

if(!empty($offre) && sizeof($offre)) {
	echo '<h1>'._('Propositions en cours').'</h1>
	<table class="none">';
	
	foreach($offre as $d) {
		echo '<tr>
<td>'.$d->login.'</td>
<td>'.$d->qtt.'</td>
<td>'.imress($d->ress).'</td>
<td>'.display_date($d->date_demande,2).'</td>
<td>';

if($d->joueur == $paquet->get_infoj('id') or $paquet->get_infoj('id') == $mon_alliance->id_chef) {
echo '<a href="demande-'.$d->id.'"><img src="images/attaques/cross.png"
	                                      alt="'._('Annuler').'" 
	                                      title="'._('Annuler').'"/></a>';
	}

echo '</td>
</tr>';
	}
	echo '</table><br/>';
}

echo '<div class="centrer">
<h1>'._('Demander/Proposer').'</h1><br/>
<form action="'._('demande').'" method=\'post\' >
<select name=\'type\'>
    <option value=\'demande\'>'._('Demander').'</option>
		<option value=\'offrir\'>'._('Offrir').'</option>
</select>
<input type=\'text\' name=\'qtt\' required="required" /> 
<select name=\'choix\' >
    <option value=\'drachme\'>'._('Drachmes').'</option>
		<option value=\'nourriture\'>'._('Nourriture').'</option>
		<option value=\'eau\'>'._('Eau').'</option>
		<option value=\'bois\'>'._('Bois').'</option>
		<option value=\'fer\'>'._('Fer').'</option>
		<option value=\'argent\'>'._('Argent').'</option>
		<option value=\'pierre\'>'._('Pierre').'</option>
		<option value=\'marbre\'>'._('Marbre').'</option>
		<option value=\'raisin\'>'._('Raisin').'</option>
		<option value=\'vin\'>'._('Vin').'</option>
		<option value=\'gold\'>'._('Or').'</option>
</select>
<br/><br/>
<div class="bouton_classique"><input type="submit"
                                     name="'._('Demander').'"
                                     value="'._('Demander').'"/></div>
</form></div>';
	
?>