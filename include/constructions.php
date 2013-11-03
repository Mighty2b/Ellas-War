<?php

$constructions = $paquet->get_infoj('liste_batiments');
$prod_bonus    = $paquet->get_infoj('prod_bonus');
$liste_autels  = $paquet->get_infoj('liste_autels');
$temples       = $paquet->get_infoj('temples');

//Les infos sur les logements
$placen_nb = $paquet->get_infoj('placen_nb');
$placen    = $paquet->get_infoj('placen');
$placel_nb = $paquet->get_infoj('placel_nb');
$placel    = $paquet->get_infoj('placel');
$placeg_nb = $paquet->get_infoj('placeg_nb');
$placeg    = $paquet->get_infoj('placeg');

echo '
<table class=\'tableau centrer_tab\'>
	<tr class=\'tableau_header\'>
		<td>&nbsp;'._('Bâtiment').'&nbsp;</td>
		<td>&nbsp;'._('Nombre').'&nbsp;</td>
		<td>&nbsp;'._('Terrain').'&nbsp;</td>
		<td>&nbsp;'._('Production').'&nbsp;</td>
		<td>&nbsp;'._('Consommation').'&nbsp;</td>
	</tr>';

$i=0;
foreach($constructions as $bat => $value) {
	if($value -> nb > 0) {
	echo'<tr class="tableau_fond2"><td colspan="5"></td></tr>';

	echo '<tr class="tableau_fond'.($i%2).'">
	<td class="gauche">&nbsp;<a href="'._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'._($value -> nom2).'">'.$batiments[$value -> nom2]['nom'].'</a>&nbsp;';
	
	if($bat == 'hall') {
			if(!empty($liste_autels->sacrifice_hera)) {
				echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'._('Statues').'-'.
						 _('sacrifice_hera').'">'._('Sacrifice d\'Héra').'</a>';
			}
			
			if(!empty($liste_autels->defense_gaia)) {
				echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'._('Statues').'-'.
						 _('defense_gaia').'">'._('Défense de Gaia').'</a>';
			}
			
			if(!empty($liste_autels->strategie_hippodamos)) {
				echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'._('Statues').'-'.
						 _('strategie_hippodamos').'">'._('Stratégie d\'Hippodamos').'</a>';
			}
			
			if(!empty($liste_autels->sauvegarde_ombre)) {
				echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'._('Statues').'-'.
						 _('sauvegarde_ombre').'">'._('Faveur de l\'Érèbe').'</a>';
			}
	}
	
	echo '
	</td>
	<td class="centrer" valign="top">&nbsp;'.nbf($value -> nb).'&nbsp;</td>
	<td class="centrer" valign="top">&nbsp;'.nbf($value -> terrain*$value -> nb).'&nbsp;';
	
	if($bat == 'hall') {
			if(!empty($liste_autels->sacrifice_hera)) {
				echo '<br/>&nbsp;80&nbsp;';
			}
			
			if(!empty($liste_autels->defense_gaia)) {
				echo '<br/>&nbsp;80&nbsp;';
			}
			
			if(!empty($liste_autels->strategie_hippodamos)) {
				echo '<br/>&nbsp;80&nbsp;';
			}
			
			if(!empty($liste_autels->sauvegarde_ombre)) {
				echo '<br/>&nbsp;80&nbsp;';
			}
	}
	
	echo '	
	</td>
	<td>&nbsp;';
			if(!empty($value -> proddrachme)) {
				echo nbf(floor($value -> nb*$value -> proddrachme*$prod_bonus->drachme)).' '.imress('drachme');
			}
			
			if(!empty($value -> prodnourriture)) {
				echo nbf($value -> nb*$value -> prodnourriture*$prod_bonus->nourriture).' '.imress('nourriture');
			}
			
			if(!empty($value -> prodeau)) {
				echo nbf($value -> nb*$value -> prodeau*$prod_bonus->eau).' '.imress('eau');
			}
			
			if(!empty($value -> prodbois)) {
				echo nbf($value -> nb*$value -> prodbois*$prod_bonus->bois).' '.imress('bois');
			}
			
			if(!empty($value -> prodfer)) {
				echo nbf($value -> nb*$value -> prodfer*$prod_bonus->fer).' '.imress('fer');
			}
			
			if(!empty($value -> prodargent)) {
				echo nbf($value -> nb*$value -> prodargent*$prod_bonus->argent).' '.imress('argent');
			}
			
			if(!empty($value -> prodpierre)) {
				echo nbf($value -> nb*$value -> prodpierre*$prod_bonus->pierre).' '.imress('pierre');
			}
			
			if(!empty($value -> prodmarbre)) {
				echo nbf($value -> nb*$value -> prodmarbre*$prod_bonus->marbre).' '.imress('marbre');
			}
			
			if(!empty($value -> prodraisin)) {
				echo nbf($value -> nb*$value -> prodraisin*$prod_bonus->raisin).' '.imress('raisin');
			}
			
			if(!empty($value -> prodvin)) {
				echo nbf($value -> nb*$value -> prodvin*$prod_bonus->vin).' '.imress('vin');
			}
			
			if(!empty($value -> prodor)) {
				echo nbf($value -> nb*$value -> prodor*$prod_bonus->gold).' '.imress('or');
			}
	
			if(!empty($value -> placen)) {
				echo nbf($placen_nb).'/'.nbf($placen, 0);
			}
			
			if(!empty($value -> placel)) {
				echo nbf($placel_nb).'/'.nbf($placel, 0);
			}
			
			if(!empty($value -> placeg)) {
				echo nbf($placeg_nb).'/'.nbf($placeg, 0);
			}
	
			if(!empty($value->type) && ($value->type==2)) {
				echo nbf(round($value -> defense * $value->nb)).' '.img('images/attaques/bouclier.png', 'defense');					
					}
					
	echo '&nbsp;</td><td>&nbsp;';
	
			if(!empty($value -> consodrachme)) {
				echo nbf($value -> nb*$value -> consodrachme).' '.imress('drachme');
			}
			
			if(!empty($value -> consonourriture)) {
				echo nbf($value -> nb*$value -> consonourriture).' '.imress('nourriture');
			}
			
			if(!empty($value -> consoeau)) {
				echo nbf($value -> nb*$value -> consoeau).' '.imress('eau');
			}
			
			if(!empty($value -> consobois)) {
				echo nbf($value -> nb*$value -> consobois).' '.imress('bois');
			}
			
			if(!empty($value -> consofer)) {
				echo nbf($value -> nb*$value -> consofer).' '.imress('fer');
			}
			
			if(!empty($value -> consoargent)) {
				echo nbf($value -> nb*$value -> consoargent).' '.imress('argent');
			}
			
			if(!empty($value -> consopierre)) {
				echo nbf($value -> nb*$value -> consopierre).' '.imress('pierre');
			}
			
			if(!empty($value -> consomarbre)) {
				echo nbf($value -> nb*$value -> consomarbre).' '.imress('marbre');
			}
			
			if(!empty($value -> consoraisin)) {
				echo nbf($value -> nb*$value -> consoraisin).' '.imress('raisin');
			}
			
			if(!empty($value -> consovin)) {
				echo nbf($value -> nb*$value -> consovin).' '.imress('vin');
			}
			
			if(!empty($value -> consoor)) {
				echo nbf($value -> nb*$value -> consoor).' '.imress('or');
			}
			
	echo '&nbsp;</td>
			</tr>';		
			$i++;	
		}
	}
	
	echo '</table>';

