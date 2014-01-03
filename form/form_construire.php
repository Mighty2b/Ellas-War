<?php

include('../header.php');
include('../donnees/batiments.php');
include('../donnees/batiments2.php');

if(!empty($_GET['bat'])) {
	$bat = addslashes($_GET['bat']);
	
	$paquet = new EwPaquet();
	
	if($bat == 'atelierf') {
		$paquet -> add_action('prix_atelierf2');
	}
	
	$paquet -> send_actions();
	
	if($paquet->get_infoj('statu') != 1) {
echo '<script type="text/javascript">
     		document.location.href="'.SITE_URL.'"
			</script>';
	}
	
	$liste = $paquet->get_infoj('liste_batiments');
	if(!empty($liste)) {
	
		if(empty($liste->$bat)) {
			$bat = null;
			//On parcour les bâtiments
			foreach($liste as $b => $a) {
				$bat = $b;
				break;
			}
		}
	
		if(!empty($bat)) {
		
		$value = $liste->$bat;
		
		echo '<div class="liste_batiment ligne">
				<div class="titre_batiment">
					<div class="titre_batiment2"><b>'._($batiments[$bat]['nom']).'</b></div>
				</div>
			<div class="interieur_batiment" id="description_bat_'.$bat.'">';
	
		$prix2=$prix='<br/>';
	
		if(!empty($value -> prixdrachme)) {
			$prix.=' '.nbf($value -> prixdrachme).' '.imress('drachme');
			$prix2.=' '.nbf($value -> prixdrachme*0.6).' '.imress('drachme');
		}
	
		if(!empty($value -> prixnourriture)) {
			$prix.=' '.nbf($value -> prixnourriture).' '.imress('nourriture');
			$prix2.=' '.nbf($value -> prixnourriture*0.6).' '.imress('nourriture');
		}
	
		if(!empty($value -> prixeau)) {
			$prix.=' '.nbf($value -> prixeau).' '.imress('eau');
			$prix2.=' '.nbf($value -> prixeau*0.6).' '.imress('eau');
		}
	
		if(!empty($value -> prixbois)) {
			$prix .=' '.nbf($value -> prixbois).' '.imress('bois');
			$prix2 .=' '.nbf($value -> prixbois*0.6).' '.imress('bois');
		}
	
		if(!empty($value -> prixfer)) {
			$prix .=' '.nbf($value -> prixfer).' '.imress('fer');
			$prix2 .=' '.nbf($value -> prixfer*0.6).' '.imress('fer');
		}
	
		if(!empty($value -> prixargent)) {
			$prix .=' '.nbf($value -> prixargent).' '.imress('argent');
			$prix2 .=' '.nbf($value -> prixargent*0.6).' '.imress('argent');
		}
		
		if(!empty($value -> prixpierre)) {
			$prix .=' '.nbf($value -> prixpierre).' '.imress('pierre');
			$prix2 .=' '.nbf($value -> prixpierre*0.6).' '.imress('pierre');
		}
		
		if(!empty($value -> prixmarbre)) {
			$prix .=' '.nbf($value -> prixmarbre).' '.imress('marbre');
			$prix2 .=' '.nbf($value -> prixmarbre*0.6).' '.imress('marbre');
		}
		
		if(!empty($value -> prixraisin)) {
			$prix .=' '.nbf($value -> prixraisin).' '.imress('raisin');
			$prix2 .=' '.nbf($value -> prixraisin*0.6).' '.imress('raisin');
		}
		
		if(!empty($value -> prixvin)) {
			$prix .=' '.nbf($value -> prixvin).' '.imress('vin');
			$prix2 .=' '.nbf($value -> prixvin*0.6).' '.imress('vin');
		}
		
		if(!empty($value -> prixor)) {
			$prix .=' '.nbf($value -> prixor).' '.imress('gold');
			$prix2 .=' '.nbf($value -> prixor*0.6).' '.imress('gold');
		}
	
		if($bat == 'atelierf') {
			$prix = '<br/>'.$paquet->get_answer('prix_atelierf2')->{1};
		}
	
		$prod='';
		if(!empty($value -> proddrachme)) {
			$prod.=' '.number_format(round($value -> proddrachme,2), 2, ',', ' ').' '.imress('drachme');
		}
		
		if(!empty($value -> prodnourriture)) {
			$prod.=' '.nbf($value -> prodnourriture).' '.imress('nourriture');
		}
		
		if(!empty($value -> prodeau)) {
			$prod.=' '.nbf($value -> prodeau).' '.imress('eau');
		}
		
		if(!empty($value -> prodbois)) {
			$prod .=' '.nbf($value -> prodbois).' '.imress('bois');
		}
		
		if(!empty($value -> prodfer)) {
			$prod .=' '.nbf($value -> prodfer).' '.imress('fer');
		}
		
		if(!empty($value -> prodargent)) {
			$prod .=' '.nbf($value -> prodargent).' '.imress('argent');
		}
		
		if(!empty($value -> prodpierre)) {
			$prod .=' '.nbf($value -> prodpierre*(100-$paquet->getcoef_marbre())/100).' '.imress('pierre');
		}
		
		if(!empty($value -> prodmarbre)) {
			$prod .=' '.nbf($value -> prodmarbre*$paquet->getcoef_marbre()/100).' '.imress('marbre');
		}
		
		if(!empty($value -> prodraisin)) {
			$prod .=' '.nbf($value -> prodraisin).' '.imress('raisin');
		}
		
		if(!empty($value -> prodvin)) {
			$prod .=' '.nbf($value -> prodvin).' '.imress('vin');
		}
		
		if(!empty($value -> prodor)) {
			$prod .=' '.nbf($value -> prodor).' '.imress('gold');
		}
	
		$conso='';
		if(!empty($value -> consodrachme)) {
			$conso.=' '.nbf($value -> consodrachme).' '.imress('drachme');
		}
		
		if(!empty($value -> consonourriture)) {
			$conso.=' '.nbf($value -> consonourriture).' '.imress('nourriture');
		}
		
		if(!empty($value -> consoeau)) {
			$conso.=' '.nbf($value -> consoeau).' '.imress('eau');
		}
		
		if(!empty($value -> consobois)) {
			$conso .=' '.nbf($value -> consobois).' '.imress('bois');
		}
		
		if(!empty($value -> consofer)) {
			$conso .=' '.nbf($value -> consofer).' '.imress('fer');
		}
		
		if(!empty($value -> consoargent)) {
			$conso .=' '.nbf($value -> consoargent).' '.imress('argent');
		}
		
		if(!empty($value -> consopierre)) {
			$conso .=' '.nbf($value -> consopierre).' '.imress('pierre');
		}
		
		if(!empty($value -> consomarbre)) {
			$conso .=' '.nbf($value -> consomarbre).' '.imress('marbre');
		}
		
		if(!empty($value -> consoraisin)) {
			$conso .=' '.nbf($value -> consoraisin).' '.imress('raisin');
		}
		
		if(!empty($value -> consovin)) {
			$conso .=' '.nbf($value -> consovin).' '.imress('vin');
		}
		
		if(!empty($value -> consoor)) {
			$conso .=' '.nbf($value -> consoor).' '.imress('gold');
		}
	
		if(!empty($prod)) {
			$prod = '<br/><b>'._('Production').' : </b><br/>'.$prod;
		}
		
		if(!empty($conso)) {
			$conso = '<br/><b>'._('Consommation').' : </b><br/>'.$conso;
		}
		else {
			if(!empty($value -> placen)) {
				$conso = '<br/><b>'._('Places').'</b><br/>'.nbf($value -> placen, 0).' '._('Normales');
			}
			elseif(!empty($value -> placel)) {
				$conso = '<br/><b>'._('Places').'</b><br/>'.nbf($value -> placel, 0).' '._('Luxueuses');
			}
			elseif(!empty($value -> placeg)) {
				$conso = '<br/><b>'._('Places').'</b><br/>'.nbf($value -> placeg, 0).' '._('Souterraines');
			}
		}
		
		echo '<div class="gauche_batiment">
		<img src="/images/bat/'.$batiments[$bat]['img'].'.png"
				 alt="'.$batiments[$bat]['nom'].'"
				 title="'.$batiments[$bat]['nom'].'" /></div>
		<div class="droite_batiment">';
		
		echo '<div class=\'texte1\'>'._($txt_description_bat[$bat]);
		
		echo	'</div>
		<form method="post" action="'._('construire').'-'.$batiments[$bat]['aff'].'-'.$bat.'">
		<div class="ligne">
			<div class="ligne_50">
		<b>'._('Matériaux de construction').' : </b>'.
		$prix.'<br/><b>'._('Matériaux récupérés').' : </b>'.
		$prix2.$conso.$prod.'<br/><b>'._('Terrain').' : </b><br/>'.
		$value -> terrain.'<br/>';
		
		if(!empty($value->type) && ($value->type==2)) {
		echo '<b>Défense :</b><br/>
			'.nbf(round($value -> defense, 2), 2).' '.img('images/attaques/bouclier.png', 'defense');
			}
		echo	'</div><div class="ligne_50">';
		
		if(!empty($value->nbmax)) {
		  echo '<b>'._('Max').' :</b> '.$value->nbmax.'<br/>';
		}
			
		echo '<b>'._('Actuellement').' :</b>  '.$value->nb.'<br/>';
		
		if($bat == 'atelierf' && $paquet->get_infoj('lvl') > 1) {
			echo '<b>'._('Minimum').' :</b> '._(6*($paquet->get_infoj('lvl')-1)).'<br/>';
		}
		
		echo '<input type="hidden" name="batiment" value="'.$bat.'" />
				<input type="hidden" name="type" value="'.$batiments[$bat]['aff'].'" />
		<table><tr>
			<td valign="middle">
			<input type="text" 
			       name="achatt" 
			       placeholder="0" 
			       size="10" 
			       class="form_retirer droite" />
			</td>
			<td valign="middle">
			<div class="bouton_classique"><input class="bouton_classique2" 
			                                     type="submit" 
			                                     value="'._('BÂTIR').'" 
			                                     name="achat" 
			                                     style="width:80px;"/></div>
			</td>
		</tr>
		<tr>
		<td valign="middle"><input type="text" name="ventee" placeholder="0" size="10" class="form_retirer droite" /></td>
		<td valign="middle"><div class="bouton_classique"><input class="bouton_classique2" type="submit" value="'._('DÉTRUIRE').'" name="vente" style="width:80px;"/></div></td></tr>
		</table>';
		
		if($bat == 'carriere') {
		echo '
		<br/>
				<b>'._('Balance de production réservée au marbre').'</b><br/>
			<table>
				<tr>
					<td>
		<input type="text" class="form_retirer droite" size="3" maxlenght="3" value="'.$paquet->getcoef_marbre().'" name="modif" required="required" /> % 
		</td>
		<td>
			<div class="bouton_classique"><input class="bouton_classique2" type="submit" name="Modifier" value="'._('Modifier').'" /></div>
		</td>
			</tr>
			</table>';
		}
		
		echo '
		</div>
		</div>
		</form>
		</div>
		</div></div>';
		}
	}
}

?>