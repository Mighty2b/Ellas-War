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
	<thead><tr>
		<td></td>
		<td class="centrer" style="min-width:60%">'.$message->titre.'</td>
	</tr></thead>
	<tfoot></tfoot>
	<tbody>';
	
	foreach($message->messages as $mess) {
echo '<tr>	
	<td class="centrer"
	    valign="top"><a class="rouge_goco"
	                    href="'._('profilsjoueur').'-'.$mess->joueur.'">'.$mess->login.'</a>
	<br/>';
	
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
	
	echo '<br/>'.display_date($mess->temps,3).'</td>
	<td valign="top"><br/>'.$mess->message.'</td>
	</tr>';
	}
	
echo '
	</tbody>
</table>';

?>