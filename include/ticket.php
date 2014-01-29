<?php

echo '
<div class="ligne centrer">
	<br/>
	<img src="images/jeux/ticket_200.png"
	     alt="'._('Ticket').'" title="'._('Ticket').'" />
	<br/><br/>
</div>

<h2 class="centrer">'._('Grattez et gagnez !').'</h2>

<div class="ligne_80">
<p>';
printf(_(
'Prenez un ticket, grattez-le et remportez des drachmes. '.
'<span class="rouge_goco">Vous</span> jouez avec '.
'<span class="rouge_goco">les ronds</span> et '.
'<span class="rouge_goco">votre adversaire</span> avec '.
'<span class="rouge_goco">les croix</span>, chaque partie gagnée '.
'vous permettra d\'empocher %s %s. '.
'Si vous et votre adversaire gagnez simultanément, vous ne remportez '.
'que la moitié de la récompense.'), nbf(40000), trim(imress('drachme')));
echo '<br/>'._(
'Vous recevez automatiquement un ticket toutes les heures '.
'mais vous ne pouvez pas conserver plus de 5 tickets.').'</p>
<br/>

<div id="cadre_ticket">';

if($paquet->get_answer('nb_tickets')->{1} > 0) {
	echo 
	'<div class="bouton_classique"><input type="button" 
	                                      value="'._('Prendre un ticket').'" 
	                                      onclick="javascript:prendre_ticket();"/></div>';
}

echo '

<br/><br/>
<div class="centrer">
<b>';

printf(_('Il vous reste %s '), $paquet->get_answer('nb_tickets')->{1});

if($paquet->get_answer('nb_tickets')->{1} > 1) {
  echo _('tickets').'</b></div>';
}
else {
  echo _('ticket').'</b></div>';
}

echo '
</div>
</div>';

?>
<script type="text/javascript">
function prendre_ticket() {
   $.ajax({
     type: "GET",
     url: "form/ticket.php",
     success: function(msg){
       $("#cadre_ticket").html(msg);
       $("#cadre_ticket").show("slow");
     }
   });
}
</script>