<?php

include('donnees/batiments.php');
include('donnees/unites.php');

$ress_var     = $paquet->get_infoj('ress_var');
$var_ress     = $paquet->get_ress();
$liste_bat    = $paquet->get_infoj('liste_batiments');
$prod_bonus   = $paquet->get_infoj('prod_bonus');
$cotise_volontaire = $paquet->get_infoj('cotise_volontaire');
$meteo       = $paquet->get_infoj('meteo');

if(empty($meteo)) {
	$meteo = _('soleil');
}

if(!empty($paquet->get_infoj('alliance'))) {
	$cotisation = $paquet->get_infoj('cotisation');
}
else {
	$cotisation = null;
}

$liste_unites = $paquet->get_infoj('liste_unites');

if(empty($_GET['var1'])) {
  $_GET['var1'] = 0;
}

switch($_GET['var1']) {
  case 1:
    $titre = _('Évolution de vos ressources sur 1 heure');
    $temps = 24;
  break;

  case 2:
    $titre = _('Évolution de vos ressources sur 2 heures');
    $temps = 12;
  break;

  case 3:
    $titre = _('Évolution de vos ressources sur 6 heures');
    $temps = 4;
  break;

  case 4:
    $titre = _('Évolution de vos ressources sur 12 heures');
    $temps = 2;
  break;

  case 5:
    $titre = _('Évolution de vos ressources sur 2 jours');
    $temps = 0.5;
  break;

  case 6:
    $titre = _('Évolution de vos ressources sur 3 jours');
    $temps = 1/3;
  break;

  case 7:
    $titre = _('Évolution de vos ressources sur 5 jours');
    $temps = 0.2;
  break;

  case 8:
    $titre = _('Évolution de vos ressources sur 7 jours');
    $temps = 1/7;
  break;

  case 9:
    $titre = _('Évolution de vos ressources sur 14 jours');
    $temps = 1/14;
  break;

  default:
    $titre = _('Évolution de vos ressources sur 24 heures');
    $temps = 1;
  break;
}

$conso_dra = '';
$conso_nou = '';
$conso_eau = '';
$conso_bois= '';
$conso_fer = '';
$conso_arg = '';
$conso_pie = '';
$conso_mar = '';
$conso_rai = '';
$conso_vin = '';
$conso_or  = '';

