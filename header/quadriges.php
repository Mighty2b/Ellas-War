<?php

echo '<title>'._('Jeu des quadriges').'</title>
<meta name="description"
      content="'._('Jeu des quadriges').'" />';

if(empty($erreur) && !empty($_POST['cheval']) && is_numeric($_POST['cheval'])) {
	$paquet -> add_action('quadriges', array($_POST['cheval']));
}

?>