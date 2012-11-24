<?php

$tableau_droit = array('modifier_profils', 'changer_cotise', 'pacte', 'declarer_guerre', 'annuler_guerre', 'accepter_joueur', 'recrutement', 'contrat', 'accepter_demande');

$nom_droit = array('Modifier le profil', 'Changer la cotisation', 'Gérer les pactes', 'Déclarer une guerre', 'Annuler une guerre', 'Gérer les membres', 'Recruteur', 'Gérer les contrats', 'Accepter une demande de ressources');

$liste_temples = array('hermes', 'apollon', 'demeter', 'ares', 'athena', 'hephaistos', 'dionysos', 'artemis', 'poseidon', 'zeus', 'hades');

$liste_temples1 = array('hermes', 'apollon', 'demeter');

$liste_temples2 = array('ares', 'athena');

$liste_temples3 = array('hephaistos', 'dionysos', 'artemis');

$liste_temples4 = array('poseidon', 'zeus', 'hades');

$temples_donnees  = array(
	'hermes' => array('nom' => 'Temple d\'Hermès', 'description' => 'Lorsque vous rachetez vos lots dans le marché, vous récupérez 95% de ceux-ci au lieu de 80%. Le nombre de lots que vous pouvez mettre en vente passe de 8 à 10 et les licences vous permettant de vendre sur le marché de gros vous coûtent 50% moins cher.'), 
	'apollon' => array('nom' => 'Temple d\'Apollon', 'description' => 'Apollon vous fait grâce de sa clairvoyance. Vous pourrez connaître la taille des armées de vos ennemis grâce à l\'oracle de son temple.'), 
	'demeter' => array('nom' => 'Temple de Demeter', 'description' => 'La production de vos fermes et fermes vinicoles augmentera. Déméter vous permettra d\'utiliser sa furie sur vos adversaires, celle-ci détruit leurs stocks de nourriture et raisin ainsi que leurs fermes et fermes vinicoles.'), 
	'ares' => array('nom' => 'Temple d\'Arès', 'description' => 'Lors de vos offensives Arès veillera sur vos hommes renforçant leur fougue. Il vous permettra aussi d\'engager ses terribles spartiates.'), 
	'athena' => array('nom' => 'Temple d\'Athéna', 'description' => 'Athèna augmentera la défense de vos troupes afin de garantir la sécurité de votre cité. Elle réduira aussi le coût d\'enrolement de votre infanterie.'), 
	'artemis' => array('nom' => 'Temple d\'Artémis', 'description' => 'Artémis arpentera les bois et aidera vos bûcherons dans leur tâche. Elles vous prêtera aussi ses féroces amazones pour aller au combat.'), 
	'dionysos' => array('nom' => 'Temple de Dionysos', 'description' => 'Dionysos augmentera le rendement de vos ateliers de pressage, ceux-ci produiront plus de vin pour abreuver vos troupes. Les centaures voyant que vous avez son soutien, se joindront à vous.'), 
	'hephaistos' => array('nom' => 'Temple d\'Héphaïstos', 'description' => 'Héphaïstos augmentera le rendement de vos ateliers de battage de la monnaie et ses automates défendront les portes de votre cité.'), 
	'zeus' => array('nom' => 'Temple de Zeus', 'description' => 'Zeus fera tomber la foudre sur vos ennemis à vos souhaits, réduisant en cendre leurs bâtiments. Il vous fournira aussi ses terribles myrmidons.'), 
	'hades' => array('nom' => 'Temple d\'Hadès', 'description' => 'Hadès augmentera la production de vos mines et carrières. Il pourra aussi vous preter son casque d\'invisibilité pour vous permettre de visiter les cités de vos amis et ennemis. Lors de vos terribles batailles, les âmes de vos hommes reviendront combattre pour vous.'), 
	'poseidon' => array('nom' => 'Temple de Poseidon', 'description' => 'Grâce à Poseidon, vos unités de cavaleries coûtent moins chères. Il pourra aussi construire un mur autour de votre cité pour repousser vos ennemis. En tant que dieu des océans il augmentera la production de vos puits.')
	);

$statues_donnees = array(
	'sacrifice_hera' => array('nom' => 'Sacrifice d\'Héra', 'url' => 'sacrifice_hera'),
	'defense_gaia' => array('nom' => 'Défense de Gaia', 'url' => 'defense_gaia'),
	'strategie_hippodamos' => array('nom' => 'Stratégie d\'Hippodamos', 'url' => 'strategie_hippodamos'),
	'sauvegarde_ombre' => array('nom' => 'Sauvegarde des ombres', 'url' => 'sauvegarde_ombre')
);

?>