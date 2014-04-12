<?php

include('header.php');

/*
$my_name = 'tyty';

printf(_("My name is %s.\n"), $my_name);
*/

include('autorise/pubautorise.php');

if(!empty($_GET['page']) && preg_match("/^[a-zA-Z0-9_]+$/", $_GET['page'])) {
	$page = $_GET['page'];
}

echo '<!DOCTYPE html>
<html lang="'.PAGE_LANG.'">
	<head>
		<meta charset="utf-8" />';
		
$paquet =  new EwPaquet();

if(empty($page) or !file_exists('header/'.$page.'.php')) {
	$page = 'home';
}

include('header/'.$page.'.php');

$paquet -> add_action('messagerie_nonlus');
$paquet -> add_action('get_missives');
$paquet -> send_actions();

switch($paquet->get_infoj('statu')) {
	case 1:
		include('autorise/priveautorise.php');
		$prefix = 'co';
	break;
	case 2:
		include('autorise/manqueautorise.php');
		$prefix = 'mq';
	break;
	case 3:
		include('autorise/bloqueautorise.php');
		$prefix = 'bq';
	break;
	case 4:
		include('autorise/pauseautorise.php');
		$prefix = 'pause';
	break;
	case 0:
		include('autorise/pubautorise.php');
		$prefix = 'deco';
	break;
}

if(!empty($_GET['page'])) {
	$page = ($_GET['page']);
	if(!in_array($page,$autorise)) {
		$page = $autorise[0];
	}
}
else {
	$page = $autorise[0];
}

echo '
<link rel="stylesheet" href="design/'.DESIGN.'/'.$prefix.'/design.css" />
<!-- <link rel="icon" href="design/'.DESIGN.'/favicon.ico" /> -->';
echo '<!–[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]–>';

if(!empty($_GET['page']) && ($_GET['page'] == _('partie'))) {
  echo '<script type="text/javascript"
                src="js/jquery-2.js" ></script>';
  echo '<script type="text/javascript"
                src="js/jquery-ui.min.js" ></script>';

}
else {
  echo '<script type="text/javascript" src="js/jquery.min.js" ></script>';
}

switch($paquet->get_infoj('statu')) {
	case 0:
	
	break;
	
	case 1:
echo '<script type="text/javascript" src="js/scripts_'.$prefix.'.js" ></script>';
	break;
	
	default:
echo '<script type="text/javascript" src="js/scripts_aco.js" ></script>';
	break;
}

echo '<link rel="shortcut icon" type="image/png" href="favicon.ico" />
		<meta name="google-site-verification" 
	        content="'.GOOGLE_CHECK.'" />
		<meta name="ROBOTS" content="INDEX, FOLLOW"/>
		<meta name="author" content="Mighty" />
	</head>
  <body>';

include('body/haut_'.$prefix.'.php');

if($paquet->get_infoj('statu') == 1 && $paquet->get_infoj('tpc') > 0) {
	affiche_tpc($paquet->get_infoj('tpc') - $paquet->get_infoj('timestamp'));
}

include('include/'.$page.'.php');

include('body/bas_'.$prefix.'.php');

echo '<footer>';

include('body/footer_'.$prefix.'.php');

echo '</footer>
  </body>
</html>';

?>
