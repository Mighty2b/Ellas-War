<?php

echo '<title>'._('Page contact').'</title>
<meta name="description" content="'._('Page contact').'" />';

if(!empty($_POST['message']) && empty($mess['regle'])) {
	if(empty($_GET['var1'])) {
		$paquet -> add_action('nouveau_topic',
		                      array($_POST['sujet'], $_POST['message']));
	}
	else {
		$paquet -> add_action('nouveau_message',
													 array($_GET['var1'], $_POST['message']));
		$paquet -> add_action('get_message_contact', array($_GET['var1']));
	}
}
elseif(!empty($_GET['var1'])) {
	$paquet -> add_action('get_message_contact', array($_GET['var1']));
}

$paquet -> add_action('page_contact');

?>