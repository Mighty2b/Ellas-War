<?php

echo '<title>'._('Jeu des biges').'</title>
<meta name="description"
      content="'._('Jeu des biges').'" />';

if(empty($erreur) && !empty($_POST['cheval']) && is_numeric($_POST['cheval'])) {
	$paquet -> add_action('biges', array($_POST['cheval']));
}

?>