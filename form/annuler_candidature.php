<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('annuler_candidature');
$paquet -> send_actions();

?>
