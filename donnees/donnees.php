<?php

$tableau_droit = array('modifier_profils', 'changer_cotise', 'pacte', 
                       'declarer_guerre', 'annuler_guerre', 'accepter_joueur',
                       'recrutement', 'contrat', 'accepter_demande');

$nom_droit = array(_('Modifier le profil'), _('Changer la cotisation'), 
                   _('Gérer les pactes'), _('Déclarer une guerre'), 
                   _('Annuler une guerre'), _('Gérer les membres'), 
                   _('Recruteur'), _('Gérer les contrats'), 
                   _('Accepter une demande de ressources'));

$liste_temples = array('hermes', 'apollon', 'demeter', 'ares', 'athena', 'hephaistos', 'dionysos', 'artemis', 'poseidon', 'zeus', 'hades');

$liste_temples1 = array('hermes', 'apollon', 'demeter');

$liste_temples2 = array('ares', 'athena');

$liste_temples3 = array('hephaistos', 'dionysos', 'artemis');

$liste_temples4 = array('poseidon', 'zeus', 'hades');

$temples_donnees  = array(
	'hermes' => array(
		'nom' => _('Temple d\'Hermès'),
		'description' => _('Lorsque vous rachetez vos lots dans le marché, vous récupérez 95% de ceux-ci au lieu de 80%. Le nombre de lots que vous pouvez mettre en vente passe de 8 à 10 et les licences vous permettant de vendre sur le marché de gros vous coûtent 50% moins cher.'),
		'dieu' => _('Hermès')), 
	'apollon' => array(
		'nom' => _('Temple d\'Apollon'), 
		'description' => _('Apollon vous fait grâce de sa clairvoyance. Vous pourrez connaître la taille des armées de vos ennemis grâce à l\'oracle de son temple.'),
		'dieu' => _('Apollon')),
	'demeter' => array(
		'nom' => _('Temple de Demeter'), 
		'description' => _('La production de vos fermes et fermes vinicoles augmentera. Déméter vous permettra d\'utiliser sa furie sur vos adversaires, celle-ci détruit leurs stocks de nourriture et raisin ainsi que leurs fermes et fermes vinicoles.'),
		'dieu' => _('Demeter')), 
	'ares' => array(
		'nom' => _('Temple d\'Arès'), 
		'description' => _('Lors de vos offensives Arès veillera sur vos hommes renforçant leur fougue. Il vous permettra aussi d\'engager ses terribles spartiates.'),
		'dieu' => _('Arès')), 
	'athena' => array(
		'nom' => _('Temple d\'Athéna'), 
		'description' => _('Athèna augmentera la défense de vos troupes afin de garantir la sécurité de votre cité. Elle réduira aussi le coût d\'enrolement de votre infanterie.'),
		'dieu' => _('Athéna')), 
	'artemis' => array(
		'nom' => _('Temple d\'Artémis'), 
		'description' => _('Artémis arpentera les bois et aidera vos bûcherons dans leur tâche. Elle vous prêtera aussi ses féroces amazones pour aller au combat.'),
		'dieu' => _('Artémis')), 
	'dionysos' => array(
		'nom' => _('Temple de Dionysos'), 
		'description' => _('Dionysos augmentera le rendement de vos ateliers de pressage, ceux-ci produiront plus de vin pour abreuver vos troupes. Les centaures voyant que vous avez son soutien, se joindront à vous.'),
		'dieu' => _('Dionysos')), 
	'hephaistos' => array(
		'nom' => _('Temple d\'Héphaïstos'), 
		'description' => _('Héphaïstos augmentera le rendement de vos ateliers de battage de la monnaie et ses automates défendront les portes de votre cité.'),
		'dieu' => _('Héphaïstos')), 
	'zeus' => array(
		'nom' => _('Temple de Zeus'), 
		'description' => _('Zeus fera tomber la foudre sur vos ennemis à vos souhaits, réduisant en cendre leurs bâtiments. Il vous fournira aussi ses terribles myrmidons.'),
		'dieu' => _('Zeus')), 
	'hades' => array(
		'nom' => _('Temple d\'Hadès'), 
		'description' => _('Hadès augmentera la production de vos mines et carrières. Il pourra aussi vous preter son casque d\'invisibilité pour vous permettre de visiter les cités de vos amis et ennemis. Lors de vos terribles batailles, les âmes de vos hommes reviendront combattre pour vous.'),
		'dieu' => _('Hadès')), 
	'poseidon' => array(
		'nom' => _('Temple de Poseidon'), 
		'description' => _('Grâce à Poseidon, vos unités de cavaleries coûtent moins chères. Il pourra aussi construire un mur autour de votre cité pour repousser vos ennemis. En tant que dieu des océans il augmentera la production de vos puits.'),
		'dieu' => _('Poseidon'))
	);

$batiment_prix_temple1 = array('drachme' => 200000, 'pierre' => 20000, 'marbre' => 500, 'bois' => 160000, 'gold' => 0);

$batiment_prix_temple2 = array('drachme' => 500000, 'pierre' => 50000, 'marbre' => 1250, 'bois' => 400000, 'gold' => 0);

$batiment_prix_temple3 = array('drachme' => 1000000, 'pierre' => 400000, 'marbre' => 8000, 'bois' => 1200000, 'gold' => 0);

$batiment_prix_temple4 = array('drachme' => 4000000, 'pierre' => 1600000, 'marbre' => 160000, 'bois' => 25000000, 'gold' => 120000);


$statues_donnees = array(
	'sacrifice_hera' => array('nom' => 'Sacrifice d\'Héra', 'url' => 'sacrifice_hera'),
	'defense_gaia' => array('nom' => 'Défense de Gaia', 'url' => 'defense_gaia'),
	'strategie_hippodamos' => array('nom' => 'Stratégie d\'Hippodamos', 'url' => 'strategie_hippodamos'),
	'sauvegarde_ombre' => array('nom' => 'Faveur de l\'Érèbe', 'url' => 'sauvegarde_ombre')
);

?>