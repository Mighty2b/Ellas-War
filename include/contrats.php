<?php

include('include/menu_monalliance.php');

$liste_contrats = $paquet->get_answer('info_contrats')->{1};
$mes_contrats   = $paquet->get_answer('info_contrats')->{2};

if($mon_alliance -> level < 3 or 
   $paquet->get_infoj('droits_alliance')->contrat == 0) {
	redirect();
}

$paquet -> error('valider_contrat', 1);

if(!empty($paquet->get_answer('annuler_contrat'))) {
	if($paquet->get_answer('annuler_contrat')->{1} != 0) {
		$paquet->error('annuler_contrat', 1, 
		array($paquet->get_answer('annuler_contrat')->{2}));
	}
}

if(empty($liste_contrats) or sizeof($liste_contrats) == 0) {
	echo '<div class="gras rouge_goco centrer"><br/><br/>'._(
	'Il n\'y a aucun contrat actuellement').'</div>';
}
else {

	echo '<table><thead>
	<tr>
		<td>'._('Investigateur').'</td>
		<td>'._('Cible').'</td>
		<td>'._('Début').'</td>
		<td>'._('Fin').'</td>
		<td>'._('Récompense').'</td>
	</tr></thead><tfoot></tfoot><tbody>';
	
	foreach($liste_contrats as $do) {
		$req = '';
			
		if(!empty($do->drachme)) {
			$req .=' '.$do->drachme.' '.imress('drachme');
		}
		
		if(!empty($do->gold)) {
			$req .=' '.$do->gold.' '.imress('gold');
		}
		
		echo '<tr>
		<td>&nbsp;'.ucfirst($do->alliance1).'&nbsp;</td>
		<td>&nbsp;'.$do->alliance2.'&nbsp;</td>
		<td>&nbsp;'.date('d/m/Y',$do->debut).'&nbsp;</td>
		<td>&nbsp;'.date('d/m/Y',$do->fin).'&nbsp;</td>
		<td align=\'right\'>&nbsp;'.$req.'&nbsp;</td>
		<td>&nbsp;';


		if($do->peut_valider == false) {
			echo '&nbsp;</td></tr>';
		}
		else {
			echo '<a href="'._('contrats').'-'.$do->id.'-valider">'.
			     _('Valider').'</a>&nbsp;</td>
			</tr>';
		}
	}
	
	echo '</tbody></table>';
}

//Les contrats de mon alliance	
if(!empty($mes_contrats) && sizeof($mes_contrats) > 0) {
	echo '<br/><h2 class="centrer">Vos contrats</h2>
	<table><thead>
	<tr>
		<td>'._('Cible').'</td>
		<td>'._('Confidentiel').'</td>
		<td>'._('Date de dépôt').'</td>
		<td>'._('Récompense').'</td>
		<td>&nbsp;&nbsp;</td>
	</tr></thead><tfoot></tfoot><tbody>';

	foreach($mes_contrats as $do) {
		if(empty($do->silence)) {
			$s = _('Non');
		}
		else {
			$s = _('Oui');
		}

		$req = '';

		if(!empty($do->drachme)) {
			$req.=' '.$do->drachme.' '.imress('drachme');
		}
		
		if(!empty($do->gold)) {
			$req.=' '.$do->gold.' '.imress('gold');
		}
		
		echo '<tr>
		<td>&nbsp;'.ucfirst($do->nom).'&nbsp;</td>
		<td>&nbsp;'.$s.'&nbsp;</td>
		<td>&nbsp;'.date('d/m/Y',$do->date).'&nbsp;</td>
		<td>&nbsp; '.$req.'&nbsp;</td>
		<td>&nbsp;<a href=\''._('contrats').'-'.$do->id.'-annuler\'>'._('Annuler').'</a>&nbsp;</td>
		</tr>';
	}
	
	echo '</tbody></table>';
}

?>