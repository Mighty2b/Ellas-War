<?php

$get_parrain = $paquet->get_answer('get_parrain');

if(!empty($get_parrain)) {
	$_SESSION['parrain'] = $get_parrain->{1};
}

echo '<h1>'._('Inscription sur Ellàs War').'</h1>';

if(!empty($_SESSION['parrain'])) {
	echo '<div class="ligne centrer rouge_goco">';
	printf(_('%s vous parraine pour votre inscription sur Ellàs War'), 
	       $_SESSION['parrain']->login);
	echo '<br/><br/></div>';
}

echo '<p><br/></p>';

echo '<p>'._(
'Le formulaire d\'inscription se trouve dans le cadre situé '.
'à droite de la page. En vous inscrivant, vous acceptez le règlement du jeu. '.
'Nous vous conseillons de ne pas utiliser de caractères spéciaux dans votre '.
'identifiant.').
'</p><p><br/></p><p>'.
_('Lors de votre inscription, l\'adresse email renseignée doit être valide. '.
'L\'équipe d\'Ellàs War pourra être amenée à l\'utiliser pour vous contacter').
'</p><p><br/></p><p>'.
_('Nous vous rappellons que l\'utilisation de plusieurs comptes par une même '.
'personne est strictement interdite.').'</p>';

echo '<div id="sinscrire" class="centrer">
<img src="images/illustration/inscription.png"
     alt="'._('S\'inscrire').'" 
     title="'._('S\'inscrire').'" />
</div>';

if(!empty($_SESSION['parrain']) && !empty($_SESSION['parrain']->login)) {
	echo '
	<script type="text/javascript">
	    $(document).ready(function() {
	        document.title = \'Rejoignez '.$_SESSION['parrain']->login.' sur Ellàs War\';
	    });
	</script>';
}

?>