<?php

if(!empty($paquet->get_infoj('alliance'))) {
	redirect(_('alliance'));
}	

if($paquet->get_infoj('lvl') < $paquet->get_answer('get_listealliances')->{3}) {
	redirect();
}

echo '<h1>Création de votre alliance</h1>';

$paquet->error('creer_alliance');

echo '
<br/>
<div class="centrer">
<form method="post" action="">
<input type="text"
       name="nom" 
       placeholder="'._('Nom de votre alliance').'" 
       required="required"
       size="30"/>
<br/><br/>
<textarea name="description"
          style="width:600px;height:300px;" 
          placeholder="'._('Quelques mots sur votre alliance (historique, description, objectifs,recrutement,...)').'" 
          required="required"></textarea>
<br/><br/>
<div class="bouton_classique"><input type="submit" 
                                     value="'._('Créer votre alliance').'" /></div>
</form>
</div>';

?>