<?php

$liste_unites = $paquet->get_infoj('liste_unites');

if(!empty($_POST['type'])) {
	$type = round($_POST['type']);
}
elseif(!empty($_GET['var1']) && $_GET['var1'] <= 4) {
	$type = round($_GET['var1']);
}
else {
	if($paquet->get_infoj('lvl') == 0) {

		if(!empty($liste_unites->spartiate) && $liste_unites->spartiate->nb > 0) {
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
$paquet->error('batir');
$paquet->error('detruire');
$paquet->error('engager');
$paquet->error('liberer');
echo '</div>';

$premier = $paquet->get_answer('premier')->{1};

if(!empty($_GET['var2']) && !($paquet->possible_unite($_GET['var2'],$premier))) {
	$_GET['var2'] = '';
}

include('donnees/unites.php');

echo '
<div id="cadre_batiment_cache">

</div>

<div id="cadre_batiment_description">


</div>
';

if($paquet->get_infoj('lvl') > 0) {
	
	echo '
<div id="cadre_batiment_types">
	<div id="cadre_batiment_types2">
	&nbsp;&nbsp;&nbsp;<a href="'._('engager').'-1">'._('Infanterie').'</a>&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;<a href="'._('engager').'-2">'._('Cavalerie').'</a>&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;<a href="'._('engager').'-3">'._('Mythologie').'</a>&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;<a href="'._('engager').'-4">'._('Bâtiments').'</a>&nbsp;&nbsp;&nbsp;
	</div>
</div>';

}

echo '

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
		function engager(bat) {
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
				url: "form/form_engager.php",
		    data: "unite="+bat,
				success: function(msg){ cadre.html(msg); }
			});
		
			cadre.animate({
				top:-500
			}, 1000);
		}
		
		function engager_nb(id, nb) {
			$("#"+id).val(nb);
		}
		
		engager(\''.$_GET['var2'].'\');
	</script>';
}
?>