<?php

echo '<h1>'._('Serveur Teamspeak').'</h1>
<br/>

<center>'.
_(
'N\'hésitez pas à venir nous rejoindre sur le serveur Teamspeak du jeu.<br/>
Vous pourrez y trouver les réponses à vos questions ainsi que rencontrer les autres joueurs.').'

<h3>'._('Configuration').' :</h3>
<b>'._('Adresse').' :</b> ellaswar.com<br/>
<b>'._('Port').' :</b> 9987<br/>
<br/>';

include('tsstatus/tsstatus.php');
$tsstatus = new TSStatus("127.0.0.1", 10011, 1);
$tsstatus->imagePath = "tsstatus/img/";
$tsstatus->showNicknameBox = false;
$tsstatus->showPasswordBox = false;
$tsstatus->decodeUTF8 = false;
$tsstatus->timeout = 2;
$tsstatus->setCache(5);
echo $tsstatus->render();

?>