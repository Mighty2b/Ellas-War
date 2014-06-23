<?php

$liste        = $paquet->get_answer('messagerie_reception')->{1};
$nombre_pages = $paquet->get_answer('messagerie_reception')->{2};

if(sizeof($liste) > 0) {
	if($nombre_pages > 1) {
		echo '<div class="centrer">Page | ';
	
		for($i=1;$i<=$nombre_pages;$i++) {
			if($_GET['var1'] == $i)
				echo '<a href="messagerie-'.$i.'" class="gras">'.$i.'</a> | ';
			else
				echo '<a href="messagerie-'.$i.'">'.$i.'</a> | ';
		}
		echo '</div>';
	}
	
	echo '
	<table style="min-width:50%;">
		<thead><tr>
			<td></td>
			<td>'._('Titre').'</td>
			<td>'._('Expéditeur').'</td>
			<td>'._('Date').'</td>
			<td class="none"></td>
		</tr></thead>
		<tfoot></tfoot>
		<tbody>';

foreach($liste as $mess) {
	echo '<tr>
	<td class="centrer">';
	
	if(!empty($mess->lecture) or 
	   $mess->last_j != $paquet->get_infoj('id')) {
		echo '<img src="images/messagerie/mp.png"
		           alt="'._('Ancien Message').'" 
		           title="'._('Ancien Message').'" />';
	}
	else {
		echo '<img src="images/messagerie/n_mp.png" 
		           alt="'._('Nouveau Message').'" 
		           title="'._('Nouveau Message').'" />';
	}
	
echo '</td>
	<td>&nbsp;<a href="'._('lire').'-'.$mess->id.'">'.$mess->titre.'</a></td>
	<td>&nbsp;<a href="'._('profilsjoueur').'-'.$mess->destinataire.'">'.$mess->login.'</a></td>
	<td>'.display_date($mess->date,4).'</td>
	<td><img src="images/messagerie/supprimer.png"
	         alt="'._('Supprimer').'"
	         title="'._('Supprimer').'"
	         class="cursor" 
	         onclick="messagerie_supprimer('.$mess->id.');"/></td>
	</tr>';
}

echo '</tbody>
	</table>
<script type="text/javascript">
	function messagerie_supprimer(id) {
		$.ajax({
			type: "GET",
			url: "form/messagerie_supprimer.php",
			data: "id="+id,
			success: function(msg){ location.reload(); }
		});
	}
</script>';
}
else {
	echo '<div class="centrer"><br/><br/>'.
	     _('Messagerie vide').'</div>';
}

?>