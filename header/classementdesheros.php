<?php

echo '<title>'._('Classement des héros d\'Ellàs War').'</title>
<meta name="description" content="'._('Classement des héros d\'Ellàs War').'" />';

if (isset($_GET['var1']) && is_numeric($_GET['var1']) ) {
  $page = $_GET['var1'];
}
else {
  $page = 1; // On se met sur la page 1 (par défaut)
}

if(!empty($_GET['var2'])) {
	$par = $_GET['var2'];
}
else {
	$par = 'niveau';
}

$paquet -> add_action('get_classementheros',
                      array($par, $page));
$paquet -> add_action('get_liste_classes');

?>