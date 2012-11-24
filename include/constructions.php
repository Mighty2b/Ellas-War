<?php

include('lang/'.LANG.'/donnees/batiments.php');

$constructions = $paquet->get_batiments();
$prod_bonus = $paquet->get_bonus_prod();
$liste_autels = $paquet->liste_autels();

//Les infos sur les logements
$placen_nb = $paquet->get_placen_nb();
$placen    = $paquet->get_placen();
$placel_nb = $paquet->get_placel_nb();
$placel    = $paquet->get_placel();
$placeg_nb = $paquet->get_placeg_nb();
$placeg    = $paquet->get_placeg();

$paquet->display();

echo '
<table class=\'tableau centrer_tableau\'>
	<tr class=\'tableau_header\'>
		<td>&nbsp;'.$txt_batiment.'&nbsp;</td>
		<td>&nbsp;'.$txt_nombre.'&nbsp;</td>
		<td>&nbsp;'.$txt_terrain.'&nbsp;</td>
		<td>&nbsp;'.$txt_product.'&nbsp;</td>
		<td>&nbsp;'.$txt_conso.'&nbsp;</td>
	</tr>';

$i=0;
	foreach($constructions as $bat => $value) {
		if($value -> nb > 0) {
	echo'<tr class="tableau_fond2"><td colspan="5"></td></tr>';

	echo '<tr class="tableau_fond'.($i%2).'">
	<td class="gauche">&nbsp;<a href="'.trad_to_page('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.trad_to_page($value -> nom2).'">'.$batiments[$value -> nom2]['nom'].'</a>&nbsp;';
	
	if($bat == 'hall') {
			if(!empty($liste_autels->sacrifice_hera)) {
				echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.trad_to_page('Statues').'-'.
						 $statues_donnees['sacrifice_hera']['url'].'">'.$statues_donnees['sacrifice_hera']['nom'].'</a>';
			}
			
			if(!empty($liste_autels->defense_gaia)) {
				echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.trad_to_page('Statues').'-'.
						 $statues_donnees['defense_gaia']['url'].'">'.$statues_donnees['defense_gaia']['nom'].'</a>';
			}
			
			if(!empty($liste_autels->strategie_hippodamos)) {
				echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.trad_to_page('Statues').'-'.
						 $statues_donnees['strategie_hippodamos']['url'].'">'.$statues_donnees['strategie_hippodamos']['nom'].'</a>';
			}
			
			if(!empty($liste_autels->sauvegarde_ombre)) {
				echo '<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="'.trad_to_page('Statues').'-'.
						 $statues_donnees['sauvegarde_ombre']['url'].'">'.$statues_donnees['sauvegarde_ombre']['nom'].'</a>';
			}
	}
	
	echo '
	</td>
	<td class="centrer" valign="top">&nbsp;'.nbf($value -> nb).'&nbsp;</td>
	<td class="centrer" valign="top">&nbsp;'.nbf($value -> terrain*$value -> nb).'&nbsp;</td>
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

$temples = $paquet->getTemples();

if(sizeof($temples) > 0) {
	$i=0;
	echo '<br/>
	<table class=\'tableau centrer_tableau\'>
	<tr class=\'tableau_header\'>
	<td>&nbsp;Temple&nbsp;</td><td class="centrer" >&nbsp;Terrain&nbsp;</td></tr>';

	if(in_array('apollon', $temples)) {
		$i++;
		echo'<tr class="tableau_fond2"><td colspan="2"></td></tr>';
		echo '<tr class="tableau_fond'.($i%2).'"> <td class="gauche">&nbsp;<a href="Temples-apollon">'.$temples_donnees['apollon']['nom'].'</a>&nbsp;</td> <td class="centrer">&nbsp;200&nbsp;</td> </tr>';
	}
	
	if(in_array('demeter', $temples)) {
		$i++;
		echo'<tr class="tableau_fond2"><td colspan="2"></td></tr>';
		echo '<tr class="font_classement'.($i%2).'"> <td class="gauche">&nbsp;<a href="Temples-demeter">'.$temples_donnees['demeter']['nom'].'</a>&nbsp;</td> <td class="centrer">&nbsp;200&nbsp;</td> </tr>';
	}
	
	if(in_array('hermes', $temples)) {
		$i++;
		echo'<tr class="tableau_fond2"><td colspan="2"></td></tr>';
		echo '<tr class="font_classement'.($i%2).'"> <td class="gauche">&nbsp;<a href="Temples-hermes">'.$temples_donnees['hermes']['nom'].'</a>&nbsp;</td> <td class="centrer">&nbsp;200&nbsp;</td> </tr>';
	}
	
	if(in_array('ares', $temples)) {
		$i++;
		echo'<tr class="tableau_fond2"><td colspan="2"></td></tr>';
		echo '<tr class="font_classement'.($i%2).'"> <td class="gauche">&nbsp;<a href="Temples-ares">'.$temples_donnees['ares']['nom'].'</a>&nbsp;</td> <td class="centrer">&nbsp;500&nbsp;</td> </tr>';
	}
	
	if(in_array('athena', $temples)) {
		$i++;
		echo'<tr class="tableau_fond2"><td colspan="2"></td></tr>';
		echo '<tr class="font_classement'.($i%2).'"> <td class="gauche">&nbsp;<a href="Temples-athena">'.$temples_donnees['athena']['nom'].'</a>&nbsp;</td> <td class="centrer">&nbsp;500&nbsp;</td> </tr>';
	}
	
	if(in_array('artemis', $temples)) {
		$i++;
		echo'<tr class="tableau_fond2"><td colspan="2"></td></tr>';
		echo '<tr class="font_classement'.($i%2).'"> <td class="gauche">&nbsp;<a href="Temples-artemis">'.$temples_donnees['artemis']['nom'].'</a>&nbsp;</td> <td class="centrer">&nbsp;1 000&nbsp;</td> </tr>';
	}
	
	if(in_array('dionysos', $temples)) {
		$i++;
		echo'<tr class="tableau_fond2"><td colspan="2"></td></tr>';
		echo '<tr class="font_classement'.($i%2).'"> <td class="gauche">&nbsp;<a href="Temples-dionysos">'.$temples_donnees['dionysos']['nom'].'</a>&nbsp;</td> <td class="centrer">&nbsp;1 000&nbsp;</td> </tr>';
	}
	
	if(in_array('hephaistos', $temples)) {
		$i++;
		echo'<tr class="tableau_fond2"><td colspan="2"></td></tr>';
		echo '<tr class="font_classement'.($i%2).'"> <td class="gauche">&nbsp;<a href="Temples-hephaistos">'.$temples_donnees['hephaistos']['nom'].'</a>&nbsp;</td> <td class="centrer">&nbsp;1 000&nbsp;</td> </tr>';
	}
	
	if(in_array('zeus', $temples)) {
		$i++;
		echo'<tr class="tableau_fond2"><td colspan="2"></td></tr>';
		echo '<tr class="font_classement'.($i%2).'"> <td class="gauche">&nbsp;<a href="Temples-zeus">'.$temples_donnees['zeus']['nom'].'</a>&nbsp;</td> <td class="centrer">&nbsp;2 000&nbsp;</td> </tr>';
	}
	
	if(in_array('poseidon', $temples)) {
		$i++;
		echo'<tr class="tableau_fond2"><td colspan="2"></td></tr>';
		echo '<tr class="font_classement'.($i%2).'"> <td class="gauche">&nbsp;<a href="Temples-poseidon">'.$temples_donnees['poseidon']['nom'].'</a>&nbsp;</td> <td class="centrer">&nbsp;2 000&nbsp;</td> </tr>';
	}
	
	if(in_array('hades', $temples)) {
		$i++;
		echo'<tr class="tableau_fond2"><td colspan="2"></td></tr>';
		echo '<tr class="font_classement'.($i%2).'"> <td class="gauche">&nbsp;<a href="Temples-hades">'.$temples_donnees['hades']['nom'].'</a>&nbsp;</td> <td class="centrer">&nbsp;2 000&nbsp;</td> </tr>';
	}
	
echo '</table>';
}

?>