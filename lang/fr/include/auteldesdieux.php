<h1>Autel des dieux</h1>
<br/>
<?php
	$paquet->display();
?>
<p align='justify'>Un dieu puissant vous soutient et grâce à cela, vous pouvez obtenir de nombreuses améliorations pour votre cité. Ces améliorations devront être méritées, elles ne vous sont donc pas toutes accessibles immédiatement. Mais n'oubliez pas, les voies des dieux sont impénétrables.</p>

<div class="ligne2 gauche liste_autels" id="cadre_autel_myth">
<h2>Songe de Prométhée</h2>
<div class="ligne80">
	<div class="gauche_autel">
		<b>Niveau :</b> <?php echo $liste_autels->unite_myth; ?>
		<br/>
<?php
			if($condition_promethee == true) {
				echo '<b>Prix :</b> '.nbf($prix_autel['unite_myth']['gold'] * (
				$liste_autels->unite_myth+1)).' '.
				imress('gold').' '.
				nbf($prix_autel['unite_myth']['vin'] * (
				$liste_autels->unite_myth+1)).' '.
				imress('vin').'
		<br/><br/>
		<div class="ligne centrer"><b><a href="AutelDesDieux-unite_myth">Obtenir</a></b></div>';
		}
		?>
	</div>
	<div class="droite_autel">
	Prométhée augmente le nombre d'unités mythologiques que vous pouvez posséder.
	<br/>
	<br/><b>Niveau 1 :</b> +10%
	<br/><b>Niveau 2 :</b> +20%
	<br/><b>Niveau 3 :</b> +30%
	<br/><b>Niveau 4 :</b> +40%
	<br/><b>Niveau 5 :</b> +50%
	</div>
</div>
</div>

<div class="ligne2 gauche liste_autels" id="cadre_autel_dino">
<h2>Aménagement de Dinocrate</h2>
<div class="ligne80">
	<div class="gauche_autel">
		<b>Niveau :</b> <?php echo $liste_autels->baisse_terrain; ?>
		<br/>
<?php
if($liste_autels->baisse_terrain >= 1) {
	if($active_ter == 1)
	{
		echo '<br/><br/><b>Actuellement :</b> Place minimale<br/>';
		echo '<a href=\'AutelDesDieux-1-0\'>Passer en mode normal</a><br/>';
		echo '<a href=\'AutelDesDieux-1-2\'>Augmenter la taille</a><br/>';
	}
	elseif($active_ter == 2)
	{
		echo '<br/><br/><b>Actuellement :</b> Place maximale<br/>';
		echo '<a href=\'AutelDesDieux-1-1\'>Réduire la taille</a><br/>';
		echo '<a href=\'AutelDesDieux-1-0\'>Passer en mode normal</a><br/>';
	}
	else
	{
		echo '<br/><br/><b>Actuellement :</b> Place normale<br/>';
		echo '<a href=\'AutelDesDieux-1-1\'>Réduire la taille</a><br/>';
		echo '<a href=\'AutelDesDieux-1-2\'>Augmenter la taille</a><br/>';
	}
}
		if($condition_dino == true) {
			echo '<b>Prix :</b> '.
			nbf($prix_autel['baisse_terrain']['bois'] * 
			($liste_autels->baisse_terrain+1)).' '.
			imress('bois').' '.
			nbf($prix_autel['baisse_terrain']['pierre'] * 
			($liste_autels->baisse_terrain+1)).' '.
			imress('pierre').' <br/>'.
			nbf($prix_autel['baisse_terrain']['marbre'] * 
			($liste_autels->baisse_terrain+1)).' '.imress('marbre');
			
			echo '<br/><br/>
		<div class="ligne centrer"><b><a href="AutelDesDieux-baisse_terrain">Obtenir</a></b></div>';
		}
		?>
	</div>
	<div class="droite_autel">
	Dinocrate vous aidera à ré-agencer votre cité afin de réduire le terrain qu'elle occupe ou au contraire l'augmenter.
	<br/>
	<br/><b>Niveau 1 :</b> +/-5%
	<br/><b>Niveau 2 :</b> +/-10%
	<br/><b>Niveau 3 :</b> +/-15%
	<br/><b>Niveau 4 :</b> +/-20%
	<br/><b>Niveau 5 :</b> +/-25%
	</div>
</div>
</div>

<div class="ligne2 gauche liste_autels" id="cadre_autel_maison">
<h2>Hospitalité d'Hestia</h2>
<div class="ligne80">
	<div class="gauche_autel">
		<b>Niveau :</b> <?php echo $liste_autels->maison; ?>
		<br/>
