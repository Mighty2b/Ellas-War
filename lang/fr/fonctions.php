<?php

/*
 * Fonction qui traduit le nom de la page
 * Lang to fr
 */
function trad_get_page($page) {
  return strtolower(preg_replace('/\s{1,}/', '', htmlentities(trim(addslashes($page)))));
}

/*
 * Fonction qui traduit le nom de la page
 * Fr to lang
 */
function trad_to_page($page) {
  return strtolower(preg_replace('/\s{1,}/', '', htmlentities(trim(addslashes($page)))));
}

function imress($ress) {
	switch($ress) {
		case 'gold':
			$ress = 'or';
			$description = $ress;
		break;
		
		case 'stv':
			$description = 'Marque divine';
		break;
		
		default:
			$description = $ress;
		break;
	}
	
	
	
	return '<img src="images/ress/'.$ress.'.jpg" 
				 alt="'.ucfirst($description).'" 
				 title="'.ucfirst($description).'" /> ';
}

function img($chemin, $nom) {
	return '<img src=\''.$chemin.'\' title=\''.ucfirst($nom).'\' alt=\''.ucfirst($nom).'\'/>';	
}

function print_date($date, $arg=0) {
  if(!empty($date)) {
  	if($arg == 0) {
	    return strftime('%A %d %B', $date).' à '.
	    strftime('%Hh %M', $date);
  	}
  	elseif($arg == 2) {
	    return utf8_encode(strftime('%A %d %B', $date)).' à '.
	    strftime('%Hh %M', $date);
  	}
  	else {
	    return date('d',$date).' '.utf8_encode(strftime('%B', $date));
  	}
  }
  return '';
}

function construct_phrase($code, $nb='') {
	switch($code) {
		case 'joueurs_co':
			if($nb > 1) {
				return 'Il y a actuellement '.$nb.' chefs de cités connectés sur le jeu.';
			}
			else {
				return 'Il y a actuellement '.$nb.' chef de cité connecté sur le jeu.';
			}
		break;
	}
}

