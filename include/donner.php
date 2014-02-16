<?php

include('include/menu_monalliance.php');

$liste_membres = $paquet->get_answer('info_donner')->{1};
$possible      = $paquet->get_answer('info_donner')->{2};

$paquet->error('donner', 1);

echo '<div class="ligne centrer">';

printf(_('Vous êtes sur le point de donner des Drachmes à	un joueur '.
         'de votre alliance. Un joueur ne peut recevoir que %s toutes '.
         'les 23 heures.'), nbf($possible).' '.imress('drachme'));

echo '<br/><br/></div>';

echo '<div class="ligne centrer">
<form action="Donner" method="post">
<select name="joueur">';

foreach($liste_membres as $do) {
	echo ' <option value=\''.$do->id.'\'>'.$do->login.
  ' ('._('Max').' : '.nbf($possible - $do->don).')</option> ';
}

echo '
</select> 
<input type="text" 
       name="somme" 
       size="10" 
       maxlength="6" />
<br/><br/>
<div class="bouton_classique"><input type="submit" 
                                     name="envoyer" 
                                     value="'._('Envoyer').'" /></div>
</form>
<br/>
</div>
<div class="ligne erreur centrer">'._(
'Nous vous rappelons que les dons se rattachent aux règles des multi-comptes.').
'</div>';

?>