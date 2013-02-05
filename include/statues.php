<?php

$bat = $paquet-> get_batiments();

if(empty($bat -> hall) or ($bat -> hall-> nb == 0)) {
	$paquet->display(119);
}
else {

if(empty($_GET['var2'])) {
	if(!empty($_GET['var1'])) {
		$liste_autels = $paquet->liste_autels();
		if($liste_autels->$_GET['var1'] == 0) {
			if($paquet->nb_statues() < 3) {
				$paquet = new EwPaquet('batir_statue', array($_GET['var1']));
			}
			else {
				$paquet = new EwPaquet('conditions_statues');
			}
		}
		elseif($paquet->nb_ornements() < 21) {
			$paquet = new EwPaquet('orner', array($_GET['var1']));
		}
		else {
			$paquet = new EwPaquet('conditions_statues');
		}
	}
	else {
		$paquet = new EwPaquet('conditions_statues');
	}
}
else {
	if($_GET['var2'] == 'activer' && $_GET['var1'] == 'sacrifice_hera') {
		$paquet = new EwPaquet('activer_hera');
	}
	elseif($_GET['var2'] == 'supprimer') {
		$paquet = new EwPaquet('supprimer_statue',array($_GET['var1']));
	}
	else {
		$paquet = new EwPaquet('conditions_statues');
	}
}

$liste_autels = $paquet->liste_autels();
$conditions = $paquet->getRetour();
$quand_hera = $paquet->getRetour(2);

$condition_gaia		= $conditions->gaia;
$condition_erebe	= $conditions->erebe;
$condition_hera		= $conditions->hera;
$condition_hippo	= $conditions->hippo;

include('lang/'.LANG.'/include/statues.php');

if(!empty($_GET['var1'])) {
echo ' <script type="text/javascript">
       $(function(){';
	switch($_GET['var1']) {
		case 'sauvegarde_ombre':
			echo '$("#cadre_autel_erebe").show("slow");';
		break;
		case 'sacrifice_hera':
		  echo '$("#cadre_autel_hera").show("slow");';
		break;
		case 'defense_gaia':
	  	echo '$("#cadre_autel_gaia").show("slow");';
	  break;
  	case 'strategie_hippodamos':
	  	echo '$("#cadre_autel_hippo").show("slow");';
	  break;
	}
echo '});
</script>';
}
}
?>