function erreur($no_erreur, $var='') {
	if(is_array($no_erreur)) {
		if(!empty($no_erreur[1])) {
			$var = $no_erreur[1];
		}

		if(!empty($no_erreur[2])) {
			$var2 = $no_erreur[2];
		}
		
		$no_erreur = $no_erreur[0];
	}

	if(!is_numeric($no_erreur)) {
		return $no_erreur;
	}
	else {
		switch($no_erreur) {
	case 1: $erreur = "Erreur";
			break;
	case 2: $erreur = "Bâtiment inconnu";
			break;
	case 3: $erreur = "Vous ne pouvez pas bâtir autant de fois ce bâtiment";
			break;
	case 4: $erreur = "Vous n'avez pas le niveau pour construire ce bâtiment";
			break;
	case 5: $erreur  = "Vous manquez d'argent";
			break;
	case 6: $erreur  = "Vous manquez de bois";
			break;
	case 7: $erreur  = "Vous manquez de nourriture";
			break;
	case 8: $erreur  = "Vous manquez d'eau";
			break;
	case 9: $erreur  = "Vous manquez de fer";
			break;
	case 10: $erreur = "Vous manquez de raisin";
			break;
	case 11: $erreur = "Vous manquez de vin";
			break;
	case 12: $erreur = "Vous manquez de pierre";
			break;
	case 13: $erreur = "Vous manquez de marbre";
			break;
	case 14: $erreur = "Vous manquez d'or";
			break;
	case 15: $erreur = "Vous manquez de drachmes";
			break;
	case 16: $erreur = "Vous ne pouvez pas détruire des bâtiments que vous ne possédez pas";
			break;
	case 17: $erreur = "Vous ne pouvez détruire autant de ce type de bâtiments";
			break;
	case 18: $erreur = "Vous ne pouvez pas détruire des bâtiments pleins";
			break;
	case 19: $erreur = "Vous ne pouvez pas avoir autant de bâtiments de production";
			break;
	case 20: $erreur = "Vous n'avez pas le niveau pour engager cette unité";
			break;
	case 21: $erreur = "Vous ne pouvez pas engager autant de cette unité";
			break;
	case 22: $erreur = "Il vous manque un bâtiment pour engager cette unité";
			break;
	case 23: $erreur = "Vous devez construire plus de grottes";
			break;
	case 24: $erreur = "Vous devez construire plus de huttes et habitations";
			break;
	case 25: $erreur = "Vous devez construire plus de palais";
			break;
	case 26: $erreur = "Vous ne pouvez pas déposer autant dans votre trésor";
			break;
	case 27: $erreur = "Vous ne pouvez pas retirer des drachmes que vous ne possédez pas";
			break;
	case 28: $erreur = "Vous n'avez pas accès à cette page";
			break;
	case 29: $erreur = "Ce temple n'existe pas";
			break;
	case 30: $erreur = "Vous possédez déjà un temple de ce niveau";
			break;
	case 31: $erreur = "Vous n'avez pas de faveur en stock";
			break;
	case 32: $erreur = "Vous ne pouvez pas lire ce message";
			break;
	case 33: $erreur = "Vous n'avez pas le niveau requis";
			break;
	case 34: $erreur = "Vous devez entrer votre pseudo";
			break;
	case 35: $erreur = "Vous devez entrer votre mot de passe";
			break;
	case 36: $erreur = "Vous devez confirmer votre mot de passe";
			break;
	case 37: $erreur = "Vous devez entrer une adresse e-mail valide";
			break;
	case 38: $erreur = "Les deux mots de passes que vous avez entré sont différents";
			break;
	case 39: $erreur = "Votre pseudo contient des caractères non autorisés ou fait moins de quatre caractères";
			break;
	case 40: $erreur = "Un membre possède déjà ce pseudo";
			break;
	case 41: $erreur = "Cette IP a été bannie du jeu";
			break;
	case 42: $erreur = "Vous venez de vous inscrire sur Ellàs War, vous pouvez désormais vous connecter à l'aide de votre identifiant et de votre mot de passe.<br/>Un mail récapitulatif vient de vous être envoyé.";
			break;
	case 43: $erreur = "Vous devez entrer le sujet de votre message";
		break;
	case 44: $erreur = "Votre message est vide";
		break;
	case 45: $erreur = "Votre message vient de nous être envoyé, nous essayerons de le traiter dans les plus brefs délais";
		break;
	case 46: $erreur = "Ce compte n'existe pas";
		break;
	case 47: $erreur = "Mot de passe incorrect";
		break;
	case 48: $erreur = "Cette alliance n'existe pas";
		break;
	case 49: $erreur = "Vous ne possédez pas de faveurs";
		break;
	case 50: $erreur = "Vous avez déjà utilisé une faveur de ce type ces dernières 23 heures";
		break;
	case 51: $erreur = "Vous devez indiquer le futur nom de votre alliance";
		break;
	case 52: $erreur = "Le nom de votre alliance ne peut pas comporter que des chiffres.";
		break;
	case 53: $erreur = "Une alliance porte déjà ce nom";
		break;
	case 54: $erreur = "Vous n'avez pas le niveau pour créer une alliance";
		break;
	case 55: $erreur = "Vous ne pouvez pas creer d'alliance";
		break;
	case 56: $erreur = "Vous possédez déjà une alliance";
		break;
	case 57: $erreur = "Les deux adresses mails sont différentes";
		break;
	case 58: $erreur = "L'adresse mail ne correspond pas à celle actuellement reliée à votre compte";
		break;
	case 59: $erreur = "Votre adresse mail vient d'être modifiée";
		break;
	case 60: $erreur = "Ce lot n'existe pas ou a déjà été acheté";
		break;
	case 61: $erreur = "Ce lot n'est pas achetable pour l'instant";
		break;
	case 62: $erreur = "Vous ne pouvez pas acheter ce lot";
		break;
	case 63: $erreur = "Vous n'avez pas assez de drachmes";
		break;
	case 64: $erreur = "Lot acheté avec succès";
		break;
	case 65: $erreur = "Vous venez de reprendre votre lot";
		break;
	case 66: $erreur = "Vous ne pouvez pas vendre autant de lots";
		break;
	case 67: $erreur = "Erreur dans le lot";
		break;
	case 68: $erreur = "Erreur dans les taux";
		break;
	case 69: $erreur = "Vous ne pouvez pas vendre des ressources que vous ne possédez pas";
		break;
	case 70: $erreur = "Lot(s) mis en vente avec succès";
		break;
	case 71: $erreur = "Licence obtenue avec succès";
		break;
	case 72: $erreur = "Licence mise à jour avec succès";
		break;
	case 73: $erreur = "Ce joueur n'existe pas";
		break;
	case 74: $erreur = "Ce joueur ne peut recevoir de faveur";
		break;
	case 75: $erreur = "Ce joueur ne peut recevoir de faveur de votre part";
		break;
	case 76: $erreur = "Don de faveur effectué avec succès";
		break;
	case 77: $erreur = "Votre achat a bien été validé";
		break;
	case 78: $erreur = "Membre ajouté avec succès dans votre liste noire";
		break;
	case 79: $erreur = "Membre supprimé avec succès de votre liste noire";
		break;
	case 80: $erreur = "Vous devez indiquer un destinataire";
		break;
	case 81: $erreur = "Le contenu de votre message est vide";
		break;
	case 82: $erreur = "Ce joueur a choisi de vous ignorer, vous ne pouvez pas lui écrire.";
		break;
	case 83: $erreur = "Votre message vient d'être envoyé";
		break;
	case 84: $erreur = "Ce message n'existe pas";
		break;
	case 85: $erreur = "Message(s) supprimé(s)";
		break;
	case 86: $erreur = "Votre mot de passe doit faire minimum 5 caractères";
		break;
	case 87: $erreur = "Vous manquez de drachmes pour reprendre votre lot de faveurs";
	  break;
	case 88: $erreur = "Ce joueur est dans votre alliance";
		break;
	case 89: $erreur = "Votre alliance possède un pacte avec l'alliance du joueur cible";
		break;
	case 90: $erreur = "Vous ne possédez pas de furie";
		break;
	case 91: $erreur = "Vous avez déjà envoyé recement une furie sur ce joueur.";
		break;
	case 92: $erreur = "Vous ne pouvez pas enregistrer une stratégie avec des unités que vous ne possédez pas.";
		break;
	case 93: $erreur = "Votre mot de passe vient d'être modifié.";
		break;
	case 94: $erreur = "Vous devez être niveau 10 avant de pouvoir accéder à l'autel des dieux.";
		break;
	case 95: $erreur = "Vous devez disposer d'une agora pour accéder au commerce.";
		break;
	case 96: $erreur = "Vous devez être niveau 10 avant de pouvoir accéder aux statues.";
		break;
	case 97: $erreur = "Vous ne possédez pas le temple d'apollon";
		break;
	case 98: $erreur = "Impossible d'observer ce membre";
		break;
	case 99: $erreur = "Vous ne possédez pas d'espion";
		break;
	case 100: $erreur = "Votre alliance comporte déjà 25 membres";
		break;
	case 101: $erreur = "Membre accepté dans votre alliance";
		break;
	case 102: $erreur = "Membre refusé";
		break;
	case 103: $erreur = "Il n'y a aucun membre en attente dans votre alliance";
		break;
	case 104: $erreur = "Votre équipe d'espionnage a été attrapée et exécutée sur la place publique.";
		break;
	case 105: $erreur = "Ce membre ne peut pas recevoir autant de drachmes";
		break;
	case 106: $erreur = "Vous ne pouvez pas donner de drachmes à ce membre";
		break;
	case 107: $erreur = "Don effectué";
		break;
	case 108: $erreur = "Votre alliance ne possède pas assez de drachmes";
		break;
	case 109: $erreur = "Vous venez de demander un pacte à l'alliance ".$var;
		break;
	case 110: $erreur = "Vous venez de refuser un pacte.";
		break;
	case 111: $erreur = "Vous venez d'honorer Prométhée";
		break;
	case 112: $erreur = "Vous venez d'honorer Dinocrate";
		break;
	case 113: $erreur = "Vous venez d'honorer Hestia";
		break;
	case 114: $erreur = "Des informations sont parvenues à votre cité mais malheureusement,<br/>votre équipe d'espionnage a été attrapée, torturée jusqu'à ce qu'ils vous dénoncent<br/>et exécutée sur la place publique.";
		break;
	case 115: $erreur = "Vous ne pouvez pas envoyer de foudre sur cette cité";
		break;
	case 116: $erreur = "Vous n'avez pas de foudre en stock";
		break;
	case 117: $erreur = "Vous ne pouvez pas envoyer de foudre sur un Dieu";
		break;
	case 118: $erreur = "Vous ne pouvez pas envoyer de furie sur un Dieu";
		break;
	case 119: $erreur = "Vous devez posséder un hall des statues";
		break;
	case 120: $erreur = "Vous n'avez pas les drachmes ou le niveau nécessaire pour accéder à cette page.";
		break;
	case 121: $erreur = '﻿<div class="titre_page_co">Attaque contre '.$var.'<br/><br/></div></div><div>
	<b>Vos forces sont prêtes à entrer dans la bataille.<br/>Vérifiez <a href="StrategieOffensive">votre stratégie offensive</a> et remportez la victoire !</b><br/><br/>';
		break;
	case 122: $erreur = 'Le nom de votre alliance doit comporter au moins 3 caractères';
		break;
	case 123: $erreur = 'Le nom de votre alliance doit comporter moins de 30 caractères';
		break;
	case 124: $erreur = 'Vous n\'avez pas assez de drachmes pour vendre de façon anonyme';
		break;
	case 125: $erreur = "<h3>Perdu</h3>Votre attelage s'est battu tant qu'il a pu mais malheureusement cela n'a pas suffit pour lui assurer la victoire, ";
		switch($var) {
			case 1: $erreur .= "le rouge a été le plus rapide.";
				break;
			case 2: $erreur .= "le vert a été le plus rapide.";
				break;
			case 3: $erreur .= "le jaune a été le plus rapide.";
				break;
			case 4: $erreur .= "le bleu a été le plus rapide.";
				break;
			case 5: $erreur .= "le violet a été le plus rapide.";
				break;
			case 6: $erreur .= "le marron a été le plus rapide.";
				break;
			case 7: $erreur .= "le rose a été le plus rapide.";
				break;
			case 8: $erreur .= "le orange a été le plus rapide.";
				break;
		}
		break;
	case 126: $erreur = "<h3>Victoire !<h3>Vous avez parié sur le bon cheval, vous remportez donc 4'000 Drachmes.";
		break;
	case 127: $erreur = "<h3>Victoire !<h3>Vous avez parié sur le bon cheval, vous remportez donc 80'000 Drachmes.";
		break;
	case 128: $erreur = "<center>Vous ne pouvez pas rejouer si vous êtes le dernier gagnant</center>";
		break;
	case 129: $erreur = "Vous n'avez pas assez de Drachmes pour pouvoir miser autant";
		break;
	case 130: $erreur = "Demande effectuée avec succès.";
		break;
	case 131: $erreur = "L'alliance alliée ne peut fusioner avec la votre pour l'instant.";
		break;
	case 132: $erreur = "Votre alliance vient de fusionner, vous pouvez désormais choisir les rangs de vos nouveaux membres.";
		break;
	case 133: $erreur = "Vous n'avez pas assez de faveurs.";
		break;
	case 134: $erreur = "Votre abonnement vient d'être mis à jour";
		break;
	case 135: $erreur = "Vous ne pouvez pas acheter autant de tickets";
		break;
	case 136: $erreur = "Votre participation a bien été prise en compte, bonne chance.";
		break;
	case 137: $erreur = "Votre alliance ne peut pas avoir plus de $var membres";
		break;
	case 138: $erreur = "Vous avez déjà donné des ressources ces 23 dernieres heures.";
		break;
	case 139: $erreur = "Demande annulée";
		break;
	case 140: $erreur = "Vous venez de signer un pacte.";
		break;
	case 141: $erreur = "Vous venez d'annuler une demande de pacte.";
		break;
	case 142: $erreur = "Vous venez d'annuler un pacte.";
		break;
	case 143: $erreur = "Vous venez de recevoir votre mot de passe par e-mail.";
		break;
	case 144: $erreur = "Cet e-mail ne correspond à aucun compte.";
		break;
	case 145: $erreur = "Les dieux ne semblent pas avoir entendu votre appel. Continuez de prier et espérez leur intervention généreuse.";
		break;
	case 146: $erreur = "Les dieux semblent avoir entendu votre appel. Regardez autour de vous, quelque chose semble avoir changé.";
		break;
	case 147: $erreur = "Vous venez de bâtir une statue, ornez-là et vous pourrez obtenir de grands pouvoirs.";
		break;
	case 148: $erreur = "Vous venez d'enclencher le sacrifice d'Héra, sa protection s\'appliquera pour six heures.";
		break;
	case 149: $erreur = "Vous venez d'enclencher le sacrifice d'Héra, sa protection s\'appliquera pour douze heures.";
		break;
	case 150: $erreur = "Cette cité est protégée par Hera.";
		break;
	case 151: $erreur = "Vous venez d'honorer Atlas";
		break;
	case 152: $erreur = "Vous venez d'honorer les dieux";
		break;
	case 153: $erreur = "Vous venez d'honorer Aphrodite";
		break;
	case 154: $erreur = "Le grand chef d'une alliance ne peut pas se mettre en pause";
		break;
	case 155: $erreur = "Votre temps de pause doit être entre 4 et 100 jours compris.";
		break;
	case 156: $erreur = "Vous devez attendre au minimum 12 heures après vos attaques pour pouvoir vous mettre en pause";
		break;
	case 157: $erreur = "Vous ne pouvez pas votre mettre en pause, au moins la moitié de votre alliance l'est déjà.";
		break;
	case 158: $erreur = "Vous devez attendre au minimum 12 heures après votre dernière foudre pour pouvoir vous mettre en pause";
		break;
	case 159: $erreur = "Vous devez attendre au minimum 12 heures après votre dernière furie pour pouvoir vous mettre en pause";
		break;
	case 160: $erreur = "Le forum de votre alliance est vide";
		break;
	case 161: $erreur = "Vous ne pouvez pas accepter un retrait de ce type de ressources";
		break;
	case 162: $erreur = "Vous ne pouvez pas acceptez un retrait d'autant de drachmes";
		break;
	case 163: $erreur = "Vous ne pouvez pas acceptez un retrait d'autant de ressources";
		break;
	case 164: $erreur = "Vous venez d'accepter une demande de ressources";
		break;
	case 165: $erreur = "Vous ne possédez pas le temples d'Hadès";
		break;
	case 166: $erreur = "Vous ne pouvez pas vous mettre en pause si vous êtes en alerte ressources";
		break;
	case 167: $erreur = "Vous devez loger toutes vos unités avant de pouvoir configurer vos vagues défensives";
		break;
	case 168: $erreur = "Vous devez loger toutes vos unités avant de pouvoir configurer vos vagues offensives";
		break;
	case 169: $erreur = "Votre alliance n'a pas le niveau requis pour que vous puissiez construire ce bâtiment.";
		break;
	case 170: $erreur = "Votre invitation vient d'être envoyée";
		break;
	case 171: $erreur = "Vous avez déjà envoyé 5 invitations aujourd'hui";
		break;
	case 172: $erreur = "Cette personne a déjà reçue une invitation cette semaine";
		break;
	case 173: $erreur = "Demande refusée";
		break;
	case 174: $erreur = "Cette prière a déjà été entendue trop de fois par les dieux";
		break;
	case 175: $erreur = "Cette prière a déjà été entendue par les dieux";
		break;
	case 176: $erreur = "Erreur de connexion, recommencez";
		break;
	case 177: $erreur = "Erreur de connexion";
		break;
	case 178: $erreur = "Vous ne pouvez pas acheter ce lot";
		break;
	case 179: $erreur = 'Vous venez de rejoindre une bataille navale privée, faites face et remportez la vicoire.';
		break;
	case 180: $erreur = 'Vous venez de creer une bataille navale, des courrageux combattants ne vont pas tarder à vous rejoindre, faites face et remportez la vicoire.';
		break;
	case 181: $erreur = "Vous devez vendre votre lot à un taux plus élevé.";
		break;
	case 182: $erreur = "Vous devez vendre votre lot à un taux plus faible.";
		break;
	case 183: $erreur = "Vous venez de dissoudre votre alliance";
		break;
	case 184: $erreur = "Vous venez d'orner la statue d'Héra";
		break;
	case 185: $erreur = "Vous venez d'orner la statue de Gaia";
		break;
	case 186: $erreur = "Vous venez d'orner la statue d'Hippodamos";
		break;
	case 187: $erreur = "Vous venez d\'orner la statue d'Erèbe";
		break;
	case 188: $erreur = "Vous venez de mettre votre compte en pause pour ".$var." jours.";
		break;
	case 189: $erreur = 'Vous venez d\'enclencher le départ d\'urgence. Si vous n\'avez pas réussi à quitter votre alliance d\'ici deux semaines, vous en serez automatiquement expulsé. Vous ne pourrez pas y retourner avant un délais de quatre semaines.';
		break;
	case 190: $erreur = 'Vous venez d\'expulser '.$var.' de votre alliance.';
		break;
	case 191: $erreur = "Vous ne pouvez pas racheter une licence si votre licence termine dans plus d'une semaine.";
		break;
	case 192: $erreur = "Vous venez de déposer ".nbf($var)." ".$_SESSION['ressource']['drachme']-> getImg();
		break;
	case 193: $erreur = "Vous venez de retirer ".nbf($var)." ".$_SESSION['ressource']['drachme']-> getImg();
		break;
	case 194: $erreur = "Vous ne possédez pas d'armurerie.";
		break;
	case 195: $erreur = "Vous ne pouvez pas accéder à votre armurerie.";
		break;
	case 196: $erreur = "Cette page est actuellement en maintenance, nous sommes désolés pour la gêne occasionnée.";
		break;
	case 197: $erreur = 'Vous avez gagné félicitations, vous gagnez donc '.nbf($var).' Drachmes';
		break;
	case 198: $erreur = 'Vous avez perdu dommage, vous perdez donc '.nbf($var).' Drachmes';
		break;
	case 199: $erreur = 'Match nul, on recommence ?';
		break;
	case 200: $erreur = "Vous n'avez pas assez de ressources.";
		break;
	case 201: $erreur = "Vous ne pouvez pas donner autant de ressources.";
		break;
	case 202: $erreur = "Vous ne pouvez pas engager d'unités au niveau 0";
		break;
	case 203: $erreur = "Vous ne pouvez pas liberer des unités que vous le possédez pas";
		break;
	case 204: $erreur = "Vous ne pouvez pas vous soutenir vous-même";
		break;
	case 205: $erreur = "Vous vous êtes déjà fais voler tous vos drachmes aujourd'hui";
		break;
	case 206: $erreur = "$var vous remercie, Hermès vous a volé ".nbf($var2)." ".imress('drachme').'. Ces drachmes lui seront très utiles pour consolider sa cité.';
		break;
	case 207: $erreur = "Ce joueur a déjà volé trop de drachmes aujourd'hui";
		break;
	case 208: $erreur = "Ce code de vérification est vide ou invalide";
	  break;
	case 209: $erreur = "Ce code de vérification a déjà été utilisé";
	  break;
	case 210: $erreur = "Votre mot de passe vient d'être modifié, vous pouvez désormais vous connecter avec celui-ci sur le jeu.<br/><br/>
	<a href=\"http://www.ellaswar.com\">Aller sur mon compte</a>";
	  break;
	case 211: $erreur = "Vous devez configurer vos vagues offensives avant de pouvoir effectuer une attaque.";
	  break;
	case 212; $erreur = 'Vous ne pouvez pas attaquer cette cité';
		break;
	case 213: $erreur = 'Cette archive n\'existe pas';
		break;
	case 214: $erreur = 'Cette archive est privée, vous ne pouvez pas y accéder.';
		break;
	case 215: $erreur = 'Félicitation vous venez de gagner '.$var.' '.imress('drachme').' !';
		break;
	case 216: $erreur = 'Dommage, votre tir était bien parti mais cela n\'a pas suffi pour toucher la cible en plein coeur.';
		break;
	case 217: $erreur = 'Votre alliance n\'a pas assez d\'or';
		break;
	case 218: $erreur = 'Votre alliance n\'a pas assez de drachmes';
		break;
	case 219: $erreur = 'Vous devez proposer minimum 10.000.000 de Drachmes';
		break;
	case 220: $erreur = 'Vous venez de poser un contrat sur : '.$var;
		break;
	case 221: $erreur = 'Vous venez de rejoindre une battaile navale privée, faites face et remportez la vicoire.';
		break;
	case 222: $erreur = 'Vous venez de créer une battaile navale, des courrageux combattants ne vont pas tarder à vous rejoindre, faites face et remportez la vicoire.';
		break;
	case 223: $erreur = 'Vous venez de rejoindre une battaile navale, faites face et remportez la vicoire.';
		break;
	case 224: $erreur = 'Vous venez de creer une battaile navale, des courrageux combattants ne vont pas tarder à vous rejoindre, faites face et remportez la vicoire.';
		break;
	case 225: $erreur = 'Vous devez être connecté pour accéder à cette fonctionnalité.';
		break;
	case 226: $erreur = 'Vous ne pouvez plus engager cette unité.';
		break;
	case 227: $erreur = 'Vous venez d\'imposer un blocus commercial à l\'alliance '.$var.'.';
		break;
	case 228: $erreur = 'Vous ne pouvez pas acheter de lot durant un blocus';
		break;
	case 229: $erreur = 'Votre défilé était parfaitement réussit. 
	Votre divinité, heureuse de l’initiative, vous offre une marque divine pour vous récompenser.';
		break;
	case 230: $erreur = 'Malheureusement, tout ne s’est pas déroulé comme prévu. 
	Votre tentative n’a fait ni chaud ni froid au cercle des dieux, 
	vous devez tenter une autre méthode.';
		break;
	case 231: $erreur = 'Votre divinité a apprécié votre présent et elle vous en remercie.';
		break;
	case 232: $erreur = 'Vos hommes ont fait part de leurs découvertes au dieu que vous soutenez. 
	Sa gratitude vous est exprimée par la Marque divine qu’il vous donne.';
		break;
	case 233: $erreur = 'Vos hommes ont fait de leur mieux, mais ils sont rentrés bredouilles. ';
		break;
	case 234: $erreur = 'Vos hommes ont fait de leur mieux, mais ils sont rentrés bredouilles. 
	Vos troupes se sont trop approchées d’un groupe de Manticores, et elles n’ont pas été tendres.';
		break;
	case 235: $erreur = 'Vos hommes ont fait de leur mieux, mais ils sont rentrés bredouilles. 
	Vos hommes n’ont pas été assez prudents, ils cherchaient des matériaux précieux dans une mine et ont été surpris par un éboulement.';
		break;
	case 236: $erreur = 'Vos hommes ont fait de leur mieux, mais ils sont rentrés bredouilles. 
	Les œufs de Griffons semblaient pourtant une bonne idée… mais les Griffons adultes n’ont pas été de cet avis. ';
		break;
	case 237: $erreur = 'Vos hommes ont fait de leur mieux, mais ils sont rentrés bredouilles. 
	Vous savez maintenant qu’on ne trouve pas de trésor au pied d’un arc-en-ciel. Par contre, les cyclopes qui habitaient dans le coin avaient faim.';
		break;
	case 238: $erreur = 'Vous devez envoyer des unités pour réaliser cette quête.';
		break;
	case 239: $erreur = 'Vous ne pouvez pas vous remettre en pause après une sortie de pause volontaire';
		break;
	case 240: $erreur = 'Le prix d\'entrée d\'une bataille navale privée doit être de minimum '.nbf(50000).' '.imress('drachme').'.';
		break;
	case 241: $erreur = 'Vous devez attendre quelques secondes avant de pouvoir espionner de nouveau ce joueur';
		break;
	case 242: $erreur = 'Vous ne pouvez pas demander un nouveau mot de passe si vous êtes connecté';
		break;
	case 243: $erreur = 'Vous ne pouvez pas vendre cette ressource';
		break;
	case 244: $erreur = 'Erreur dans les quantités';
		break;
	//case : $erreur = "";break;
			default: $erreur = "";	break;
		}
	}
	return $erreur;
}

