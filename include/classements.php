<?php

if($paquet->get_infoj('statu') == 1) {
	echo '<div class="ligne_80">';
}

echo '<h2 class="centrer">'._('Classements').'</h2>
      <br/><br/>';

echo '<a href="'._('classementdesjoueurs').'"
         class="gras">'._('Classement des joueurs').'</a><br/>'.
   _('Classement des cités d\'Ellàs War, celui-ci se fait '.
     'par rapport au niveau du joueur puis grâce à un système d\'XP. '.
     'L\'XP augmente lors d\'une victoire et baisse lors d\'une défaite.');

echo '<br/>
      <br/>
      <a href="'._('classementdesalliances').'"
         class="gras">'._('Classement des Alliances').'</a><br/>'.
   _('Classement des alliances d\'Ellàs War, celui-ci se fait '.
     'par rapport au niveau de l\'alliance puis grâce à un système d\'XP. '.
     'Par leurs attaques les membres font gagner ou perdre de l\'XP à leur '.
     'alliance. Il est aussi possible de gagner ou perdre de l\'XP grâce aux guerres.');

echo '<br/>
      <br/>
      <a href="'._('classementdesbtn').'"
         class="gras">'._('Classement des Batailles navales').'</a><br/>'.
   _('Les batailles navales sont une guerre maritime entre quatre joueurs. '.
     'Leur score est calculé sur un dérivé du ELO qui est à celui utilisé '.
     'pour classer les joueurs d\'echec.');

echo '<br/>
      <br/>
      <a href="'._('classementghonneur').'"
         class="gras">'._('Classement de l\'Honneur').'</a><br/>'.
         _('Classement des courrageuses cités d\'Ellàs War par rapport à leur honneur.');
/*
echo '<br/>
      <br/>
      <a href="'._('classementdesheros').'"
         class="gras">'._('Classement des Héros').'</a><br/>'.
   _('Chaque cité d\'ELlàs War peut engager un héros. Celui-ci '.
     'peut être envoyé faire des quêtes ou attaquer les héros '.
     'des autres cités.');
*/

if($paquet->get_infoj('statu') == 1) {
	echo '</div>';
}

?>