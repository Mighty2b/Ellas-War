<?php

$liste = $paquet->get_answer('messagerie_envoi')->{1};

if(sizeof($liste) > 0) {
	echo '
	<table style="min-width:50%;">
		<thead><tr>
			<td></td>
			<td>'._('Titre').'</td>
			<td>'._('Destinataire').'</td>
			<td>'._('Date').'</td>
			<td class="none"></td>
		</tr></thead>
		<tfoot></tfoot>
		<tbody>';

foreach($liste as $mess) {
	echo '<tr>
	<td class="centrer">';
	
	if(!empty($mess->lecture)) {
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
	
}

?>