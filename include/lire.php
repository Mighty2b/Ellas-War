<?php

$message = $paquet->get_answer('messagerie_lire', 1);

$paquet->error('messagerie_repondre', 1);

if(empty($message)) {
	echo '<h2 class="centrer">'._('Vous ne pouvez pas lire ce message').'</h2>';
}
else {	
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
			<td>';
	
			if(!empty($message->precedent) && is_numeric($message->precedent)) {
				echo ' <a href="lire-'.$message->precedent.'-'.$_GET['var2'].'"><img title="'._('Message précédent').'" alt="'._('Message précédent').'" src="images/utils/fleche_gauche.png" style="float:left;" /></a>';
			}
			
			echo '
			    <div class="bouton_classique" style="float:left;margin-left:5px;margin-right:5px;"><input type="button" 
			                                         value="'._('Répondre').'"
			                                         id="repondre"
			                                         onclick="repondre()"/></div>';

			if(!empty($message->suivant) && is_numeric($message->suivant)) {
				echo '<a href="lire-'.$message->suivant.'-'.$_GET['var2'].'"><img title="'._('Message suivant').'" alt="'._('Message suivant').'" src="images/utils/fleche_droite.png" /></a> ';
			}
			
			echo '
			</td>
			<td style="min-width:75%">'.$message->titre.'</td>
		</tr></thead>
		<tfoot></tfoot>
		<tbody><form method="post" action="#">
		<tr style="display:none;" id="envoyer">
			<td class="centrer"><div 
			    class="bouton_classique"><input type="submit"
			                                    name="envoyer"
			                                    value="'._('Envoyer').'" /></div></td>
			<td><textarea name="texte"
			              style="width:100%;height:100px;"
			              required="required"></textarea></td>
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
		
		if($mess->text_type > 0) {
			$m = get_message($mess->text_type, 
			                 unserialize(lcfirst($mess->message)));
			$mess->message = $m['message'];
		}
		else {
			$mess->message = nl2br($mess->message);
		}
		
		echo '<br/>'.display_date($mess->temps,3).'</td>
		<td valign="top"';
		
		if($paquet->get_infoj('id') != $mess->joueur) {
			echo ' class="messages_recus"';
		}
		
		echo '><br/>'.$mess->message.'</td>
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
	
	$(document).ready(function() {
		document.title = \''.addslashes($message->titre).'\';
	});
	</script>';
}

?>