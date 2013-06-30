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
$tikets= $paquet->getRetour(2);
$btn   = $paquet->getRetour(6);
$bonus = $paquet->get_bonus();
$oracle= $paquet->getRetour(7);
$dernieres_breves = $paquet->getRetour(8);
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
$points_hf = 0;
$points_tf = 0;

$liste_hf = $paquet->getRetour(9);

foreach($liste_hf as $hf) {
	if($hf->type == 7) {
		$points_tf++;
	}
	else {
		$points_hf++;
	}
}

$defense_tours = 0;

if(!empty($constructions->tourguet)) {
	$defense_tours += $constructions->tourguet->nb;
}

if(!empty($constructions->tourobs)) {
	$defense_tours += $constructions->tourobs->nb;
}

if(!empty($constructions->tourgarde)) {
	$defense_tours += $constructions->tourgarde->nb;
}

if(!empty($constructions->tourmir)) {
	$defense_tours += $constructions->tourmir->nb;
}

foreach($batiments as $bat => $details) {
	if(!empty($constructions->$bat)) {
		$batis[$details['aff']-1] += $constructions->$bat->nb;
	}
}

foreach($unites as $bat => $details) {
	if(!empty($liste_unites->$bat)) {
		$units[$details['aff']-1] += $liste_unites->$bat->nb;
		$attaque += $liste_unites->$bat->attaque*$liste_unites->$bat->nb;
		$defense += $liste_unites->$bat->defense*$liste_unites->$bat->nb;
	}
}

foreach($arbre_mon as $d) {
	$points_arbre += $d;
}

if(!empty($liste_autels)) {
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
}

?>
<div id="info_cite_gauche">
<div class="cadre_info">
	<div class="cadre_info_haut"></div>
	<div class="cadre_info_centre"><div class="cadre_info_interieur" id="cadre_info_cite">
	<div class="ligne centrer"><a href="constructions" class="titre">Cité</a></div>
	<div class="ligne"><a class="mtitre" href="constructions">Bâtiments</a></div>
	<div class="ligne">
		<table width="100%">
		<tr>
			<td width="50%"><a href="Construire-1"><b>Battage de la monnaie :</b> <?php echo nbf($constructions->atelierf->nb); ?></a></td> 
			<td width="50%"><a href="Construire-1"><b>Production : </b> <?php echo nbf($batis[0]-$constructions->atelierf->nb); ?></a></td>
		</tr>
		<tr>
			<td><a href="Construire-2"><b>Militaire : </b> <?php echo nbf($batis[1]-$units[3]); ?></a></td>
			<td><a href="Construire-3"><b>Logement : </b> <?php echo nbf($batis[2]); ?></a></td>
		</tr>
		<tr>
			<td><a href="Engager-4"><b>Tours : </b> <?php echo nbf($units[3]); ?></a></td>
			<td><?php
			if($units[3] > 0) {
				echo '<a href="PasserEnRevue"><b>Défense</b> : '.nbf($defense_tours). ' '.img('images/attaques/bouclier.png', 'défense');
			}
			else {
				echo '<a href="Construire-4"><b>Autre : </b> '.nbf($batis[3]);
			} ?></a></td>
		</tr>
		</table>
		<br/>
	</div>
	<a class="mtitre" href="PasserEnRevue">Unités</a>
	<div class="ligne">
		<table width="100%">
		<tr>
			<td width="50%"><a href="Engager"><b>Humaines :</b> <?php echo nbf($units[0]+$units[1]); ?></a></td>
			<td width="50%"><a href="Engager-3"><b>Mythologiques :</b> <?php echo nbf($units[2]); ?></a></td>
		</tr>
		<tr>
			<td><a href="PasserEnRevue"><b>Attaque :</b> <?php echo nbf($attaque).' '.img('images/attaques/dague.png', 'attaque'); ?></a></td>
			<td><a href="PasserEnRevue"><b>Défense :</b> <?php echo nbf($defense). ' '.img('images/attaques/bouclier.png', 'défense'); ?></a></td>
		</tr>
		</table>
		<br/>
	</div>
	<a href="<?php
if($paquet->getlvl() == 0) {
	echo 'Prieres';
}
elseif(sizeof($paquet->getTemples()) >= 4) {
	echo 'AutelDesDieux';
}
else {
	echo 'Temples';
}

echo '" class="mtitre">Mythologie</a>
	<div class="ligne">';

