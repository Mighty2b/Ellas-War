<?php

if(sizeof($liste) > 0) {
	echo '<h1>Vos Filleuls</h1>
	<br/><table class="centrer_tableau">';
	foreach($liste as $do)	{
		if(!empty($do->timestamp)) {
			$image='<img src="images/joueurs/mb_connecter.png" alt="Joueur Connecté" />';
		}
		else {
			$image='<img src="images/joueurs/mb_deconnecter.png" alt="Joueur Déconnecté\" />';
		}
		
		echo '<tr>
<td>&nbsp;'.$image.' &nbsp;  <a href=\'profilsjoueur-'.$do->id.'\'>'.$do->login.'</a>&nbsp;</td>
		<td>&nbsp;'.$do->lvl.'&nbsp;</t>
		<td>&nbsp;<a href="NouveauMessage-'.$do->id.'">'.img('images/joueurs/ecrire_mp.png', 'Écrire').'</a>';
		
		if($do->lvl < 6) {
			echo '<a href="dons-'.$do->id.'"><img src="images/alliance/cotisations.png" alt="Lui faire un don" /></a>';
		}
		
		echo '&nbsp;</td></tr>';
	}
	echo '</table><br/>';
}

?>

<h1>Liens de parrainage</h1>

<div class="centrer"><br/>
Lorsque votre filleul passe niveau 3, vous recevez tous les deux une faveur. Une faveur vous est aussi accordée lors de son passage niveau 5. Jusqu'à ce que votre filleul passe niveau 6, vous pourrez lui envoyer directement des ressources dans la limite de 50.000 unités par jour.

<h2>Lien simple<h3>
	<input type="text" class="form_retirer" value="<?php echo SITE_URL.'/sinscrire-'.$paquet->getid();?>" style="width:500px;" onclick="this.select()"/>
	<br/>
	
<h2>Pour mettre sur un forum</h2>
<table class="centrer_tableau">
<tr>
	<td><b>Lien + bannière 468x60</b></td>
	<td><b>Lien + bannière 88x31</b></td>
</tr>
<tr>
<td>
<textarea class="part_banniere" onclick="this.select()">[url=<?php echo SITE_URL.'/sinscrire-'.$paquet->getid();?>][img]http://www.ellaswar.com/banniere.gif[/img][/url]</textarea>
</td>
<td>
<textarea class="part_banniere" onclick="this.select()">[url=<?php echo SITE_URL.'/sinscrire-'.$paquet->getid();?>][img]http://www.ellaswar.com/banmini.gif[/img][/url]</textarea>
</td>
</tr>
</table>

<h2>Pour mettre sur un site</h2>
<table class="centrer_tableau">
<tr>
	<td><b>Lien + bannière 468x60</b></td>
	<td><b>Lien + bannière 88x31</b></td>
</tr>
<tr>
<td>
<textarea class="part_banniere" onclick="this.select()"><a href="<?php echo SITE_URL.'/sinscrire-'.$paquet->getid();?>" target="_blank"><img src="http://www.ellaswar.com/banniere.gif" alt="Ellàs War" /></a></textarea>
</td>
<td>
<textarea class="part_banniere" onclick="this.select()"><a href="<?php echo SITE_URL.'/sinscrire-'.$paquet->getid();?>" target="_blank"><img src="http://www.ellaswar.com/banmini.gif" alt="Ellàs War" /></a></textarea>
</td>
</tr>
</table>	
</div>

<div class="centrer ligne"><br/>
	<b>Gagnez des drachmes grâces aux visites sur ce lien</b>
	<input type="text" class="form_retirer" onclick="this.select()" value="<?php echo SITE_URL.'/soutien-'.$paquet->getid();?>" style="width:400px;"/>
</div>