<?php

echo '<title>'._('Autel des dieux').'</title>
<meta name="description"
      content="'._('Autel des dieux').'" />';

if(!empty($_GET['var1'])) {
	if(is_numeric($_GET['var1'])) {
		if($_GET['var1'] == 1) {
			$paquet -> add_action('update_dino', array($_GET['var2']));
		}
	}
	else {
		$paquet -> add_action('acheter_autel',
													 array($_GET['var1']));
	}
}

$paquet -> add_action('conditions_autels');

?>