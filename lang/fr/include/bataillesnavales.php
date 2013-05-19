<div class="ligne centrer">
	
	<img src="images/jeux/btn_200.png" alt="Batailles navales" title="Batailles navales" />
	<br/><br/>
</div>
<?php
$paquet->display();
?>
<div class="ligne80 justifier">
Bienvenue sur les batailles navales, affrontez d'autres joueurs, mettez au point votre stratégie et prenez la tête du classement. La bataille navale est un jeu de stratégie se déroulant sur une carte. Huit joueurs s'affrontent pour le contrôle de la zone. L'objectif est de conquérir les cases de départ de tous les autres joueurs.<br/></div>
<div class="ligne">
<br/><br/>
<center>
<table>
<tr>
<td><b>Partie publique</b></td>
<td width="100px"></td>
<td><b>Parties Privées</b></td>
</tr>
<tr><td>
<?php

if(empty($places)) {
	$places = 0;
}

if($paquet->getRetour(3) == true) {
	echo '<a href=\'Batailles Navales-public\'>Rejoindre la partie publique</a>';
}
else {
	echo 'En attente';
} 
echo '<br/>Actuellement : '.$places.'/8<br/>
Prix d\'entrée : '.nbf($paquet->getRetour(4)). ' '.imress('drachme');
?>
</td><td></td><td>
<a href="Liste Batailles Navales">Voir les parties privées</a><br/>
<a href="Creer Une Bataille Navale">Créer une partie privée</a>
</td></tr></table>

<br/><br/>
<?php

if(!empty($liste) && sizeof($liste) > 0) {
	echo '<table><tr class=\'titre_tab\'><td>Titre</td><td>Places</td><td>Début</td></tr>';

	foreach($liste as $do) {
		if(empty($do->titre)) {
			$do->titre='Partie publique';
		}
		
		if(($do->places == 8) && ($do->temps < $temps)) {
			$do->titre='<a href=\'partie-'.$do->id.'\'>'.$do->titre.'</a>';
		}
		
		if(empty($do->temps))	{
			$ttp='Inconnu';
		}
		else {
			$ttp=date('\L\e d/m/Y \à H\hi', $do->temps);
		}

		echo '<tr>
				<td align=\'left\'>'.$do->titre.'</td>
				<td align="center">'.$do->places.'/8</td>
				<td>'.$ttp.'</td></tr>';
	}
	echo '</table>';
}
?>
</center>
</div>