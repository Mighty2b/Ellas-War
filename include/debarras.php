<?php

if(date('N') < 6) {
	echo '<h2 class="centrer">'._('Débarras fermé').'</h2>';
}
else {
	echo '<h2 class="centrer">'._('Débarras ouvert').'</h2>';
}

echo '<div class="ligne_80">'._(
'Le débarras est accèpte les dépôts en ressources la semaine et les met '.
'en vente le weekend. Les ressources au même taux sont rassemblée en un seul '.
'gros lot et seul le lot ayant le taux le plus faible est affiché. '.
'Lors d\'un achat, Vous pouvez choisir la quantité de ressources que vous désirez.'
).'<br/>'._(
'Le dimanche soir à minuit, les invendus reviennent sur les comptes des joueurs '.
'avec un malus de 5%').'</div>';

?>