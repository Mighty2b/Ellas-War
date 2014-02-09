<?php

echo '<title>'._('Postuler').'</title>
<meta name="description"
      content="'._('Postuler').'" />';

if(empty($_GET['var1']) or !is_numeric($_GET['var1'])) {
	redirect();
}

$paquet->add_action('get_listealliances');

if(!empty($_POST['motivation'])) {
	$paquet->add_action('postuler',array($_GET['var1'],$_POST['motivation']));
}

$paquet->add_action('profils_alliance',array($_GET['var1']));

?>