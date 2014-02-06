<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('deconnexion_chat');
$paquet -> send_actions();

?>