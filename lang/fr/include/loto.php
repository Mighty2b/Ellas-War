<div class="ligne80 centrer">
	<br/>
	<img src="images/jeux/loto_200.png" alt="Loto" title="Loto" />
	<br/><br/>


<h2>Jouez au loto et gagnez des drachmes !</h2>

<?php
	$paquet->display();
?>


Vous pouvez acheter jusqu'à 100 tickets, 
chaque ticket coûte 10'000 <?php echo imress('drachme'); ?>
 et vous donne une chance supplémentaire de gagner. <br/>
 Le premier ticket vous est offert, 
 la cagnotte augmente à chaque ticket acheté, 
 les gains augmentent donc en fonction du nombre de joueurs. 
 <br/>Le tirage a lieu tous les vendredis soir à 20h.
<br/><br/>
<?php

	if($nb_mes_tickets == 0) {
		echo '<b>Ticket gratuit : 1</b>';
	}
	elseif($nb_mes_tickets == 1) {
		echo '<b>Ticket joué : 1</b>';
	}
	else {
		echo '<b>Tickets joués : '.$nb_mes_tickets.'</b>';
	}

?>

<br/>
<h3>Cagnotte : <?php echo number_format($cagnotte, 0, ',', ' ').' '.imress('drachme'); ?></h3>

	<form method="post" action="#">
	<input type="text" name="ticket" class="form_retirer" value="1" size="3" required="required" style="text-align:center;" />
	<br/><br/>
	<div class="bouton_classique"><input class="bouton_classique2" type="submit" name="Jouer" value="JOUER" /></div>
	</form>
</div>