<div class="ligne centrer">
	<br/>
	<img src="images/jeux/ticket_200.png" alt="Ticket" title="Ticket" />
	<br/><br/>
</div>

<h2 class="centrer">Grattez et gagnez !</h2>

<div  class="ligne80">
<p>Prenez un ticket, grattez-le et remportez des drachmes. <font color="red">Vous</font> jouez avec <font color="red">les ronds</font> et <font color="blue">votre adversaire</font> avec <font color="blue">les croix</font>, chaque partie gagnée vous permettra d'empocher <?php echo nbf(40000).' '.trim(imress('drachme')); ?>. Si vous et votre adversaire gagnez simultanément, vous ne remportez que la moitié de la récompense.<br/>
Vous recevez automatiquement un ticket toutes les heures mais vous ne pouvez pas conserver plus de 5 tickets.</p>
<br/>

<div id="cadre_ticket">
<?php

if($nb > 0) {
	echo '<div class="bouton_classique"><input class="bouton_classique2" type="button" value="PRENDRE UN TICKET" onclick="javascript:prendre_ticket();"/></div>';
}

echo '

<br/><br/>
<div class="centrer">
<b>Il vous reste '.$nb.' ';

if($nb > 1) {
  echo 'tickets</b></div>';
}
else {
  echo 'ticket</b></div>';
}

?></div>
</div>