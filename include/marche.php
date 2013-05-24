<?php
if($paquet->peut_commerce() == false) {
	$paquet->display(95);
}
else {
	
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
	
	if(($ress != 'nourriture') AND ($ress != 'eau') AND ($ress != 'bois') AND ($ress != 'fer') AND ($ress != 'argent') AND ($ress != 'pierre') AND ($ress != 'marbre') AND ($ress != 'raisin') AND ($ress != 'vin') AND ($ress != 'gold') AND ($ress != 'faveur'))
			redirect();
	
	if(!empty($ress) && !empty($minimum_lvl_ress[$ress]) && ($paquet->getlvl() < $minimum_lvl_ress[$ress]))
		redirect();
	
	$nb_par_page = 10;
	
	if(empty($_GET['var3'])) {
		$_GET['var3'] = 'taux';
	}
	
	if(!empty($_GET['var4']))	{
		if(empty($_GET['var5'])) {
			$_GET['var5'] = 0;
		}
	
		$paquet = new EwPaquet('acheter_lotm',
													 array($ress, $_GET['var3'], $nb_page,
													 			 $_GET['var4'], $_GET['var5']));
	}
	else {
		$paquet = new EwPaquet('get_commercem', array($ress, $_GET['var3'], $nb_page));
	}
	
	$nb_lots = $paquet->getRetour();
	$liste_lots= $paquet->getRetour(2);
	
	if($paquet->getRetour(3) == true)
		$paquet->display(228);
	else
		include('lang/'.LANG.'/include/marche.php');
}

?>