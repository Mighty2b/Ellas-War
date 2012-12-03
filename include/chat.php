<?php

$paquet = new EwPaquet('refresh_chat');

//La liste des joueurs connectés
$liste = $paquet->getRetour();

echo '<h1>'.$texte_titre.'</h1>
<div id="cadre_chat">
	<div id="corps_chat"></div>
	<div id="joueurs_chat"><div id="joueurs_chat2"></div></div>
</div>';

include('lang/'.LANG.'/include/chat.php');

echo '
<script type="text/javascript">
setInterval(\'refresh_chat()\',1500);
setInterval(\'joueurs_chat()\',3000);
$("#texte_chat").keyup(function(e) {
  if(e.keyCode == 13) {
    envoyer_chat()
  }
});
</script>';

?>