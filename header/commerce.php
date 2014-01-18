<?php

echo '
<title>'._('Marché d\'Ellàs War').'</title>
<meta name="description" content="'._('Marché d\'Ellàs War').'" />';

if(empty($_GET['var1'])) {
	$ress = 'nourriture';
}
else {
	$ress = trim(addslashes(htmlentities($_GET['var1'])));
}

if(empty($_GET['var2']) or !($_GET['var2'] > 1)) {
	$nb_page = 1;
}
else {
	$nb_page = round(abs($_GET['var2']));
}

if(!empty($ress) && ($ress != 'nourriture') AND ($ress != 'eau') AND 
   ($ress != 'bois') AND ($ress != 'fer') AND ($ress != 'argent') AND 
   ($ress != 'pierre') AND ($ress != 'marbre') AND ($ress != 'raisin') AND 
   ($ress != 'vin') AND ($ress != 'gold') AND ($ress != 'faveur')) {
	redirect();
}

$nb_par_page = 10;

if(empty($_GET['var3'])) {
	$_GET['var3'] = 'taux';
}

if(!empty($_GET['var4']))	{
	if(empty($_GET['var5'])) {
		$_GET['var5'] = 0;
	}

	$paquet -> add_action('acheter_lotm',
												 array($ress, $_GET['var3'], $nb_page,
												 			 $_GET['var4'], $_GET['var5']));
}

$paquet -> add_action('get_commercem', array($ress, $_GET['var3'], $nb_page));

?>