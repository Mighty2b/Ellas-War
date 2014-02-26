<?php

echo '<title>'._('Votre compte a été bloqué').'</title>
<meta name="description"
      content="'._('Votre compte a été bloqué').'" />';

if(!empty($_GET['var1']) && ($_GET['var1'] == 'recommencer')) {
	$paquet -> add_action('reset');
}

?>