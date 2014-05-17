<?php

$liste_sanctuaires = $paquet->get_answer('liste_sanctuaires')->{1};
$sanctuaire_actuel = $paquet->get_answer('liste_sanctuaires')->{2};
$taille_gp         = $paquet->get_answer('liste_sanctuaires')->{3};

echo '
<div id="cadre_milieu_petit">
	<div id="cadre_centre_petit">

	</div>
	<div id="cadre_bas_petit"></div>
</div>
<div class="ligne_80">
<h1>'._('Sanctuaires').'</h1>';
	
foreach($liste_sanctuaires as $sanctuaire) {
	if(sizeof($sanctuaire->mb) > 0) {
		echo '<p class="gauche"><b>'.$sanctuaire->nom.'</b><br/>';
		echo stripslashes($sanctuaire->description).'<br/>';
	
		echo '<b>Ennemis :</b>
					<ul>';
		foreach($sanctuaire->mb as $membre) {
			echo '<li>'.$membre->nom.' (Récompense : '.nbf($membre->recompense*$taille_gp).' '.imress('drachme').')</li>';
		}
		echo '</ul>';
		
		if(!empty($sanctuaire_actuel)) {
			if($sanctuaire->id == $sanctuaire_actuel) {
				echo '<div class="ligne">
							<a onclick="javascript:constituer_groupe('.$sanctuaire->id.');"
								 class="details_ress cursor">Continuer votre sanctuaire</a>
							</div></p>';
			}
			else {
				echo '<div class="ligne">
							Un sanctuaire est déjà en cours
							</div></p>';
			}
		}
		else {
			echo '<div class="ligne">
						<a onclick="javascript:constituer_groupe('.$sanctuaire->id.');"
							 class="details_ress cursor">Constituer un groupe</a>
						</div></p>';
		}
	}
}

echo '</div>';

?>

<script type="text/javascript">

function constituer_groupe(id) {
  $("#cadre_centre_petit").html('');
  $("#cadre_milieu_petit").show("slow");
  form_constituer_groupe(id);
  setInterval('form_constituer_groupe('+id+')', 4000);
}

function je_suis_pret() {
    $.ajax({
     type: "GET",
     url: "form/form_je_suis_pret.php",
     success: function(msg){ $("#bouton_je_suis_pret").hide(); }
   });
}

function continuer_groupe() {
    $.ajax({
     type: "GET",
     url: "form/continuer_groupe.php",
     success: function(msg){ $("#bouton_continuer_groupe").hide();
                             $("#sanctuaire_rapport").html(msg);}
   });
}

function form_constituer_groupe(id) {

    $.ajax({
     type: "GET",
     url: "form/constituer_groupe.php",
     data: "id="+id,
     success: function(msg){ $("#cadre_centre_petit").html(msg); }
   });
}

</script>