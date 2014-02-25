<?php

echo '<title>'._('Mot de passe perdu').'</title>';
echo '<meta name="description"
            content="'._('Mot de passe perdu').'" />';

if(!empty($_POST['mail'])) {
  if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
    $paquet -> add_action('mdp_perdu_mail',array($_POST['mail']));
  }
  else {
    $paquet -> add_action('mdp_perdu_login',array($_POST['mail']));
  }
}

?>