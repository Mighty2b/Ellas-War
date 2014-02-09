<?php

$temples = $paquet->get_infoj('temples');

if($paquet -> possible_temple1()) {
	
echo '<h1>'._('Honnorez les dieux').'</h1><br/>';
	
$paquet->error('batir_temple1');

echo '<div class="ligne90 centrer">
<b>'._(
'Construisez un temple, honorez un dieu et bénéficiez de nombreux avantages.').
'</b><br/><br/>
<p>
<b>'._('Prix').' :</b> ';
	foreach($batiment_prix_temple1 as $ress => $qtt) {
		if(!empty($qtt)) {
			echo number_format($qtt, 0, ',', ' ').' '.imress($ress).'&nbsp; ';
		}
	}
echo '
</p><br/>

<table width="80%">
<tr>
<td class="titre_tab"
    valign="top">&nbsp;'._('Hermès').'&nbsp;</td>
<td align="justify">'._(
'Lorsque vous rachetez vos lots dans le marché, vous récupérez 97.5% '.
'de ceux-ci au lieu de 80%. Le nombre de lots que vous pouvez mettre '.
'en vente passe de 8 à 10 et les licences vous permettant de vendre '.
'sur le marché de gros vous coûtent 50% moins cher.').'<br/><br/>
</td>
<td valign="top">
<a href="'._('temples').'-hermes" 
   class="centre_armee gras" >'._('Bâtir').'</a>
</td>
</tr>
<tr>
<td class="titre_tab"
    valign="top">&nbsp;'._('Déméter').'&nbsp;</td>
<td align="justify">'._(
'La production de vos fermes et fermes vinicoles augmentera. '.
'Déméter vous permettra d\'utiliser sa furie sur vos adversaires, '.
'celle-ci détruit leurs stocks de nourriture et raisin ainsi que leurs '.
'fermes et fermes vinicoles.').'<br/><br/>
</td>
<td valign="top">
<a href="'._('temples').'-demeter" class="centre_armee gras" >'._('Bâtir').'</a>
</td>
</tr>
<tr>
<td class="titre_tab" valign="top">&nbsp;'._('Apollon').'&nbsp;</td>
<td align="justify">'._(
'Apollon vous fait grâce de sa clairvoyance. Vous pourrez connaître la '.
'taille des armées de vos ennemis grâce à l\'oracle de son temple.').'<br/><br/>
</td>
<td valign="top">
<a href="'._('temples').'-apollon" 
   class="centre_armee gras" >'._('Bâtir').'</a>
</td>
</tr>
</table>
<br/>
<div class="centrer">
<img src="images/temples/img_hermes.png" 
     alt="'.$temples_donnees['hermes']['nom'].'" 
     name="'.$temples_donnees['hermes']['nom'].'" 
     id="temple_hermes" />
&nbsp;
<img src="images/temples/img_demeter.png" 
     alt="'.$temples_donnees['demeter']['nom'].'" 
     name="'.$temples_donnees['demeter']['nom'].'" />
&nbsp;
<img src="images/temples/img_apollon.png" 
     alt="'.$temples_donnees['apollon']['nom'].'" 
     name="'.$temples_donnees['apollon']['nom'].'" 
     id="temple_apollon" />
</div></div>';
}
elseif($paquet -> possible_temple2()) {
	
	echo '<h1>'._('Honnorez les dieux').'</h1><br/>';
	
	$paquet->error('batir_temple2');

echo '
<div class="ligne90 centrer">
<b>'._('Construisez un temple, honorez un dieu et bénéficiez de nombreux avantages.').'</b><br/><br/>
<p>
<b>'._('Prix').' :</b> ';

foreach($batiment_prix_temple2 as $ress => $qtt) {
	if(!empty($qtt)) {
		echo number_format($qtt, 0, ',', ' ').' '.imress($ress).'&nbsp; ';
	}
}

echo '</p><br/>

<table width="80%">
<tr>
<td class="titre_tab"
    valign="top" 
    class="gauche">&nbsp;'._('Arès').'&nbsp;</td>
<td align="justify">'._(
'Lors de vos offensives Arès veillera sur vos hommes renforçant leur fougue. '.
'Il vous permettra aussi d\'engager ses terribles spartiates.').'<br/><br/>
</td>
<td valign="top">
<a href="'._('temples').'-ares" 
   class="centre_armee gras" >'._('Bâtir').'</a>
