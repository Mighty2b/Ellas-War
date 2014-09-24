<?php

$biblio= $paquet->get_answer('get_bibliotheque');
$i = 1;

echo '<h1>'._('Bibliothèque').'</h1>

<div id="cadre_bibliotheque">';

if(!empty($biblio)) {
	
	$list  = $biblio->{1};

	foreach ($list as $mem) {
		echo '<div id="biblio_cadre_'.$i.'"
		           class="biblio_cadre">
		      <div class="ligne">
			      <div class="biblio_titre"
			           id="biblio_titre_'.$i.'">'.$mem->titre.'</div>
			      <div class="biblio_titre_edit"
			           id="biblio_titre_edit_'.$i.'"><input type="text"
			                                                id="biblio_titre_edit2_'.$i.'"
			                                                required="required"/></div>
			      <div class="biblio_edit">
			      	<a onclick="edit_bibli('.$i.')">'.img('images/utils/ecrire_mp.png', _('Editer/Enregistrer')).'</a> 
			      	<a href="#" onclick="supr_bibli('.$i.')">'.img('images/utils/suppr.png', _('Supprimer')).'</a>
			      </div>
			  </div>
		      <div class="biblio_txt"
		           id="biblio_txt_'.$i.'">'.$mem->text.'</div>
		      <div class="biblio_txt_edit"
		           id="biblio_txt_edit_'.$i.'"><textarea id="biblio_txt_edit2_'.$i.'"></textarea></div>
		      </div>';
		      
		      if($i%2 == 0) {
		      	echo '<div class="ligne"></div>';
		      }
		$i++;
	}
}

echo '</div>

<script type="text/javascript">

function edit_bibli(id) {
	if($("#biblio_txt_edit_"+id).is(\':visible\')) {
		save_bibli(id);
	}
	else {
		$("#biblio_titre_edit2_"+id).val($("#biblio_titre_"+id).html());
		$("#biblio_titre_edit_"+id).show();
		$("#biblio_titre_"+id).hide();
	
		$("#biblio_txt_edit2_"+id).val($("#biblio_txt_"+id).html());
		$("#biblio_txt_edit_"+id).show();
		$("#biblio_txt_"+id).hide();
	}
}

function save_bibli(id) {
	
	var titre   = $("#biblio_titre_edit2_"+id).val();
	var contenu = $("#biblio_txt_edit2_"+id).val();
	
	$.ajax({
		type: "GET",
		url:  "form/form_biblio_maj.php",
    data: "id="+id+"&titre="+titre+"&contenu="+contenu,
		success: function(msg){ location.reload(); }
	});
}

function supr_bibli(id) {
	$.ajax({
		type: "GET",
		url:  "form/form_biblio_supprimer.php",
    data: "id="+id,
		success: function(msg){ location.reload(); }
	});
}

function new_cadre(id) {
	txt  = \'<div id="biblio_cadre_\'+id+\'" class="biblio_cadre">\';
	txt += \'<div class="ligne">\';
	txt += \'<div class="biblio_titre" id="biblio_titre_\'+id+\'">'._('Nouvelle note').'</div>\';
	txt += \'<div class="biblio_titre_edit"	id="biblio_titre_edit_\'+id+\'">\';
	txt += \'<input type="text" id="biblio_titre_edit2_\'+id+\'" required="required"/></div>\';
	txt += \'<div class="biblio_edit">\';\'+id+\'
	txt += \'<a onclick="edit_bibli(\'+id+\')"><img src="images/utils/ecrire_mp.png" title="'._('Editer/Enregistrer').'" alt="'._('Editer/Enregistrer').'"/></a>\';
	txt += \'<a href="#" onclick="supr_bibli(\'+id+\')"><img src="images/utils/suppr.png" title="'._('Supprimer').'" alt="'._('Supprimer').'"/></a>\'; 
	txt += \'</div>\';
	txt += \'</div>\';
	txt += \'<div class="biblio_txt" id="biblio_txt_\'+id+\'"></div>\';
	txt += \'<div class="biblio_txt_edit" id="biblio_txt_edit_\'+id+\'">\';
	txt += \'<textarea id="biblio_txt_edit2_\'+id+\'"> </textarea></div>\';
	txt += \'</div>\';
	$("#cadre_bibliotheque").html($("#cadre_bibliotheque").html()+txt);
}';

if($i < 10) {
	echo 'new_cadre('.($i+1).')';
}

echo '
</script>';

?>
