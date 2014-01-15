<?php

echo '<title>'._('Donner une faveur').'</title>
<meta name="description"
      content="'._('Aidez un ami en lui donnant une faveur').'" />';

if(!empty($_POST['somme'])) {
	$paquet -> add_action('dons_faveurs',
	                      array($_POST['somme']));
}

?>