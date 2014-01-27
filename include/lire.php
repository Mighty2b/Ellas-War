<?php

$message = $paquet->get_answer('messagerie_lire', 1);

if(is_file('avatarjoueur/'.$paquet->get_infoj('id').'.jpg')) {
	$avatar_moi = 'avatarjoueur/'.$paquet->get_infoj('id').'.jpg';
}
elseif(is_file('avatarjoueur/'.$paquet->get_infoj('id').'.png')) {
	$avatar_moi = 'avatarjoueur/'.$paquet->get_infoj('id').'.png';
}
else {
	$avatar_moi = 'images/joueurs/avatar.png';
}

if(is_file('avatarjoueur/'.$message->destinataire.'.jpg')) {
	$avatar_lui = 'avatarjoueur/'.$message->destinataire.'.jpg';
}
elseif(is_file('avatarjoueur/'.$message->destinataire.'.png')) {
	$avatar_lui = 'avatarjoueur/'.$message->destinataire.'.png';
}
else {
	$avatar_lui = 'images/joueurs/avatar.png';
}

echo '
<table>
	<thead><tr class="centrer">
		<td><div class="bouton_classique"><input type="button" 
		                                         value="'._('Répondre').'"
		                                         id="repondre"
		                                         onclick="repondre()"/></div></td>
		<td style="min-width:70%">'.$message->titre.'</td>
	</tr></thead>
	<tfoot></tfoot>
	<tbody><form method="post" action="#">
	<tr style="display:none;" id="envoyer">
		<td class="centrer"><div 
		    class="bouton_classique"><input type="button"
		                                    value="'._('Envoyer').'" /></div></td>
		<td><textarea name="texte"
		              style="width:100%;height:100px;"></textarea></td>
	</tr></form>';
	
	foreach($message->messages as $mess) {
echo '<tr>	
	<td class="centrer"
	    valign="top"><a class="rouge_goco"
	                    href="'._('profilsjoueur').'-'.$mess->joueur.'">'.$mess->login.'</a>
	<br/>';
	/*
	if($paquet->get_infoj('id') == $mess->joueur) {
		echo '<img src=\''.$avatar_moi.'\' 
		           alt="'._('Avatar du joueur').' '.$mess->login.'" 
		           width="200px"/>';
	}
	else {
		echo '<img src=\''.$avatar_lui.'\' 
		           alt="'._('Avatar du joueur').' '.$mess->login.'" 
		           width="200px"/>';
	}
	*/
	echo '<br/>'.display_date($mess->temps,3).'</td>
	<td valign="top"><br/>'.$mess->message.'</td>
	</tr>';
	}
	
echo '
	</tbody>
</table>


<script type="text/javascript">
function repondre() {
	$("#repondre").hide(\'slow\');
	$("#envoyer").show(\'slow\');
}
</script>';

?>