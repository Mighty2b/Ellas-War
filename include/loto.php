<?php

if($paquet->get_infoj('lvl') == 0) {
	redirect();
}

$cagnotte       = $paquet->get_answer('info_loto')->{1};
$nb_mes_tickets = $paquet->get_answer('info_loto')->{2};

echo '<div class="ligne80 centrer">
	<br/>
	<img src="images/jeux/loto_200.png" alt="Loto" title="Loto" />
	<br/><br/>

<h2>Jouez au loto et gagnez des drachmes !</h2>';

$paquet->error('jouer_loto', 1);

echo '<div class="ligne_80 justify">';

printf(_('Vous pouvez acheter jusqu\'à 100 tickets, 
chaque ticket coûte %s et vous donne une chance supplémentaire '.
'de gagner. Le premier ticket vous est offert, '.
'la cagnotte augmente à chaque ticket acheté, '.
'les gains augmentent donc en fonction du nombre de joueurs. '.
'Le tirage a lieu tous les vendredis soir à 20h.'), 
nbf(10000).' '.imress('drachme'));

echo '</div><br/><br/>';

if($nb_mes_tickets == 0) {
	echo '<b>'._('Ticket gratuit').' : 1</b>';
}
elseif($nb_mes_tickets == 1) {
	echo '<b>'._('Ticket joué').' : 1</b>';
}
else {
	echo '<b>'._('Tickets joués').' : '.$nb_mes_tickets.'</b>';
}

if($paquet->is_event('stv')) {
	echo '<br/>'._(
	'Pour chaque achat de ticket, vous avez une chance de gagner 1').
	' '.imress('stv').'. ';
	
	 if($paquet->getRetour(3) > 0) {
	 	echo _('Vous pouvez en gagner encore').' '.$paquet->getRetour(3).'.';
	 }
	 else {
	 	echo _('Vous ne pouvez plus en gagner aujourd\'hui.');
	 }
}

echo '<br/>
<h3>'._('Cagnotte').' : '.nbf($cagnotte).' '.imress('drachme').'</h3>

	<form method="post" action="#">
	<input type="text"
	       name="ticket" 
	       value="1" 
	       size="3" 
	       required="required" 
	       style="text-align:center;" />
	<br/><br/>
	<div class="bouton_classique"><input type="submit" 
	                                     name="Jouer" 
	                                     value="'._('JOUER').'" /></div>
	</form>
</div>';

?>