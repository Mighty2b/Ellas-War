<div id="bouton_construction"><a href="/"><img src="design/co/cite.png" alt="Constructions" title="Constructions" onmouseover="menu_visible('menu_haut_construction');" /></a></div>
<div id="bouton_armee"><a href="PasserEnRevue"><img src="design/co/armee.png" alt="Armée" title="Armée" onmouseover="menu_visible('menu_haut_armee');" /></a></div>
<div id="bouton_archives"><a href="Archives"><img src="design/co/archives.png" alt="Archives" title="Archives" onmouseover="menu_visible('menu_haut_bouchon');"/></a></div>
<div id="bouton_mythologie"><a href="<?php
if($paquet->getlvl() == 0) {
	echo 'Prieres';
}
elseif(sizeof($paquet->getTemples()) >= 4) {
	echo 'AutelDesDieux';
}
else {
	echo 'Temples';
}

echo '"><img src="design/co/mythologie.png" alt="Mythologie" title="Mythologie" onmouseover="menu_visible(\'menu_haut_mythologie\');" /></a></div>
<div id="bouton_alliance"><a href="'.(($paquet->getalliance() != 0)?'Alliance':'LesAlliances'); ?>"><img src="design/co/alliances.png" alt="Alliance" title="Alliance" onmouseover="menu_visible('menu_haut_bouchon');"/></a></div>
<div id="bouton_forum"><a href="http://forums.ellaswar.com" target="_blank" ><img src="design/co/forum.png" alt="Forum" title="Forum" onmouseover="menu_visible('menu_haut_bouchon');"/></a></div>
<div id="bouton_messagerie"><a href="Messagerie">
<?php
if($paquet->nouveaux_mp() > 0) {
	echo '<img src="design/co/messagerie2.png" alt="Messagerie" title="Messagerie ('.$paquet->nouveaux_mp().')" onmouseover="menu_visible(\'menu_haut_messagerie\');"	/>';
}
else {
	echo '<img src="design/co/messagerie.png" alt="Messagerie" title="Messagerie" onmouseover="menu_visible(\'menu_haut_messagerie\');"/>';
}
?></a></div>
<div id="bouton_marche"><a href="MesVentes"><img src="design/co/marche.png" alt="Marché" title="Marché" onmouseover="menu_visible('menu_haut_marche');"/></a></div>
<div id="bouton_classement"><a href="classements"><img src="design/co/classement.png" alt="Classements" title="Classements"  onmouseover="menu_visible('menu_haut_bouchon');"/></a></div>
<div id="bouton_extra"><a href="InformationsPersonnelles"><img src="design/co/extra.png" alt="Extra" title="Extra" 
onmouseover="menu_visible('menu_haut_extra');"/></a></div>
<div id="bouton_help"><a href="http://wiki.ellaswar.com" target="_blank"><img src="images/joueurs/help.png" alt="Aide" title="Aide" onmouseover="menu_visible('menu_haut_bouchon');"/></a></div>
<div id="bouton_chat"><a href="Chat"><img src="images/joueurs/bulle.png" alt="Accéder au chat du jeu"  title="Accéder au chat du jeu" onmouseover="menu_visible('menu_haut_bouchon');"/></a></div>