<?php 

echo '<title>'._('Bataille navale').'</title>
<meta name="description" 
      content="'._('Bataille navale').'" />';

if(empty($_GET['var1']) or !is_numeric($_GET['var1'])) {
	redirect();
}

$paquet -> add_action('infopartie', $_GET['var1']);

?>