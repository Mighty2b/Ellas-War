<?php

include('../header.php');

if(!empty($_GET['id'])) {
	$signalement = round($_GET['id']);
}
else {
	$signalement = 0;
}

setcookie('signalement', $signalement, 9999999999, '/',
          $_SERVER['HTTP_HOST']);

?>