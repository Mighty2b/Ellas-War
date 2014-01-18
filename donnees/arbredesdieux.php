<?php

//Les titres
$titre_arbredesdieux = 
array(_('Offensif'), _('Défensif'), _('Commerçant/Producteur'));

/***
Max 35 points
Formule = lvl + min(ceil(points HF/5), 20)+nb temples +1;
Idées :
5% prod en + temple du lvl 8
5% def mur poseidon ou 5% dégats foudre ou 5% ame en +
quand vous perdez une attaque vous récupérez x% des ress des unités
quand vous remportez une victoire def vous récupérez x% des ress de vos unités
quand vous remportez une victoire def votre alliance récupere x% des ress de vos unités
- augmente durée des lots
- dernier lot ne peut être pillé

*/

//Les trad de l'arbre des dieux
$txt_arbredesdieux = array(
  1 => array(
    'titre' => _('Dissimulation améliorée'), 
    'txt' => _('Baisse les chances que vos espions se fassent attraper '.
    					'lors d\'un espionnage')
  ),
  2 => array(
    'titre' => _('Pillage organisé'), 
    'txt' => _('Augmente de 1% les pillages fais par vos unités')
  ),
  3 => array(
    'titre' => _('Production améliorée'), 
    'txt' => _('Suivant votre temple, augmente de 1% votre production de bois, '.
    					'de vin ou de drachmes.')
  ),
  4 => array(
    'titre' => _('Attention divine'), 
    'txt' => _('Augmente suivant votre temple, '.
    					'de 1% l\'attaque de vos âmes, '.
    					'de vos unités de cavalerie ou de vos myrmidons.')
  ),
  5 => array(
    'titre' => _('Recyclage de masse'), 
    'txt' => _('Lors d\'une victoire défensive, '.
    					'vous récupérez 4% suplémentaires des ressources utilisées lors de '.
    					'l\'engagement de vos unités et 2% lors d\'une défaite')
  ),
  6 => array(
    'titre' => _('Défense rusé'), 
    'txt' => _('Augmente de 3 minutes par niveau le temps avant que '.
    					'vous soyez de nouveau attaquable')
  ),
  7 => array(
    'titre' => _('Généreux donateur'), 
    'txt' => _('Augmente de 5% par niveau la quantité de ressources '.
    					'que vous pouvez donner à un autre membre de votre alliance')
  ),
  8 => array(
    'titre' => _('Parrain attentionné'), 
    'txt' => _('Augmente de 5% par niveau la quantité de ressources '.
    					'que vous pouvez donner à vos filleuls')
  ),
  9 => array(
    'titre' => _('Maître de la construction'), 
    'txt' => _('Baisse de 1% par niveau le prix de vos tours')
  ),
  10 => array(
    'titre' => _('Oeil de lynx'), 
    'txt' => _('Augmente vos chances d\'attraper des espions ennemis')
  ),
  11 => array(
    'titre' => _('Maitre des négociations'), 
    'txt' => _('Baisse le solde de vos unités humaines de 1% par niveau')
  ),
  12 => array(
    'titre' => _('Art de la dissimulation'), 
    'txt' => _('Baisse vos pertes en ressources lors des attaques de 1% par niveau')
  ),
  13 => array(
    'titre' => _('Petit producteur'), 
    'txt' => _('Baisse de 3% par niveau le prix des bâtiments de production de ressources communes')
  ),
  14 => array(
    'titre' => _('Producteur obstiné'), 
    'txt' => _('Baisse de 2% par niveau le prix des bâtiments de production de ressources rares')
  ),
  15 => array(
    'titre' => _('Gros producteur'), 
    'txt' => _('Baisse de 1% par niveau le prix des bâtiments de production de ressources très rares')
  ),
  16 => array(
    'titre' => _('Echoppe améliorée'), 
    'txt' => _('Chaque niveau augmente de 2h la durée de vos lot sur le commerce')
  ),
  17 => array(
    'titre' => _('Cachette secrète'), 
    'txt' => _('Si un de vos lot est acheté alors que vous n\'êtes pas connecté, '.
    					'20% des gains obtenu via votre premier lot vendu sur le '.
    					'commerce seront protégés des attaques par niveau')
  ),
  18 => array(
    'titre' => _('Prière à Zeus'), 
    'txt' => _('Augmente de 1% la résistance de vos bâtiments à la foudre')
  ),
  19 => array(
    'titre' => _('Prière à Déméter'), 
    'txt' => _('Augmente de 1% la résistance de vos bâtiments à la furie')
  ),
  20 => array(
    'titre' => _('Stockage renforcé'), 
    'txt' => _('Augmente de 1% la résistance de vos ressources à la furie')
  ),
  21 => array(
    'titre' => _('Tours renforcées'), 
    'txt' => _('Augmente de 1% la résistance des tours')
  ),
  22 => array(
    'titre' => _('Tours aménagées'), 
    'txt' => _('Baisse de 2% le terrain des tours')
  ),
  23 => array(
    'titre' => _('Cachette améliorée'), 
    'txt' => _('Le pouvoir précédent protège maintenant le lot le plus cher 
    					vendu en votre absence.')
  ),
  24 => array(
    'titre' => _('Piège de cristal'), 
    'txt' => _('Votre adversaire perdra minimum 10% de son armée, '.
    					'ce pouvoir s\'annule si vous ne vous êtes pas connecté '.
    					'depuis plus de 48h ou si votre adversaire a moins de 1% de pertes.')
  ),
  25 => array(
    'titre' => _('Survivant'), 
    'txt' => _('Vous ne pouvez pas perdre toute votre armée sur une attaque, '.
    					'au minimum 10% survivra')
  ),
  26 => array(
    'titre' => _('Négociation subtile'), 
    'txt' => _('Baisse de 1% par niveau le prix de vos unités humaines')
  ),
  27 => array(
    'titre' => _('Négociation divine'), 
    'txt' => _('Baisse de 1% par niveau le prix de vos unités mythologiques')
  ),
  28 => array(
    'titre' => _('Siège amélioré'), 
    'txt' => _('Augmente de 1% par niveau la destruction des bâtiments lors des attaques')
  ),
	29 => array(
  	'titre' => _('Négociateur des dieux'), 
    'txt' => _('Baisse le solde de vos unités mythologiques de 1% par niveau')
  ),
	30 => array(
  	'titre' => _('Malaimé des dieux'), 
    'txt' => _('Augmente de 3% les pertes d\'XP de vos adversaires en cas de victoire offensive')
  ),
	31 => array(
  	'titre' => _('Amour non partagé'), 
    'txt' => _('Augmente de 3% les pertes d\'XP de vos adversaires en cas de victoire défensive')
  )
);

?>