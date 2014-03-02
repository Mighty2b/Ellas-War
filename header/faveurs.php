<?php

echo '<title>'._(
     'Remportez la victoire graces aux faveurs').'</title>
<meta name="description" 
      content="'._('Remportez la victoire graces aux faveurs').'" />';

if(!empty($_GET['var2'])) {
	$paquet -> add_action('bonus_faveur', array($_GET['var2']));
}

$paquet -> add_action('dernieres_faveurs');
$paquet -> add_action('possible_changer_temple');

?>