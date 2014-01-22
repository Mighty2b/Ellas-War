<?php

echo '<title>'._('Amis').'</title>
<meta name="description"
      content="'._('Amis').'" />';

if(!empty($_GET['var1']) && !empty($_GET['var2']) &&
   ($_GET['var2'] == _('supprimer'))) {
	$paquet -> add_action('supprimer_amis', array($_GET['var1']));
}

$paquet -> add_action('get_mes_amis');

?>