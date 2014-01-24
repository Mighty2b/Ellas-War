<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('valide_etape');
$paquet -> send_actions();

include('../include/texte_tuto.php');

?>