<?php

echo '<title>'._('Archives').'</title>
<meta name="description" content="'._('Archives').'" />';

if(!empty($_POST['recherche'])) {
	$recherche = trim($_POST['recherche']);
}
elseif(!empty($_GET['var3'])) {
	$recherche = trim($_GET['var3']);
}
else {
	$recherche = '';
}

if(empty($_GET['var2']) or (!($_GET['var2'] <= 6 && $_GET['var2'] >= 1)))	{
	$type = 0;
}
else {
	$type = round($_GET['var2']);
}

if(empty($_GET['var1']) or !is_numeric($_GET['var1'])) {
	$nb = 1;
}
else {
	$nb = round($_GET['var1']);
}

$paquet -> add_action('archives', array($recherche, $type, $nb));

?>