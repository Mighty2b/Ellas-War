<br/>
<table class='tableau80d centrer_tableau'>
	<tr class='tableau_header'>
		<th style="color:<?php echo $color; ?>"><?php echo $mp->titre; ?></th>
	</tr>
	<tr class="font_classement2">
		<td class="centrer">
		<?php
		$temps = time();
		
		if($mp->expediteur == $paquet->getid()) {
			echo '(À '.$mp->login_destinataire;
		}
		else {
			echo '(Par '.$mp->login_expediteur;
		}
		
		echo ' ';
		
		if(date('l', $mp->timestamp) == date('l', $temps) AND $mp->timestamp + (24 * 3600) > $temps)
			echo 'Aujourd\'hui '.date('\à H\hi', $mp->timestamp);
		else
			echo date('\L\e d/m/Y \à H\hi', $mp->timestamp);
			
		echo ')';
		?>
		</td>
	</tr>
	<tr>
		<td class="interieur_mp">
		<div class="avatar_messagerie"><div class="avatar_messagerie2">
		<?php
	if(is_file('avatarjoueur/'.$mp->expediteur.'.jpg')) {
		$image = 'avatarjoueur/'.$mp->expediteur.'.jpg';
	}
	elseif(is_file('avatarjoueur/'.$mp->expediteur.'.png')) {
		$image = 'avatarjoueur/'.$mp->expediteur.'.png';
	}
	
	if(!empty($image)) {
		list($width, $height, $type, $attr) = getimagesize($image);

		$txt  = '';
		if($width > $height) {
			if($width > 150) {
				$txt = 'style="width:150px;"';
			}
		}
		else {
			if($height > 150) {
				$txt = 'style="height:150px;"';
			}
		}
		echo '<img src=\''.$image.'\' alt="Avatar du joueur '.$mp->login_expediteur.'" '.$txt.'/>';
	}
	else {
		echo '<img src="images/joueurs/avatar.png" alt="Avatar par défaut" />';
	}
	?>
		</div></div>
		<div class="bloc_messagerie">
			<?php echo $mp->message; ?>
		</div>
		</td>
	</tr>
</table>
<br/>
<div align="center">
	<a href="NouveauMessage-<?php echo $mp->destinataire.'-'.$mp->id; ?>"><img src="images/joueurs/repondre_mp.png" alt="repondre à ce Mp" title="Répondre à ce message" /></a>
	
<a href="NouveauMessage-<?php echo $mp->destinataire.'-'.$mp->id; ?>-non"><img src="images/joueurs/mail_send.png" alt="repondre à ce Mp" title="Répondre sans citer" /></a>
		<?php

		if($mp->destinataire == $paquet->getid()) {
			echo ' <a href="ArchivesDeMessagerie-archiver-'.$mp->id.'"><img src="images/joueurs/book.png" alt="Archiver" /></a> ';
		}
		
		if($mp->expediteur == $paquet->getid()) {
			echo '<a href=\'BoiteEnvoie-supprimer-'.$mp->id.'\'>';
		}
		else {
			echo '<a href=\'Messagerie-supprimer-'.$mp->id.'\'>';
		}
		?>
	<img src="images/joueurs/suppr.png" alt="Supprimer le message privé" title="Supprimer ce message" /></a>
</div>
