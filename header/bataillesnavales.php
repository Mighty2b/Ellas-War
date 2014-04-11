<?php

echo '<title>'._('Batailles navales').'</title>
<meta name="description"
      content="'._('Batailles navales').'" />';

if(!empty($_GET['var1']) && $_GET['var1'] == _('rejoindre')) {
	$paquet -> add_action('rejoindre_btn');
}

$paquet -> add_action('info_btn');
$paquet -> add_action('stats_btn');

?>