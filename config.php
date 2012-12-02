<?php

define('SITE_URL', 'http://v5.ellaswar.com');
define('API_URL', 'http://apiv5.ellaswar.com/index.php');
define('LANG', 'fr');
setlocale (LC_TIME, 'fr_FR');
date_default_timezone_set('Europe/Paris');
define('ID_ADMIN', 457);
define('LVL_MINI_XP', 7);
define('LVL_MINI_ALLIANCE', 7);
$minimum_lvl_ress = array('pierre' => 1,
													'marbre' => 1,
													'raisin' => 3,
													'vin' => 7,
													'gold' => 7);
$lvlminirejoindre = 1;
$temps_lots = 120; //Temps avant de pouvoir acheter, en secondes
$prix_commerce = array(
'fer' => array('nom' => 'Fer', 'qtt' => 200000, 'grostaux' => '0.01', 'grosmax' => '0.2', 'petittaux' => '0.02', 'petitmax' => '0.2', 'limit' => array('gd' => 10, 'pt' => 10)),
'argent' => array('nom' => 'Argent', 'qtt' => 100000, 'grostaux' => '0.02', 'grosmax' => '0.40', 'petittaux' => '0.04', 'petitmax' => '0.40', 'limit' => array('gd' => 10, 'pt' => 10)),
'gold' => array('nom' => 'Or', 'qtt' => 2000, 'grostaux' => '60', 'grosmax' => '500', 'petittaux' => '70', 'petitmax' => '500', 'limit' => array('gd' => 10, 'pt' => 10)),
'bois' => array('nom' => 'Bois', 'qtt' => 200000, 'grostaux' => '0.01', 'grosmax' => '0.2', 'petittaux' => '0.05', 'petitmax' => '0.2', 'limit' => array('gd' => 10, 'pt' => 10)),
'pierre' => array('nom' => 'Pierre', 'qtt' => 100000, 'grostaux' => '0.05', 'grosmax' => '5', 'petittaux' => '0.1', 'petitmax' => '5', 'limit' => array('gd' => 10, 'pt' => 10)),
'marbre' => array('nom' => 'Marbre', 'qtt' => 4000, 'grostaux' => '50', 'grosmax' => '300', 'petittaux' => '65', 'petitmax' => '220', 'limit' => array('gd' => 10, 'pt' => 10)),
'nourriture' => array('nom' => 'Nourriture', 'qtt' => 200000, 'grostaux' => '0.008', 'grosmax' => '0.25', 'petittaux' => '0.03', 'petitmax' => '0.20', 'limit' => array('gd' => 10, 'pt' => 10)),
'eau' => array('nom' => 'Eau', 'qtt' => 1000000, 'grostaux' => '0.00005', 'grosmax' => '0.005', 'petittaux' => '0.0001', 'petitmax' => '0.01', 'limit' => array('gd' => 10, 'pt' => 10)),
'raisin' => array('nom' => 'Raisin', 'qtt' => 100000, 'grostaux' => '0.2', 'grosmax' => '6', 'petittaux' => '0.3', 'petitmax' => '6', 'limit' => array('gd' => 10, 'pt' => 10)),
'vin' => array('nom' => 'Vin', 'qtt' => 2000, 'grostaux' => '50', 'grosmax' => '500', 'petittaux' => '60', 'petitmax' => '500', 'limit' => array('gd' => 10, 'pt' => 10)),
'faveur' => array('nom' => 'Faveur', 'qtt' => 100, 'grostaux' => '500000', 'grosmax' => '1500000', 'petittaux' => '1000000', 'petitmax' => '2500000', 'limit' => array('gd' => 10, 'pt' => 10)));

