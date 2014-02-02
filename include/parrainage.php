<?php

echo '<h1>'._('Liens de parrainage').'</h1>

<div class="centrer"><br/>
	<div class="ligne_80 justify">';
printf(_(
'Lorsque votre filleul passe niveau 3, vous recevez tous les deux '.
'une faveur. Une faveur vous est aussi accordée lors de son passage '.
'niveau 5. Jusqu\'à ce que votre filleul passe niveau 6, vous pourrez '.
'lui envoyer directement des ressources dans la limite de %s unités par jour.'), nbf(50000));

echo '</div>
	<h2>'._('Lien simple').'<h3>
	<input type="text" 
	       value="'.SITE_URL.'/'._('sinscrire').'-'.$paquet->get_infoj('id').'" 
	       style="width:500px;" onclick="this.select()"/>
	<br/>
	
<h2>'._('Pour mettre sur un forum').'</h2>
<table class="none">
<tr>
	<td><b>'._('Lien + bannière 468x60').'</b></td>
	<td><b>'._('Lien + bannière 88x31').'</b></td>
</tr>
<tr>
<td>
<textarea class="part_banniere" 
          onclick="this.select()">[url='.SITE_URL.'/'._('sinscrire').'-'.$paquet->get_infoj('id').'][img]'.SITE_URL.'/lang/'.LANG.'/ban/banniere.gif[/img][/url]</textarea>
</td>
<td>
<textarea class="part_banniere" 
          onclick="this.select()">[url='.SITE_URL.'/'._('sinscrire').'-'.$paquet->get_infoj('id').'][img]'.SITE_URL.'/lang/'.LANG.'/ban/banmini.gif[/img][/url]</textarea>
</td>
</tr>
</table>

<h2>'._('Pour mettre sur un site').'</h2>
<table class="none">
<tr>
	<td><b>'._('Lien + bannière 468x60').'</b></td>
	<td><b>'._('Lien + bannière 88x31').'</b></td>
</tr>
<tr>
<td>
<textarea class="part_banniere" 
          onclick="this.select()"><a href="'.SITE_URL.'/'._('sinscrire').'-'.$paquet->get_infoj('id').'" target="_blank"><img src="'.SITE_URL.'/lang/'.LANG.'/ban/banniere.gif" alt="Ellàs War" /></a></textarea>
</td>
<td>
<textarea class="part_banniere" 
          onclick="this.select()"><a href="'.SITE_URL.'/'._('sinscrire').'-'.$paquet->get_infoj('id').'" target="_blank"><img src="'.SITE_URL.'/lang/'.LANG.'/ban/banmini.gif" alt="Ellàs War" /></a></textarea>
</td>
</tr>
</table>	
</div>';
/*
<div class="centrer ligne"><br/>
	<b>'._('Gagnez des drachmes grâces aux visites sur ce lien').'</b>
	<input type="text" 
	       class=form_ret"irer" 
	       onclick="this.select()" 
	       value="'.SITE_URL.'/'._('soutien').'-'.$paquet->get_infoj('id').'" 
	       style="width:400px;"/>
</div>';*/

?>