function statu_ress($nombre) {
	if($nombre > 0)
		return '<img src="images/ress/haut.png" alt="monte" />';
	elseif($nombre < 0)
		return '<img src="images/ress/bas.png" alt="descend" />';
	else
		return '<img src="images/ress/stagne.png" alt="stagne" />';
}

function check_archives($archive, $next) {
	if($next > 0 && !empty($archive)) {
		  echo '
  <div id="cadre_milieu_archive">
	  <div id="cadre_haut_archive">
  <img src="images/attaques/cross.png" alt="Passer toutes les archives" title="Passer toutes les archives" class="supr_messagerie" style="margin-top:10px;margin-right:10px;" onclick="javascript:fermer_archive();"/>
	  </div>
  <div id="cadre_centre_archive">
	  <div class="ligne centrer">
		  <h2>'.$archive->titre.'</h2>
		  <i>Le '.date('d/m/Y \à H\hi',$archive->timestamp).'</i><br/><br/>
		  '.$archive->texte.'
		  <br/><br/>';
	
  $next--;

	  if(!empty($next)) {
		  echo '<b>Encore '.$next.' archive'.(($next>1)?'s':'').' - 
		  <a href="javascript:next_archive();">Voir l\'archive suivante</a></b>';
	  }
	  else {
	    echo '<div class="bouton_classique"><input class="bouton_classique2"
	    																					 type="submit"
	    																					 name="CONTINUER"
	    																					 value="CONTINUER"
	    																					 onclick="javascript:fermer_archive();" /></div>';
		  }
		
  echo '</div>
	  </div>
	  <div id="cadre_bas_archive"></div>
  </div>';
	}
}

function affiche_tpc($restant) {
  $jours=floor($restant/86400);
  $reste=$restant%86400;
  $heures=floor($reste/3600);
  $reste=$reste%3600;
  $minutes=floor($reste/60);
  $secondes=$reste%60;
	$restant = '';
	if($jours > 1)
		$restant .= $jours.' jours';
	elseif($jours > 0)
		$restant .= $jours.' jour';

	if(!empty($restant))
		$restant .= ', ';
	else
		$restant .= ' ';

	if($heures > 1)
		$restant .= $heures.' heures';
	elseif($heures > 0)
		$restant .= $heures.' heure';

	if($heures > 0) {
		if(!empty($restant))
			$restant .= ', ';
		else
			$restant .= ' ';
	}
	
	if($minutes > 1)	
		$restant .= $minutes.' minutes ';
	else
		$restant .= $minutes.' minute ';

		$restant .= ' et ';
	
	if($secondes > 1)
		$restant .= $secondes.' secondes';
	elseif($secondes > 0)
		$restant .= $secondes.' seconde';

	echo '<div id="bloque_manque">'.$restant.' avant le blocage de votre compte pour manque de ressources</div>';
}

?>