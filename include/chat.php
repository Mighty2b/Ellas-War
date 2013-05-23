<?php

$paquet = new EwPaquet('joueurs_chat');
$rep = $paquet->getRetour();

//La liste des joueurs connectés
$liste = $paquet->getRetour();

echo '<h1>'.$texte_titre.'</h1>
<div id="cadre_chat">
	<div id="corps_chat"></div>
	<div id="joueurs_chat"><div id="joueurs_chat2">';

if(!empty($rep)) {
	foreach($rep as $j) {
		echo '<b><a href="'.trad_to_page('profilsjoueur').'-'.$j->id.'"
								target="_blank"
								'.($j->admin?'class="erreur"':'').'>'.$j->login.'</a></b><br/>';
	}
}

echo '</div></div>
</div>';

include('lang/'.LANG.'/include/chat.php');

echo '
<script type="text/javascript">
$(function() {
	$("#texte_chat").focus();
	refresh_chat(1);
});
setInterval(\'refresh_chat(0)\',1000);
setInterval(\'joueurs_chat()\',3000);
$("#texte_chat").keyup(function(e) {
  if(e.keyCode == 13) {
    envoyer_chat();
  }
});
</script>';

?>