<?php

if(!empty($_POST['type'])) {
	$type = round($_POST['type']);
}
elseif(!empty($_GET['var1']) && $_GET['var1'] <= 4) {
	$type = round($_GET['var1']);
}
else {
	$type = 1;
}

echo '<div id="erreur_bat">';
$paquet->display();
echo '</div>';

include('lang/'.LANG.'/donnees/batiments.php');

echo '
<div id="cadre_batiment_cache">

</div>

<div id="cadre_batiment_description">


</div>

<div id="cadre_batiment_types">
<div id="cadre_batiment_types2">
&nbsp;&nbsp;&nbsp;<a href="Construire-1">Production</a>&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;<a href="Construire-2">Militaire</a>&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;<a href="Construire-3">Logement</a>&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;<a href="Construire-4">Divers</a>&nbsp;&nbsp;&nbsp;
</div>
</div>

<div id="cadre_batiment_liste">';
$liste_batiments = $paquet->get_batiments();
foreach($batiments as $bat => $details) {
	if($details['aff'] == $type && !empty($liste_batiments->$bat) && 
		 $liste_batiments->$bat->lvlmini <= $paquet->getlvl()) {
echo '<div class="cadre_batiment_unite"
					 onclick="construire(\''.$bat.'\');"
					 style="background-image:url(\'/images/bat/'.$details['img'].'150.png\');">';

			echo '<div class="cadre_batiment_nom"><div class="cadre_batiment_nom2">'.
			(!empty($details['nomc'])?$details['nomc']:$details['nom']).
			'</div></div>
		</div>';
		if(empty($_GET['var2'])) {
			$_GET['var2'] = $bat;
		}
	}
}

echo '
</div>';

if(!empty($_GET['var2'])) {
	echo '
	<script>
		construire(\''.$_GET['var2'].'\');
	</script>';
}
?>