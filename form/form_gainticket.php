<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('ticket_gagnant');
$paquet -> send_actions();

?>