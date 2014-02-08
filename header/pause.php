<?php

echo '<title>'._('Gestion de la pause').'</title>
<meta name="description"
      content="'._('Gestion de la pause').'" />';

if(!empty($_POST['nbpause']) && is_numeric($_POST['nbpause'])) {
	$paquet -> add_action('pause', array($_POST['nbpause']));
}

?>