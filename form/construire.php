<?php

include('../header.php');
include('../lang/'.LANG.'/donnees/batiments.php');
include('../lang/'.LANG.'/donnees/batiments2.php');

if(!empty($_GET['bat'])) {
	$bat = addslashes($_GET['bat']);
	
	$paquet = new EwPaquet('prix_atelierf2');
	
	if($paquet->getstatu() != 1) {
echo '<SCRIPT LANGUAGE="JavaScript">
     		document.location.href="'.SITE_URL.'"
			</SCRIPT>';
	}
	
	$liste = $paquet->get_batiments();
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
					<div class="titre_batiment2"><b>'.$batiments[$bat]['nom'].'</b></div>
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
			$prix = '<br/>'.$paquet->getRetour();
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
			$prod .=' '.($value -> prodmarbre*$paquet->getcoef_marbre()/100).' '.imress('marbre');
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
	
		include('../lang/'.LANG.'/include/form_construire.php');
		
		echo '
		</td></tr>
		</table>
		</form>
		</div>
		</div></div>';
		}
	}
}

?>