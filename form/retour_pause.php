<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('remettre');
$paquet -> send_actions();

echo '<SCRIPT LANGUAGE="JavaScript">
     document.location.href="'.SITE_URL.'"
</SCRIPT>';	

?>
