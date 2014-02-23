<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('info_guerre', array($_GET['alliance']));
$paquet -> send_actions();

$info    = $paquet->get_infoj('alliance');
$ennemis = $paquet->get_answer('info_guerre')->{1};
$minidrachmes = $paquet->get_answer('info_guerre')->{2};
$minior = $paquet->get_answer('info_guerre')->{3};
$maxdrachmes = $paquet->get_answer('info_guerre')->{4};
$maxor = $paquet->get_answer('info_guerre')->{5};
$tempsultimatum = $paquet->get_answer('info_guerre')->{6};

if(empty($ennemis) or ($info   ->nb_membre <= 1) or 
	 ($ennemis->nbmembre  <= 1) or 
	 ($ennemis->id == $info -> id)) {

}
	else {
	echo '<h1>'.$ennemis->nom.'</h1>
	<div class="centrer">
	'._('Etes vous sûr de vouloir déclarer la guerre ?').'
	<br/><br/>
	<form action="#" method="post" name="declarer">'.
	_('Accepter la paix contre des ressources').' : '.
	'<input type="checkbox" name="ultimatum" checked="checked" />
	<p>
	<input type="text"
	       name="drachmes" 
	       size="5" 
	       value="0" 
	       maxlength="8"/> '.imress('drachme').' ('._('Entre').
	                       ' <b>'.nbf($minidrachmes).'</b> '._('et').
	                       ' <b>'.nbf($maxdrachmes).'</b>)<br/>
	<input type="text"
	       name="or" 
	       size="3" 
	       value="0" 
	       maxlength="8" /> '.imress('gold').' ('._('Entre').
	                        ' <b>'.nbf($minior).'</b> '._('et').
	                        ' <b>'.nbf($maxor).'</b>)
	</p>
	<div class="ligne centrer"><i>';
	printf(_(
	'Lorsque la guerre est déclaré elle ne commencera que %s heures plus tard. '.
	'Pendant cette période,<br/>si la case est cochée, vous pouvez accepter '.
	'la paix si l\'adversaire donne à votre alliance les ressources indiquées. '.
	'Lorsque vous cliquez sur Déclarer vous ne pourrez plus revenir en arrière !'.
	'<br/>Que le meilleur gagne, bonne chance !'), '<b>'.$tempsultimatum.'</b>');
	echo '</i></div>
	<div class="ligne">
	<input type="hidden" name="declarer" value="'.$ennemis->id.'" />
	
	<br/><br/>
	<div class="bouton_classique"><input type="submit" value="'._('Valider').'" /></div>
	</div>
	</form>
	</div>';
}

?>