<?php

include('lang/'.LANG.'/donnees/batiments.php');
include('lang/'.LANG.'/donnees/unites.php');

$paquet = new EwPaquet('info_cite');

$constructions = $paquet->get_batiments();
$liste_unites  = $paquet->get_unites();
$temples       = $paquet->getTemples();
$arbre_mon     = $paquet->get_arbre();
$liste_autels  = $paquet->liste_autels();
$dernieres_news = $paquet->getRetour();
$tikets = $paquet->getRetour(2);
$btn = $paquet->getRetour(6);
$bonus = $paquet->get_bonus();

$batis = array(0,0,0,0);
$units = array(0,0,0,0);
$attaque = 0;
$defense = 0;
$points_arbre = 0;
$points_dispo = $paquet->getRetour(3);
$niveaux_autels = 0;
$niveaux_arbres = 0;
$archives = $paquet->getRetour(4);
$liste = $paquet->getRetour(5);

foreach($batiments as $bat => $details) {
	if(!empty($constructions->$bat)) {
		$batis[$details['aff']-1] += $constructions->$bat->nb;
	}
}

foreach($unites as $bat => $details) {
	if(!empty($liste_unites->$bat)) {
		$units[$details['aff']-1] += $liste_unites->$bat->nb;
		$attaque += $liste_unites->$bat->attaque;
		$defense += $liste_unites->$bat->defense;
	}
}

foreach($arbre_mon as $d) {
	$points_arbre += $d;
}

$niveaux_autels += $liste_autels->{'unite_myth'};
$niveaux_autels += $liste_autels->{'maison'};
$niveaux_autels += $liste_autels->{'lion'};
$niveaux_autels += $liste_autels->{'baisse_terrain'};
$niveaux_autels += $liste_autels->{'unite'};
$niveaux_autels += $liste_autels->{'attirance_aphrodite'};

$niveaux_arbres += $liste_autels->{'sacrifice_hera'};
$niveaux_arbres += $liste_autels->{'defense_gaia'};
$niveaux_arbres += $liste_autels->{'strategie_hippodamos'};
$niveaux_arbres += $liste_autels->{'sauvegarde_ombre'};

?>
<div class="cadre_info">
	<div class="cadre_info_haut"></div>
	<div class="cadre_info_centre"><div class="cadre_info_interieur" id="cadre_info_cite">
	<div class="titre">Cité</div>
	<div class="mtitre">Bâtiments</div>
	<div class="ligne">
		<b>Battage de la monnaie :</b> <?php echo nbf($constructions->atelierf->nb); ?> 
		<br/><b>Production : </b> <?php echo nbf($batis[0]-$constructions->atelierf->nb); ?>
		<br/><b>Militaire : </b> <?php echo nbf($batis[1]-$units[3]); ?>
		<br/><b>Logement : </b> <?php echo nbf($batis[2]); ?>
		<br/><b>Tours : </b> <?php echo nbf($units[3]); ?>
		<br/><b>Autre : </b> <?php echo nbf($batis[3]); ?>
		<br/><br/>
	</div>
	<div class="mtitre">Unités</div>
	<div class="ligne">
		<b>Humaines :</b> <?php echo nbf($units[0]+$units[1]); ?>
		<br/><b>Mythologiques :</b> <?php echo nbf($units[2]); ?>
		<br/><b>Attaque :</b> <?php echo nbf($attaque).' '.img('images/attaques/dague.png', 'attaque'); ?>
		<br/><b>Défense :</b> <?php echo nbf($defense). ' '.img('images/attaques/bouclier.png', 'défense'); ?>
		<br/><br/>
	</div>
	<div class="mtitre">Mythologie</div>
	<div class="ligne">
<?php

if(sizeof($temples) > 0) {
	if(in_array('apollon', $temples)) {
		echo '<a href="Temples-apollon">'.$temples_donnees['apollon']['nom'].'</a><br/>';
	}
	
	if(in_array('demeter', $temples)) {
		echo '<a href="Temples-demeter">'.$temples_donnees['demeter']['nom'].'</a><br/>';
	}
	
	if(in_array('hermes', $temples)) {
		echo '<a href="Temples-hermes">'.$temples_donnees['hermes']['nom'].'</a><br/>';
	}
	
	if(in_array('ares', $temples)) {
		echo '<a href="Temples-ares">'.$temples_donnees['ares']['nom'].'</a><br/>';
	}
	
	if(in_array('athena', $temples)) {
		echo '<a href="Temples-athena">'.$temples_donnees['athena']['nom'].'</a><br/>';
	}
	
	if(in_array('artemis', $temples)) {
		echo '<a href="Temples-artemis">'.$temples_donnees['artemis']['nom'].'</a><br/>';
	}
	
	if(in_array('dionysos', $temples)) {
		echo '<a href="Temples-dionysos">'.$temples_donnees['dionysos']['nom'].'</a><br/>';
	}
	
	if(in_array('hephaistos', $temples)) {
		echo '<a href="Temples-hephaistos">'.$temples_donnees['hephaistos']['nom'].'</a><br/>';
	}
	
	if(in_array('zeus', $temples)) {
		echo '<a href="Temples-zeus">'.$temples_donnees['zeus']['nom'].'</a><br/>';
	}
	
	if(in_array('poseidon', $temples)) {
		echo '<a href="Temples-poseidon">'.$temples_donnees['poseidon']['nom'].'</a><br/>';
	}
	
	if(in_array('hades', $temples)) {
		echo '<a href="Temples-hades">'.$temples_donnees['hades']['nom'].'</a><br/>';
	}
}
	echo '
	<b>Arbre des dieux :</b> '.$points_arbre.' points ';
	if($points_dispo > 0) {
		if($points_dispo > 1) {
			echo ' ('.$points_dispo.' disponibles)';
		}
		else {
			echo ' ('.$points_dispo.' disponible)';
		}
	}
	
	if($paquet->getlvl() >= 10) {
		echo '<br/><b>Autels des dieux : </b> '.$niveaux_autels.' '.($niveaux_autels>1?'niveaux':'niveau').'
		<br/><b>Statues :</b> '.$niveaux_arbres.' '.($niveaux_arbres>1?'ornements':'ornement');
	}