</td>
</tr>
<tr>
<td class="titre_tab"
    valign="top" 
    class="gauche">&nbsp;'._('Athéna').'&nbsp;</td>
<td align="justify">'._(
'Athéna augmentera la défense de vos troupes afin de garantir '.
'la sécurité de votre cité. Elle réduira aussi le coût d’enrôlement '.
'de votre infanterie.').'<br/><br/>
</td>
<td valign="top">
<a href="'._('temples').'-athena" 
   class="centre_armee gras" >'._('Bâtir').'</a>
</td>
</tr>
</table>
<br/>

</div>
<div class="centrer">
<img src="images/temples/img_ares.png" 
     alt="'.$temples_donnees['ares']['nom'].'"
     name="'.$temples_donnees['ares']['nom'].'"
     id="temple_ares" />
&nbsp;
<img src="images/temples/img_athena.png"
     alt="'.$temples_donnees['athena']['nom'].'" 
     name="'.$temples_donnees['athena']['nom'].'" 
     id="temple_athena" />
</div>';

}
elseif($paquet -> possible_temple3()) {
	
	echo '<h1>'._('Honnorez les dieux').'</h1><br/>';
	
	$paquet->error('batir_temple3');

echo '<div class="ligne90 centrer">
<b>'._('Construisez un temple, honorez un dieu et bénéficiez de nombreux avantages.').'</b><br/><br/>
<p>
<b>'._('Prix').' :</b> ';

	foreach($batiment_prix_temple3 as $ress => $qtt) {
		if($qtt > 0) {
			echo number_format($qtt, 0, ',', ' ').' '.imress($ress).'&nbsp; ';
		}
	}

echo '</p><br/>

<table width="80%">
<tr>
<td class="titre_tab"
    valign="top">&nbsp;'._('Artémis').'&nbsp;</td>
<td align="justify">'._(
'Artémis arpentera les bois et aidera vos bûcherons dans leur tâche. '.
'Elle vous prêtera aussi ses féroces amazones pour aller au combat.').'<br/><br/>
</td>
<td valign="top">
<a href="'._('temples').'-artemis" 
   class="centre_armee gras" >'._('Bâtir').'</a>
</td>
</tr>
<tr>
<td class="titre_tab" valign="top">&nbsp;'._('Dionysos').'&nbsp;</td>
<td align="justify">'._(
'Dionysos augmentera le rendement de vos ateliers de pressage, ceux-ci '.
'produiront plus de vin pour abreuver vos troupes. Les centaures voyant '.
'que vous avez son soutien, se joindront à vous.').'<br/><br/>
</td>
<td valign="top">
<a href="'._('temples').'-dionysos" 
   class="centre_armee gras" >'._('Bâtir').'</a>
</td>
</tr>
<tr>
<td class="titre_tab"
    valign="top">&nbsp;'._('Héphaïstos').'&nbsp;</td>
<td align="justify">'._(
'Héphaïstos augmentera le rendement de vos ateliers de battage de la monnaie '.
'et ses automates défendront les portes de votre cité.').'<br/><br/>
</td>
<td valign="top">
<a href="'._('temples').'-hephaistos" 
   class="centre_armee gras" >'._('Bâtir').'</a>
</td>
</tr>
</table>
<br/>

</div>
<div class="centrer">
<img src="images/temples/img_artemis.png" 
     alt="'.$temples_donnees['artemis']['nom'].'" 
     name="'.$temples_donnees['artemis']['nom'].'" 
     id="temple_artemis" />
&nbsp;
<img src="images/temples/img_dionysos.png"
     alt="'.$temples_donnees['dionysos']['nom'].'" 
     name="'.$temples_donnees['dionysos']['nom'].'" 
     id="temple_dionysos" />
&nbsp;
<img src="images/temples/img_hephaistos.png" 
     alt="'.$temples_donnees['hephaistos']['nom'].'" 
     name="'.$temples_donnees['hephaistos']['nom'].'" 
     id="temple_hephaistos" />
</div>';

}
elseif($paquet -> possible_temple4()) {
	
	echo '<h1>Honnorez les dieux</h1><br/>';
	
	$paquet->error('batir_temple4');

echo '
<div class="ligne90 centrer">
<b>'._(
'Construisez un temple, honorez un dieu et bénéficiez de nombreux avantages.').
'</b><br/><br/>

