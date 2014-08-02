<?php

switch ($_GET['var1']) {
	
	case 'constructions':
		$title = _('Une cité sur Ellàs War');
		$img_src = 'screen_constructions.jpg';
		$img_title = _('Une cité sur Ellàs War');
		$text = _('Le joueur survole d\'un coup d\'oeil les divers bâtiments qui composent sa cité. ');
		$text.= _('Dans l\'exemple ci-dessus, un petit producteur niveau 9.');
		$lien_pre = _('decouvertedujeu');
		$lien_sui = _('decouvertedujeu').'-'._('tresor');
	break;	
	
	case 'tresor':
		$title = _('Le trésor');
		$img_src = 'screen_tresor.jpg';
		$img_title = _('Le trésor d\'une cité');
		$text = _('Le « Coffre » de la Cité. Il permet de mettre à l’abri du pillage la monnaie du jeu : les Drachmes.');
		$text.= _('Sa capacité est limitée au début, elle devient illimitée à partir du niveau 6 mais les retraits sont taxés.');
		$lien_pre = _('decouvertedujeu').'-'._('constructions');
		$lien_sui = _('decouvertedujeu').'-'._('dieux');
	break;
	
	case 'dieux':
		$title = _('Le temples');
		$img_src = 'screen_dieux.png';
		$img_title = _('Les temples');
		$text = _('Chaque temple donne un avantage qui lui est unique. À vous de bien les choisir suivant votre stratégie.');
		$lien_pre = _('decouvertedujeu').'-'._('tresor');
		$lien_sui = _('decouvertedujeu').'-'._('arbre');
	break;
	
	case 'arbre':
		$title = _('L\'arbre des dieux');
		$img_src = 'screen_arbre.png';
		$img_title = _('L\'arbre des dieux');
		$text = _('L\'arbre des dieux vous permet de personnaliser votre cité. Votre avancée sur le jeu vous donnera des points qui vous permettront d\'affiner votre stratégie.');
		$lien_pre = _('decouvertedujeu').'-'._('dieux');
		$lien_sui = _('decouvertedujeu').'-'._('jeux');
	break;
	
	case 'jeux':
		$title = _('Les jeux');
		$img_src = 'screen_jeux.jpg';
		$img_title = _('Les jeux d\'Ellàs War');
		$text = _('Ces jeux permettent de s’amuser et de gagner des récompenses.');
		$lien_pre = _('decouvertedujeu').'-'._('arbre');
		$lien_sui = _('decouvertedujeu').'-'._('armee_engager');
	break;

	case 'armee_engager':
		$title = _('L\'armée - 1');
		$img_src = 'screen_armee1.jpg';
		$img_title = _('Engager une armée');
		$text = _('Un exemple de page d’engagement de troupes : ');
		$text.= _('ici, des unités mythologiques, les Amazones.');
		$lien_pre = _('decouvertedujeu').'-'._('jeux');
		$lien_sui = _('decouvertedujeu').'-'._('armee_liste');
	break;

	case 'armee_liste':
		$title = _('L\'armée - 2');
		$img_src = 'screen_armee2.jpg';
		$img_title = _('Les armées d\'une cité');
		$text = _('Ci-dessus, le tableau des unités engagées par le joueur. ');
		$text.= _('On y retrouve les Amazones.');
		$lien_pre = _('decouvertedujeu').'-'._('armee_engager');
		$lien_sui = _('decouvertedujeu').'-'._('forces_defensives');
	break;

	case 'forces_defensives':
		$title = _('Forces défensives');
		$img_src = 'screen_defense.jpg';
		$img_title = _('Organisation de la défense de la Cité');
		$text = _('Organisation de la défense de la Cité. ');
		$text.= _('Ici, plusieurs vagues de défenses avec répartition des troupes et des tours.');
		$lien_pre = _('decouvertedujeu').'-'._('armee_liste');
		$lien_sui = _('decouvertedujeu').'-'._('forces_offensives');
	break;

	case 'forces_offensives':
		$title = _('Forces offensives');
		$img_src = 'screen_attaque.jpg';
		$img_title = _('Organisation de l\'attaque de la Cité');
		$text = _('Organisation de l’attaque, ici, les troupes ont été réparties en deux vagues.');
		$lien_pre = _('decouvertedujeu').'-'._('forces_defensives');
		$lien_sui = _('decouvertedujeu').'-'._('marche');
	break;

	case 'marche':
		$title = _('Le marché');
		$img_src = 'screen_marche1.jpg';
		$img_title = _('Parcour du commerce');
		$text = _('On parcour le marché afin de trouver les ressources nécéssaire à la cité. ');
		$text.= _('Dans l’espace « Bois », on a 3 lots mis en vente.');
		$lien_pre = _('decouvertedujeu').'-'._('forces_offensives');
		$lien_sui = _('decouvertedujeu').'-'._('vendre_marche');
	break;

	case 'vendre_marche':
		$title = _('Vendre sur le marché');
		$img_src = 'screen_marche2.jpg';
		$img_title = _('Vendre sur le commerce');
		$text = _('La mise en vente de ressources se fait suivant certaines conditions.');
		$lien_pre = _('decouvertedujeu').'-'._('marche');
		$lien_sui = _('decouvertedujeu').'-'._('debarras_ouvert');
	break;
	
	case 'debarras_ouvert':
		$title = _('Le débarras ouvert');
		$img_src = 'screen_debarras1.jpg';
		$img_title = _('Le débarras ouvert');
		$text = _('Lorsqu’il est ouvert, le Débarras permet au joueur d’acheter des ressources. ');
		$lien_pre = _('decouvertedujeu').'-'._('vendre_marche');
		$lien_sui = _('decouvertedujeu').'-'._('debarras_ferme');
	break;

	case 'debarras_ferme':
		$title = _('Le débarras fermé');
		$img_src = 'screen_debarras2.jpg';
		$img_title = _('Le débarras fermé');
		$text = _('Lorsque le débarras est fermé, le joueur peut y placer des lots qui seront disponibles à la vente le mercredi, samedi et dimanche. Le « vendeur » peut reprendre tout ou  partie de ses lots.');
		$lien_pre = _('decouvertedujeu').'-'._('debarras_ouvert');
		$lien_sui = _('decouvertedujeu');
	break;		
	
	default:
		$title = _('La cité');
		$img_src = 'screen_cite.jpg';
		$img_title = _('Découverte d\'une cité');
		$text = _('Grâce à cette vue d\'ensemble, le joueur dispose de toutes les dernières infos en un coup d\'oeil.');
		$lien_pre = _('decouvertedujeu').'-'._('debarras_ferme');
		$lien_sui = _('decouvertedujeu').'-'._('constructions');
	break;
}

/*
	$title = '';
	$img_title = '';
	$img_src = '';
	$img_title = '';
	$text = '';
*/

echo '
<div id="decouverte_gauche">

	<a href="'.$lien_pre.'"><img src="images/utils/fleche_gauche.png"
	                             alt="'._('Flèche Gauche').'" 
	                             title="'._('Flèche Gauche').'"
	                             id="fleche_gauche" /></a>

</div>

<div id="decouverte_centre">
	
	<h1>'.$title.'</h1>
	
	<img alt="'.$img_title.'" 
	     src="'.STATIC_LINK.'lang/'.LANG.'/images/screen/'.$img_src.'"
	     title="'.$img_title.'" />

	<h3>'.$text.'</h3>
	
</div>

<div id="decouverte_droite">

	<a href="'.$lien_sui.'"><img src="images/utils/fleche_droite.png"
	                             alt="'._('Flèche Droite').'" 
	                             title="'._('Flèche Droite').'"
	                             id="fleche_droite" /></a>

</div>';

?>

<script type="text/javascript">
$(document).keyup(function(e) {
	switch(e.keyCode) {
		case 32:
		case 39:
			$("#fleche_droite").click();
		break;
		
		case 37:
			$("#fleche_gauche").click();
		break;
	}
});
</script>
