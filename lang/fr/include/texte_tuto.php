<?php

$etape = $paquet->get_etape();

echo '<div class="ligne gauche erreur"><u>Mission '.$etape.' :</u></div>';

if($paquet->getlvl() == 0) {
	switch($etape) {
	case 0:
		echo '<div class="ligne gauche">Bonjour à vous, mortel<br/>
		Je suis le grand roi Léonidas qui régna autrefois sur Sparte. J\'ai été rappelé des enfers par les dieux afin de vous former à votre rôle de chef de cité. Comme vous pouvez le voir, pour l\'instant votre cité n\'est guère étendue mais ensemble nous allons bâtir quelque chose qui vaut le coup d’œil. Dites-moi quand vous serez prêts.<br/><br/>
		</div>
		<div class="ligne centrer">
		<a href="javascript:etape_suivante();" class="titre_tab">Je suis prêt !</a>
		</div>';
	break;

	case 1:
		echo '<div class="ligne gauche">Vous avez remarqué ? <b>Votre messagerie</b> est jaune.<br/>
		Allez lire vos messages en cliquant sur Messagerie puis sur le titre du message.';
	
		if($paquet->check_etape() == true) {
			echo '<br/><br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}

		echo '<br/><b>Récompense :</b> '.nbf(5000).' '.imress('drachme');
	
		echo '</div>';
	break;

	case 2:
		echo '<div class="ligne gauche">Les drachmes sont le nerf de la guerre
					grâce à eux vous pourrez construire des bâtiments et lever des armées. 
					Ils sont produits par vos ateliers de battage de la monnaie, 
					essayez d\'en avoir un maximum mais attention à chaque nouvel atelier 
					le prix augmente.<br/>
					Construisez un total de <b>quatre ateliers de battage de la monnaie</b>.';
	
		if($paquet->check_etape() == true) {
			echo '<br/><br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}

		echo '<br/><b>Récompense :</b> '.nbf(5000).' '.imress('drachme').' '.nbf(5000).' '.imress('bois');
	
		echo '</div>';
	break;

	case 3:
		echo '<div class="ligne gauche">Comme vous pouvez le constater, 
					votre production d\'argent compense à peine votre consommation. 
					Pour préparer vos futurs constructions, construisez un total de <b>quatre 
					mines d\'argent</b>. L\'argent vous permettra de battre votre monnaie et 
					d\'engager certaines de vos unités.';
	
		if($paquet->check_etape() == true) {
			echo '<br/><br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}
	
		echo '<br/><b>Récompense :</b> '.nbf(2000).' '.imress('drachme').' '.nbf(4000).' '.imress('bois');
	
		echo '</div>';
	break;

	case 4:
		echo '<div class="ligne gauche">L\'eau est la ressource la plus utilisée 
					sur le jeu. Beaucoup de bâtiments de production et la plupart des 
					unités en consomment.
		<br/>Construisez un total de <b>10 puits</b> afin de maintenir vos stocks d\'eau.';
	
		if($paquet->check_etape() == true) {
			echo '<br/><br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}
	
		echo '<br/><b>Récompense :</b> '.nbf(5000).' '.imress('drachme');
	
		echo '</div>';
	break;

	case 5:
		echo '<div class="ligne gauche">Pour construire vos bâtiments vous aurez besoin de bois.
		<br/>Construisez un total de <b>six scieries</b> pour couvrir vos futurs besoins en bois.';
	
		if($paquet->check_etape() == true) {
			echo '<br/><br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}
		echo '<br/><b>Récompense :</b> '.nbf(8000).' '.imress('drachme');
	
		echo '</div>';
	break;

	case 6:
		echo '<div class="ligne gauche">Le fer est une ressource importante pour vos armées, il vous permettra aussi via vos scieries de produire du bois.
		<br/>Construisez un total de <b>5 mines de fer</b>.';
	
		if($paquet->check_etape() == true) {
			echo '<br/><br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}
		echo '<br/><b>Récompense :</b> '.nbf(10000).' '.imress('drachme');
		echo '</div>';
	break;

	case 7:
		echo '<div class="ligne gauche">Sur le marché, vous pourrez acheter et vendre des lots de ressources à partir du niveau 1. Pour accéder au commerce il vous faudra une agora.
	<br/>Allez dans Constructions, Construire, Divers puis construisez <b>une agora</b> et allez consulter le commerce.';
	
		if($paquet->check_etape() == true) {
			echo '<br/><br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}
		echo '<br/><b>Récompense :</b> '.nbf(2000).' '.imress('drachme');
		echo '</div>';
	break;

	case 8:
		echo '<div class="ligne gauche">Les prières sont obtenues via des jeux qui sont organisés régulièrement sur notre page facebook/twitter ou le soir sur notre serveur teamspeak.<br/>
	Allez dans Mythologie, puis Prière et entrez la prière suivante et passez à la mission 8. Elle vous donnera des unités qui seront essentielles pour votre prochaine mission.<br/>
	<b>« GloireASparte »</b>';
		if($paquet->check_etape() == true) {
			echo '<br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}
		echo '<br/><b>Récompense :</b> '.nbf(2000).' '.imress('drachme');
		echo '</div>';
	break;

	case 9:
		echo '<div class="ligne gauche">Je vous ai offert mes terribles spartiates 
					à la mission précédente, allez sur la page armée puis configurez 
					votre stratégie offensives. Ouvrez en suite la page attaquer et 
					engagez le combat contre notre ennemi commun, la ville Perse 
					d\'<b>Hagmatana</b>. Allez ensuite visiter vos archives où est 
					entreposée l\'histoire de votre cité.';
		if($paquet->check_etape() == true) {
			echo '<br/><br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}
		echo '<br/><b>Récompense :</b> '.nbf(4000).' '.imress('drachme').' '.nbf(4000).' '.imress('bois');
		echo '</div>';
	break;

	case 10:
		echo '<div class="ligne gauche">Allez dans armée, puis engager. Renvoyez les spartiates et récupérez des ressources. Vous pourrez de nouveau en engager si vous bâtissez le temple d\'Arès au niveau 6.<br/>Ne vous inquiètez pas pour votre fer, je vais vous arranger ça, mais que cela reste entre nous ;)';
		if($paquet->check_etape() == true) {
			echo '<br/><br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}
		echo '<br/><b>Récompense :</b> '.nbf(20000).' '.imress('drachme').' '.nbf(20000).' '.imress('bois');
		echo '</div>';
	break;

	case 11:
		echo '<div class="ligne gauche">Pour protéger votre cité, 
					vous pouvez aussi construire des tours. Celles-ci ont comme 
					avantage sur les unités de ne pas avoir de solde. Par contre 
					elles ne peuvent pas attaquer. Allez dans le menu Constructions, 
					Construire puis Militaire et construisez <b>cinq tours</b> 
					afin de protéger votre cité.';
		if($paquet->check_etape() == true) {
			echo '<br/><br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}
		echo '<br/><b>Récompense :</b> '.nbf(20000).' '.imress('drachme').' '.nbf(20000).' '.imress('fer');
		echo '</div>';
	break;

	case 12:
		echo '<div class="ligne gauche">Le trésor vous permettra de mettre à l\'abri vos richesses, cependant ce service n\'est pas sans contrainte. Jusqu\'au niveau 5 celui-ci sera limité, à partir du niveau 6 vous n\'aurez plus de limite mais il vous faudra vous acquitter d\'une taxe pour pouvoir récupérer vos drachmes. Allez dans construction, puis trésor et déposez <b>'.nbf(20000).' Drachmes</b> dans celui-ci.';
		if($paquet->check_etape() == true) {
			echo '<br/><br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}
		echo '<br/><b>Récompense :</b> '.nbf(20000).' '.imress('drachme').' '.nbf(20000).' '.imress('bois');
		echo '</div>';
	break;

	case 13:
		echo '<div class="ligne gauche">Votre cité aura besoin de plus de drachmes pour se développer, construisez un total de <b>10 ateliers de battage de la monnaie</b> ainsi que 5 nouvelles tours. Ces 10 tours constitueront votre première défense.';
		if($paquet->check_etape() == true) {
			echo '<br/><br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}
		echo '<br/><b>Récompense :</b> '.nbf(50000).' '.imress('drachme');
		echo '</div>';
		break;
	
	case 14:
		echo '<div class="ligne gauche">Vous pourrez gagner des drachmes tous les jours en jouant au <b>carré magique</b>. Il se situe dans les jeux dans la rubrique Extra.<br/>Allez cliquer pour aider le jeu. Profitez de cette visite pour gratter quelques tickets, vous aurez peut-être de la chance.';
		if($paquet->check_etape() == true) {
			echo '<br/><br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}
		echo '<br/><b>Récompense :</b> '.nbf(20000).' '.imress('drachme');
		echo '</div>';
		break;
	
	case 15:
		echo '<div class="ligne gauche">Vous pouvez maintenant aller sur la page de vos objectifs située à gauche sous votre pseudo et terminer les derniers objectifs du niveau 1. Avant de le faire, quelques petits conseils de la part d\'un vieux guerrier comme moi :
		<br/>- Faites un maximum d\'ateliers de battage de la monnaie
		<br/>- Surveillez bien vos ressources afin de ne pas être en négatif
		<br/>- Inscrivez-vous sur le <a href="http://forums.ellaswar.com" target="_blank" class="sous">forum d\'Ellàs War</a>. Vous y trouverez des conseils et des réponses à vos questions.
		<br/>- Lisez le <a href="http://wiki.ellaswar.com" target="_blank" class="sous">Wiki</a> d\'Ellàs War
		</div>';
		break;
		
	default:
		echo 'Je n\'ai actuellement aucune mission à vous proposer.';
	break;
	}
}
elseif($paquet->getlvl() == 1) {
	switch($etape) {
	case 1:
		echo '<div class="ligne gauche">Pour avoir une cité forte, il lui faut des hommes valeureux.<br/>Engagez au moins 50 hommes dans vos rangs et revenez me voir. N\'oubliez pas qu\'il vous faudra des huttes pour les loger.';
		if($paquet->check_etape() == true) {
			echo '<br/><br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}
		echo '<br/><b>Récompense :</b> '.nbf(25000).' '.imress('drachme');
		echo '</div>';
	break;

	case 2:
		echo '<div class="ligne gauche">Vous êtes encore là ?<br/>
		Vous êtes plus résistant que je ne le pensais. Montrez moi vos aptitudes aux combats. Maintenant que vous avez recruté une armée, passez à l\'attaque. Je vous conseille d\'utiliser des espions afin de trouver les cités faibles.<br/>
		Remportez 5 victoires et revenez me voir.';
		if($paquet->check_etape() == true) {
			echo '<br/><br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}
		echo '<br/><b>Récompense :</b> '.nbf(25000).' '.imress('drachme');
		echo '</div>';
	break;
	
	case 3:
		echo '<div class="ligne gauche">Il va vous falloir des drachmes pour bâtir votre cité. Construisez un total de 15 ateliers de battage de la monnaie. Si vous manquez de ressources, allez faire un tour sur le marché.';
		if($paquet->check_etape() == true) {
			echo '<br/><br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}
		echo '<br/><b>Récompense :</b> '.nbf(30000).' '.imress('drachme');
		echo '</div>';
	break;
	
  //Message à l'oracle
	case 4:
    echo '<div class="ligne gauche">L\'oracle est le représentant des joueurs auprès des dieux, élu tous les mois pour un mandat d\'un mois. Son objectif est de faire remonter plus efficacement les idées des joueurs. Si vous avez des questions sur le jeu ou des choses à faire remonter au staff, n\'hésitez pas à le contacter.<br/>
    Allez dans Construction puis Oracle et faites votez pour le candidat qui vous paraîtra le mieux.';
		if($paquet->check_etape() == true) {
			echo '<br/><br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}
		echo '<br/><b>Récompense :</b> '.nbf(30000).' '.imress('drachme').' '.nbf(20000).' '.imress('bois');
		echo '</div>';
	break;
	
  //Modifier son profil
	case 5:
    echo '<div class="ligne gauche">Votre profil vous permet de vous faire connaître auprès des autres joueurs. Ils pourront par la suite y laisser des dédicaces.<br/>
    Allez dans Extra et complétez votre profil pour passer à l\'étape suivante.';
		if($paquet->check_etape() == true) {
			echo '<br/><br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}
		echo '<br/><b>Récompense :</b> '.nbf(40000).' '.imress('drachme');
		echo '</div>';
	break;

	case 6:
		echo '<div class="ligne gauche">Remportez 10 victoires et revenez me voir.';
		if($paquet->check_etape() == true) {
			echo '<br/><br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}
		echo '<br/><b>Récompense :</b> '.nbf(20000).' '.imress('drachme').' '.nbf(40000).' '.imress('bois');
		echo '</div>';
	break;
	
	case 7:
		echo '<div class="ligne gauche">Votre cité se développe, construisez d\'autres ateliers de battages de la monnaie pour soutenir votre économie.<br/>Construisez un total de 20 ateliers de battage de la monnaie.';
		if($paquet->check_etape() == true) {
			echo '<br/><br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}
		echo '<br/><b>Récompense :</b> '.nbf(30000).' '.imress('drachme');
		echo '</div>';
	break;

	case 8:
		echo '<div class="ligne gauche">Il vous faudra faire des réserves de drachmes. En cas de coup dur vous pourrez puiser dedans et reconstruire votre cité rapidement. Je vous rappelle que jusqu\'au niveau 5 votre trésor sera limité, à partir du niveau 6 vous n\'aurez plus de limite mais il vous faudra vous acquitter d\'une taxe pour pouvoir récupérer vos drachmes. Allez dans construction, puis trésor et déposez un total de '.nbf(200000).' Drachmes dans celui-ci.';
		if($paquet->check_etape() == true) {
			echo '<br/><br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}
		echo '<br/><b>Récompense :</b> '.nbf(30000).' '.imress('drachme');
		echo '</div>';
	break;
	
	case 9:
		echo '<div class="ligne gauche">Remportez 20 victoires et revenez me voir.';
		if($paquet->check_etape() == true) {
			echo '<br/><br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}
		echo '<br/><b>Récompense :</b> '.nbf(25000).' '.imress('drachme');
		echo '</div>';
	break;
	
	case 10:
		echo '<div class="ligne gauche">Félicitations soldat, rompez les rangs.<br/>
		Vous pouvez désormais vous concentrer sur les objectifs du niveau 2.<br/>
		Si vous possédez un compte facebook, je vous invite à vous déconnecter et à cliquer sur "J\'aime" sur la page d\'accueil du site.';
		if($paquet->check_etape() == true) {
			echo '<br/><br/></div><div class="ligne centrer"><a href="javascript:etape_suivante();" class="titre_tab">Passer à l\'étape suivante</a>';
		}
		echo '</div>';
	break;
	
	default:
	echo 'Je n\'ai actuellement aucune mission à vous proposer.';
	break;
	}
}

?>
