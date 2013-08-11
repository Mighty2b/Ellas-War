<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
//Fichier de config client
include('config.php');

//Les fonctions
include('fct_generique.php');

//Par rapport à la langue
include('lang/'.LANG.'/fonctions.php');
include('lang/'.LANG.'/donnees/donnees.php');

//Les class
include('class/class_ewpaquet.php');
session_start();
$paquet = new EwPaquet('get_missives');
$var_missives      = $paquet->getRetour();
$var_nb_archives   = $paquet->getRetour(2);
$var_next_archives = $paquet->getRetour(3);
$ress_var          = $paquet->get_ress_var();
$var_ress          = $paquet->get_ress();

//On voit les pages autorisées
//Les includes
switch($paquet->get_statu()) {
	case 1:
		include('autorise/priveautorise.php');
	break;
	
	case 2:
		include('autorise/manqueautorise.php');
	break;
	
	case 3:
		include('autorise/bloqueautorise.php');
	break;
	
	case 4:
		include('autorise/pauseautorise.php');
	break;
	
	case 5:
		include('autorise/aboautorise.php');
	break;
	
	default:
		include('autorise/pubautorise.php');
	break;
}

include('autorise/pre_header.php');

if(!empty($_GET['page'])) {
	$page = trad_get_page($_GET['page']);
	if(!in_array($page,$autorise)) {
		$page = $autorise[0];
	}
}
else {
	$page = $autorise[0];
}

if(in_array($page,$pre_header)) {
  include('header/'.$page.'.php');
}

echo '<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
				<link rel="stylesheet" href="css/design.css" />';
if($paquet->get_statu() == 1) {
	echo '<link rel="stylesheet" href="css/design_co.css" />';
	echo '<link rel="stylesheet" href="css/scode.css" />';
}
else {
	echo '<link rel="stylesheet" href="css/design_deco.css" />';
}

echo '<!–[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]–>';

echo '<script type="text/javascript" src="js/jquery.min.js" ></script>';
echo '<script type="text/javascript" src="js/scripts.js" ></script>';
	
css_meteo($paquet->getmeteo(), $paquet->getstatu());

