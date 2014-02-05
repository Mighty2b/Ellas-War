<?php

echo '<h1>'._('Trésor').'</h1>
<br/>
<br/>
<div class="ligne_80 justifier">'._(
'Le trésor vous permettra de mettre à l\'abri vos richesses, '.
'cependant ce service n\'est pas sans contrainte. '.
'Jusqu\'au niveau 5 celui-ci sera limité, à partir du niveau 6 '.
'vous n\'aurez plus de limite mais il vous faudra vous acquitter '.
'd\'une taxe pour pouvoir récupérer vos drachmes.');

if($paquet->get_infoj('lvl') > 5) {
	echo _('Le calcul absolu vous permet d\'obtenir exactement la '.
	       'somme que vous souhaitez retirer. Lors d\'un retrait '.
	       'relatif il vous faut déduire les taxes de la somme que '.
	       'vous retirez.');
}

echo '<br/><br/></div>';
$paquet->error('deposer');
$paquet->error('retirer');

echo '
<h2 class="centrer">'._('Fonds actuels').' : '.
nbf($paquet->get_infoj('tresor')).' '.imress('drachme').'</h2>
<div id="simuler" class="centrer"></div>

<div style="width:400px;margin:auto;" class="centrer">
<form method="post" action="#">
	<table class="none">
		<tr>
			<td valign="middle"
			    align="left" 
			    class="gras">'._('Montant').'</td>
			<td colspan="2" align="right">
				<input type="text"
				       name="montant" 
				       id="montant" 
				       value="" 
				       class="form_retirer" 
				       required="required" /></td>
		</tr>';
		
		if($paquet->get_infoj('lvl') > 5) {
		echo '<tr>
			<td align="left" class="gras">'._('Calcul').'</td>
			<td align="left"> <input type="radio"
			                         name="calcul" 
			                         value="relatif" 
			                         checked="checked" 
			                         id="calcul" /> '._('Relatif').'</td>
			<td align="left"> <input type="radio"
			                         name="calcul" 
			                         value="absolu" /> '._('Absolu').'</td>
		</tr>';
		}
		
		echo '
		<tr>
			<td align="left" class="gras">'._('Mode de transaction').'</td>
			<td align="left"> <input type="radio" 
			                         name="mode" 
			                         value="deposer" 
			                         checked="checked" 
			                         id="mode" /> '._('Déposer').'</td>
			<td align="left"> <input type="radio" 
			                         name="mode" 
			                         value="retirer" /> '._('Retirer').'</td>
		</tr>
		<tr>';
	
	if($paquet->get_infoj('lvl') > 5) {
		$taxe = $paquet->get_answer('get_tresor')->{2};
		$taux = 15-0.5*$paquet->get_infoj('lvl');
		
		echo '<td align="left">'._('Taxe de retrait').' :</td><td colspan="2" align="center">';
		
		if(empty($taxe)) {
			echo $taux.'% <a href="'._('faveurs').'" 
			                 class="lien_rouge">('._('Supprimer la taxe').')</a>';
		}
		else {
			echo '0% ( '._('Fin').' '.display_date($taxe,3).')';
		}
		echo '</td>';
	}
	else {
		if($paquet->get_infoj('lvl') < 5) {
			$maximum_drachmes_tresor = ($paquet->get_infoj('lvl')+1)*200000;
		}
		else {
			$maximum_drachmes_tresor = 2000000;
		}
	echo '<td align="left" class="gras">'._('Plafond').'</td>
				<td colspan="2">'.nbf($maximum_drachmes_tresor).' '.imress('drachme').'</td>';
	}

	echo '</tr>
		
		<tr><td>&nbsp;</td><td></td><td></td></tr>
		
		<tr>
			<td></td>
			<td><div class="bouton_classique"><input type="submit" 
			                                         value="'._('VALIDER').'" 
			                                         name="Valider"/></div></td>
			<td>';
			
			if($paquet->get_infoj('lvl') > 5) {
				echo '<div class="bouton_classique"><input type="button" 
				                                           onclick="simuler('.$taux.');" style="cursor : pointer;">'._('SIMULER').'</div></div>';
			}
			
			echo '
			</td>
		</tr>
	</table>
	</form>
</div>';

$histo = $paquet->get_answer('get_tresor')->{3};

if(sizeof($histo) > 0) {
	echo '<div class="ligne cadre centrer"><br/><br/>
	<b>'._('Dernières actions').'</b>
	<table class="none">';
	foreach($histo as $do) {
	echo '<tr><td class="gauche">';
		if($do->action == 'retrait') {
		  echo _('Retrait de ');
		}
		else {
		  echo _('Dépôt de ');
		}
		echo '<b>'.nbf($do->montant).'</b> '.
		     imress('drachme').' '.
		     display_date($do->temps,3).'</td></tr>';
	}
	echo '</table></div>';
}

?>