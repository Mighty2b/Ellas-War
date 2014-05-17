<?php

include('../header.php');

$paquet = new EwPaquet();
$paquet -> add_action ('continuer_groupe');
$paquet -> send_actions();

echo $paquet->get_answer('continuer_groupe')->{1};

?>