$prod_dra = '';
$prod_nou = '';
$prod_eau = '';
$prod_bois= '';
$prod_fer = '';
$prod_arg = '';
$prod_pie = '';
$prod_mar = '';
$prod_rai = '';
$prod_vin = '';
$prod_or  = '';

	foreach($liste_bat as $bat => $value) {
	
		if(!empty($value -> consodrachme) && ($value -> nb > 0)) {
			$conso_dra.='- '.nbf($value -> nb*$value -> consodrachme/$temps).' '.img('images/ress/drachme.jpg', 'drachme').' <a href=\''._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$batiments[$value->nom2]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> consonourriture) && ($value -> nb > 0)) {
$conso_nou.='- '.nbf($value -> nb*$value -> consonourriture/$temps).' '.img('images/ress/nourriture.jpg', 'nourriture').' <a href=\''._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$batiments[$value->nom2]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> consoeau) && ($value -> nb > 0)) {
$conso_eau.='- '.nbf($value -> nb*$value -> consoeau/$temps).' '.img('images/ress/eau.jpg', 'eau').' <a href=\''._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$batiments[$value->nom2]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> consobois) && ($value -> nb > 0)) {
$conso_bois .='- '.nbf($value -> nb*$value -> consobois/$temps).' '.img('images/ress/bois.jpg', 'bois').' <a href=\''._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$batiments[$value->nom2]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> consofer) && ($value -> nb > 0)) {
$conso_fer .='- '.nbf($value -> nb*$value -> consofer/$temps).' '.img('images/ress/fer.jpg', 'fer').' <a href=\''._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$batiments[$value->nom2]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> consoargent) && ($value -> nb > 0)) {
$conso_arg .='- '.nbf($value -> nb*$value -> consoargent/$temps).' '.img('images/ress/argent.jpg', 'argent').' <a href=\''._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$batiments[$value->nom2]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> consopierre) && ($value -> nb > 0)) {
$conso_pie .='- '.nbf($value -> nb*$value -> consopierre/$temps).' '.img('images/ress/pierre.jpg', 'pierre').' <a href=\''._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$batiments[$value->nom2]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> consomarbre) && ($value -> nb > 0)) {
$conso_mar .='- '.nbf($value -> nb*$value -> consomarbre/$temps).' '.img('images/ress/marbre.jpg', 'marbre').' <a href=\''._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$batiments[$value->nom2]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> consoraisin) && ($value -> nb > 0)) {
$conso_rai .='- '.nbf($value -> nb*$value -> consoraisin/$temps).' '.img('images/ress/raisin.jpg', 'raisin').' <a href=\''._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$batiments[$value->nom2]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> consovin) && ($value -> nb > 0)) {
$conso_vin .='- '.nbf($value -> nb*$value -> consovin/$temps).' '.img('images/ress/vin.jpg', 'vin').' <a href=\''._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$batiments[$value->nom2]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> consoor) && ($value -> nb > 0)) {
$conso_or .='- '.nbf($value -> nb*$value -> consoor/$temps).' '.img('images/ress/or.jpg', 'or').' <a href=\''._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$batiments[$value->nom2]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> proddrachme) && ($value -> nb > 0)) {
$prod_dra.=' '.plus_valeur(floor(($value -> nb*$value -> proddrachme*$prod_bonus->drachme)/$temps)).' '.img('images/ress/drachme.jpg', 'drachme').' <a href=\''._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$batiments[$value->nom2]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> prodnourriture) && ($value -> nb > 0)) {
$prod_nou.=' '.plus_valeur($value -> nb*$value -> prodnourriture*$prod_bonus->nourriture/$temps).' '.img('images/ress/nourriture.jpg', 'nourriture').' <a href=\''._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$batiments[$value->nom2]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> prodeau) && ($value -> nb > 0)) {
$prod_eau.=' '.plus_valeur($value -> nb*$value -> prodeau*$prod_bonus->eau/$temps).' '.img('images/ress/eau.jpg', 'eau').' <a href=\''._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$batiments[$value->nom2]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> prodbois) && ($value -> nb > 0)) {
$prod_bois .=' '.plus_valeur($value -> nb*$value -> prodbois*$prod_bonus->bois/$temps).' '.img('images/ress/bois.jpg', 'bois').' <a href=\''._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$batiments[$bat]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> prodfer) && ($value -> nb > 0)) {
$prod_fer .=' '.plus_valeur($value -> nb*$value -> prodfer*$prod_bonus->fer/$temps).' '.img('images/ress/fer.jpg', 'fer').' <a href=\''._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$batiments[$bat]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> prodargent) && ($value -> nb > 0)) {
$prod_arg .=' '.plus_valeur($value -> nb*$value -> prodargent*$prod_bonus->argent/$temps).' '.img('images/ress/argent.jpg', 'argent').' <a href=\''._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$batiments[$value->nom2]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> prodpierre) && ($value -> nb*$prod_bonus->pierre > 0)) {
$prod_pie .=' '.plus_valeur($value -> nb*$value -> prodpierre*$prod_bonus->pierre/$temps).' '.img('images/ress/pierre.jpg', 'pierre').' <a href=\''._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$batiments[$value->nom2]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> prodmarbre) && ($value -> nb*$prod_bonus->marbre > 0)) {
$prod_mar .=' '.plus_valeur($value -> nb*$value -> prodmarbre*$prod_bonus->marbre/$temps).' '.img('images/ress/marbre.jpg', 'marbre').' <a href=\''._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$batiments[$value->nom2]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> prodraisin) && ($value -> nb > 0)) {
$prod_rai .=' '.plus_valeur($value -> nb*$value -> prodraisin*$prod_bonus->raisin/$temps).' '.img('images/ress/raisin.jpg', 'raisin').' <a href=\''._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$batiments[$value->nom2]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> prodvin) && ($value -> nb > 0)) {
$prod_vin .=' '.plus_valeur($value -> nb*$value -> prodvin*$prod_bonus->vin/$temps).' '.img('images/ress/vin.jpg', 'vin').' <a href=\''._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$batiments[$value->nom2]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> prodor) && ($value -> nb > 0)) {
$prod_or .=' '.plus_valeur($value -> nb*$value -> prodor*$prod_bonus->gold/$temps).' '.img('images/ress/or.jpg', 'or').' <a href=\''._('construire').'-'.$batiments[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$batiments[$value->nom2]['nom'].'</a><br/>';
		}

	}

	foreach($liste_unites as $bat => $value) {
		if(!empty($value -> consodrachme) && ($value -> nb > 0)) {
$conso_dra.='- '.nbf($value -> nb*$value -> consodrachme/$temps, 2).' '.img('images/ress/drachme.jpg', 'drachme').' <a href=\''._('engager').'-'.$unites[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$unites[$bat]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> consonourriture) && ($value -> nb > 0)) {
$conso_nou.='- '.nbf($value -> nb*$value -> consonourriture/$temps, 2).' '.img('images/ress/nourriture.jpg', 'nourriture').' <a href=\''._('engager').'-'.$unites[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$unites[$bat]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> consoeau) && ($value -> nb > 0)) {
$conso_eau.='- '.nbf($value -> nb*$value -> consoeau/$temps, 2).' '.img('images/ress/eau.jpg', 'eau').' <a href=\''._('engager').'-'.$unites[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$unites[$bat]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> consobois) && ($value -> nb > 0)) {
$conso_bois .='- '.nbf($value -> nb*$value -> consobois/$temps, 2).' '.img('images/ress/bois.jpg', 'bois').' <a href=\''._('engager').'-'.$unites[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$unites[$bat]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> consofer) && ($value -> nb > 0)) {
$conso_fer .='- '.nbf($value -> nb*$value -> consofer/$temps, 2).' '.img('images/ress/fer.jpg', 'fer').' <a href=\''._('engager').'-'.$unites[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$unites[$bat]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> consoargent) && ($value -> nb > 0)) {
$conso_arg .='- '.nbf($value -> nb*$value -> consoargent/$temps, 2).' '.img('images/ress/argent.jpg', 'argent').' <a href=\''._('engager').'-'.$unites[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$unites[$bat]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> consopierre) && ($value -> nb > 0)) {
$conso_pie .='- '.nbf($value -> nb*$value -> consopierre/$temps, 2).' '.img('images/ress/pierre.jpg', 'pierre').' <a href=\''._('engager').'-'.$unites[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$unites[$bat]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> consomarbre) && ($value -> nb > 0)) {
$conso_mar .='- '.nbf($value -> nb*$value -> consomarbre/$temps, 2).' '.img('images/ress/marbre.jpg', 'marbre').' <a href=\''._('engager').'-'.$unites[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$unites[$bat]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> consoraisin) && ($value -> nb > 0)) {
$conso_rai .='- '.nbf($value -> nb*$value -> consoraisin/$temps, 2).' '.img('images/ress/raisin.jpg', 'raisin').' <a href=\''._('engager').'-'.$unites[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$unites[$bat]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> consovin) && ($value -> nb > 0)) {
$conso_vin .='- '.nbf($value -> nb*$value -> consovin/$temps, 2).' '.img('images/ress/vin.jpg', 'vin').' <a href=\''._('engager').'-'.$unites[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$unites[$bat]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> consoor) && ($value -> nb > 0)) {
$conso_or .='- '.nbf($value -> nb*$value -> consoor/$temps, 2).' '.img('images/ress/or.jpg', 'or').' <a href=\''._('engager').'-'.$unites[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$unites[$bat]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> proddrachme) && ($value -> nb > 0)) {
$prod_dra.=' '.plus_valeur(floor($value -> nb*$value -> proddrachme/$temps)).' '.img('images/ress/drachme.jpg', 'drachme').' <a href=\''._('engager').'-'.$unites[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$unites[$bat]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> prodnourriture) && ($value -> nb > 0)) {
$prod_nou.=' '.plus_valeur($value -> nb*$value -> prodnourriture/$temps).' '.img('images/ress/nourriture.jpg', 'nourriture').' <a href=\''._('engager').'-'.$unites[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$unites[$bat]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> prodeau) && ($value -> nb > 0)) {
$prod_eau.=' '.plus_valeur($value -> nb*$value -> prodeau/$temps).' '.img('images/ress/eau.jpg', 'eau').' <a href=\''._('engager').'-'.$unites[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$unites[$bat]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> prodbois) && ($value -> nb > 0)) {
$prod_bois .=' '.plus_valeur($value -> nb*$value -> prodbois/$temps).' '.img('images/ress/bois.jpg', 'bois').' <a href=\''._('engager').'-'.$unites[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$unites[$bat]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> prodfer) && ($value -> nb > 0)) {
$prod_fer .=' '.plus_valeur($value -> nb*$value -> prodfer/$temps).' '.img('images/ress/fer.jpg', 'fer').' <a href=\''._('engager').'-'.$unites[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$unites[$bat]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> prodargent) && ($value -> nb > 0)) {
$prod_arg .=' '.plus_valeur($value -> nb*$value -> prodargent/$temps).' '.img('images/ress/argent.jpg', 'argent').' <a href=\''._('engager').'-'.$unites[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$unites[$bat]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> prodpierre) && ($value -> nb > 0)) {
$prod_pie .=' '.plus_valeur($value -> nb*$value -> prodpierre/$temps).' '.img('images/ress/pierre.jpg', 'pierre').' <a href=\''._('engager').'-'.$unites[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$unites[$bat]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> prodmarbre) && ($value -> nb > 0)) {
$prod_mar .=' '.plus_valeur($value -> nb*$value -> prodmarbre/$temps).' '.img('images/ress/marbre.jpg', 'marbre').' <a href=\''._('engager').'-'.$unites[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$unites[$bat]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> prodraisin) && ($value -> nb > 0)) {
$prod_rai .=' '.plus_valeur($value -> nb*$value -> prodraisin/$temps).' '.img('images/ress/raisin.jpg', 'raisin').' <a href=\''._('engager').'-'.$unites[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$unites[$bat]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> prodvin) && ($value -> nb > 0)) {
$prod_vin .=' '.plus_valeur($value -> nb*$value -> prodvin/$temps).' '.img('images/ress/vin.jpg', 'vin').' <a href=\''._('engager').'-'.$unites[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$unites[$bat]['nom'].'</a><br/>';
		}
		
		if(!empty($value -> prodor) && ($value -> nb > 0)) {
$prod_or .=' '.plus_valeur($value -> nb*$value -> prodor/$temps).' '.img('images/ress/or.jpg', 'or').' <a href=\''._('engager').'-'.$unites[$value -> nom2]['aff'].'-'.$bat.'\' class="non_souligne">'.$unites[$bat]['nom'].'</a><br/>';
		}
		
	}

		if(!empty($cotisation->drachme)) {
			$conso_dra.='- '.nbf($cotisation->drachme/$temps).' '.img('images/ress/drachme.jpg', 'drachme').' '._('Cotisation').'<br/>';
		}
		
		if(!empty($cotisation->nourriture)) {
			$conso_nou.='- '.nbf($cotisation->nourriture/$temps).' '.img('images/ress/nourriture.jpg', 'nourriture').' '._('Cotisation').'<br/>';
		}
		
		if(!empty($cotisation->eau)) {
			$conso_eau.='- '.nbf($cotisation->eau/$temps).' '.img('images/ress/eau.jpg', 'eau').' '._('Cotisation').'<br/>';
		}
		
		if(!empty($cotisation->bois)) {
			$conso_bois.='- '.nbf($cotisation->bois/$temps).' '.img('images/ress/bois.jpg', 'bois').' '._('Cotisation').'<br/>';
		}
		
		if(!empty($cotisation->fer)) {
			$conso_fer.='- '.nbf($cotisation->fer/$temps).' '.img('images/ress/fer.jpg', 'fer').' '._('Cotisation').'<br/>';
		}
		
		if(!empty($cotisation->argent)) {
			$conso_arg.='- '.nbf($cotisation->argent/$temps).' '.img('images/ress/argent.jpg', 'argent').' '._('Cotisation').'<br/>';
		}
		
		if(!empty($cotisation->pierre)) {
			$conso_pie.='- '.nbf($cotisation->pierre/$temps).' '.img('images/ress/pierre.jpg', 'pierre').' '._('Cotisation').'<br/>';
		}
		
		if(!empty($cotisation->marbre)) {
			$conso_mar.='- '.nbf($cotisation->marbre/$temps).' '.img('images/ress/marbre.jpg', 'marbre').' '._('Cotisation').'<br/>';
		}
		
		if(!empty($cotisation->raisin)) {
			$conso_rai.='- '.nbf($cotisation->raisin/$temps).' '.img('images/ress/raisin.jpg', 'raisin').' '._('Cotisation').'<br/>';
		}
		
		if(!empty($cotisation->vin)) {
			$conso_vin.='- '.nbf($cotisation->vin/$temps).' '.img('images/ress/vin.jpg', 'vin').' '._('Cotisation').'<br/>';
		}
		
		if(!empty($cotisation->gold)) {
			$conso_or.='- '.nbf($cotisation->gold/$temps).' '.img('images/ress/or.jpg', 'or').' '._('Cotisation').'<br/>';
		}

		if($cotise_volontaire > 0) {
			$conso_dra.='-  '.nbf(floor(($paquet->get_cotise_volontaire()*$prod_bonus->drachme * (($liste_bat->atelierf-> nb * $liste_bat->atelierf->proddrachme))/100)/$temps)).' '.img('images/ress/drachme.jpg', 'drachme').' '._('Cotisation volontaire').'<br/>';
		}

echo '<center>
<h2>'.$titre.'</h2>
<br/>
<table class=\'tableau\'>
	<thead>
	<tr class=\'tableau_header\'>
		<td>'._('Production').'</td>
		<td>'._('Consommation').'</td>
		<td>'._('Evolution').'</td>
	</tr>
	</thead>
	<tfoot></tfoot>
	<tbody>';

if(!empty($prod_dra) or !empty($conso_dra)) {
	echo '<tr>
					<td valign=\'top\' class="gauche">'.$prod_dra.'</td>
					<td class="gauche">'.$conso_dra.'</td>
					<td class="droite" nowrap=\'nowrap\'>'.plus_valeur(floor($ress_var->drachme*3600*24/$temps)).' '.img('images/ress/drachme.jpg', 'drachme').'&nbsp;</td>
				</tr>';
}

if(!empty($prod_nou) or !empty($conso_nou)) {
	echo '<tr><td valign=\'top\' class="gauche">'.$prod_nou.'</td><td class="gauche">'.$conso_nou.'</td><td class="droite" nowrap=\'nowrap\'>'.plus_valeur(round($ress_var->nourriture*3600*24/$temps),2).' '.img('images/ress/nourriture.jpg', 'nourriture').'&nbsp;</td></tr>';
}

if(!empty($prod_eau) or !empty($conso_eau)) {
	echo '<tr><td valign=\'top\' class="gauche">'.$prod_eau.'</td><td class="gauche">'.$conso_eau.'</td><td class="droite" nowrap=\'nowrap\'>'.plus_valeur(round($ress_var->eau*3600*24/$temps),2).' '.img('images/ress/eau.jpg', 'eau').'&nbsp;</td></tr>';
}

if(!empty($prod_bois) or !empty($conso_bois)) {
	echo '<tr><td valign=\'top\' class="gauche">'.$prod_bois.'</td><td class="gauche">'.$conso_bois.'</td><td class="droite" nowrap=\'nowrap\'>'.plus_valeur(round($ress_var->bois*3600*24/$temps),2).' '.img('images/ress/bois.jpg', 'bois').'&nbsp;</td></tr>';
}

if(!empty($prod_fer) or !empty($conso_fer)) {
	echo '<tr><td valign=\'top\' class="gauche">'.$prod_fer.'</td><td class="gauche">'.$conso_fer.'</td><td class="droite" nowrap=\'nowrap\'>'.plus_valeur(round($ress_var->fer*3600*24/$temps),2).' '.img('images/ress/fer.jpg', 'fer').'&nbsp;</td></tr>';
}

if(!empty($prod_arg) or !empty($conso_arg)) {
	echo '<tr><td valign=\'top\' class="gauche">'.$prod_arg.'</td><td class="gauche">'.$conso_arg.'</td><td class="droite" nowrap=\'nowrap\'>'.plus_valeur(round($ress_var->argent*3600*24/$temps),2).' '.img('images/ress/argent.jpg', 'argent').'&nbsp;</td></tr>';
}

if(!empty($prod_pie) or !empty($conso_pie)) {
	echo '<tr><td valign=\'top\' class="gauche">'.$prod_pie.'</td><td class="gauche">'.$conso_pie.'</td><td class="droite" nowrap=\'nowrap\'>'.plus_valeur(round($ress_var->pierre*3600*24/$temps),2).' '.img('images/ress/pierre.jpg', 'pierre').'&nbsp;</td></tr>';
}

if(!empty($prod_mar) or !empty($conso_mar)) {
	echo '<tr><td valign=\'top\' class="gauche">'.$prod_mar.'</td><td class="gauche">'.$conso_mar.'</td><td class="droite" nowrap=\'nowrap\'>'.plus_valeur(round($ress_var->marbre*3600*24/$temps),2).' '.img('images/ress/marbre.jpg', 'marbre').'&nbsp;</td></tr>';
}

if(!empty($prod_rai) or !empty($conso_rai)) {
	echo '<tr><td valign=\'top\' class="gauche">'.$prod_rai.'</td><td class="gauche">'.$conso_rai.'</td><td class="droite" nowrap=\'nowrap\'>'.plus_valeur(round($ress_var->raisin*3600*24/$temps),2).' '.img('images/ress/raisin.jpg', 'raisin').'&nbsp;</td></tr>';
}

if(!empty($prod_vin) or !empty($conso_vin)) {
	echo '<tr><td valign=\'top\' class="gauche">'.$prod_vin.'</td><td class="gauche">'.$conso_vin.'</td><td class="droite" nowrap=\'nowrap\'>'.plus_valeur(round($ress_var->vin*3600*24/$temps),2).' '.img('images/ress/vin.jpg', 'vin').'&nbsp;</td></tr>';
}

if(!empty($prod_or) or !empty($conso_or)) {
	echo '<tr><td valign=\'top\' class="gauche">'.$prod_or.'</td><td class="gauche">'.$conso_or.'</td><td class="droite" nowrap=\'nowrap\'>'.plus_valeur(round($ress_var->gold*3600*24/$temps),2).' '.img('images/ress/or.jpg', 'or').'&nbsp;</td></tr>';
}

echo '</tbody>
</table><br/>
<b>'._('Vos ressources sur').' </b>
<select name="temps"
        class="form_retirer" 
        onchange=\'document.location.href="details-"+this.value\'>
  <option value="1" '.($_GET['var1']==1?'
          selected="selected"':'').'>'._('1 heure').'</option>
  <option value="2" '.($_GET['var1']==2?'
          selected="selected"':'').'>'._('2 heures').'</option>
  <option value="3" '.($_GET['var1']==3?'
          selected="selected"':'').'>'._('6 heures').'</option>
  <option value="4" '.($_GET['var1']==4?'
          selected="selected"':'').'>'._('12 heures').'</option>
  <option value="0" '.($_GET['var1']==0?'
          selected="selected"':'').'>'._('24 heures').'</option>
  <option value="5" '.($_GET['var1']==5?'
          selected="selected"':'').'>'._('2 jours').'</option>
  <option value="6" '.($_GET['var1']==6?'
          selected="selected"':'').'>'._('3 jours').'</option>
  <option value="7" '.($_GET['var1']==7?'
          selected="selected"':'').'>'._('5 jours').'</option>
  <option value="8" '.($_GET['var1']==8?'
          selected="selected"':'').'>'._('7 jours').'</option>
  <option value="9" '.($_GET['var1']==9?'
          selected="selected"':'').'>'._('14 jours').'</option>
</select><br/>

<b>'._('Météo').' :</b> '.$meteo;

switch($meteo) {
	case _('canicule'):
		echo '<br/>
		<b>'._('Effet de la météo').' :</b> '.
		_('Augmentation de la production de vin, de la consommation d\'eau et de vin');
	break;
	
	case _('pluie'):
		echo '<br/>
		<b>'._('Effet de la météo').' :</b> '.
		_('Baisse de la production de bois, augmentation des productions de nourriture et de raisin.');
	break;
	
	case _('vent'):
		echo '<br/>
		<b>'._('Effet de la météo').' :</b> '.
		_('Augmentation de la production de bois');
	break;
	
	case _('neige'):
		echo '<br/>
		<b>'._('Effet de la météo').' :</b> '.
		_('Baisse de toutes les productions sauf les drachmes');
	break;
}

if($paquet->get_infoj('lvl') >= 5) {
	echo '
	<br/><br/>
	<a href="'._('gestionmeteo').'" class="erreur">'._('Ne plus subir la météo').'</a>';
}

echo '</center>';

?>