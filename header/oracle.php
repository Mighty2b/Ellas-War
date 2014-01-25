<?php

if(!empty($_POST['candidat']) && is_numeric($_POST['candidat'])) {
	$paquet -> add_action('voter_oracle', array($_POST['candidat']));
}
elseif(!empty($_POST['programme'])) {
	$paquet -> add_action('candidater', array($_POST['programme']));
}

$paquet -> add_action('info_oracle');

echo '<title>'._('Oracle').'</title>
<meta name="description"
      content="'._('L\'oracle, représentant des joueurs d\'Ellàs War auprès des dieux.').'" />';

?>
