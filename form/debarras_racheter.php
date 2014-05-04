<?php

include('../header.php');

if(!empty($_GET['id_lot']) && !empty($_GET['qtt'])) {

        $paquet = new EwPaquet();
        $paquet -> add_action('racheter_debarras',
                              array($_GET['id_lot'],$_GET['qtt']));
        $paquet -> send_actions();

        echo '<br/><br/>';

        $paquet->error('racheter_debarras');
}

?>