<?php
			if($condition_hestia == true) {
				echo '<b>Prix :</b> '.
				nbf($prix_autel['maison']['eau'] * 
				($liste_autels->maison+1)).' '.
				 imress('eau').' '.
				 nbf($prix_autel['maison']['nourriture'] * (
				 $liste_autels->maison+1)).' '.
				imress('nourriture').' <br/>'.
				nbf($prix_autel['maison']['raisin'] * (
				$liste_autels->maison+1)).' '.
				imress('raisin').' '.
				nbf($prix_autel['maison']['vin'] * (
				$liste_autels->maison+1)).' '.
				imress('vin').'
		<br/><br/>
		<div class="ligne centrer">
		<b><a href="AutelDesDieux-maison">Obtenir</a></b></div>';
		}
		?>
	</div>
	<div class="droite_autel">
	Hestia vous permettra de loger plus d'unités dans vos huttes, habitations, palais et grottes.
	<br/>
	<br/><b>Niveau 1 :</b> +10%
	<br/><b>Niveau 2 :</b> +20%
	<br/><b>Niveau 3 :</b> +30%
	<br/><b>Niveau 4 :</b> +40%
	<br/><b>Niveau 5 :</b> +50%
	</div>
</div>
</div>

<div class="ligne2 gauche liste_autels" id="cadre_autel_lion">
<h2>Lions d'Atlas</h2>
<div class="ligne80">
	<div class="gauche_autel">
		<b>Niveau :</b> <?php echo $liste_autels->lion; ?>
		<br/>
<?php
			if($condition_lion == true) {
				echo '<b>Prix :</b> '.
				nbf($prix_autel['lion']['nourriture'] * ($liste_autels->lion+1)).' '.
				imress('nourriture').' '.
				nbf($prix_autel['lion']['gold'] * ($liste_autels->lion+1)).' '.imress('gold').'
		<br/><br/>
		<div class="ligne centrer"><b><a href="AutelDesDieux-lion">Obtenir</a></b></div>';
		}
		?>
	</div>
	<div class="droite_autel">
	Atlas vous permettra de recruter ses terribles lions pour défendre votre cité.
	<br/>
	<br/><b>Niveau 1 :</b> 500
	<br/><b>Niveau 2 :</b> 1000
	<br/><b>Niveau 3 :</b> 1500
	<br/><b>Niveau 4 :</b> 2000
	<br/><b>Niveau 5 :</b> 2500
	</div>
</div>
</div>

<div class="ligne2 gauche liste_autels" id="cadre_autel_unite">
<h2>Unités divines</h2>
<div class="ligne80">
	<div class="gauche_autel">
		<b>Niveau :</b> <?php echo $liste_autels->unite; ?>
		<br/>
<?php
			if($condition_unite == true) {
				echo '<b>Prix :</b> '.
				nbf($prix_autel['unite']['fer'] * ($liste_autels->unite+1)).' '.
				imress('fer').' '.
				nbf($prix_autel['unite']['gold'] * ($liste_autels->unite+1)).' '.
				imress('gold').'
		<br/><br/>
		<div class="ligne centrer"><b><a href="AutelDesDieux-unite">Obtenir</a></b></div>';
		}
		?>
	</div>
	<div class="droite_autel">
	Les dieux vous céderont leurs terribles cyclopes pour combattre à vos côtés.
	<br/>
	<br/><b>Niveau 1 :</b> 1200
	<br/><b>Niveau 2 :</b> 2400
	<br/><b>Niveau 3 :</b> 3600
	<br/><b>Niveau 4 :</b> 4800
	<br/><b>Niveau 5 :</b> 6000
	</div>
</div>
</div>

<div class="ligne2 gauche liste_autels" id="cadre_autel_aphro">
<h2>Attirance d'Aphrodite</h2>
<div class="ligne80">
	<div class="gauche_autel">
		<b>Niveau :</b> <?php echo $liste_autels->attirance_aphrodite; ?>
		<br/>
<?php
		if($condition_attirance_aphrodite == true) {
			echo '<b>Prix :</b> '.
			nbf($prix_autel['attirance_aphrodite']['nourriture'] * (
			$liste_autels->attirance_aphrodite+1)).' '.
			imress('nourriture').' '.
			nbf($prix_autel['attirance_aphrodite']['raisin'] * (
			$liste_autels->attirance_aphrodite+1)).' '.imress('raisin').' <br/>'.
			nbf($prix_autel['attirance_aphrodite']['marbre'] * (
			$liste_autels->attirance_aphrodite+1)).' '.
			imress('marbre').' '.
			nbf($prix_autel['attirance_aphrodite']['gold'] * (
			$liste_autels->attirance_aphrodite+1)).' '.imress('gold').'
		<br/><br/>
		<div class="ligne centrer"><b><a href="AutelDesDieux-attirance_aphrodite">Obtenir</a></b></div>';
		}
		
		echo '
	</div>
	<div class="droite_autel">
	Aphrodite charmera de terribles créatures afin de les mettre à votre service.
	<br/>
	</div>
</div>
</div>

