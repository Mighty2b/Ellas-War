<?php

if($paquet -> possible_temple1() && (empty($_GET['var1']) or ($_GET['var1'] == 'hermes' or $_GET['var1'] == 'apollon' or $_GET['var1'] == 'demeter'))) {
	if(!empty($_GET['var1'])) {
		$paquet = new EwPaquet('batir_temple1', array($_GET['var1']));
		if(!($paquet->hasErreur())) {
			redirect('temples');
		}
	}
	
	echo '<h1>Honnorez les dieux</h1><br/>';
	
	$paquet -> display();

echo '<div class="ligne80">
<b>Construisez un temple, honorez un dieu et bénéficiez de nombreux avantages.</b><br/><br/>
<p>
<b>Prix :</b> ';
	foreach($batiment_prix_temple1 as $ress => $qtt) {
		if(!empty($qtt)) {
			echo number_format($qtt, 0, ',', ' ').' '.imress($ress).'&nbsp; ';
		}
	}
echo '
</p><br/>

<table width="90%">
<tr>
<td class="titre_tab" valign="top">&nbsp;Hermès&nbsp;</td>
<td align="justify">Lorsque vous rachetez vos lots dans le marché, vous récupérez 95% de ceux-ci au lieu de 75%. Le nombre de lots que vous pouvez mettre en vente passe de 8 à 10 et les licences vous permettant de vendre sur le marché de gros vous coûtent 50% moins cher.<br/><br/>
</td>
<td valign="top">
<a href="Temples-hermes" class="centre_armee gras" >Bâtir</a>
</td>
</tr>
<tr>
<td class="titre_tab" valign="top">&nbsp;Déméter&nbsp;</td>
<td align="justify">La production de vos fermes et fermes vinicoles augmentera. Déméter vous permettra d\'utiliser sa furie sur vos adversaires, celle-ci détruit leurs stocks de nourriture et raisin ainsi que leurs fermes et fermes vinicoles.<br/><br/>
</td>
<td valign="top">
<a href="Temples-demeter" class="centre_armee gras" >Bâtir</a>
</td>
</tr>
<tr>
<td class="titre_tab" valign="top">&nbsp;Apollon&nbsp;</td>
<td align="justify">Apollon vous fait grâce de sa clairvoyance. Vous pourrez connaître la taille des armées de vos ennemis grâce à l\'oracle de son temple.<br/><br/>
</td>
<td valign="top">
<a href="Temples-apollon" class="centre_armee gras" >Bâtir</a>
</td>
</tr>
</table>
<div class="centrer">
<img src="lang/fr/images/temple/img_hermes.png" alt="'.$temples_donnees['hermes']['nom'].'" name="'.$temples_donnees['hermes']['nom'].'" id="temple_hermes" />
&nbsp;
<img src="lang/fr/images/temple/img_demeter.png" alt="'.$temples_donnees['demeter']['nom'].'" name="'.$temples_donnees['demeter']['nom'].'" />
&nbsp;
<img src="lang/fr/images/temple/img_apollon.png" alt="'.$temples_donnees['apollon']['nom'].'" name="'.$temples_donnees['apollon']['nom'].'" id="temple_apollon" />
</div></div>';
}
elseif($paquet -> possible_temple2() && (empty($_GET['var1']) or ($_GET['var1'] == 'ares' or $_GET['var1'] == 'athena'))) {
	if(!empty($_GET['var1'])) {
		$paquet = new EwPaquet('batir_temple2', array($_GET['var1']));
		if(!($paquet->hasErreur())) {
			redirect('temples');
		}
	}
	
	echo '<h1>Honnorez les dieux</h1><br/>';
	
	$paquet -> display();
?>
<div class="ligne80">
<b>Construisez un temple, honorez un dieu et bénéficiez de nombreux avantages.</b><br/><br/>
<p>
<b>Prix :</b>  <?php
	foreach($batiment_prix_temple2 as $ress => $qtt) {
		if(!empty($qtt)) {
			echo number_format($qtt, 0, ',', ' ').' '.imress($ress).'&nbsp; ';
		}
	}
?></p><br/>

<table width='90%'>
<tr>
<td class='titre_tab' valign="top" class="gauche">&nbsp;Arès&nbsp;</td>
<td align='justify'>Lors de vos offensives Arès veillera sur vos hommes renforçant leur fougue. Il vous permettra aussi d'engager ses terribles spartiates.<br/><br/>
</td>
<td valign="top">
<a href="Temples-ares" class="centre_armee gras" >Bâtir</a>
</td>
</tr>
<tr>
<td class='titre_tab' valign="top" class="gauche">&nbsp;Athéna&nbsp;</td>
<td align='justify'>Athéna augmentera la défense de vos troupes afin de garantir la sécurité de votre cité. Elle réduira aussi le coût d’enrôlement de votre infanterie.<br/><br/>
</td>
<td valign="top">
<a href="Temples-athena" class="centre_armee gras" >Bâtir</a>
</td>
</tr>
</table>
</div>
<div class="centrer">
<img src="lang/fr/images/temple/img_ares.png" alt="<?php echo $temples_donnees['ares']['nom'];?>" name="<?php echo $temples_donnees['ares']['nom']; ?>" id="temple_ares" />
&nbsp;
<img src="lang/fr/images/temple/img_athena.png" alt="<?php echo $temples_donnees['athena']['nom'];?>" name="<?php echo $temples_donnees['athena']['nom']; ?>" id="temple_athena" />
</div>
<?php
}
elseif($paquet -> possible_temple3() && (empty($_GET['var1']) or ($_GET['var1'] == 'artemis' or $_GET['var1'] == 'dionysos' or $_GET['var1'] == 'hephaistos'))) {
	if(!empty($_GET['var1'])) {
		$paquet = new EwPaquet('batir_temple3', array($_GET['var1']));
		if(!($paquet->hasErreur())) {
			redirect('temples');
		}
	}
	
	echo '<h1>Honnorez les dieux</h1><br/>';
	
	$paquet->display();
?>
<div class="ligne80">
<b>Construisez un temple, honorez un dieu et bénéficiez de nombreux avantages.</b><br/><br/>
<p>
<b>Prix :</b>  <?php
	foreach($batiment_prix_temple3 as $ress => $qtt) {
		if($qtt > 0) {
			echo number_format($qtt, 0, ',', ' ').' '.imress($ress).'&nbsp; ';
		}
	}
?>
</p><br/>

<table width='90%'>
<tr>
<td class='titre_tab' valign="top">&nbsp;Artémis&nbsp;</td>
<td align='justify'>Artémis vous fournira de la nourriture pour vos hommes, elles vous pretera aussi ses fèroces amazones pour aller au combat.<br/><br/>
</td>
<td valign="top">
<a href="Temples-artemis" class="centre_armee gras" >Bâtir</a>
</td>
</tr>
<tr>
<td class='titre_tab' valign="top">&nbsp;Dionysos&nbsp;</td>
<td align='justify'>Dionysos augmentera le rendement de vos ateliers de pressage, ceux-ci produiront plus de vin pour abreuver vos troupes. Les centaures voyant que vous avez son soutien, se joindront à vous.<br/><br/>
</td>
<td valign="top">
<a href="Temples-dionysos" class="centre_armee gras" >Bâtir</a>
</td>
</tr>
<tr>
<td class='titre_tab' valign="top">&nbsp;Héphaïstos&nbsp;</td>
<td align='justify'>Héphaïstos augmentera le rendement de vos ateliers de battage de la monnaie et ses automates défendront les portes de votre cité.<br/><br/>
</td>
<td valign="top">
<a href="Temples-hephaistos" class="centre_armee gras" >Bâtir</a>
</td>
</tr>
</table>
</div>
<div class="centrer">
<img src="lang/fr/images/temple/img_artemis.png" alt="<?php echo $temples_donnees['artemis']['nom'];?>" name="<?php echo $temples_donnees['artemis']['nom']; ?>" id="temple_artemis" />
&nbsp;
<img src="lang/fr/images/temple/img_dionysos.png" alt="<?php echo $temples_donnees['dionysos']['nom'];?>" name="<?php echo $temples_donnees['dionysos']['nom']; ?>" id="temple_dionysos" />
&nbsp;
<img src="lang/fr/images/temple/img_hephaistos.png" alt="<?php echo $temples_donnees['hephaistos']['nom'];?>" name="<?php echo $temples_donnees['hephaistos']['nom']; ?>" id="temple_hephaistos" />
</div>
<?php
}
elseif($paquet -> possible_temple4() && (empty($_GET['var1']) or ($_GET['var1'] == 'zeus' or $_GET['var1'] == 'hades' or $_GET['var1'] == 'poseidon'))) {
	if(!empty($_GET['var1'])) {
		$paquet = new EwPaquet('batir_temple4', array($_GET['var1']));
		if(!($paquet->hasErreur())) {
			redirect('temples');
		}
	}
	
	echo '<h1>Honnorez les dieux</h1><br/>';
	
	$paquet->display();
?>
<div class="ligne80">
<b>Construisez un temple, honorez un dieu et bénéficiez de nombreux avantages.</b><br/><br/>

<p>
<b>Prix :</b>  <?php
	foreach($batiment_prix_temple4 as $ress => $qtt) {
		echo number_format($qtt, 0, ',', ' ').' '.imress($ress).'&nbsp; ';
	}
?>
</p><br/>

<table width='90%'>
<tr>
<td class='titre_tab' valign="top" class="gauche">&nbsp;Hadès&nbsp;</td>
<td align='justify'>Hadès augmentera la production de vos mines et carrières. Il pourra aussi vous preter son casque d'invisibilité pour vous permettre de visiter les cités de vos amis et ennemis. Lors de vos terribles batailles, les âmes de vos hommes reviendront combattre pour vous.<br/><br/>
</td>
<td valign="top">
<a href="Temples-hades" class="centre_armee gras" >Bâtir</a>
</td>
</tr>
<tr>
<td class='titre_tab' valign="top" class="gauche">&nbsp;Poseidon&nbsp;</td>
<td align='justify'>Grâce à Poseidon, vos unités de cavaleries coûtent moins chères. Il pourra aussi construire un mur autour de votre cité pour repousser vos ennemis. En tant que dieu des océans il augmentera la production de vos puits.<br/><br/>
</td>
<td valign="top">
<a href="Temples-poseidon" class="centre_armee gras" >Bâtir</a>
</td>
</tr>
<tr>
<td class='titre_tab' valign="top" class="gauche">&nbsp;Zeus&nbsp;</td>
<td align='justify'>Zeus fera tomber la foudre sur vos ennemis à vos souhaits, réduisant en cendre ses bâtiments. Il vous fournira aussi ses terribles myrmidons.<br/><br/>
</td>
<td valign="top">
<a href="Temples-zeus" class="centre_armee gras" >Bâtir</a>
</td>
</tr>
</table>
</div>
<div class="centrer">
<img src="lang/fr/images/temple/img_hades.png" alt="<?php echo $temples_donnees['hades']['nom'];?>" name="<?php echo $temples_donnees['hades']['nom']; ?>" id="temple_hades" />
&nbsp;
<img src="lang/fr/images/temple/img_poseidon.png" alt="<?php echo $temples_donnees['poseidon']['nom'];?>" name="<?php echo $temples_donnees['poseidon']['nom']; ?>" id="temple_poseidon" />
&nbsp;
<img src="lang/fr/images/temple/img_zeus.png" alt="<?php echo $temples_donnees['zeus']['nom'];?>" name="<?php echo $temples_donnees['zeus']['nom']; ?>" id="temple_zeus" />
</div>
<?php
}
elseif(sizeof($temples) > 0) {
foreach($temples_donnees as $temple => $temple_actu) {
	if(in_array($temple, $temples)) {

		echo '<div class="cadre_liste_temple centrer ligne80" id="description_temple_'.$temple.'">
		<h1>'.$temple_actu['nom'].'</h1><br/>
		<p class=\'centrer\'>'.$temple_actu['description'].'</p><br/>';

			if($temple == 'demeter') {
				$prix_ses=300000+$paquet -> getlvl()*20000;
				$prix_nou=1000000+$paquet -> getlvl()*20000;
				$prix_bois=400000+$paquet -> getlvl()*10000;

				if($_GET['var1'] == $temple)
					$paquet->display();

				echo '
				Furie(s) possèdée(s) : '.nbf($paquet->nbfurie()).'<br/>
				Prix : '.nbf($prix_ses).' '.imress('drachme').' '.
								 nbf($prix_bois). ' '.imress('bois').' '.
								 nbf($prix_nou).' '.imress('nourriture').'
				<br/><br/>
				<form method="post" action="Temples-demeter">
				<input type="text" name="foudre" class="form_retirer" placeholder="0" size="4" />
				<b>Furie(s)</b>
				<br/><br/>
				<div class="bouton_classique"><input class="bouton_classique2" type="submit" name="action_foudre" Value="Demander"/></div>
				<br/>
				</form>';

			}
			elseif($temple == 'zeus')
			{
				$prixvin=80000;
				$prixor=60000;
				$prixnourriture=4000000;

				if($_GET['var1'] == $temple)
					$paquet->display();
				
				echo '
	Foudre(s) possédée(s) : '.nbf($paquet->nbfoudre()).'<br/>
	Prix : '.nbf($prixvin).' '.imress('vin').' '.
					 nbf($prixor). ' '.imress('gold').' '.
					 nbf($prixnourriture).' '.imress('nourriture').'
				<br/><br/>
				<form method="post" action="Temples-zeus">
				<input type="text" name="foudre" class="form_retirer" placeholder="0" size="4" />
				<b>Foudre(s)</b>
				<br/><br/>
				<div class="bouton_classique"><input class="bouton_classique2" type="submit" name="action_foudre" Value="Demander"/></div>
				</form><br/><br/>';
			}
			elseif($temple == 'poseidon')
			{
  			echo '<br/>Défense du mur : '.$paquet->getRetour().'<br/><br/>';
			
				$achator = 10000;
				$achatmarbre = 20000;
				$achateau= 10000000;	
						
				if($paquet->getRetour(2) == 0) {

				echo '<b>Mur d\'eau de Poseidon</b><br/>';

				if($_GET['var1'] == $temple)
					$paquet->display();
		
	echo 'Prix : '.nbf($achateau).' '.imress('eau').' '.
								 nbf($achatmarbre).' '.imress('marbre').' '.
								 nbf($achator).' '.imress('gold').'
	<br/>
	<form method=\'post\' action=\'Temples-poseidon\'>
	<input type="hidden" name="action" value="1" />
	<br/>
	<div class="bouton_classique"><input class="bouton_classique2" type="submit" name=\'action_mur\' Value=\'Eriger le mur de poseidon\'/></div>
	</form><br/>';
				}
				else
				{
					echo '<b>Le mur de poseidon protège votre cité</b>
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
			echo '<img src="lang/fr/images/temple/img_'.$temple.'.png" alt="'.$temples_donnees[$temple]['nom'].'" name="'.$temples_donnees[$temple]['nom'].'" class="supr_messagerie" id="temple_'.$temple.'" />';
			$i++;
			if($i%$nb != 0) {
				echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
			}
			else {
				echo '<br/>';
			}
		}
	echo '</div>';
	
	if($paquet -> getlvl() >= 10) {
		$possible = $paquet->getRetour(3);

		if(empty($possible)) {
			echo '<br/>
			<div class="centrer erreur">
			<a href="ModifierTemples">Changer l\'un de vos temples</a>
			</div>';
		}
		else {
		  echo '<br/>
			<div class="centrer">
			Vous pourrez changer l\'un de vos temples le '.
			date('d/m \à H\hi', $possible).
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
}
else {
	echo '<div class="erreur centrer">Vous n\'avez pour l\'instant aucun temple. Vous pourrez bâtir votre premier temple au niveau 2.
	<br/>Les temples vous permettent d\'honnorer les dieux et d\'obtenir de nombreux avantages.</div>';
}
?>