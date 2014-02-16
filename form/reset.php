<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('reset');
$paquet -> send_actions();

?>