<?php

if(!empty($_POST['montant'])) {
	if($_POST['mode'] == "deposer") {
		$paquet -> add_action('deposer', array($_POST['montant']));
	}
	else {
	  if(empty($_POST['calcul'])) {
	    $_POST['calcul'] = 'relatif';
	  }
		$paquet -> add_action('retirer', array($_POST['montant'], $_POST['calcul']));
	}
}

$paquet -> add_action('get_tresor');

echo '
<title>'._('Trésor').'</title>
<meta name="description" 
      content="'._('Trésor').'" />';	

?>