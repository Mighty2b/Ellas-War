<?php

$liste        = $paquet->get_answer('messagerie_envoi')->{1};
$nombre_pages = $paquet->get_answer('messagerie_envoi')->{2};

if(sizeof($liste) > 0) {
	if($nombre_pages > 1) {
		echo '<div class="centrer">Page | ';
	
		for($i=1;$i<=$nombre_pages;$i++) {
			if($_GET['var1'] == $i)
				echo '<a href="boiteenvoie-'.$i.'" class="gras rouge_goco">'.$i.'</a> | ';
			else
				echo '<a href="boiteenvoie-'.$i.'">'.$i.'</a> | ';
		}
		echo '</div>';
	}
	
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
$precedent = 0;
$text = '';
foreach($liste as $mess) {
	if(empty($_GET['var1']) or ($_GET['var1'] == 1) or !empty($precedent)) {
		echo str_replace('[idsuivant]', $mess->id, $text);

		$text = '<tr>
  <td class="centrer">';

		if(!empty($mess->lecture)) {
			$text .=  '<img src="images/messagerie/mp.png"
	             alt="'._('Ancien Message').'"
	             title="'._('Ancien Message').'" />';
		}
		else {
			$text .= '<img src="images/messagerie/n_mp.png"
	             alt="'._('Nouveau Message').'"
	             title="'._('Nouveau Message').'" />';
		}

		$text .=
		'</td>
  <td>&nbsp;<a href="'._('lire').'-'.$mess->id.'-'.$precedent.'-[idsuivant]">'.$mess->titre.'</a></td>
  <td>&nbsp;<a href="'._('profilsjoueur').'-'.$mess->destinataire.'">'.$mess->login.'</a></td>
  <td>'.display_date($mess->date,4).'</td>
  <td><img src="images/messagerie/supprimer.png"
           alt="'._('Supprimer').'"
           title="'._('Supprimer').'"
           class="cursor"
           onclick="messagerie_supprimer('.$mess->id.');"/></td>
  </tr>';
	}
	$precedent = $mess->id;
}

if($_GET['var1'] == $nombre_pages) {
	echo str_replace('[idsuivant]', 0, $text);
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