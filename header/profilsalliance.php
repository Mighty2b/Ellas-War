<?php

if(empty($_GET['var1'])) {
	redirect();
}

echo '<title>'._('Profils d\'alliance').'</title>
<meta name="description"
	    content="'._('Profils d\'alliance').'" />';

$paquet -> add_action('profils_alliance', array($_GET['var1']));

?>