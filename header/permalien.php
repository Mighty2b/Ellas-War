<?php

if(!empty($_GET['var1'])) {
	$paquet -> add_action('get_permalien', array($_GET['var1']));
}
else {
	$res_permalien = 1;
}

echo '<title>'._('Archives').'</title>
	<meta name="description"
	      content="'._('Archives').'" />';

?>