<?php

echo '<title>'._('Les alliances d\'Ellàs War').'</title>
<meta name="description"
      content="'._('Les alliances d\'Ellàs War').'" />';

if(!empty($_GET['var1'])) {
	$page = $_GET['var1'];
}
else {
	$page = 1;
}

if(!empty($_POST['contrat'])) {
	if(empty($_POST['confidence'])) {
		$_POST['confidence'] = 0;
	}
	
	if(empty($_POST['or'])) {
		$_POST['or'] = 0;
	}
	
	$paquet -> add_action('proposer_contrat',
												array($_POST['contrat'],$_POST['confidence'],
												 			 $_POST['drachmes'],$_POST['or']));
}
elseif(!empty($_POST['alliance']) && !empty($_POST['motivation'])) {
	$paquet -> add_action('demander_pacte',
												array($page,$_POST['alliance'],$_POST['motivation']));
}
elseif(!empty($_POST['declarer'])) {
	if(empty($_POST['ultimatum'])) {
		$_POST['ultimatum'] = '';
		$_POST['drachmes'] = 0;
		$_POST['or'] =0;
	}
	else {
		$_POST['ultimatum'] = 'on';
	}
	
	$paquet -> add_action('declarer_guerre',
												array($_POST['declarer'], $_POST['drachmes'],
												 			 $_POST['or'], $_POST['ultimatum'], $page));
}
elseif(!empty($_POST['imposer']) && !empty($_POST['alliance'])) {
	$paquet -> add_action('proposer_blocus', array($_POST['alliance']));
}

$paquet -> add_action('get_listealliances', array($page));

?>