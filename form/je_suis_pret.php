<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action ('je_suis_pret');
$paquet -> send_actions();

?>