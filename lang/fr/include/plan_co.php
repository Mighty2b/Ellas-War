<?php

$alliance = $paquet->getalliance();
if(!empty($alliance)) {
	$info = $paquet->getinfoalliance();
}
?>
       <a href="actualites" class="titre">Actualités du jeu</a>
  <br/><a href="http://wiki.ellaswar.com" class="titre">FAQ</a>
		
			<br/><a href="http://wiki.ellaswar.com/index.php/Premiers_pas" class="ss_titre">Premiers pas</a>
			<br/><a href="http://wiki.ellaswar.com/index.php/Les_attaques" class="ss_titre">Les attaques</a>
			<br/><a href="http://wiki.ellaswar.com/index.php/Les_temples" class="ss_titre">Les temples</a>
			<br/><a href="http://wiki.ellaswar.com/index.php/Les_alliances" class="ss_titre">Les alliances</a>
			<br/><a href="http://wiki.ellaswar.com/index.php/Les_guerres" class="ss_titre">Les guerres</a>
			<br/><a href="http://wiki.ellaswar.com/index.php/Le_march%C3%A9" class="ss_titre">Le marché</a>
			<br/><a href="http://wiki.ellaswar.com/index.php/Les_ressources" class="ss_titre">Les ressources</a>
			<br/><a href="http://wiki.ellaswar.com/index.php/Faveurs" class="ss_titre">Les faveurs</a>
			<br/><a href="http://wiki.ellaswar.com/index.php/Les_r%C3%A8gles" class="ss_titre">Quelques règles</a>
			<br/><a href="http://wiki.ellaswar.com/index.php/Extra" class="ss_titre">Extra</a>
		
	
	<br/><a href="teamspeak" class="titre">Serveur Teamspeak</a>
	<br/><a href="partenaires" class="titre">Partenaires</a>
	<br/><a href="conditionsgeneralesutilisation" class="titre">Conditions générales d'utilisation</a>
	<br/><a href="quelquesmotssurlesite" class="titre">Quelques mots sur le site</a>
	<br/><a href="<?php echo SITE_URL;?>" class="titre">Constructions</a>
		
			<br/><a href="<?php echo SITE_URL;?>" class="ss_titre">Ma cité</a>
			<br/><a href="Construire" class="ss_titre">Construire</a>
			<br/><a href="Armurerie" class="ss_titre">Armurerie</a>
			<br/><a href="Tresor" class="ss_titre">Trésor</a>
			<br/><a href="Visiter" class="ss_titre">Visiter</a>
			<br/><a href="oracle" class="ss_titre">Oracle</a>
			<br/><a href="sondage" class="ss_titre">Sondage</a>
			<br/><a href="Faveurs" class="ss_titre">Faveurs</a>
		
	<?php
	if(!empty($alliance)) {	
    echo '<br/><br/><br/><br/>';
  }
  ?>
	<br/><a href="PasserEnRevue" class="titre">Armée</a>
		
			<br/><a href="Attaquer" class="ss_titre">Attaquer</a>
			<br/><a href="PasserEnRevue" class="ss_titre">Passer en revue</a>
			<br/><a href="Engager" class="ss_titre">Engager</a>
			<br/><a href="MesAttaques" class="ss_titre">Mes attaques</a>
			<br/><a href="StrategieDefensive" class="ss_titre">Stratégie défensive</a>
			<br/><a href="StrategieOffensive" class="ss_titre">Stratégie offensive</a>
		
	
	<br/><a href="Archives" class="titre">Archives</a>
	<br/><a href="<?php echo ((sizeof($paquet->getTemples()) >= 4)?'AutelDesDieux':'Temples'); ?>" class="titre">Mythologie</a>
		
			<br/><a href="AutelDesDieux" class="ss_titre">Autel des dieux</a>
			<br/><a href="Temples" class="ss_titre">Temples</a>
			<br/><a href="Statues" class="ss_titre">Statues</a>
			<br/><a href="Prieres" class="ss_titre">Prières</a>
	
	<?php
	if(!empty($alliance)) {
echo'	<br/><a href="Alliance" class="titre">Alliance</a>
		
			  <br/><a href="LesAlliances" class="ss_titre">Diplomatie</a>
			  <br/><a href="ProfilMonAlliance" class="ss_titre">Profils</a>
			  <br/><a href="Ecrire_alliance" class="ss_titre">Ecrire un message à mon alliance</a>';
			  if($info -> level >= 2) {
				  echo '<br/><a href="Cotisations" class="ss_titre">Cotisations</a>';
			  }
			
			  if($info -> nb_membre > 1) {
				  echo '<br/><a href="Dons" class="ss_titre">Faire un don</a>';
			  }
			  echo '
			  <br/><a href="Cotisations" class="ss_titre">Cotisations</a>
			  <br/><a href="Coffre" class="ss_titre">Coffre de l\'alliance</a>';
			  if($paquet -> possible_transmettre() == true) {
				  echo '<br/><a href="Nommer" class="ss_titre">Nommer</a>';
			  }
			
			  echo '<br/><a href="Recrutements" class="ss_titre">Recrutement</a>
			  <br/><a href="Pactes" class="ss_titre">Pactes</a>
			  <br/><a href="Guerres" class="ss_titre">Guerres</a>';

			  if(($info -> level > 1) && ($paquet -> peut_contrat())) {
				  echo '<br/><a href="Contrats" class="ss_titre">Contrats</a>';
				  $br=1;
			  }

			  echo '<br/><a href="AArchives_alliance" class="ss_titre">Archives</a><br/><br/>';

			  if(empty($br)) {
			    echo '<br/><br/><br/>';
			  }
	}
	else {
		echo '<br/><a href="LesAlliances" class="titre">Alliance</a>';
	}
	?>
	<br/><a href="Messagerie" class="titre">Messagerie</a>
		
			<br/><a href="ListeNoire" class="ss_titre">Liste noire</a>
			<br/><a href="ArchivesDeMessagerie" class="ss_titre">Archives</a>
			<br/><a href="BoiteEnvoie" class="ss_titre">Boîte d'envoi</a>
			<br/><a href="Messagerie" class="ss_titre">Boîte de réception</a>
			<br/><a href="NouveauMessage" class="ss_titre">Nouveau message</a>
	<?php
	if(empty($alliance)) {	
    echo '<br/><br/><br/><br/><br/>';
  }
  ?>
	<br/><a href="MesVentes" class="titre">Marché</a>
		
			<br/><a href="DonnerUneFaveur" class="ss_titre">Donner une faveur</a>
			<br/><a href="MarcheAuDetails" class="ss_titre">Marché au détails</a>
			<br/><a href="MarcheDeGros" class="ss_titre">Marché de gros</a>
			<br/><a href="Vendre" class="ss_titre">Vendre</a>
			<br/><a href="Licences" class="ss_titre">Licences</a>
			<br/><a href="MesVentes" class="ss_titre">Mes ventes</a>
			<br/><a href="Faveurs" class="ss_titre">Faveurs</a>
		
	
	<br/><a href="classements" class="titre">Classements</a>
		
			<br/><a href="classementdesalliances" class="ss_titre">Classement des alliances</a>
			<br/><a href="classementdesjoueurs" class="ss_titre">Classement des joueurs</a>
		
	
	<br/><a href="InformationsPersonnelles" class="titre">Extra</a>
		
			<br/><a href="PageContact" class="ss_titre">Contact</a>
			<br/><a href="Parrainage" class="ss_titre">Parrainage</a>
			<br/><a href="Bibliotheque" class="ss_titre">Bibliothéque</a>
			<br/><a href="Pause" class="ss_titre">Pause</a>
			<br/><a href="Amis" class="ss_titre">Mes amis</a>
			<br/><a href="AdresseMail" class="ss_titre">Adresse mail</a>
			<br/><a href="MotdePasse" class="ss_titre">Mot de passe</a>
			<br/><a href="InformationsPersonnelles" class="ss_titre">Informations personnelles</a>
			<br/><a href="Jeux" class="ss_titre">Jeux</a>
		
	<br/><a href="VosObjectifs" class="titre">Vos objectifs</a>
	<br/><a href="Details" class="titre">Détails</a>
	<?php
	if(empty($alliance)) {	
    echo '<br/><br/><br/>';
  }
  ?>