<p>
<b>'._('Prix').' :</b> ';

	foreach($batiment_prix_temple4 as $ress => $qtt) {
		echo number_format($qtt, 0, ',', ' ').' '.imress($ress).'&nbsp; ';
	}

echo '</p><br/>

<table width="80%">
<tr>
<td class="titre_tab"
    valign="top" 
    class="gauche">&nbsp;'._('Hadès').'&nbsp;</td>
<td align="justify">'._(
'Hadès augmentera la production de vos mines et carrières. '.
'Il pourra aussi vous preter son casque d\'invisibilité pour '.
'vous permettre de visiter les cités de vos amis et ennemis. '.
'Lors de vos terribles batailles, les âmes de vos hommes '.
'reviendront combattre pour vous.').

'<br/><br/>
</td>
<td valign="top">
<a href="'._('temples').'-hades" 
   class="centre_armee gras" >'._('Bâtir').'</a>
</td>
</tr>
<tr>
<td class="titre_tab"
    valign="top" 
    class="gauche">&nbsp;'._('Poseidon').'&nbsp;</td>
<td align="justify">'._(
'Grâce à Poseidon, vos unités de cavaleries coûtent moins chères. '.
'Il pourra aussi construire un mur autour de votre cité pour '.
'repousser vos ennemis. En tant que dieu des océans il augmentera '.
'la production de vos puits.').'<br/><br/>
</td>
<td valign="top">
<a href="'._('temples').'-poseidon" 
   class="centre_armee gras" >'._('Bâtir').'</a>
</td>
</tr>
<tr>
<td class="titre_tab"
    valign="top" 
    class="gauche">&nbsp;'._('Zeus').'&nbsp;</td>
<td align="justify">'._(
'Zeus fera tomber la foudre sur vos ennemis à vos souhaits, '.
'réduisant en cendre ses bâtiments. Il vous fournira aussi ses '.
'terribles myrmidons.').'<br/><br/>
</td>
<td valign="top">
<a href="'._('temples').'-zeus" 
   class="centre_armee gras" >'._('Bâtir').'</a>
</td>
</tr>
</table>
<br/>

</div>
<div class="centrer">
<img src="images/temples/img_hades.png" 
     alt="'.$temples_donnees['hades']['nom'].'" 
     name="'.$temples_donnees['hades']['nom'].'" 
     id="temple_hades" />
&nbsp;
<img src="images/temples/img_poseidon.png" 
     alt="'.$temples_donnees['poseidon']['nom'].'" 
     name="'.$temples_donnees['poseidon']['nom'].'" 
     id="temple_poseidon" />
&nbsp;
<img src="images/temples/img_zeus.png" 
     alt="'.$temples_donnees['zeus']['nom'].'" 
     name="'.$temples_donnees['zeus']['nom'].'" 
     id="temple_zeus" />
