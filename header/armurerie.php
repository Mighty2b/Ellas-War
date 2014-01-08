<?php

echo '
<title>'._('Armurerie').'</title>
<meta name="description" content="'.('Armurerie d\'Ellas War').'" />';

if(!empty($_GET['var1']))	{
	$paquet -> add_action('acheter_bonus_unites', array($_GET['var1']));
}

$paquet -> add_action('armurerie');

?>