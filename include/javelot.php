<?php

$info = $paquet->get_answer('javelot')->{1};

echo '<div class="ligne centrer">
	<br/>
	<img src="images/jeux/javelot_200.png"
	     alt="'._('Javelot').'" 
	     title="'._('Javelot').'" />
	<br/>
</div>';

if($paquet->get_infoj('lvl') <= 1 or 
   $paquet->get_infoj('drachme') < 1000) {
	echo '<div class="erreur">';
	echo display_error(120);
	echo '</div>';
}

if($info->joueur == $paquet->get_infoj('id')) {
	echo '<div class="erreur">';
	echo display_error(128);
	echo '</div>';
}
else {
	if(!empty($_POST['lancer'])) {
		$info = $paquet->get_answer('lancer_javelot')->{1};
	}
	
	$paquet->error('lancer_javelot', 2);

	echo '<div class="centrer ligne_80"><br>
			<font color=red><b>'._('Cagnotte').' : '.
			nbf($info->drachme).' '.imress('drachme').'</b></font>
			<br/>
			<font color=green><b>'._('Dernier gagnant').' : '.
			$info->login.'</font></b><br>';
	echo '
	
	<br/>
	<b>';
	printf(_("Mettez 1'000 %s dans la cagnotte, ".
	"prenez un javelot et tentez d'atteindre le centre de la cible, ".
	"90%% de la somme est remise en jeu, le gagnant remporte le tout."),
	imress('drachme'));

	echo '</b>
	<br/><br/>

	<form method="post" action="#">
	<input type="hidden" name="lancer" value="1" />
	<div class="bouton_classique"><input type="submit"
	                                     name="action_des" 
	                                     Value="'._('Lancer le javelot').'" /></div>
	</form>
	</div>';
}

?>