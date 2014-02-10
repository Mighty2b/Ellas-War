<?php

echo '<title>'._('Tours de force').'</title>
<meta name="description"
      content="'._('Tours de force').'" />';

if(!empty($_GET['var1'])) {
	$paquet -> add_action('profils_joueur', array($_GET['var1']));
}
else {
	redirect();
}

?>
