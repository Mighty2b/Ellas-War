<?php

echo '<title>'._('Prières').'</title>
<meta name="description"
      content="'._('Priez les dieux et esperez leur réponse.').'" />';

if(!empty($_POST['message'])) {
	$paquet -> add_action('prier',array($_POST['message']));
}

?>