$prix_autel = array(
	'unite_myth' => array('eau' => 0, 'fer' => 0, 'nourriture' => 0, 'raisin' => 0, 'vin' => 8000 , 'gold' => 12000, 'bois' => 0, 'pierre' => 0, 'marbre' => 0),
	'maison' => array('eau' => 20000000, 'fer' => 0, 'nourriture' => 4000000, 'raisin' => 2400000, 'vin' => 35000 , 'gold' => 0, 'bois' => 0, 'pierre' => 0, 'marbre' => 0),
	'baisse_terrain' => array('eau' => 0, 'fer' => 0, 'nourriture' => 0, 'raisin' => 0, 'vin' => 0 , 'gold' => 0, 'bois' => 8000000, 'pierre' => 1600000, 'marbre' => 50000),
	'lion' => array('eau' => 0, 'fer' => 0, 'nourriture' => 10000000, 'raisin' => 0, 'vin' => 0 , 'gold' => 16000, 'bois' => 0, 'pierre' => 0, 'marbre' => 0),
	'unite' => array('eau' => 0, 'fer' => 25000000, 'nourriture' => 0, 'raisin' => 0, 'vin' => 0 , 'gold' => 28000, 'bois' => 0, 'pierre' => 0, 'marbre' => 0),
	'attirance_aphrodite' => array('eau' => 0, 'fer' => 0, 'nourriture' => 1000000, 'raisin' => 800000, 'vin' => 0 , 'gold' => 30000, 'bois' => 0, 'pierre' => 0, 'marbre' => 50000),
);

$prix_autels = array(
'sacrifice_hera' => array('prix_drachme' => 0, 'prix_or' => 10000, 'prix_argent' => 10000000, 'prix_bois' => 0, 'prix_nourriture' => 0, 'prix_eau' => 6000000, 'prix_fer' => 0, 'prix_raisin' => 0, 'prix_vin' => 0, 'prix_pierre' => 0, 'prix_marbre' => 0),
'attirance_aphrodite' => array('prix_drachme' => 0, 'prix_or' => 0, 'prix_argent' => 0, 'prix_bois' => 0, 'prix_nourriture' => 0, 'prix_eau' => 0, 'prix_fer' => 0, 'prix_raisin' => 0, 'prix_vin' => 0, 'prix_pierre' => 0, 'prix_marbre' => 0),
'defense_gaia' => array('prix_drachme' => 0, 'prix_or' => 12000, 'prix_argent' => 0, 'prix_bois' => 0, 'prix_nourriture' => 0, 'prix_eau' => 0, 'prix_fer' => 5000000, 'prix_raisin' => 2000000, 'prix_vin' => 0, 'prix_pierre' => 0, 'prix_marbre' => 0),
'strategie_hippodamos' => array('prix_drachme' => 0, 'prix_or' => 0, 'prix_argent' => 20000000, 'prix_bois' => 20000000, 'prix_nourriture' => 0, 'prix_eau' => 20000000, 'prix_fer' => 20000000, 'prix_raisin' => 0, 'prix_vin' => 0, 'prix_pierre' => 10000000, 'prix_marbre' => 0),
'sauvegarde_ombre' => array('prix_drachme' => 0, 'prix_or' => 0, 'prix_argent' => 0, 'prix_bois' => 40000000, 'prix_nourriture' => 0, 'prix_eau' => 12000000, 'prix_fer' => 0, 'prix_raisin' => 0, 'prix_vin' => 10000, 'prix_pierre' => 0, 'prix_marbre' => 0)
);

$batiment_prix_temple1 = array('drachme' => 200000, 'pierre' => 20000, 'marbre' => 500, 'bois' => 160000, 'gold' => 0);

$batiment_prix_temple2 = array('drachme' => 500000, 'pierre' => 50000, 'marbre' => 1250, 'bois' => 400000, 'gold' => 0);

$batiment_prix_temple3 = array('drachme' => 1000000, 'pierre' => 400000, 'marbre' => 8000, 'bois' => 1200000, 'gold' => 0);

$batiment_prix_temple4 = array('drachme' => 4000000, 'pierre' => 1600000, 'marbre' => 160000, 'bois' => 25000000, 'gold' => 120000);

$minidrachmes = 1; //Minimum de drachmes autorisée contre paix
$minior = 1; // Minimum d'ors autorisée contre paix
$maxdrachmes = 5000000; // Maximum de drachmes autorisée contre paix
$maxor = 10000; // Maximum d'or autorisée contre paix
$tempsultimatum = 24;

?>