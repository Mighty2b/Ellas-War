<?php

if(empty($_GET['var1'])) {
	redirect();
}

echo '<title>'._('Membres de l\'alliance').'</title>
	<meta name="description"
	      content="'._('Membres de l\'alliance').'" />';

$paquet -> add_action('profils_alliance', array($_GET['var1']));

?>