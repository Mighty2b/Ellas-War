<?php

if(!empty($_GET['var1']) && (trad_to_page($_GET['var1']) == 'gratuit')) {
echo '
<h1>'._('Ellàs War, un jeu gratuit').'</h1>
<br/>
<h2>'._('Financement du jeu').'</h2>
<div class="ligne ligne80 justify">'._(
'Le jeu est gratuit mais l\'équipe se doit de financer ses besoins. '.
'En effet les serveurs et les noms de domaine ne sont pas gratuit. '.
'Pour cela nous avons mis en place un système de Faveur, l\'achat '.
'd\'une faveur vous permettra d\'aider le jeu et d\'obtenir divers avantages. '.
'Pour cela nous utilisons plusieurs systèmes de paiement comme paypal '.
'et rentabiliweb.<br/>Depuis le début, le jeu a toujours réussi à s\'auto-financer. '.
'Si vous désirez nous aidez, la meilleure chose que vous puissiez faire est '.
'd\'envoyer le lien du jeu à vos amis. '.
'Notre meilleure récompense est de savoir que le site vous plait.').
'<br/><br/></div>

<h2>'._('Fonctionnement des Faveurs').'</h2>
<div class="ligne ligne80 justify">'._(
'Lors d\'un achat via le système de paiement, votre compte se voit crédité '.
'une ou plusieurs faveurs. Celles-ci vous permettront d\'obtenir des bonus '.
'dans le jeu. Afin de ne pas trop désavantager ceux qui ne prennent pas '.
'de faveurs, celles-ci peuvent être échangées entre joueurs. '.
'Vous pouvez aussi obtenir des faveurs en invitant des amis à s\'inscrire '.
'sur Ellàs War via votre lien de parrainage ou par les jeux organisés '.
'régulièrement sur <a href="teamspeak">Teamspeak</a>.').
'<br/><br/></div>';

}
else {
echo '<h1>'._('Mettez en place votre stratégie').'</h1>
<br/>
<div class="ligne ligne80 justify">'._(
'Ellàs War est un jeu de stratégie en ligne. '.
'Nous allons maintenant voir rapidement les principaux points stratégiques du jeu.'
).'<br/><br/></div>

<h2>'._('Vénérez les dieux').'</h2>
<div class="ligne ligne80 justify">'._(
'Régulièrement vous aurez la possibilité de bâtir un temple dans votre cité. '.
'Il y a en tous 11 temples disponibles, malheureusement pour vous, '.
'vous ne pourrez en construire que 4. Ces temples sont déterminants pour '.
'votre stratégie puis qu\'ils vos procureront différents avantages. '.
'Vous aurez la possibilité de changer de temple via notre système de faveurs.').
'<br/><br/></div>

<h2>'._('Faites varier votre terrain').'</h2>
<div class="ligne ligne80 justify">'._(
'Sauf cas exceptionnels, vos possibilités d\'attaque ou d\'être attaqué, '.
'sont déterminées par votre terrain. En faisant varier celui-ci tout en '.
'renforçant votre défense vous pourrez vous adapter à vos ennemis.').
'<br/><br/></div>


<h2>'._('Choisissez vos unités').'</h2>
<div class="ligne ligne80 justify">'._(
'Chaque unité possède des caractéristiques uniques. '.
'Elles vous permettront de mener à bien vos conquêtes ou d\'assurer '.
'la défense de votre cité. Celles-ci peuvent être mythologiques ou humaines, '.
'à pied ou à cheval, au corps à corps ou à distance. '.
'Ces différentes caractéristiques vous permettront de bâtir votre propre '.
'stratégies ou d\'améliorer celles de vos adversaires.').
'<br/><br/></div>';

}

?>