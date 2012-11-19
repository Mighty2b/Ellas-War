<?php

if(empty($liste_contrats) or sizeof($liste_contrats) == 0) {
	echo '<div class="centrer">Il n\'y a aucun contrat actuellement</div>';
}
else {

	echo '<table class="centrer_tableau">
	<tr class=\'titre_tab\'>
		<td>&nbsp;Investigateur&nbsp;</td>
		<td>&nbsp;Cible&nbsp;</td>
		<td>&nbsp;Début&nbsp;</td>
		<td>&nbsp;Fin&nbsp;</td>
		<td>&nbsp;Récompense&nbsp;</td>
	</tr>';
	
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
			echo '<a href="Contrats-'.$do->id.'-valider">Valider</a>&nbsp;</td>
			</tr>';
		}
	}
	
	echo '</table>';
}

//Les contrats de mon alliance	
if(!empty($mes_contrats) && sizeof($mes_contrats) > 0) {
	echo '<br/><h2 class="centrer">Vos contrats</h2>
	<table class="centrer_tableau">
	<tr class=\'titre_tab\'>
		<td>&nbsp;Cible&nbsp;</td>
		<td>&nbsp;Confidentiel&nbsp;</td>
		<td>&nbsp;Date de dépôt&nbsp;</td>
		<td>&nbsp;Récompense&nbsp;</td>
		<td>&nbsp;&nbsp;</td>
	</tr>';

	foreach($mes_contrats as $do) {
		if(empty($do->silence)) {
			$s='Non';
		}
		else {
			$s='Oui';
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
		<td>&nbsp;<a href=\'Contrats-'.$do->id.'-annuler\'>Annuler</a>&nbsp;</td>
		</tr>';
	}
		echo '</table>';
}

?>