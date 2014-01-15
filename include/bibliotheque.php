<?php

$list  = $paquet->get_answer('get_bibliotheque')->{1};
$i     = 1;

echo '<h1>'._('Bibliothéque').'</h1>';

foreach ($list as $mem) {
	echo '<div id="biblio_cadre_'.$i.'"
	           class="biblio_cadre">
	      <div class="ligne">
		      <div class="biblio_titre"
		           id="biblio_titre_'.$i.'">'.$mem->titre.'</div>
		      <div class="biblio_titre_edit"
		           id="biblio_titre_edit_'.$i.'"><input type="text"
		                                                id="biblio_titre_edit2_'.$i.'"/></div>
		      <div class="biblio_edit">
		      	<a onclick="edit_bibli('.$i.')">E</a> 
		      	<a href="#" onclick="supr_bibli('.$i.')">X</a>
		      </div>
		  </div>
	      <div class="biblio_txt"
	           id="biblio_txt_'.$i.'">'.$mem->text.'</div>
	      <div class="biblio_txt_edit"
	           id="biblio_txt_edit_'.$i.'"><textarea id="biblio_txt_edit2_'.$i.'"></textarea></div>
	      </div>';
	$i++;
}

?>
<script type="text/javascript">
function edit_bibli(id) {
	$("#biblio_titre_edit2_"+id).val($("#biblio_titre_"+id).html());
	$("#biblio_titre_edit_"+id).show();
	$("#biblio_titre_"+id).hide();

	$("#biblio_txt_edit2_"+id).val($("#biblio_txt_"+id).html());
	$("#biblio_txt_edit_"+id).show();
	$("#biblio_txt_"+id).hide();
}
</script>
