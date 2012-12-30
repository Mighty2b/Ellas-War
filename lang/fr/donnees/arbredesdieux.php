<?php

//Les titres
$titre_arbredesdieux = 
array('Offensif', 'Défensif', 'Commerçant/Producteur');

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
    'titre' => 'Dissimulation améliorée', 
    'txt' => 'Baisse les chances que vos espions se fassent attraper 
    					lors d\'un espionnage'
  ),
  2 => array(
    'titre' => 'Pillage organisé', 
    'txt' => 'Augmente de 1% les pillages fais par vos unités'
  ),
  3 => array(
    'titre' => 'Production améliorée', 
    'txt' => 'Suivant votre temple, augmente de 1% votre production de bois, 
    					de vin ou de drachmes.'
  ),
  4 => array(
    'titre' => 'Attention divine', 
    'txt' => 'Augmente suivant votre temple, 
    					de 1% l\'attaque de vos âmes, 
    					de vos unités de cavalerie ou de vos myrmidons.'
  ),
  5 => array(
    'titre' => 'Recyclage de masse', 
    'txt' => 'Lors d\'une victoire défensive, 
    					vous récupérez 4% suplémentaires des ressources utilisées lors de 
    					l\'engagement de vos unités et 2% lors d\'une défaite'
  ),
  6 => array(
    'titre' => 'Défense rusé', 
    'txt' => 'Augmente de 3 minutes par niveau le temps avant que 
    					vous soyez de nouveau attaquable'
  ),
  7 => array(
    'titre' => 'Généreux donateur', 
    'txt' => 'Augmente de 5% par niveau la quantité de ressources 
    					que vous pouvez donner à un autre membre de votre alliance'
  ),
  8 => array(
    'titre' => 'Parrain attentionné', 
    'txt' => 'Augmente de 5% par niveau la quantité de ressources 
    					que vous pouvez donner à vos filleuls'
  ),
  9 => array(
    'titre' => 'Maître de la construction', 
    'txt' => 'Baisse de 1% par niveau le prix de vos tours'
  ),
  10 => array(
    'titre' => 'Oeil de lynx', 
    'txt' => 'Augmente vos chances d\'attraper des espions ennemis'
  ),
  11 => array(
    'titre' => 'Maitre des négociations', 
    'txt' => 'Baisse le solde de vos unités humaines de 1% par niveau'
  ),
  12 => array(
    'titre' => 'Art de la dissimulation', 
    'txt' => 'Baisse vos pertes en ressources lors des attaques de 1% par niveau'
  ),
  13 => array(
    'titre' => 'Petit producteur', 
    'txt' => 'Baisse de 3% par niveau le prix des bâtiments de production de ressources communes'
  ),
  14 => array(
    'titre' => 'Producteur obstiné', 
    'txt' => 'Baisse de 2% par niveau le prix des bâtiments de production de ressources rares'
  ),
  15 => array(
    'titre' => 'Gros producteur', 
    'txt' => 'Baisse de 1% par niveau le prix des bâtiments de production de ressources très rares'
  ),
  16 => array(
    'titre' => 'Echoppe améliorée', 
    'txt' => 'Chaque niveau augmente de 2h la durée de vos lot sur le commerce'
  ),
  17 => array(
    'titre' => 'Cachette secrète', 
    'txt' => 'Si un de vos lot est acheté alors que vous n\'êtes pas connecté, 
    					20% des gains obtenu via votre premier lot vendu sur le 
    					commerce seront protégés des attaques par niveau'
  ),
  18 => array(
    'titre' => 'Prière à Zeus', 
    'txt' => 'Augmente de 1% la résistance de vos bâtiments à la foudre'
  ),
  19 => array(
    'titre' => 'Prière à Déméter', 
    'txt' => 'Augmente de 1% la résistance de vos bâtiments à la furie'
  ),
  20 => array(
    'titre' => 'Stockage renforcé', 
    'txt' => 'Augmente de 1% la résistance de vos ressources à la furie'
  ),
  21 => array(
    'titre' => 'Tours renforcées', 
    'txt' => 'Augmente de 1% la résistance des tours'
  ),
  22 => array(
    'titre' => 'Tours aménagées', 
    'txt' => 'Baisse de 2% le terrain des tours'
  ),
  23 => array(
    'titre' => 'Cachette améliorée', 
    'txt' => 'Le pouvoir précédent protège maintenant le lot le plus cher 
    					vendu en votre absence.'
  ),
  24 => array(
    'titre' => 'Piège de cristal', 
    'txt' => 'Votre adversaire perdra minimum 10% de son armée, 
    					ce pouvoir s\'annule si vous ne vous êtes pas connecté
    					depuis plus de 48h ou si votre adversaire a moins de 1% de pertes.'
  ),
  25 => array(
    'titre' => 'Survivant', 
    'txt' => 'Vous ne pouvez pas perdre toute votre armée sur une attaque, 
    					au minimum 10% survivra'
  ),
  26 => array(
    'titre' => 'Négociation subtile', 
    'txt' => 'Baisse de 1% par niveau le prix de vos unités humaines'
  ),
  27 => array(
    'titre' => 'Négociation divine', 
    'txt' => 'Baisse de 1% par niveau le prix de vos unités mythologiques'
  ),
  28 => array(
    'titre' => 'Siège amélioré', 
    'txt' => 'Augmente de 1% par niveau la destruction des bâtiments lors des attaques'
  ),
	29 => array(
  	'titre' => 'Négociateur des dieux', 
    'txt' => 'Baisse le solde de vos unités mythologiques de 1% par niveau'
  ),
	30 => array(
  	'titre' => 'Malaimé des dieux', 
    'txt' => 'Augmente de 3% les pertes d\'XP de vos adversaires en cas de victoire offensive'
  ),
	31 => array(
  	'titre' => 'Amour non partagé', 
    'txt' => 'Augmente de 3% les pertes d\'XP de vos adversaires en cas de victoire défensive'
  )
);

?>