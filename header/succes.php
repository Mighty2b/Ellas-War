<?php

echo '<title>'._('Vos succès').'</title>
<meta name="description"
      content="'._('Vos succès sur Ellàs War').'" />';

if(empty($_GET['var1']) or !is_numeric($_GET['var1'])) {
	$_GET['var1']=0;
}

$paquet -> add_action('get_succes', array($_GET['var1']));

?>