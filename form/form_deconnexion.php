<?php

include('../header.php');

$paquet =  new EwPaquet();
$paquet -> add_action('deco');
$paquet -> send_actions();

setcookie('token', '', 0, '/', $_SERVER['HTTP_HOST']);
setcookie('temps', '', 0, '/', $_SERVER['HTTP_HOST']);

?>