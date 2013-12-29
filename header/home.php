<?php

echo '<title>'._('EllasWar.com Jeu de stratégie en ligne gratuit').'</title>';
echo '<meta name="description" content="'._('Bienvenue sur Ellás War. 
      Inscrivez-vous et partez à l\'assaut des autres peuples. 
      EllasWar.Com est un jeu de stratégie en ligne gratuit au temps de l\'antiquité grecque. 
      Construisez votre cité et votre armée pour devenir le maître de toute une civilisation.').
      '" />';

$paquet -> add_action('get_news', array(2));

if(!empty($_POST['ilogin']) && !empty($_POST['ipass']) && !empty($_POST['iemail'])) {
	
}

if(!empty($_POST['login']) && !empty($_POST['pass'])) {
	$paquet -> add_action('connexion', array($_POST['login'], $_POST['pass']));
}

?>