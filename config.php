<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

define('SITE_URL', 'http://dev.ellaswar.com');
define('API_URL',  'http://serverv5.ellaswar.com');
define('WIKI_URL', 'http://wiki.ellaswar.com');
define('CGU_URL', 'http://wiki.ellaswar.com');
define('FORUM_URL', 'http://forums.ellaswar.com');
define('LANG', 'fr_FR');
define('GOOGLE_CHECK', '_byfzLlu56lI2KnkHqRYGN4v6QNjX1i7sVRJXRZgH88');
define('DESIGN', 'v4');
define('TEMPS_CO', 31);
define('ID_ADMIN', 457);
define('STATIC_LINK', '');

//Social networks
define('FACEBOOK', 'https://fr-fr.facebook.com/pages/Ellas-War/236755106383392');
define('TWITTER', 'http://www.twitter.com/Ellaswar');

//Commerce
$minimum_lvl_ress = array('pierre' => 1,
													'marbre' => 1,
													'raisin' => 3,
													'vin' => 7,
													'gold' => 7);
$temps_lots = 120; //Temps avant de pouvoir acheter, en secondes
$prix_commerce = array(
'fer' => array('nom' => 'Fer', 'qtt' => 1000000, 
               'petittaux' => '0.02', 'petitmax' => '0.2', 
               'limit' => array('gd' => 10, 'pt' => 10)),
'argent' => array('nom' => 'Argent', 'qtt' => 1000000, 
                  'petittaux' => '0.04', 'petitmax' => '0.40', 
                  'limit' => array('gd' => 10, 'pt' => 10)),
'gold' => array('nom' => 'Or', 'qtt' => 20000, 
                'petittaux' => '70', 'petitmax' => '500', 
                'limit' => array('gd' => 10, 'pt' => 10)),
'bois' => array('nom' => 'Bois', 'qtt' => 1000000, 
                'petittaux' => '0.05', 'petitmax' => '0.2', 
                'limit' => array('gd' => 10, 'pt' => 10)),
'pierre' => array('nom' => 'Pierre', 'qtt' => 500000, 
                  'petittaux' => '0.1', 'petitmax' => '5', 
                  'limit' => array('gd' => 10, 'pt' => 10)),
'marbre' => array('nom' => 'Marbre', 'qtt' => 40000, 
                  'petittaux' => '65', 'petitmax' => '220', 
                  'limit' => array('gd' => 10, 'pt' => 10)),
'nourriture' => array('nom' => 'Nourriture', 'qtt' => 2000000, 
                      'petittaux' => '0.03', 'petitmax' => '0.20', 
                      'limit' => array('gd' => 10, 'pt' => 10)),
'eau' => array('nom' => 'Eau', 'qtt' => 4000000, 
               'petittaux' => '0.0001', 'petitmax' => '0.01', 
               'limit' => array('gd' => 10, 'pt' => 10)),
'raisin' => array('nom' => 'Raisin', 'qtt' => 500000, 
                  'petittaux' => '0.3', 'petitmax' => '6', 
                  'limit' => array('gd' => 10, 'pt' => 10)),
'vin' => array('nom' => 'Vin', 'qtt' => 20000, 
               'petittaux' => '60', 'petitmax' => '500', 
               'limit' => array('gd' => 10, 'pt' => 10)),
'faveur' => array('nom' => 'Faveur', 'qtt' => 100, 
                  'petittaux' => '1000000', 'petitmax' => '2500000', 
                  'limit' => array('gd' => 10, 'pt' => 10)));

?>