if(sizeof($temples) > 0) {
	$i=0;
	echo '<br/>
	<table class=\'tableau centrer_tab\'>
	<tr class=\'tableau_header\'>
	<td>&nbsp;Temple&nbsp;</td><td class="centrer" >&nbsp;Terrain&nbsp;</td></tr>';

	if(in_array('apollon', $temples)) {
		$i++;
		echo'<tr class="tableau_fond2"><td colspan="2"></td></tr>';
		echo '<tr class="tableau_fond'.($i%2).'"> <td class="gauche">&nbsp;<a href="'.('Temples').'-'.('apollon').'">'._('Temple d\'Apollon').'</a>&nbsp;</td> <td class="centrer">&nbsp;200&nbsp;</td> </tr>';
	}
	
	if(in_array('demeter', $temples)) {
		$i++;
		echo'<tr class="tableau_fond2"><td colspan="2"></td></tr>';
		echo '<tr class="tableau_fond'.($i%2).'"> <td class="gauche">&nbsp;<a href="'.('Temples').'-'._('demeter').'">'._('Temple de Demeter').'</a>&nbsp;</td> <td class="centrer">&nbsp;200&nbsp;</td> </tr>';
	}
	
	if(in_array('hermes', $temples)) {
		$i++;
		echo'<tr class="tableau_fond2"><td colspan="2"></td></tr>';
		echo '<tr class="tableau_fond'.($i%2).'"> <td class="gauche">&nbsp;<a href="'.('Temples').'-'._('hermes').'">'._('Temple d\'Hermès').'</a>&nbsp;</td> <td class="centrer">&nbsp;200&nbsp;</td> </tr>';
	}
	
	if(in_array('ares', $temples)) {
		$i++;
		echo'<tr class="tableau_fond2"><td colspan="2"></td></tr>';
		echo '<tr class="tableau_fond'.($i%2).'"> <td class="gauche">&nbsp;<a href="'.('Temples').'-'._('ares').'">'._('Temple d\'Arès').'</a>&nbsp;</td> <td class="centrer">&nbsp;500&nbsp;</td> </tr>';
	}
	
	if(in_array('athena', $temples)) {
		$i++;
		echo'<tr class="tableau_fond2"><td colspan="2"></td></tr>';
		echo '<tr class="tableau_fond'.($i%2).'"> <td class="gauche">&nbsp;<a href="'.('Temples').'-'._('athena').'">'._('Temple d\'Athéna').'</a>&nbsp;</td> <td class="centrer">&nbsp;500&nbsp;</td> </tr>';
	}
	
	if(in_array('artemis', $temples)) {
		$i++;
		echo'<tr class="tableau_fond2"><td colspan="2"></td></tr>';
		echo '<tr class="tableau_fond'.($i%2).'"> <td class="gauche">&nbsp;<a href="'.('Temples').'-'._('artemis').'">'._('Temple d\'Artémis').'</a>&nbsp;</td> <td class="centrer">&nbsp;1 000&nbsp;</td> </tr>';
	}
	
	if(in_array('dionysos', $temples)) {
		$i++;
		echo'<tr class="tableau_fond2"><td colspan="2"></td></tr>';
		echo '<tr class="tableau_fond'.($i%2).'"> <td class="gauche">&nbsp;<a href="'.('Temples').'-'._('dionysos').'">'._('Temple de Dionysos').'</a>&nbsp;</td> <td class="centrer">&nbsp;1 000&nbsp;</td> </tr>';
	}
	
	if(in_array('hephaistos', $temples)) {
		$i++;
		echo'<tr class="tableau_fond2"><td colspan="2"></td></tr>';
		echo '<tr class="tableau_fond'.($i%2).'"> <td class="gauche">&nbsp;<a href="'.('Temples').'-'._('hephaistos').'">'._('Temple d\'Héphaïstos').'</a>&nbsp;</td> <td class="centrer">&nbsp;1 000&nbsp;</td> </tr>';
	}
	
	if(in_array('zeus', $temples)) {
		$i++;
		echo'<tr class="tableau_fond2"><td colspan="2"></td></tr>';
		echo '<tr class="tableau_fond'.($i%2).'"> <td class="gauche">&nbsp;<a href="'.('Temples').'-'._('zeus').'">'._('Temple de Zeus').'</a>&nbsp;</td> <td class="centrer">&nbsp;2 000&nbsp;</td> </tr>';
	}
	
	if(in_array('poseidon', $temples)) {
		$i++;
		echo'<tr class="tableau_fond2"><td colspan="2"></td></tr>';
		echo '<tr class="tableau_fond'.($i%2).'"> <td class="gauche">&nbsp;<a href="'.('Temples').'-'._('poseidon').'">'._('Temple de Poseidon').'</a>&nbsp;</td> <td class="centrer">&nbsp;2 000&nbsp;</td> </tr>';
	}
	
	if(in_array('hades', $temples)) {
		$i++;
		echo'<tr class="tableau_fond2"><td colspan="2"></td></tr>';
		echo '<tr class="tableau_fond'.($i%2).'"> <td class="gauche">&nbsp;<a href="'.('Temples').'-'._('hades').'">'._('Temple d\'Hadès').'</a>&nbsp;</td> <td class="centrer">&nbsp;2 000&nbsp;</td> </tr>';
	}
	
echo '</table>';
}

?>