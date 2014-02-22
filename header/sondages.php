<?php

echo '<title>'._('Sondage, donnez votre avis !').'</title>
<meta name="description"
      content="'._('Sondage, donnez votre avis !').'" />';

if(!empty($_POST['sondage']) && !empty($_POST['reponse'])) {
	$paquet -> add_action('voter_sondage',
												array($_POST['reponse'], $_POST['sondage']));
}

$paquet -> add_action('info_sondages');

?>