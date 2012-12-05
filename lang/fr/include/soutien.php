<div class="ligne centrer">
	<h2><?php echo $j->login;?> vous remercie</h2>
	<img src="images/joueurs/ellaswar_parrainage.png" alt="Soutien envers <?php echo $j->login; ?>" title="Soutien envers <?php echo $j->login; ?>" width="400" />
	<br/>
	<?php
	$paquet->display();
	?>
	
<a href="<?php echo SITE_URL;?>/sinscrire-<?php echo $j->id; ?>" target="_blank"><h2 class="attention">Rejoignez-le sur Ellàs War et profitez de son parrainage</h2></a>
</div>
<br/>
<div class="ligne centrer">
  <div class="fb-like" style="width:100px;" data-href="<?php echo SITE_URL.'/soutien-'.$j->id; ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="true"></div>
</div>