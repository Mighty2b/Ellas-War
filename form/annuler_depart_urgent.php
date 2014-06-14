<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('annuler_depart_urgent');
$paquet -> send_actions();

?>