if($paquet->get_statu() == 0) {
	if($paquet->is_event('noel')) {
		echo '
		<style>
		body {background-image:url(\'design/deco/font_ew_neige.png\');}
		#centre_design2 {background-image:url(\'design/noel/sous_menu.png\');}
		#banniere {background-image:url(\'design/noel/banniere.png\');}
		#barre_menu {background-image:url(\'design/noel/barre_menu2.png\');}
		#centre_design3 {background-image: url("design/noel/design_bas.png");}
		</style>';
		echo '<script src="js/flocons.js"></script>';
	}
	elseif($paquet->is_event('stv')) {
		echo '<style>
		#banniere {background-image:url(\'design/love/banniere.png\');}
		#barre_menu {background-image:url(\'design/love/barre_menu2.png\');}
		#centre_design2 {background-image:url(\'design/love/sous_menu.png\');}
		#centre_design3 {background-image: url("design/love/design_bas.png");}
		</style>';
	}
}

include('lang/'.LANG.'/header/header.php');
if(!in_array($page, $pre_header)) {
  include('header/'.$page.'.php');
}
include('lang/'.LANG.'/header/'.$page.'.php');

echo '<link rel="shortcut icon" type="image/png" href="favicon.ico" />
		<meta name="google-site-verification" content="_byfzLlu56lI2KnkHqRYGN4v6QNjX1i7sVRJXRZgH88" />
		<meta name="ROBOTS" content="INDEX, FOLLOW"/>
		<meta name="author" content="Mighty" />
	</head>
  <body>
  	<div id="page">';
  	
 if($paquet->get_statu() == 1) {
 	include('lang/'.LANG.'/lune.php');
 }
  	
  	echo '<div id="banniere">
  		<div id="heure">';
  	if($paquet->get_statu() != 0) {
  		echo date("H").':'.date("i");
  	}
		echo '</div>
  		<div id="joueursconnectes"><a href="'.trad_to_page('joueursconnectes').'"><img src="lang/'.LANG.'/design/joueurconnectes.png" alt="Joueurs connectés" title="Joueurs connectés" width="108" height="16" /></a></div>';
  	
  	if($paquet->get_statu() == 0) {
  		echo '<div id="heure2">'.
  		date("H").':'.date("i");
			echo '</div>';
  	}

	switch($paquet->get_statu()) {
		case 1:
			include('lang/'.LANG.'/header.php');
		break;
		default:
		
		break;
	}
	
	echo '
  		<a id="lien_ban" href="'.SITE_URL.'"></a></div>
	  	<header>
		  	<!-- Le menu -->
		  	<nav id="barre_menu">';
	switch($paquet->get_statu()) {
		case 1:
			include('lang/'.LANG.'/menu_co.php');
		break;
		default:
			include('lang/'.LANG.'/menu_deco.php');
		break;
	}
echo '</nav>
	  	</header>';
	
echo '<section id="centre_design">
		<div id="centre_design2">';

if($paquet->get_statu() == 1) {
		echo '<div id="menu_haut_bouclier"></div>';
		switch($page) {
			case 'infocite':
			case 'constructions':
			case 'construire':
			case 'armurerie':
			case 'oracle':
			case 'tresor':
			case 'sondage':
			case 'evenements':
			case 'bonus':
			case 'faveurs':
			case 'obtenirdesfaveurs':
			case 'faveurerreur':
			case 'faveurvalide':
			case 'valide':
			case 'actualites':
			case 'breves':
				include('lang/'.LANG.'/menu_cite.php');
			break;
			
			case 'passerenrevue':
			case 'mesattaques':
			case 'engager':
			case 'attaquer':
			case 'strategiedefensive':
			case 'strategieoffensive':
				include('lang/'.LANG.'/menu_armee.php');
			break;
			
			case 'archives':
				echo '<div id="menu_haut_vide"></div>';
				include('lang/'.LANG.'/menu_archives.php');
			break;
			
			case 'mesventes':
			case 'donnerunefaveur':
			case 'marcheaudetails':
			case 'marchedegros':
			case 'marche':
			case 'vendre':
			case 'licences':
			case 'archivecommerce':
				include('lang/'.LANG.'/menu_marche.php');
			break;

			case 'classements':
			case 'classementdesjoueurs':
			case 'classementdesalliances':
			case 'classementghonneur':
				echo '<div id="menu_haut_vide"></div>';
				include('lang/'.LANG.'/menu_classement.php');
			break;
			
			case 'temples':
			case 'auteldesdieux':
			case 'statues':
			case 'prieres':
			case 'monstres':
			case 'sanctuaires':
			case 'invasions':
			case 'succes':
			case 'arbredesdieux':
			case 'modifiertemples':
			case 'soutien_stv':
				include('lang/'.LANG.'/menu_mytho.php');
			break;
			
			case 'informationspersonnelles':
			case 'joueursconnectes':
			case 'bibliotheque':
			case 'adressemail':
			case 'motdepasse':
			case 'amis':
			case 'pause':
			case 'pagecontact':
			case 'parrainage':
			case 'jeux':
			case 'dons':
			case 'loto':
			case 'carremagique':
			case 'ticket':
			case 'javelot':
			case 'des':
			case 'biges':
			case 'quadriges':
			case 'bataillesnavales':
			case 'listebataillesnavales':
			case 'creerunebataillenavale':
			case 'partie':
			case 'chat':
				include('lang/'.LANG.'/menu_extra.php');
			break;
			
			case 'messagerie':
			case 'listenoire':
			case 'lire':
			case 'nouveaumessage':
			case 'boiteenvoie':
			case 'archivesdemessagerie':
				include('lang/'.LANG.'/menu_messagerie.php');
			break;
			
			case 'alliance':
			case 'profilmonalliance':
			case 'ecrire_alliance':
			case 'cotisations':
			case 'donner':
			case 'coffre':
			case 'Nommer':
			case 'Recrutements':
			case 'guerres':
			case 'pactes':
			case 'changer_grandchef':
				//Protection pour les pages d'alliance si on n'en a pas
				if($paquet->getalliance() == 0) {
					redirect();
				}
				echo '<div id="menu_haut_vide"></div>';
				include('lang/'.LANG.'/menu_alliance.php');
			break;
			
			default:
				echo '<div id="menu_haut_vide"></div>';
			break;
		}
}

echo '<div id="centre_design3">
		<div id="interieur4_gauche">';
	
	if($paquet->getstatu() == 1) {
		echo '<div id="menu_stats">';
	if($paquet->getlvl() >= 6) {
		echo '<div id="menu_stats3">';
	}
	else {
		echo '<div id="menu_stats2">';
	}
			include('lang/'.LANG.'/menu_stats.php');
		echo '</div></div>';
	}
	else {
		include('lang/'.LANG.'/gauche.php');
	}
echo '</div>
		<div id="interieur4">';

if($paquet->getstatu() == 1 && $paquet->gettpc()>0) {
	$restant = $paquet -> gettpc() - time();
	affiche_tpc($restant);
}

echo '<div id="interieur5">';

if($paquet->getstatu() > 0) {
	check_archives($var_nb_archives, $var_next_archives);
}

	include('include/'.$page.'.php');

echo '</div>
		<div id="interieur6">';
		include('lang/'.LANG.'/bas.php');

		echo '</div></div>
		<div id="interieur4_droite">';
		
		if($paquet->getstatu() == 1) {					
			echo '<div id="menu_ressource"><div id="menu_ressource2">';
				include('lang/'.LANG.'/menu_ress.php');
			echo '</div></div>';
		}
		else {
			include('lang/'.LANG.'/droite.php');
		}
		
echo '
		</div>
		</div>
		</div></section>
	</div>
			<footer>';
include('lang/'.LANG.'/footer.php');
echo '</footer>
  </body>
</html>';

?>