<?php

echo '<title>'._('Rejoindre Ellàs War').'</title>
<meta name="description"
      content="'._('Rejoindre Ellàs War').'" />';

if(!empty($_GET['var1'])) {
	$paquet->add_action('get_parrain', array($_GET['var1']));
}

?>