<div id="tab_autel_dieux">
<div class="ligne cadre">
<div class="cadre_33 centrer" id="click_aphro">';
	
	if($condition_attirance_aphrodite == true ) {
		echo '<img src="lang/fr/images/autel/attiranceaphrodite.png" alt="Attirance d\'aphrodite" title="Attirance d\'aphrodite" />';
	}
	elseif($liste_autels->attirance_aphrodite >= 5) {
		echo '<img src="lang/fr/images/autel/attiranceaphrodite3.png" alt="Attirance d\'aphrodite" title="Attirance d\'aphrodite" />';
	}
	else {
		echo '<img src="lang/fr/images/autel/attiranceaphrodite2.png" alt="Attirance d\'aphrodite" title="Attirance d\'aphrodite" />';
	}

echo '
</div>
<div class="cadre_33 centrer" id="click_dino">';
	
	if($condition_dino == true) {
		echo '<img src="lang/fr/images/autel/dino.png" alt="Aménagement de Dinocrate" title="Aménagement de Dinocrate" />';
	}
	elseif($liste_autels->baisse_terrain >= 5) {
		echo '<img src="lang/fr/images/autel/dino3.png" alt="Aménagement de Dinocrate" title="Aménagement de Dinocrate" />';
	}
	else {
		echo '<img src="lang/fr/images/autel/dino2.png" alt="Aménagement de Dinocrate" title="Aménagement de Dinocrate" />';
		}
echo '
</div>
<div class="cadre_33 centrer" id="click_maison">';

if($condition_hestia == true) {
	echo '<img src="lang/fr/images/autel/hospitalitdhestia.png" alt="Hospitalité d\'Hestia" title="Hospitalité d\'Hestia" />';
}
elseif($liste_autels->maison >= 5) {
	echo '<img src="lang/fr/images/autel/hospitalitdhestia3.png" alt="Hospitalité d\'Hestia" title="Hospitalité d\'Hestia" />';
}
else {
	echo '<img src="lang/fr/images/autel/hospitalitdhestia2.png" alt="Hospitalité d\'Hestia" title="Hospitalité d\'Hestia" />';
}

echo '
</div>
</div>

<div class="ligne cadre">
<div class="cadre_33 centrer" id="click_lion">';

if($condition_lion == true) {
	echo '<img src="lang/fr/images/autel/lionsdatlas.png" alt="Lions d\'Atlas" title="Lions d\'Atlas" />';
}
elseif($liste_autels->lion >= 5) {
	echo '<img src="lang/fr/images/autel/lionsdatlas3.png" alt="Lions d\'Atlas" title="Lions d\'Atlas" />';
}
else {
	echo '<img src="lang/fr/images/autel/lionsdatlas2.png" alt="Lions d\'Atlas" title="Lions d\'Atlas" />';
}

echo '
</div>
<div class="cadre_33 centrer" id="click_myth">';

if($condition_promethee == true) {
	echo '<img src="lang/fr/images/autel/songedeprometee.png" alt="Songe de Promethée" title="Songe de Promethée" />';
}
elseif($liste_autels->unite_myth >= 5) {
	echo '<img src="lang/fr/images/autel/songedeprometee3.png" alt="Songe de Promethée" title="Songe de Promethée" />';
}
else {
	echo '<img src="lang/fr/images/autel/songedeprometee2.png" alt="Songe de Promethée" title="Songe de Promethée" />';
}

echo '
</div>
<div class="cadre_33 centrer" id="click_unite">';

if($condition_unite == true) {
	echo '<img src="lang/fr/images/autel/unitsdivineou.png" alt="Unités divines" title="Unités divines" />';
}
elseif($liste_autels->unite >= 5) {
	echo '<img src="lang/fr/images/autel/unitsdivineou3.png" alt="Unités divines" title="Unités divines" />';
}
else {
	echo '<img src="lang/fr/images/autel/unitsdivineou2.png" alt="Unités divines" title="Unités divines" />';
}

echo '
</div>
</div>
</div>';

if(!empty($_GET['var1'])) {
echo ' <script type="text/javascript">
	
	$(function(){';
  switch($_GET['var1']) {
	  case 'unite_myth':
		  echo '$("#cadre_autel_myth").show("slow");';
		  break;
	  case '1':
	  case '2':
	  case 'baisse_terrain':
		  echo '$("#cadre_autel_dino").show("slow");';
		  break;
	  case 'maison':
		  echo '$("#cadre_autel_maison").show("slow");';
		  break;
	  case 'lion':
		  echo '$("#cadre_autel_lion").show("slow");';
		  break;
	  case 'unite':
		  echo '$("#cadre_autel_unite").show("slow");';
		  break;
	  case 'attirance_aphrodite':
		  echo '$("#cadre_autel_aphro").show("slow");';
			  break;
	  }
	echo '});
	</script>';
}

?>