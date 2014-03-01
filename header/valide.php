<?php

echo '<title>Code non valide</title>
<meta name="description"
      content="'._('Code non valide').'" />';

if(!empty($_GET['code'])) {
	$paquet ->add_action('valide_winapass', $_GET['code']);
}

?>