if(sizeof($temples) > 0) {
	echo '<table width="100%">
	<tr>
		<td width="50%" valign="top">';
	
	if(in_array('apollon', $temples)) {
		echo '<a href="Temples-apollon">'.$temples_donnees['apollon']['nom'].'</a><br/>';
	}
	
	if(in_array('demeter', $temples)) {
		echo '<a href="Temples-demeter">'.$temples_donnees['demeter']['nom'].
		' ('.nbf($paquet-> nbfurie()).' <img height=\'10px\' src=\'images/attaques/vignette102.gif\' alt="Furies" title="Furies" />)</a><br/>';
	}
	
	if(in_array('hermes', $temples)) {
		echo '<a href="Temples-hermes">'.$temples_donnees['hermes']['nom'].'</a><br/>';
	}
	echo '</td><td width="50%" valign="top">';
	if(in_array('ares', $temples)) {
		echo '<a href="Temples-ares">'.$temples_donnees['ares']['nom'].'</a><br/>';
	}
	
	if(in_array('athena', $temples)) {
		echo '<a href="Temples-athena">'.$temples_donnees['athena']['nom'].'</a><br/>';
	}
	
	echo '</td></tr>
	<tr><td valign="top">';
		
	if(in_array('artemis', $temples)) {
		echo '<a href="Temples-artemis">'.$temples_donnees['artemis']['nom'].'</a><br/>';
	}

	if(in_array('dionysos', $temples)) {
		echo '<a href="Temples-dionysos">'.$temples_donnees['dionysos']['nom'].'</a><br/>';
	}
	
	if(in_array('hephaistos', $temples)) {
		echo '<a href="Temples-hephaistos">'.$temples_donnees['hephaistos']['nom'].'</a><br/>';
	}
	echo '</td><td valign="top">';
	if(in_array('zeus', $temples)) {
		echo '<a href="Temples-zeus">'.$temples_donnees['zeus']['nom'].
		' ('.nbf($paquet-> nbfoudre()).' <img height=\'10px\' src=\'images/attaques/zeus.gif\' alt="Foudres" title="Foudres" />)</a><br/>';
	}
	
	if(in_array('poseidon', $temples)) {
		echo '<a href="Temples-poseidon">'.$temples_donnees['poseidon']['nom'].'</a><br/>';
	}
	
	if(in_array('hades', $temples)) {
		echo '<a href="Temples-hades">'.$temples_donnees['hades']['nom'].'</a><br/>';
	}
	echo '</td></tr></table>';
}

	echo '<table width="100%">
	<tr>
	<td>
	<a href="arbredesdieux"><b>Arbre des dieux :</b> '.$points_arbre.' points ';
	if($points_dispo > 0) {
		if($points_dispo > 1) {
			echo ' <span class="mini_texte">('.$points_dispo.' disponibles)</span>';
		}
		else {
			echo ' <span class="mini_texte">('.$points_dispo.' disponible)</span>';
		}
	}
	
	$nb_bonus = sizeof($paquet->get_bonus_connexion());
	
	echo '</a></td><td>
	<a href="Bonus"><b>Bonus :</b>  ';
	
	if($nb_bonus >= 3) {
		echo '<span class="erreur">'.$nb_bonus.'</span>';
	}
	else {
		echo $nb_bonus;
	}
	
	echo '</a>
	</td></tr>';
	if($paquet->getlvl() >= 10) {
		echo '<tr>
		<td width="50%"><a href="AutelDesDieux"><b>Autels des dieux : </b> '.$niveaux_autels.' '.($niveaux_autels>1?'niveaux':'niveau').'</a></td>
		<td width="50%"><a href="Statues"><b>Statues :</b> '.$niveaux_arbres.' '.($niveaux_arbres>1?'ornements':'ornement').'</a></td>
		</tr>';
	}
	
	echo '<tr>
	<td><a href="Succes"><b>Points de succès :</b> '.$points_hf.'</a>
	</td>
	<td><a href="Succes-7"><b>Tours de force :</b> '.$points_tf.'</a>
	</td>';
	
	echo '</table>';
