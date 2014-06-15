<?php

include('header.php');
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
		redirect('404');
	}
}
else {
	$page = $autorise[0];
}

echo '
<link rel="stylesheet" href="'.STATIC_LINK.'design/'.DESIGN.'/'.$prefix.'/design.css" />';

//echo '<!-- <link rel="icon" href="'.STATIC_LINK.'design/'.DESIGN.'/favicon.ico" /> -->';

if(!empty($_SERVER['HTTP_USER_AGENT']) && preg_match('/(?i)msie [1-9]/',$_SERVER['HTTP_USER_AGENT'])) {
	echo '
	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	';
}

if(!empty($_GET['page']) && ($_GET['page'] == _('partie'))) {
  echo '<script type="text/javascript"
                src="'.STATIC_LINK.'js/jquery-2.js" ></script>';
  echo '<script type="text/javascript"
                src="'.STATIC_LINK.'js/jquery-ui.min.js" ></script>';

}
else {
  echo '<script type="text/javascript" src="'.STATIC_LINK.'js/jquery.min.js" ></script>';
}

switch($paquet->get_infoj('statu')) {
	case 0:
	
	break;
	
	case 1:
echo '<script type="text/javascript" src="'.STATIC_LINK.'js/scripts_'.$prefix.'.js" ></script>';
	break;
	
	default:
echo '<script type="text/javascript" src="'.STATIC_LINK.'js/scripts_aco.js" ></script>';
	break;
}

echo '<link rel="shortcut icon" type="image/png" href="'.STATIC_LINK.'favicon.ico" />
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
<script>
  (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');
  ga(\'create\', \'UA-8044802-1\', \'ellaswar.com\');
  ga(\'send\', \'pageview\');
</script>	
  </body>
</html>';

?>
