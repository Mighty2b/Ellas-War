<?php

echo '<title>'._('Missives, faites passer un message').'</title>
<meta name="description"
      content="'._('Missives, faites passer un message').'" />';

if(!empty($_POST['message'])) {
	if(!empty($_POST['oracle']) && $_POST['oracle'] == true) {
		$oracle = 1;
	}
	else {
		$oracle = 0;
	}
	
	$paquet -> add_action('poster_missive',array($_POST['message'], $oracle));
}
elseif(!empty($_GET['var1'])) {
	$paquet -> add_action('supprimer_missive',array($_GET['var1']));
}

$paquet -> add_action('page_missives');

?>