?><br/>
	</div>
	<div class="mtitre">En cours</div>
	<div class="ligne">
	<a href="Faveurs"><b>Appui d'Hébé : </b>
	<?php
	if(!empty($bonus->tresor) && $bonus->tresor > $paquet->get_timestamp()) {
		echo 'Actif jusqu\'au '.print_date($bonus->tresor);
	}
	else {
		echo ' Inactif';
	}
	?></a>
	<br/>
	<a href="Faveurs"><b>Attaques bonus : </b>
	<?php
		echo $bonus->attaque;
	?></a>
	<br/>
	<a href="Faveurs"><b>Appui d'Éros : </b>
	<?php
	if(!empty($bonus->xp) && $bonus->xp > $paquet->get_timestamp()) {
		echo 'Actif jusqu\'au '.print_date($bonus->xp);
	}
	else {
		echo ' Inactif';
	}
	?></a>
	<br/>
	<a href="Faveurs"><b>Appui d'Hermès : </b>
	<?php
	if(!empty($bonus->commerce) && $bonus->commerce > $paquet->get_timestamp()) {
		echo 'Actif jusqu\'au '.print_date($bonus->commerce);
	}
	else {
		echo ' Inactif';
	}
	?></a>
	<br/><a href="Licences"><b>Licence de grand commerçant : </b>
	<?php
	if(!empty($bonus->licence) && $bonus->licence > $paquet->get_timestamp()) {
		echo 'Actif jusqu\'au '.print_date($bonus->licence);
	}
	else {
		echo ' Inactif';
	}
	?></a>
	</div>
	</div></div>
	<div class="cadre_info_bas"></div>
</div>

<div class="cadre_info">
	<div class="cadre_info_haut"></div>
	<div class="cadre_info_centre"><div class="cadre_info_interieur" id="cadre_info_oracle">
	<div class="ligne centrer"><a href="oracle" class="titre">Oracle</a></div>
	<div class="ligne centrer">
	<?php 
	
	echo '<a href="NouveauMessage-'.$oracle->id.'" class="gras">Contacter '.$oracle->login.' l\'Oracle</a>';
	
	?>
	</div>
	</div></div>
	<div class="cadre_info_bas"></div>
</div>

<div class="cadre_info">
	<div class="cadre_info_haut"></div>
	<div class="cadre_info_centre"><div class="cadre_info_interieur" id="cadre_info_filleuls">
	<div class="ligne centrer"><a href="Parrainage" class="titre">Filleuls</a></div>
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
elseif($paquet->nb_fil() == 0) {
	echo '<div class="centrer"><br/><b>Vous n\'avez actuellement aucun filleul</b><br/></div>';
}
?>
	</div>
	<div class="centrer">
		<a href="Parrainage" class="erreur">Invitez vos amis et gagnez des faveurs !</a><br/>
	</div>
	</div></div>
	<div class="cadre_info_bas"></div>
</div>

</div><div id="info_cite_droite">

<div class="cadre_info">
	<div class="cadre_info_haut"></div>
	<div class="cadre_info_centre"><div class="cadre_info_interieur" id="cadre_info_actu">
	<div class="ligne centrer"><a href="actualites" class="titre">Actualités</a></div>
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
	<div class="cadre_info_centre"><div class="cadre_info_interieur" id="cadre_info_breves">
	<div class="ligne centrer"><a href="breves" class="titre">Brèves</a></div>
	<div class="ligne">
<?php

if(!empty($dernieres_breves)) {
	foreach($dernieres_breves as $breves) {
		echo '<div class="news"><a href="'.$breves->lien.'" class="titre_news">'.$breves->titre.'</a>, <i>le '.date("d-m-y",$breves->temps).'</i></div>';
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
	<div class="ligne centrer"><a href="Archives" class="titre">Archives</a></div>
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
	<div class="cadre_info_centre"><div class="cadre_info_interieur">
	<div class="ligne centrer"><a href="Jeux" class="titre">Jeux</a></div>
	<div class="ligne">
	<table width="100%">
		<tr>
		<td width="50%">
		<a href="Ticket" class="mtitre">Tickets à gratter</a><br/>
		<a href="Ticket"><?php
		if($tikets > 1) {
			echo '<b>'.$tikets.'</b> tickets restant';
		}
		else {
			echo '<b>'.$tikets.'</b> ticket restant';
		}
		echo '</a></td>
		<td width="50%"><a href="Loto" class="mtitre">Jouez au loto</a><br/>
		<a href="Loto">Un ticket gratuit par semaine !</a></td>
		</tr>
		<tr>
		<td>';
	if($paquet->getlvl() > 1 or sizeof($btn) > 0) {
		echo '<a href="BataillesNavales" class="mtitre">Batailles navales</a><br/>';
		if(sizeof($btn) > 0) {
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
	}
	?></td>
	<td><a href="CarreMagique" class="mtitre">Carré magique</a><br/>
	<a href="CarreMagique">Aidez le jeu et remportez des faveurs !</a>
	</td>
	</tr>
	</table>
	</div>	
	</div></div>
	<div class="cadre_info_bas"></div>
</div>
</div>