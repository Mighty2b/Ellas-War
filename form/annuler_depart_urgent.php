<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('annuler_depart_urgent', array($_GET['id']));
$paquet -> send_actions();

?>