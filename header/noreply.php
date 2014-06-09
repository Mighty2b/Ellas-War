<?php

echo '<title>'._('Désinscription d\'Ellàs War').'</title>
<meta name="description"
      content="'._('Désinscription d\'Ellàs War').'" />';

if(!empty($_GET['var1']) && !empty($_GET['var2'])) {
	$paquet -> add_action('noreply', array($_GET['var1'], $_GET['var2']));
}

?>