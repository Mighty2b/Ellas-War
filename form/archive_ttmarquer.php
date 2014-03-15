<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('marquer_archive');
$paquet -> send_actions();

?>