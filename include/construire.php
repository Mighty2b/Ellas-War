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

$paquet->error('batir');
$paquet->error('detruire');

echo '</div>
<div id="cadre_batiment_cache">

</div>

<div id="cadre_batiment_description">


</div>

<div id="cadre_batiment_liste">
	<div id="cadre_batiment_types">
	<div id="cadre_batiment_types2">
	&nbsp;&nbsp;&nbsp;<a href="'._('construire').'-1">'._('Production').'</a>&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;<a href="'._('construire').'-2">'._('Militaire').'</a>&nbsp;&nbsp;&nbsp;';
	
	if($paquet->get_infoj('lvl') >= 1) {
		echo '&nbsp;&nbsp;&nbsp;<a href="'._('construire').'-3">'._('Logement').'</a>&nbsp;&nbsp;&nbsp;';
	}
	
	echo '
	&nbsp;&nbsp;&nbsp;<a href="'._('construire').'-4">'._('Divers').'</a>&nbsp;&nbsp;&nbsp;
	</div>
	</div>';
	$liste_batiments = $paquet->get_infoj('liste_batiments');
foreach($batiments as $bat => $details) {
	if($details['aff'] == $type && !empty($liste_batiments->$bat) && 
		 $liste_batiments->$bat->lvlmini <= $paquet->get_infoj('lvl')) {
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
<script type="text/javascript">
$(function() {
	var cadre = $("#cadre_batiment_cache");
	cadre.html(\'\');
	if(cadre.hasClass(\'affiche\')) {';

	if($paquet->get_infoj('statu') == 1 && $paquet->get_infoj('tpc') > 0) {			
		echo 'cadre.css("top", "+=470");';
	}
	else {
		echo 'cadre.css("top", "+=500");';
	}
	
echo '}
	else {
		cadre.addClass(\'affiche\');
	}
	
	$.ajax({
		type: "GET",
		url: "form/form_construire.php",
    data: "bat='.$_GET['var2'].'",
		success: function(msg){ cadre.html(msg); }
	});

	cadre.animate({';

	if($paquet->get_infoj('statu') == 1 && $paquet->get_infoj('tpc') > 0) {			
				echo 'top:-470';
	}
	else {
				echo 'top:-500';
	}
	echo '
	}, 1000);
});

function construire(bat) {
	var cadre = $("#cadre_batiment_cache");
	cadre.html(\'\');
	if(cadre.hasClass(\'affiche\')) {
			cadre.css("top", "+=500")
	}
	else {
		cadre.addClass(\'affiche\');
	}
	
	$.ajax({
		type: "GET",
		url: "form/form_construire.php",
    data: "bat="+bat,
		success: function(msg){ cadre.html(msg); }
	});

	cadre.animate({
		top:-500
	}, 1000);
}
</script>';
}

?>