<?php

$nombre_par_page = 20;
$nombre_archives = $paquet->get_answer('archives')->{1};
$pages = ceil($nombre_archives/$nombre_par_page);
$archives = $paquet->get_answer('archives')->{2};

echo '<h1>'._('Archives').'</h1>
<br/>';
	
echo'
<form action="#"
      method="post" 
      name="classement" 
      class="ligne">
<div style="position:relative;float:left;margin-left:220px;margin-top:2px;margin-bottom:8px;">
	<select onChange="location = this.options [this.selectedIndex].value">
		<option value="'._('archives').'-'.$nb.'-0'.(!empty($recherche)?'-'.
		$recherche:'').'" '.((!empty($type))?'selected="selected"':'').
		'>'._('Toutes les archives').'</option>
		<option value="'._('archives').'-'.$nb.'-1'.(!empty($recherche)?'-'.
		$recherche:'').'" '.((!empty($type) && ($type == 1))?'selected="selected"':'').
		' >'._('Interventions divines').'</option>
		<option value="'._('archives').'-'.$nb.'-2'.(!empty($recherche)?'-'.
		$recherche:'').'"'.((!empty($type) && ($type == 2))?'selected="selected"':'').
		' >'._('Espionnages').'</option>
		<option value="'._('archives').'-'.$nb.'-3'.(!empty($recherche)?'-'.
		$recherche:'').'"'.((!empty($type) && ($type == 3))?'selected="selected"':'').
		' >'._('Dons').'</option>
		<option value="'._('archives').'-'.$nb.'-4'.(!empty($recherche)?'-'.
		$recherche:'').'"'.((!empty($type) && ($type == 4))?'selected="selected"':'').
		' >'._('Alliances').'</option>
		<option value="'._('archives').'-'.$nb.'-5'.(!empty($recherche)?'-'.
		$recherche:'').'"'.((!empty($type) && ($type == 5))?'selected="selected"':'').
		' >'._('Attaques').'</option>
		<option value="'._('archives').'-'.$nb.'-6'.(!empty($recherche)?'-'.
		$recherche:'').'"'.((!empty($type) && ($type == 6))?'selected="selected"':'').
		' >'._('Batailles navales').'</option>
	</select>
	<input type="text"
	       name="recherche" 
	       required="required" />
</div>
<div style="position:relative;float:left;margin-left:10px;">
	<div class="bouton_classique"><input type="submit"
	                                     name="rechercher"
	                                     value="'._('Rechercher').'" /></div>
</div>
</form><br/>';

if(empty($pages)) {
	echo '<br/><h2 class="centrer">'._('Vos archives sont vides').'</h2>';
}
else{
	if($pages > 1) {
		echo '<div class="ligne cadre">
				<div class="ligne_80 centrer">
				<b>Page</b> ';

		for($i=1;$i<=$pages;$i++) {
			if($nb == $i) {
				echo ' | <a href="'._('archives').'-'.$i.'-'.$type.(!empty($recherche)?'-'.$recherche:'').'" class="centre_armee2">'.$i.'</a> ';
			}
			else {
				echo ' | <a href="'._('archives').'-'.$i.'-'.$type.(!empty($recherche)?'-'.$recherche:'').'">'.$i.'</a> ';
			}
		}
		echo '</div></div>';
	}
	
	echo '<div class="ligne_80 centrer_tableau">
<div id="tableau_historique">
	<div class="gras ligne rouge_goco">
		<div class="gauche_historique centrer">&nbsp;'._('Date').'&nbsp;</div>
		<div class="droite_historique gauche">&nbsp;'._('Titre').'&nbsp;</div>
	</div>';
	
	foreach($archives as $val)	{
		if(!empty($val->histo_public)) {
			$image='<img src="images/utils/mb_connecter.png"
			             alt="'._('Archive publique').'" 
			             title="'._('Archive publique').'" 
			             class="cursor" />';
		}
		else {
			$image='<img src="images/utils/mb_deconnecter.png"
			             alt="'._('Archive privée').'" 
			             title="'._('Archive privée').'" 
			             class="cursor" />';
		}
		
		echo '<div class="ligne_historique">
			<div class="ligne">
				<div class="gauche_historique">'.
				display_date($val->timestamp,4).'</div>
				<div class="droite_historique'.(empty($val->lu)?' dore':'').'"
				     onclick="javascript:voir_historique('.$val->id.', '.$val->lu.');">'.
				$val->titre.'</div>
			</div>
			<div class="cache_historique"
			     id="historique_num'.$val->id.'">
		'.$val->texte.'
		<br/><br/>
		<span id="gestion_permalien_'.$val->id.'"
		      onclick="javascript:gestion_permalien('.$val->id.');">'.
		  $image.'</span> <input type="text"
		                         value="'.SITE_URL.'/'._('permalien').'-'.$val->id.'" 
		                         class="permalien"
		                         size="35" />
			</div>
		</div>';
	}
	echo '</div></div>';
}

echo '<script type="text/javascript">';

if(!empty($_GET['ouvrir'])) {
	echo '
	$(function(){
		voir_historique('.$_GET['ouvrir'].', 0);
	});';
}

echo '
function voir_historique(id, lu) {

	var menu = $("#historique_num"+id);
	
	if(menu.hasClass("ouvert")) {
		menu.hide("slow");
		menu.removeClass("ouvert");
	}
	else {
		menu.addClass("ouvert");
		menu.show("slow");
		
		if(lu == 0) {
			$.ajax({
				type: "GET",
				url: "form/archive_lire.php",
				data: "id="+id,
				success: function(msg){}
			});
		}
	}
}

function gestion_permalien(id) {
	$.ajax({
		type: "GET",
		url: "form/archive_publier.php",
		data: "id="+id,
		success: function(msg){ $("#gestion_permalien_"+id).html(msg); }
	});
}
</script>';


?>