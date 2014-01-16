<?php

echo '<title>'._('Engager des unités').'</title>
<meta name="description"
      content="'._('Engager des unités').'" />';

if(!empty($_POST['batiment'])) {
  if($_POST['batiment'] == 'tourguet' or $_POST['batiment'] == 'tourobs'
     or $_POST['batiment'] == 'tourgarde' or $_POST['batiment'] == 'tourmir') {
		if(!empty($_POST['achatt'])) {
			$paquet -> add_action('batir',
			                      array($_POST['batiment'], $_POST['achatt']));
		}
		elseif(!empty($_POST['ventee'])) {
			$paquet -> add_action('detruire',
			                      array($_POST['batiment'], $_POST['ventee']));
		}
	}
	else {
		if(!empty($_POST['achatt'])) {
			$paquet -> add_action('engager',
			                      array($_POST['batiment'], $_POST['achatt']));
		}
		elseif(!empty($_POST['ventee'])) {
			$paquet -> add_action('liberer',
			                      array($_POST['batiment'], $_POST['ventee']));
		}
  }
	$_GET['var1'] = $_POST['batiment'];
}

$paquet -> add_action('premier');

?>
