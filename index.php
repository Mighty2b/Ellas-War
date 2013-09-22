<?php

include('config.php');
include('function.php');
include('class_ewpaquet.php');

session_start();
set_lang();

/*
$my_name = 'tyty';

printf(_("My name is %s.\n"), $my_name);
*/

include('autorise/pubautorise.php');

if(!empty($_GET['page'])) {
	$page = ($_GET['page']);
	if(!in_array($page,$autorise)) {
		$page = $autorise[0];
	}
}
else {
	$page = $autorise[0];
}

echo '<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />';

include('header/'.$page.'.php');

echo '<link rel="stylesheet" href="css/design_deco.css" />';
/*echo '<!–[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]–>';*/

echo '<script type="text/javascript" src="js/jquery.min.js" ></script>';

echo '<link rel="shortcut icon" type="image/png" href="favicon.ico" />
		<meta name="google-site-verification" 
	        content="'.GOOGLE_CHECK.'" />
		<meta name="ROBOTS" content="INDEX, FOLLOW"/>
		<meta name="author" content="Mighty" />
	</head>
  <body>';
  
include('include/'.$page.'.php');

echo '
<footer>
<nav>
<br/>
<br/>
<br/>
<br/>
<br/>

<div class="titre"><a href="'.SITE_URL.'" title="'._('Ellàs War').'">'._('Ellàs War').'</a></div>
'._('Découvrir le jeu').'
<br/>'._('Actualités du jeu').'
<br/><a href="'.WIKI_URL.'" title="'._('Wiki d\'Ellàs War').'">'._('FAQ').'</a>
<br/>'._('Conditions générales d\'utilisation').'
<br/>

<div class="titre">'._('Présentation').'</div>
'._('Quelques mots sur le site').'
<br/>'._('Partenaires').'
<br/>'._('Jeu de stratégie').'
<br/>'._('Jeu gratuit').'
<br/>

<div class="titre">'._('Communauté').'</div>
'._('Joueurs connectés').'
<br/>'._('Forum').'
<br/>'._('Serveur Teamspeak').'
<br/>'._('L\'équipe du site').'
<br/>

<div class="titre">'._('Classements').'</div>
'._('Alliances').'
<br/>'._('Joueurs').'
<br/>'._('Batailles navales').'
<br/>'._('Héros').'
<br/>
</nav>
</footer>
  </body>
</html>';

?>