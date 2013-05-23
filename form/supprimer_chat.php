<?php

include('../header.php');

$paquet = new EwPaquet('supprimer_chat', array($_GET['joueur'], $_GET['temps']));

?>