?><br/><br/>
	</div>
	<div class="mtitre">En cours</div>
	<div class="ligne">
	<b>Aucune taxe sur le trésor : </b>
	<?php
	if(!empty($bonus->tresor) && $bonus->tresor > $paquet->get_timestamp()) {
		echo 'Actif jusqu\'au '.print_date($bonus->tresor);
	}
	else {
		echo ' Innactif';
	}
	?>
	<br/><b>Attaques bonus : </b>
	<?php
	if(!empty($bonus->attaque) && $bonus->attaque > $paquet->get_timestamp()) {
		echo 'Actif jusqu\'au '.print_date($bonus->attaque);
	}
	else {
		echo ' Innactif';
	}
	?>
	<br/><b>Appui d'Éros : </b>
	<?php
	if(!empty($bonus->xp) && $bonus->xp > $paquet->get_timestamp()) {
		echo 'Actif jusqu\'au '.print_date($bonus->xp);
	}
	else {
		echo ' Innactif';
	}
	?>
	<br/><b>Appui d'Hermès : </b>
	<?php
	if(!empty($bonus->commerce) && $bonus->commerce > $paquet->get_timestamp()) {
		echo 'Actif jusqu\'au '.print_date($bonus->commerce);
	}
	else {
		echo ' Innactif';
	}
	?>
	<br/><b>Licence de grand commerçant : </b>
	<?php
	if(!empty($bonus->licence) && $bonus->licence > $paquet->get_timestamp()) {
		echo 'Actif jusqu\'au '.print_date($bonus->licence);
	}
	else {
		echo ' Innactif';
	}
	?>
	
	</div>
	</div></div>
	<div class="cadre_info_bas"></div>
</div>

<div class="cadre_info">
	<div class="cadre_info_haut"></div>
	<div class="cadre_info_centre"><div class="cadre_info_interieur" id="cadre_info_actu">
	<div class="titre">Actualités</div>
	<div class="ligne">
<?php

if(!empty($dernieres_news)) {
	foreach($dernieres_news as $news) {
		echo '<div class="news"><a href="'.$news->lien.'" class="titre_news">'.$news->titre.'</a>, <i>le '.date("d-m-y",$news->temps).'</i></div>';
	}
}
?>
	</div>
	</div></div>
	<div class="cadre_info_bas"></div>
</div>

<div class="cadre_info">
	<div class="cadre_info_haut"></div>
	<div class="cadre_info_centre"><div class="cadre_info_interieur" id="cadre_info_archives">
	<div class="titre">Archives</div>
	<div class="ligne">
	<?php
	
	foreach($archives as $details) {
		echo '<div class="news"><a href="" class="titre_news">'.$details->titre.'</a></div>';
	}
	
	?>
	</div>	
	</div></div>
	<div class="cadre_info_bas"></div>
</div>
<div class="cadre_info">
	<div class="cadre_info_haut"></div>
	<div class="cadre_info_centre"><div class="cadre_info_interieur" id="cadre_info_filleuls">
	<div class="titre">Filleuls</div>
	<div class="ligne"><?php
if(sizeof($liste) > 0) {
	foreach($liste as $do)	{
		if(!empty($do->timestamp)) {
			$image='<img src="images/joueurs/mb_connecter.png" alt="Joueur Connecté" />';
		}
		else {
			$image='<img src="images/joueurs/mb_deconnecter.png" alt="Joueur Déconnecté\" />';
		}
		
		echo $image.' &nbsp;  <a href=\'profilsjoueur-'.$do->id.'\'>'.$do->login.'</a><br/>';
	}
}
else {
	echo '<div class="centrer"><br/><b>Vous n\'avez actuellement aucun filleul</b><br/></div>';
}
?>
	</div>
	<div class="erreur centrer">
		Invitez vos amis et gagnez des faveurs !<br/>
	</div>
	</div></div>
	<div class="cadre_info_bas"></div>
</div>

<div class="cadre_info">
	<div class="cadre_info_haut"></div>
	<div class="cadre_info_centre"><div class="cadre_info_interieur">
	<div class="titre">Jeux</div>
	<div class="mtitre">Tickets à gratter</div>
	<div class="ligne">
	<?php
	
	if($tikets > 1) {
		echo '<b>'.$tikets.'</b> tickets restant';
	}
	else {
		echo '<b>'.$tikets.'</b> ticket restant';
	}

	if(sizeof($btn) > 0) {
		echo '<br/><br/></div>
		<div class="mtitre">Batailles navales</div>
		<div class="ligne">';
		
		foreach($btn as $do) {
			if(empty($do->titre)) {
				$do->titre='Partie publique';
			}
		
			if(($do->places == 8) && ($do->temps < $paquet->get_timestamp())) {
				$do->titre='<a href=\'partie-'.$do->id.'\'>'.$do->titre.'</a>';
			}
		
			echo $do->titre.'<br/>';
		}
	}
	
	?>
	</div>	
	</div></div>
	<div class="cadre_info_bas"></div>
</div>