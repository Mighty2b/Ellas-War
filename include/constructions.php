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
<table>
<thead>
	<tr class=\'tableau_header\'>
		<td>&nbsp;&nbsp;</td>
		<td>'._('Nombre').'</td>
		<td>'._('Terrain').'</td>
		<td>'._('Production').'</td>
		<td>'._('Consommation').'</td>
	</tr>
</thead>
<tfoot>
</tfoot>
<tbody>';

$i=0;
foreach($constructions as $bat => $value) {
	if($value -> nb > 0) {
	echo '<tr>
	<td class="gauche">&nbsp;<a href="'._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'._($value -> nom2).'">'.$batiments[$value -> nom2]['nom'].'</a>&nbsp;';
	
	if($bat == 'hall') {
			if(!empty($liste_autels->sacrifice_hera)) {
				echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'._('statues').'-'.
						 _('sacrifice_hera').'" class="normal">'._('Sacrifice d\'Héra').'</a>';
			}
			
			if(!empty($liste_autels->defense_gaia)) {
				echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'._('statues').'-'.
						 _('defense_gaia').'" class="normal">'._('Défense de Gaia').'</a>';
			}
			
			if(!empty($liste_autels->strategie_hippodamos)) {
				echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'._('statues').'-'.
						 _('strategie_hippodamos').'" class="normal">'._('Stratégie d\'Hippodamos').'</a>';
			}
			
			if(!empty($liste_autels->sauvegarde_ombre)) {
				echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'._('statues').'-'.
						 _('sauvegarde_ombre').'" class="normal">'._('Faveur de l\'Érèbe').'</a>';
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
		}
	}
	
	echo '</tbody></table>';

if(sizeof($temples) > 0) {
	$i=0;
	echo '<br/>
	<table class=\'tableau centrer_tab\'>
<thead>
	<tr class=\'tableau_header\'>
	<td>&nbsp;&nbsp;</td><td class="centrer" >Terrain</td></tr>
</thead>
<tfoot>
</tfoot>
<tbody>';

	if(in_array('apollon', $temples)) {
		echo '<tr> <td class="gauche">&nbsp;<a href="'.('temples').'-'.('apollon').'">'._('Temple d\'Apollon').'</a>&nbsp;</td> <td class="centrer">&nbsp;200&nbsp;</td> </tr>';
	}
	
	if(in_array('demeter', $temples)) {
		echo '<tr> <td class="gauche">&nbsp;<a href="'.('temples').'-'._('demeter').'">'._('Temple de Demeter').'</a>&nbsp;</td> <td class="centrer">&nbsp;200&nbsp;</td> </tr>';
	}
	
	if(in_array('hermes', $temples)) {
		echo '<tr> <td class="gauche">&nbsp;<a href="'.('temples').'-'._('hermes').'">'._('Temple d\'Hermès').'</a>&nbsp;</td> <td class="centrer">&nbsp;200&nbsp;</td> </tr>';
	}
	
	if(in_array('ares', $temples)) {
		echo '<tr> <td class="gauche">&nbsp;<a href="'.('temples').'-'._('ares').'">'._('Temple d\'Arès').'</a>&nbsp;</td> <td class="centrer">&nbsp;500&nbsp;</td> </tr>';
	}
	
	if(in_array('athena', $temples)) {
		echo '<tr> <td class="gauche">&nbsp;<a href="'.('temples').'-'._('athena').'">'._('Temple d\'Athéna').'</a>&nbsp;</td> <td class="centrer">&nbsp;500&nbsp;</td> </tr>';
	}
	
	if(in_array('artemis', $temples)) {
		echo '<tr> <td class="gauche">&nbsp;<a href="'.('temples').'-'._('artemis').'">'._('Temple d\'Artémis').'</a>&nbsp;</td> <td class="centrer">&nbsp;1 000&nbsp;</td> </tr>';
	}
	
	if(in_array('dionysos', $temples)) {
		echo '<tr> <td class="gauche">&nbsp;<a href="'.('temples').'-'._('dionysos').'">'._('Temple de Dionysos').'</a>&nbsp;</td> <td class="centrer">&nbsp;1 000&nbsp;</td> </tr>';
	}
	
	if(in_array('hephaistos', $temples)) {
		echo '<tr> <td class="gauche">&nbsp;<a href="'.('temples').'-'._('hephaistos').'">'._('Temple d\'Héphaïstos').'</a>&nbsp;</td> <td class="centrer">&nbsp;1 000&nbsp;</td> </tr>';
	}
	
	if(in_array('zeus', $temples)) {
		echo '<tr> <td class="gauche">&nbsp;<a href="'.('temples').'-'._('zeus').'">'._('Temple de Zeus').'</a>&nbsp;</td> <td class="centrer">&nbsp;2 000&nbsp;</td> </tr>';
	}
	
	if(in_array('poseidon', $temples)) {
		echo '<tr> <td class="gauche">&nbsp;<a href="'.('temples').'-'._('poseidon').'">'._('Temple de Poseidon').'</a>&nbsp;</td> <td class="centrer">&nbsp;2 000&nbsp;</td> </tr>';
	}
	
	if(in_array('hades', $temples)) {
		echo '<tr> <td class="gauche">&nbsp;<a href="'.('temples').'-'._('hades').'">'._('Temple d\'Hadès').'</a>&nbsp;</td> <td class="centrer">&nbsp;2 000&nbsp;</td> </tr>';
	}
	
echo '
</tbody>
</table>';
}

?>