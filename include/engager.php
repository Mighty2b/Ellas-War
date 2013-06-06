<?php

if(!empty($_POST['type'])) {
	$type = round($_POST['type']);
}
elseif(!empty($_GET['var1']) && $_GET['var1'] <= 4) {
	$type = round($_GET['var1']);
}
else {
	if($paquet->getlvl() == 0) {
		if($paquet->get_nb_spartiate() > 0) {
			$type = 3;
		}
		else {
			$type = 4;
		}
	}
	else {
		$type = 1;
	}
}


echo '<div id="erreur_bat">';
$paquet->display();
echo '</div>';
$paquet = new EwPaquet('premier');
$premier = $paquet->getRetour();

if(!empty($_GET['var2']) && !($paquet->possible_unite($_GET['var2'],$premier))) {
	$_GET['var2'] = '';
}

include('lang/'.LANG.'/donnees/unites.php');

echo '
<div id="cadre_batiment_cache">

</div>

<div id="cadre_batiment_description">


</div>

<div id="cadre_batiment_types">
	<div id="cadre_batiment_types2">
	&nbsp;&nbsp;&nbsp;<a href="Engager-1">Infanterie</a>&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;<a href="Engager-2">Cavalerie</a>&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;<a href="Engager-3">Mythologie</a>&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;<a href="Engager-4">Bâtiments</a>&nbsp;&nbsp;&nbsp;
	</div>
</div>

<div id="cadre_batiment_liste">';

foreach($unites as $bat => $details) {
	if($details['aff'] == $type) {
		if($paquet->possible_unite($bat,$premier)) {
		echo '<div class="cadre_batiment_unite"
						 onclick="engager(\''.$bat.'\');" ';
			if($type != 4) {
				echo 'style="background-image:url(\'/images/unite/'.$details['img'].'150.png\');">';
			}
			else {
				echo 'style="background-image:url(\'/images/bat/'.$details['img'].'150.png\');">';
			}
	
				echo '<div class="cadre_batiment_nom"><div class="cadre_batiment_nom2">'.
				(!empty($details['nomc'])?$details['nomc']:$details['nom']).
				'</div></div>
			</div>';
			if(empty($_GET['var2'])) {
				$_GET['var2'] = $bat;
			}
		}
	}
}

echo '
</div>';

if(!empty($_GET['var2'])) {
	echo '
	<script>
		engager(\''.$_GET['var2'].'\');
	</script>';
}
?>