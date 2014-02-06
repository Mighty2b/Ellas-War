<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action('connexion_chat');
$paquet -> send_actions();

?>