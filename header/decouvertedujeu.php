<?php

if(empty($_GET['var1'])) {
	$_GET['var1'] = '';
}

switch ($_GET['var1']) {

	case 'constructions':
		echo '<title>'._('Construisez votre cité Grecque').'</title>
<meta name="description" content="'._('Bâtissez votre cité Grecque').'" />';
		break;

	case 'tresor':
		echo '<title>'._('Accumulez des Drachmes dans votre coffre').'</title>
<meta name="description" content="'._('Accumulez les trésors de la Grèce Antique').'" />';
		break;

	case 'dieux':
		echo '<title>'._('Construisez des temples et honorez les dieux').'</title>
<meta name="description" content="'._('Honorez les dieux et bâtissez leurs des temples').'" />';
		break;

	case 'arbre':
		echo '<title>'._('Personnalisez votre cité et affinez votre stratégie').'</title>
<meta name="description" content="'._('Faites des choix et définissez votre stratégie').'" />';
		break;

	case 'jeux':
		echo '<title>'._('Jouez à des mini jeux').'</title>
<meta name="description" content="'._('Devenez riche grâce aux jeux').'" />';
		break;

	case 'armee_engager':
		echo '<title>'._('Engager des troupes et composez votre stratégie').'</title>
<meta name="description" content="'._('Engager des soldats et composez vos stratégies').'" />';
		break;

	case 'armee_liste':
		echo '<title>'._('Chaque unité a des avantages').'</title>
<meta name="description" content="'._('Chaque unité a des avantages pour votre armée').'" />';
		break;

	case 'forces_defensives':
		echo '<title>'._('Définissez votre oganisation défensive').'</title>
<meta name="description" content="'._('Etablissez la stratégie défensive de votre cité').'" />';
		break;

	case 'forces_offensives':
		echo '<title>'._('Etablissez votre oganisation offensive').'</title>
<meta name="description" content="'._('Définissez la stratégie offensive de votre cité').'" />';
		break;

	case 'marche':
		echo '<title>'._('Faites du commerce').'</title>
<meta name="description" content="'._('Devenez un riche commerçant').'" />';
		break;

	case 'vendre_marche':
		echo '<title>'._('Vendez des ressources sur le commerce').'</title>
<meta name="description" content="'._('Vendez des ressources sur le commerce').'" />';
		break;

	case 'debarras_ouvert':
		echo '<title>'._('Vendez sur le débarras').'</title>
<meta name="description" content="'._('Le débarras est une opportunité de s\'enrichir').'" />';
		break;

	case 'debarras_ferme':
		echo '<title>'._('Vendez des ressources en gros').'</title>
<meta name="description" content="'._('Vendez des ressources en gros').'" />';
		break;

	default:
echo '<title>'._('Découverte d\'Ellàs War').'</title>
<meta name="description" content="'._('Découvrez le monte fabuleux d\'Ellàs War.').'" />';
		break;
}

?>