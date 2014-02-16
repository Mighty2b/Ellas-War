<?php

echo '<title>'._('Archive de votre alliance').'</title>
<meta name="description"
      content="'._('Archive de votre alliance').'" />';

if(empty($_GET['var2']) or !is_numeric($_GET['var2']) or 
	 (round($_GET['var2']) != abs($_GET['var2']))) {
	$page = 1;
}
else {
	$page = addslashes($_GET['var2']);
}

if(!empty($_GET['var1']) && ($_GET['var1'] <= 4)) {
  $rub = round($_GET['var1']);
}
else {
  $rub = 0;
}

$paquet -> add_action('infoalliance');
$paquet -> add_action('get_archive_alliance', array($rub, $page));

?>