</div>';

}
elseif(sizeof($temples) > 0) {
foreach($temples_donnees as $temple => $temple_actu) {
	if(in_array($temple, $temples)) {

		echo '<div class="cadre_liste_temple centrer ligne_80"
		           id="description_temple_'.$temple.'">
		<h1>'.$temple_actu['nom'].'</h1><br/>
		<p class=\'centrer\'>'.$temple_actu['description'].'</p><br/>';

			if($temple == 'demeter') {
				$prix_ses=300000+$paquet->get_infoj('lvl')*20000;
				$prix_nou=1000000+$paquet->get_infoj('lvl')*20000;
				$prix_bois=400000+$paquet->get_infoj('lvl')*10000;

				if($_GET['var1'] == $temple)
					$paquet->error('achat_furie');

				echo _(
				'Furie(s) possèdée(s)').' : '.nbf($paquet->get_infoj('furie')).'<br/>
				'._('Prix').' : '.nbf($prix_ses).' '.imress('drachme').' '.
								 nbf($prix_bois). ' '.imress('bois').' '.
								 nbf($prix_nou).' '.imress('nourriture').'
				<br/><br/>
				<form method="post" action="'._('temples').'-demeter">
				<input type="text"
				       name="foudre" 
				       class="form_retirer" 
				       placeholder="0" 
				       size="4" />
				<b>'._('Furie(s)').'</b>
				<br/><br/>
				<div class="bouton_classique"><input type="submit"
				                                     name="action_foudre" 
				                                     Value="'._('Demander').'"/></div>
				<br/>
				</form>';

			}
			elseif($temple == 'zeus')
			{
				$prixvin=80000;
				$prixor=60000;
				$prixnourriture=4000000;

				if($_GET['var1'] == $temple)
					$paquet->error('achat_foudre');
				
				echo _(
				'Foudre(s) possédée(s)').' : '.nbf($paquet->get_infoj('foudre')).'<br/>
				'._('Prix').' : '.nbf($prixvin).' '.imress('vin').' '.
					 nbf($prixor). ' '.imress('gold').' '.
					 nbf($prixnourriture).' '.imress('nourriture').'
				<br/><br/>
				<form method="post" action="'._('temples').'-zeus">
				<input type="text" 
				       name="foudre" 
				       class="form_retirer" 
				       placeholder="0" 
				       size="4" />
				<b>Foudre(s)</b>
				<br/><br/>
				<div class="bouton_classique"><input type="submit"
				                                     name="action_foudre" 
				                                     Value="'._('Demander').'"/></div>
				</form><br/><br/>';
			}
			elseif($temple == 'poseidon') {
  			echo '<br/>'._('Défense du mur').' : '.$paquet->get_answer('info_temples')->{1}.'<br/><br/>';
			
				$achator = 10000;
				$achatmarbre = 20000;
				$achateau= 10000000;	
						
				if($paquet->get_answer('info_temples')->{2} == 0) {

				echo '<b>'._('Mur d\'eau de Poseidon').'</b><br/>';

				if($_GET['var1'] == $temple)
					$paquet->error('achat_mur_poseidon');
		
	echo _('Prix').' : '.nbf($achateau).' '.imress('eau').' '.
								 nbf($achatmarbre).' '.imress('marbre').' '.
								 nbf($achator).' '.imress('gold').'
	<br/>
	<form method="post" action="'._('temples').'-poseidon">
	<input type="hidden" name="action" value="1" />
	<br/>
	<div class="bouton_classique"><input type="submit" 
	                                     name="action_mur"
	                                     Value="'._('Eriger le mur de poseidon').'"/></div>
	</form><br/>';
				}
				else
				{
					echo '<b>'._('Le mur de poseidon protège votre cité').'</b>
							<br/><br/>';
				}
			}
			echo '</div>';
		}
	}
	echo '<div class="ligne centrer">';

	if(sizeof($temples) == 5) {
		$nb = 3;
	}
	else {
		$nb = 4;
	}
		$i = 0;
		foreach($temples as $temple) {
			echo '<img src="images/temples/img_'.$temple.'.png" 
			           alt="'.$temples_donnees[$temple]['nom'].'" 
			           name="'.$temples_donnees[$temple]['nom'].'" 
			           class="cursor" 
			           id="temple_'.$temple.'" />';
			$i++;
			if($i%$nb != 0) {
				echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			}
			else {
				echo '<br/>';
			}
		}
	echo '</div>';
	
	if($paquet->get_infoj('lvl') >= 10 && !($paquet->is_event('stv'))) {
		$possible = $paquet->get_answer('info_temples')->{3};

		if(empty($possible)) {
			echo '<div class="clear"></div>
			<br/>
			<div class="centrer erreur">
			<a href="'._('modifiertemples').'">'._('Changer l\'un de vos temples').'</a>
			</div>';
		}
		else {
		  echo '<div class="clear"></div>
			<br/>
			<div class="centrer">
			'._('Vous pourrez changer l\'un de vos temples le ').
			display_date($possible, 4).
			'</div>';
		}
	}
	
	if(!empty($_GET['var1'])) {
	echo '
	<script type="text/javascript">
	$(function(){
		menu = $("#description_temple_'.addslashes(htmlentities($_GET['var1'])).'");
		menu.addClass("ouvert");
		menu.show("slow");
	});
	</script>';
	}
	elseif(sizeof($temples) == 1 or sizeof($temples) == 2) {
		echo '
		<script type="text/javascript">
		$(function(){
			menu = $("#description_temple_'.$temples[sizeof($temples)-1].'");
			menu.addClass("ouvert");
			menu.show("slow");
		});
		</script>';
	}
	
	echo '<script type="text/javascript">
		$(function(){
		  $(".cadre_liste_temple").hide();
		
			$("#temple_hermes").click( function() {
				menu = $("#description_temple_hermes");
				if(menu.hasClass("ouvert")) {
					menu.hide("slow");
					menu.removeClass("ouvert");
				}
				else {
					$(".ouvert").hide("slow");
					$(".ouvert").removeClass("ouvert");
					menu.addClass("ouvert");
					menu.show("slow");
				}
			});
			
			$("#temple_apollon").click( function() {
				menu = $("#description_temple_apollon");
				if(menu.hasClass("ouvert")) {
					menu.hide("slow");
					menu.removeClass("ouvert");
				}
				else {
					$(".ouvert").hide("slow");
					$(".ouvert").removeClass("ouvert");
					menu.addClass("ouvert");
					menu.show("slow");
				}
			});
			
			$("#temple_demeter").click( function() {
				menu = $("#description_temple_demeter");
				if(menu.hasClass("ouvert")) {
					menu.hide("slow");
					menu.removeClass("ouvert");
				}
				else {
					$(".ouvert").hide("slow");
					$(".ouvert").removeClass("ouvert");
					menu.addClass("ouvert");
					menu.show("slow");
				}
			});
			
			$("#temple_ares").click( function() {
				menu = $("#description_temple_ares");
				if(menu.hasClass("ouvert")) {
					menu.hide("slow");
					menu.removeClass("ouvert");
				}
				else {
					$(".ouvert").hide("slow");
					$(".ouvert").removeClass("ouvert");
					menu.addClass("ouvert");
					menu.show("slow");
				}
			});
			
			$("#temple_athena").click( function() {
				menu = $("#description_temple_athena");
				if(menu.hasClass("ouvert")) {
					menu.hide("slow");
					menu.removeClass("ouvert");
				}
				else {
					$(".ouvert").hide("slow");
					$(".ouvert").removeClass("ouvert");
					menu.addClass("ouvert");
					menu.show("slow");
				}
			});
			
			$("#temple_artemis").click( function() {
				menu = $("#description_temple_artemis");
				if(menu.hasClass("ouvert")) {
					menu.hide("slow");
					menu.removeClass("ouvert");
				}
				else {
					$(".ouvert").hide("slow");
					$(".ouvert").removeClass("ouvert");
					menu.addClass("ouvert");
					menu.show("slow");
				}
			});
			
			$("#temple_dionysos").click( function() {
				menu = $("#description_temple_dionysos");
				if(menu.hasClass("ouvert")) {
					menu.hide("slow");
					menu.removeClass("ouvert");
				}
				else {
					$(".ouvert").hide("slow");
					$(".ouvert").removeClass("ouvert");
					menu.addClass("ouvert");
					menu.show("slow");
				}
			});
			
			$("#temple_hephaistos").click( function() {
				menu = $("#description_temple_hephaistos");
				if(menu.hasClass("ouvert")) {
					menu.hide("slow");
					menu.removeClass("ouvert");
				}
				else {
					$(".ouvert").hide("slow");
					$(".ouvert").removeClass("ouvert");
					menu.addClass("ouvert");
					menu.show("slow");
				}
			});
			
			$("#temple_zeus").click( function() {
				menu = $("#description_temple_zeus");
				if(menu.hasClass("ouvert")) {
					menu.hide("slow");
					menu.removeClass("ouvert");
				}
				else {
					$(".ouvert").hide("slow");
					$(".ouvert").removeClass("ouvert");
					menu.addClass("ouvert");
					menu.show("slow");
				}
			});
			
			$("#temple_hades").click( function() {
				menu = $("#description_temple_hades");
				if(menu.hasClass("ouvert")) {
					menu.hide("slow");
					menu.removeClass("ouvert");
				}
				else {
					$(".ouvert").hide("slow");
					$(".ouvert").removeClass("ouvert");
					menu.addClass("ouvert");
					menu.show("slow");
				}
			});
			
			$("#temple_poseidon").click( function() {
				menu = $("#description_temple_poseidon");
				if(menu.hasClass("ouvert")) {
					menu.hide("slow");
					menu.removeClass("ouvert");
				}
				else {
					$(".ouvert").hide("slow");
					$(".ouvert").removeClass("ouvert");
					menu.addClass("ouvert");
					menu.show("slow");
				}
			});
		});
	      </script>';
	
}
else {
	echo '<div class="erreur centrer">'._(
	     'Vous n\'avez pour l\'instant aucun temple. '.
	     'Vous pourrez bâtir votre premier temple au niveau 2.'.
	     '<br/>'.
	     'Les temples vous permettent d\'honnorer les dieux et '.
	     'd\'obtenir de nombreux avantages.').
	     '</div>';
}
?>