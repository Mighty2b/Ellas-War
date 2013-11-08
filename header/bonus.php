<?php

echo '<title>'._('Bonus divins').'</title>
<meta name="description" content="'.('Bonus divins.').'" />';

if(!empty($_GET['var1'])) {
	$paquet -> add_action('utiliser_bonus', array($_GET['var1']));
}

?>