<?php

echo '<title>'._('Lire').'</title>
<meta name="description" content="'._('Lire').'" />';

$paquet -> add_action('messagerie_lire', array($_GET['var1']));

?>