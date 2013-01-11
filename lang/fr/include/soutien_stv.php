<?php

if($soutien == NULL) {
	if(sizeof($temples) == 5) {
		$nb = 3;
	}
	else {
		$nb = 4;
	}
	
	$i = 0;
	
	echo '<h1 class="amour">Soutenez un dieu pour la fête de l\'amour</h1>';
	
	echo '<div class="centrer">Choissez le dieu que vous allez soutenir durant la fête de l\'amour.
	<br/><br/></div>';
	
	echo '<div class="centrer">';
	foreach($temples as $temple) {
		echo '<a href="soutien_stv-'.$temple.'"><img src="lang/fr/images/temple/img_'.$temple.'.png" 
				   alt="'.$temples_donnees[$temple]['nom'].'" 
				   name="'.$temples_donnees[$temple]['nom'].'" /></a>';
		$i++;
		if($i%$nb != 0) {
			echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		}
		else {
			echo '<br/>';
		}
	}
	echo '</div>';
}
else {
	echo '
	<div id="cadre_milieu_petit">
		<div id="cadre_haut_petit">
			<img src="images/attaques/cross.png" 
				 alt="Fermer" 
				 title="Fermer" 
				 class="supr_messagerie" 
				 style="margin-top:10px;margin-right:10px;" 
				 onclick="javascript:fermer_pacte();"/>
		</div>
		<div id="cadre_centre_petit">
			<div class="soutien" id="stv_recherche">
				<h3 class="centrer">Recherche</h3>
				<p class="centrer">Vous ordonnez à votre armée de parcourir les terres avoisinantes 
				à la recherche d’idées ou d’éléments susceptibles d’intéresser votre divinité.
				<br/><br/>
				<b>Gain :</b> 1 '.imress('stv').'<br/><br/></p>
				
				<p class="centrer">
	<div class="bouton_classique"><input class="bouton_classique2" type="submit" value="ENVOYER" name="envoyer" onclick="event_jeu(\'recherche\', 0)" /></div>
				</p>
			</div>
		
			<div class="soutien" id="stv_parade">
				<h3 class="centrer">Parade</h3>
				<p class="centrer">Vous organisez un défilé dans votre cité pour tenter d’impressionner les dieux 
				de l’influence que possède celui que vous soutenez.</p>
				<p class="centrer">
				<b>Gain :</b> 1 '.imress('stv').'<br/><br/>
				<b>Coût :</b> '.
				nbf(4800).' '.imress('drachme').' '.
				nbf(2400).' '.imress('nourriture').' '.
				nbf(3200).' '.imress('eau');
						
				if($paquet->getlvl() >= 4) {
					echo ' '.nbf(400).' '.imress('raisin');
				}
				
			echo '</p>
				<p class="centrer">
	<div class="bouton_classique"><input class="bouton_classique2" type="submit" value="ORGANISER" name="organiser" onclick="event_jeu(\'parade\', 0)" /></div>
				</p>
				
			</div>
			
			<div class="soutien" id="stv_present">
				<h3 class="centrer">Présent</h3>
				<p class="centrer">Vous réunissez les meilleurs artisans de votre cité et vous leur donnez pour mission 
				de créer quelque chose d’unique, qui conviendrait à une divinité</p>
				
				<p style="width:90%;margin:auto;">
					<b>Amphores de nectar</b><br/>
					Il est bien connu que la boisson favorite des Dieux est le nectar. Une bonne réserve d’amphores vous 
					permettra sûrement d’obtenir une récompense.<br/>
					<b>Coût :</b> '.
					nbf(3600).' '.imress('pierre').
					' 400 '.imress('bois').' '.
					nbf(1300).' '.imress('raisin').
					' 600 '.imress('vin').'<br/>
					<b>Gain :</b> 3 '.imress('stv').'<br/><br/>
					<div class="bouton_classique"><input class="bouton_classique2" type="submit" value="CREER" name="creer" onclick="event_jeu(\'amphore\', 0)" /></div>
				</p>
				
				<p style="width:90%;margin:auto;">
					<b>Coupes d’or</b><br/>
					A moins de s’appeler Dionysos, il est peu courant de boire à même l’amphore. 
					Vous pouvez proposer des coupes qui seront sûrement échangées contre quelque chose.<br/>
					<b>Coût :</b> '.
					nbf(300).' '.imress('pierre').
					' '.nbf(1600).' '.imress('fer').' '.
					nbf(200).' '.imress('gold').'<br/>
					<b>Gain :</b> 1 '.imress('stv').'<br/><br/>
					<div class="bouton_classique"><input class="bouton_classique2" type="submit" value="CREER" name="creer" onclick="event_jeu(\'coupe\', 0)" /></div>
				</p>

				<p style="width:90%;margin:auto;">
					<b>Babioles</b><br/>
					D’après les dires populaires, les Dieux cherchent des jeux amusants pour passer le temps au sommet du Mont Olympe. 
					Peut-être qu’ils seraient intéressés par le yo-yo ou les dés, 
					qui amusent tant de citoyens lors de leurs temps libres ? 
					Votre divinité pourra toujours leur présenter vos créations pour se rendre intéressante.<br/>
					<b>Coût :</b> '.
					nbf(800).' '.imress('pierre').
					' '.nbf(150).' '.imress('marbre').' '.
					' '.nbf(1300).' '.imress('bois').' '.
					nbf(1400).' '.imress('fer').'<br/>
					<b>Gain :</b> 1 '.imress('stv').'<br/><br/>
					<div class="bouton_classique"><input class="bouton_classique2" type="submit" value="CREER" name="creer" onclick="event_jeu(\'babiole\', 0)" /></div>
				</p>
			';

	echo '
			</div>	
		</div>
	
		<div id="cadre_centre_petit2"></div>
		<div id="cadre_bas_petit"></div>
	</div>';
	
	echo '<h1 class="amour">Vous soutenez '.$temples_donnees[$soutien]['dieu'].'</h1>';
	
	echo '<div class="centrer gras">Effectuez des missions pour soutenir votre dieu.
	<br/><br/></div>';
	
	echo '
	<table width="80%" class="centrer_tableau">
	<tr>
		<td class="titre_tab gauche gras" valign="top">Recherche</td>
		<td>Vous ordonnez à votre armée de parcourir les terres avoisinantes à la recherche 
		d’idées ou d’éléments susceptibles d’intéresser votre divinité.</td>
		<td class="centrer">';
		if($missions->recherche < 5) {
			echo '<a href="javascript:preparer_event(\'recherche\');" 
					 class="rouge_goco"
					 id="bouton_stv_recherche">Lancer</a>';
		}
		echo '<br/>
		(<span id="valeur_stv_recherche">'.$missions->recherche.'</span>/5)</td>
	</tr>
	
	<tr>
		<td class="titre_tab gauche gras" valign="top">Parade</td>
		<td>Vous organisez un défilé dans votre cité pour tenter d’impressionner 
		les dieux de l’influence que possède celui que vous soutenez.</td>
		<td class="centrer">';
		if($missions->parade == 0) {
			echo '<a href="javascript:preparer_event(\'parade\');" 
					 class="rouge_goco"
					 id="bouton_stv_parade">Lancer</a>';
		}
		echo '<br/>
		(<span id="valeur_stv_parade">'.$missions->parade.'</span>/1)</td>
	</tr>
	
	<tr>
		<td class="titre_tab gauche gras" valign="top">Présent</td>
		<td>Vous réunissez les meilleurs artisans de votre cité et vous leur donnez pour 
		mission de créer quelque chose d’unique, qui conviendrait à une divinité.</td>
		<td class="centrer">';
		if($missions->present < 5) {
			echo '<a href="javascript:preparer_event(\'present\');" 
					 class="rouge_goco"
					 id="bouton_stv_present" >Lancer</a>';
		}
		echo '<br/>
		(<span id="valeur_stv_present">'.$missions->present.'</span>/5)</td>
	</tr>
	</table>';
}

?>