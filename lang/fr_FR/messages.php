<?php

function get_message($id=0, $args=array()) {
	
	$titre   = '';
	$message = '';

	switch ($id) {
		case 1:
			if(!empty($args) && !empty($args[0]->nom)) {
				$titre   = 'L\'alliance '.$args[0]->nom.' recrute';
				$message = 'Bonjour,

L\'alliance '.$args[0]->nom.' recrute des joueurs motivés. '.
'Si tu as des questions n\'hésite pas à répondre à ce message.
Le lien suivant permet de candidater pour nous rejoindre :
'.SITE_URL.'/postuler-'.$args[0]->id.'

Cordialement';
			}
		break;
		
		case 2:
				$message = 'Un de vos lots de '.$args['lot'].' '.imress($args['ress']).'
				           vient d\'être acheté au débarras pour '.nbf($args['prix'], 3).
				           ' '.imress('drachme').'.';
		break;
		
		case 3:
			$titre = 'Félicitation pour la création de votre alliance';
			$message = 'Bonjour,
<br/>Vous venez de créer une alliance: félicitation.
<br/>Ceci est la première marche vers le succès.
<br/><br/>
<div class="vert_bold sousligne">Pérennisation de votre alliance:</div>
Tout d\'abord votre objectif est de <b>recruter</b> des membres de niveau 1 minimum.
<br/>Vous devez impérativement avoir un joueur pour valider votre alliance.
<br/>Vous avez <b>une semaine</b> pour recruter un nouveau membre dans l\'alliance.
<br/>Passé ce délai et sans nouveau membre dans votre alliance, celle-ci sera dissoute.
<br/><br/>
<div class="vert_bold sousligne">Développement votre alliance:</div>
Remplissez votre description alliance pour mieux capter les joueurs.
<br/>Pensez à laisser ouvert le recrutement pour <b>accueillir de nouveaux joueurs</b>.
<br/>Postez des missives pour indiquer que votre alliance recrute.
<br/>Contactez les joueurs via "joueurs connectés" ou les tableaux de l\'honneur.
<br/><br/>
<div class="vert_bold sousligne">Expansion de votre alliance:</div>
Déclarez votre <b>première guerre</b> à une alliances de votre niveau (délai d\'une semaine après la création de votre alliance).
<br/>Négociez des pactes avec les autres alliances, qu\'ils soient oraux ou écrits.
<br/><b>Lancez les cotisations</b> (attendez le niveau 2 de l\'alliance pour débloquer les cotisations en négatif).
<br/>Passez les niveaux alliance pour débloquer de nombreux avantages (retirer des ressources autre que drachmes au niveau 2). Attention: une fois le niveau passé, les ressources demandées sont débitées du coffre alliance.
<br/><br/>
<div class="vert_bold sousligne">Conseils:</div>
<b>Donnez des droits</b> à vos membres pour qu\'ils vous épaulent dans l\'évolution de votre alliance: nommez votre second, vos chefs de guerre, vos diplomates, vos trésoriers, vos recruteurs et vos généraux.
<br/>Formez vos membres et demandez des conseils à d\'autres chefs d\'alliances.
<br/>Remplissez votre coffre alliance: l\'argent est le nerf de la guerre !
<br/>Passez les niveaux alliance, ceux-ci offrent des avantages, mais aussi des inconvénient, sachez les mesurer avec prudence !
<br/>Posez vos questions sur le forum ou rendez-vous sur le wiki du jeu (aide du jeu).
<br/>
<div class="vert_bold sousligne">Astuces:</div>
<br/><b>Déclarez des guerres:</b> les guerres gênent l\'expulsion des membres mais vous protège des alliances rapaces. Une guerre en cours vous permet de recevoir moins d\'attaques et de lancer plus d\'attaques.
<br/>
<br/><b>Surveillez vos membres:</b>
<ul>
<li>une étoile <font color="lawngreen">verte</font> à côté du pseudo d\'un membre signifie que le membre est en période d\'essai. Celle-ci dure quinze jour. Pendant ce délai, vous pouvez expulser ce membre quand vous voulez même si vous avez des guerres en cours. Il ne peut cependant pas attaquer en guerre ni cotiser à l\'alliance.</li>
<li>une étoile <font color="red">rouge</font> à côté du pseudo d\'un membre signifie que ce membre est en grève: il ne cotise plus. Peut-être devriez-vous contacter ce membre ?</li>
<li>une étoile <font color="purple">violette</font> à côté du pseudo d\'un membre signifie que ce membre a activé la sortie d\'urgence. Celle-ci dure trois semaines.</li>
<li>les couleurs des pseudos ont des significations: <span class="joueur_bloque">rouge</span> (bloqué par le staff), <span class="joueur_pause">jaune</span> (en pause), <span class="joueur_manque">vert</span> (blocage ressources), <font color="blue">bleu</font> (a mangé un schtroumpfs par erreur), <span class="sortie_urgence">violet</span> (là vous avez mangé des champignon hallucinogènes).</li>
</ul>';
		break;
	}
	
	return array('titre'   => $titre,
	             'message' => $message);
}

?>