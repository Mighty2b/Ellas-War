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
echo '<script type="text/javascript" src="js/scripts.js" ></script>';

echo '<link rel="shortcut icon" type="image/png" href="favicon.ico" />
		<meta name="google-site-verification" 
	        content="'.GOOGLE_CHECK.'" />
		<meta name="ROBOTS" content="INDEX, FOLLOW"/>
		<meta name="author" content="Mighty" />
	</head>
  <body>';

include('body/haut_deco.php');

include('include/'.$page.'.php');

include('body/bas_deco.php');

echo '<footer>';

include('body/footer_deco.php');

echo '</footer>
  </body>
</html>';

?>