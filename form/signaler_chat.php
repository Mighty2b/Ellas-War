<?php

include('../header.php');

$paquet = new EwPaquet('signaler_chat', array($_GET['joueur'], $_GET['temps']));

?>