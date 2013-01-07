<?php

/*
 * Fonction qui traduit le nom de la page
 * Lang to fr
 */
function trad_get_page($page) {
  $page = strtolower(preg_replace('/\s{1,}/', '', htmlentities(trim(addslashes($page)))));
  
  switch($page) {
    case 'contactus':
      $resultat = 'nouscontacter';
    break;
    
    case 'ourteam':
      $resultat = 'equipedusite';
    break;
    
    case 'afewwordsaboutellaswar':
      $resultat = 'quelquesmotssurlesite';
    break;
    
    case 'ewsitemap':
      $resultat = 'plandusite';
    break;
    
    case 'signup':
      $resultat = 'sinscrire';
    break;
    
    case 'discoverthegame':
      $resultat = 'decouvertedujeu';
    break;
    
    case 'news':
      $resultat = 'actualites';
    break;
    
    case 'parteners':
      $resultat = 'partenaires';
    break;
    
    case 'termsofuse':
      $resultat = 'conditionsgeneralesutilisation';
    break;
    
    case 'recrutement':
      $resultat = 'recrutement';
    break;
    
    case 'rankings':
      $resultat = 'classements';
    break;
    
    case 'playersranking':
      $resultat = 'classementdesjoueurs';
    break;
    
    case 'brotherhoodsranking':
      $resultat = 'classementdesalliances';
    break;
    
    case 'connected_players':
      $resultat = 'joueursconnectes';
    break;
    
    default:
      $resultat = '';
    break;
  }
  
  return $resultat;
}

/*
 * Fonction qui traduit le nom de la page
* Fr to lang
*/
function trad_to_page($page) {
	
}

function imress($ress) {
	
}

function img($chemin, $nom) {
	
}

function print_date($date, $arg=0) {
	
}

function construct_phrase($code, $nb='') {
	
}

/***
 * Messages d'erreurs
 * TODO : à partir de 206
 */
function erreur($no_erreur, $var='')
{
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
		switch($no_erreur)
		{
			case 1: $erreur = "Error";
			break;
			case 2: $erreur = "Unknown construction";
			break;
			case 3: $erreur = " You can not build this construction so many times ";
			break;
			case 4: $erreur = " You do not have the required level to build this construction ";
			break;
			case 5: $erreur = "You need more silver";
			break;
			case 6: $erreur = "You need more wood";
			break;
			case 7: $erreur = "You need more food";
			break;
			case 8: $erreur = "You need more water";
			break;
			case 9: $erreur = "You need more iron";
			break;
			case 10: $erreur = "You need more grapes";
			break;
			case 11: $erreur = "You need more wine";
			break;
			case 12: $erreur = "You need more stone";
			break;
			case 13: $erreur = "You need more marble";
			break;
			case 14: $erreur = "You need more gold";
			break;
			case 15: $erreur = "You need more drachmas";
			break;
			case 16: $erreur = " You can not destroy buildings that you do not possess ";
			break;
			case 17: $erreur = " You can not destroy so many buildings of this type ";
			break;
			case 18: $erreur = "You can not destroy full buildings";
			break;
			case 19: $erreur = " You can not have so many production buildings";
			break;
			case 20: $erreur = " You do not have the level required to hire this unit ";
			break;
			case 21: $erreur = " You can not hire so many of this unit ";
			break;
			case 22: $erreur = "You need one more building to hire this unit";
			break;
			case 23: $erreur = " You must build more caves ";
			break;
			case 24: $erreur = " You must build more huts and houses ";
			break;
			case 25: $erreur = "You must build more palaces";
			break;
			case 26: $erreur = "You can not deposit that much drachmas in your treasure";
			break;
			case 27: $erreur = " You can not withdraw drachmas that you do not possess ";
			break;
			case 28: $erreur = " You do not have access to this page ";
			break;
			case 29: $erreur = "This temple does not exist";
			break;
			case 30: $erreur = "You already possess a temple of this level";
			break;
			case 31: $erreur = "You do not have any remaining favors ";
			break;
			case 32: $erreur = "You can not read that missive";
			break;
			case 33: $erreur = "You do not have the required level";
			break;
			case 34: $erreur = "You must enter your nickname";
			break;
			case 35: $erreur = "You must enter your password";
			break;
			case 36: $erreur = "You must confirm your password";
			break;
			case 37: $erreur = "You must enter a valid mail address";
			break;
			case 38: $erreur = "The two passwords you entered are not similar";
			break;
			case 39: $erreur = " Your nickname contains non allowed characters or is less than four characters ";
			break;
			case 40: $erreur = "This nickname is already used by another member";
			break;
			case 41: $erreur = "This IP was banned from the game";
			break;
			case 42: $erreur = "You just registered on Ellàs War. You can now log in using your nickname and password.<br/> A summary e-mail has been sent to you.";
			break;
			case 43: $erreur = " You must enter the subject of your message ";
			break;
			case 44: $erreur = "Your missive is empty";
			break;
			case 45: $erreur = " Your message has been sent to our support, we will try to process it as soon as possible";
			break;
			case 46: $erreur = "This account does not exist";
			break;
			case 47: $erreur = "Incorrect password";
			break;
			case 48: $erreur = "This alliance does not exist";
			break;
			case 49: $erreur = "You have no favors";
			break;
			case 50: $erreur = "You already used this type of favor during the last 23 hours";
			break;
			case 51: $erreur = "You must specify the name of your future alliance";
			break;
			case 52: $erreur = " The name of your alliance can not include only numbers";
			break;
			case 53: $erreur = "An alliance already has that name";
			break;
			case 54: $erreur = "You do not have the required level to create an alliance";
			break;
			case 55: $erreur = "You can not create an alliance";
			break;
			case 56: $erreur = "You already belong to an alliance";
			break;
			case 57: $erreur = "The two mail addresses are not similar";
			break;
			case 58: $erreur = " The mail address does not match the one linked to your account ";
			break;
			case 59: $erreur = "Your mail address has been changed";
			break;
			case 60: $erreur = "This lot does not exist or has been purchased";
			break;
			case 61: $erreur = "This lot is not purchasable for now";
			break;
			case 62: $erreur = "You can not purchase this lot";
			break;
			case 63: $erreur = "You do not have enough drachmas";
			break;
			case 64: $erreur = "Lot successfully purchased";
			break;
			case 65: $erreur = "You just got your lot back";
			break;
			case 66: $erreur = "You can not sell so many lots.";
			break;
			case 67: $erreur = "Error in the lot";
			break;
			case 68: $erreur = "Error in the rates";
			break;
			case 69: $erreur = "You can not sell resources you do not possess";
			break;
			case 70: $erreur = " Lot (s) sold successfully ";
			break;
			case 71: $erreur = "License successfully purchased";
			break;
			case 72: $erreur = "License successfully updated";
			break;
			case 73: $erreur = "That player does not exist";
			break;
			case 74: $erreur = "That player can not receive favors";
			break;
			case 75: $erreur = "That player can not receive favors from you";
			break;
			case 76: $erreur = "You successfully gave the favor";
			break;
			case 77: $erreur = "Your purchase has been validated";
			break;
			case 78: $erreur = "Member successfully added to your blacklist";
			break;
			case 79: $erreur = "Member successfully removed from your blacklist";
			break;
			case 80: $erreur = "You must specify a recipient";
			break;
			case 81: $erreur = "The content of your missive is empty";
			break;
			case 82: $erreur = "This player has chosen to ignore you, you can not send him missives";
			break;
			case 83: $erreur = "Your missive has been sent";
			break;
			case 84: $erreur = "That missive does not exist";
			break;
			case 85: $erreur = "Missive(s) removed";
			break;
			case 86: $erreur = "Your password must contain at least 5 characters";
			break;
			case 87: $erreur = "You need more drachmas to get your lot of favors back";
			case 88: $erreur = "This player is in your alliance";
			break;
			case 89: $erreur = "Your alliance has an alliance pact with the target";
			break;
			case 90: $erreur = "You do not possess any fury";
			break;
			case 91: $erreur = " You already recently sent a fury on this player.";
			break;
			case 92: $erreur = "You can not record a strategy with units you do not possess.";
			break;
			case 93: $erreur = "Your password has been changed.";
			break;
			case 94: $erreur = " You must be level 10 before you can access the altar of gods.";
			break;
			case 95: $erreur = "You must have an agora for trade access.";
			break;
			case 96: $erreur = "You must be level 10 before you can access the statues.";
			break;
			case 97: $erreur = "You do not have the Temple of Apollo";
			break;
			case 98: $erreur = "You can not observe that member";
			break;
			case 99: $erreur = " You do not have any spy ";
			break;
			case 100: $erreur = "Your alliance already contains 25 members";
			break;
			case 101: $erreur = "Member successfully accepted into the alliance";
			break;
			case 102: $erreur = "Member refused";
			break;
			case 103: $erreur = "There are no pending members in your alliance";
			break;
			case 104: $erreur = "Your spy team was caught and executed on the public square.";
			break;
			case 105: $erreur = "That member can not receive so many drachmas";
			break;
			case 106: $erreur = " You can not give drachmas to this member ";
			break;
			case 107: $erreur = "Donation successfully performed";
			break;
			case 108: $erreur = "Your alliance does not have enough drachmas";
			break;
			case 109: $erreur = "You suggested a pact to the alliance ".$var;
			break;
			case 110: $erreur = "You just refused a pact.";
			break;
			case 111: $erreur = "You have just honored Prometheus";
			break;
			case 112: $erreur = "You have just honored Dinocrates";
			break;
			case 113: $erreur = "You have just honored Hestia";
			break;
			case 114: $erreur = " Information has arrived to your city but unfortunately,<br/> your spy team was caught, tortured until they denounce you <br/>and killed on the public square.";
			break;
			case 115: $erreur = "You can not send lightning on this city";
			break;
			case 116: $erreur = "You have no remaining lightning";
			break;
			case 117: $erreur = "You can not send a lightning on a God";
			break;
			case 118: $erreur = "You can not send a fury on a God ";
			break;
			case 119: $erreur = "You must possess a hall of statues ";
			break;
			case 120: $erreur = "You do not have the required drachmas or level to access this page.";
			break;
			case 121: $erreur = '<div class="titre_page_co">Attack against '.$var.'<br/><br/></div></div><div>
			<b> Your forces are ready to enter the battle.<br/>Check <a href="StrategieOffensive"> your offensive strategy </a> and be victorious !</b><br/><br/>';
			break;
			case 122: $erreur = 'The name of your alliance must have at least 3 characters';
			break;
			case 123: $erreur = 'The name of your alliance must be longer than 30 characters';
			break;
			case 124: $erreur = 'You don\'t have enough drachmas to sell anonymously';
			break;
			case 125: $erreur = "<h3>Lost</h3> Your harness fought as long as he was able to but unfortunately it was not enough to insure the victory, ";
			switch($var) {
				case 1: $erreur .= "the red was the fastest.";
				break;
				case 2: $erreur .= "the green was the fastest.";
				break;
				case 3: $erreur .= "the yellow was the fastest.";
				break;
				case 4: $erreur .= "the blue was the fastest.";
				break;
				case 5: $erreur .= "the violet was the fastest.";
				break;
				case 6: $erreur .= "the brown was the fastest.";
				break;
				case 7: $erreur .= "the pink was the fastest.";
				break;
				case 8: $erreur .= "the orange was the fastest.";
				break;
			}
			break;
			case 126: $erreur = "<h3>Victory !<h3> You bet on the right horse, thus, you win 4,000 Drachmas.";
			break;
			case 127: $erreur = "<h3>Victory !<h3> You bet on the right horse, thus you win 80,000 Drachmas.";
			break;
			case 128: $erreur = "<center> You can not play if you are the last winner </center>";
			break;
			case 129: $erreur = "You do not have enough drachmas to bet as much";
			break;
			case 130: $erreur = "Request successfully completed.";
			break;
			case 131: $erreur = " The friend alliance can not merge with yours for now.";
			break;
			case 132: $erreur = " Your alliance has just merged, you can now choose the ranks of your new members.";
			break;
			case 133: $erreur = "You do not have enough favors.";
			break;
			case 134: $erreur = "Your subscription has been updated";
			break;
			case 135: $erreur = " You can not buy as many tickets ";
			break;
			case 136: $erreur = " Your participation has been taken into account, good luck.";
			break;
			case 137: $erreur = " Your alliance can not contain more than $var members ";
			break;
			case 138: $erreur = " You have already given resources these last 23 hours.";
			break;
			case 139: $erreur = "Request cancelled";
			break;
			case 140: $erreur = "You just have signed a pact.";
			break;
			case 141: $erreur = "You just cancelled the pact request.";
			break;
			case 142: $erreur = "You just have cancelled a pact.";
			break;
			case 143: $erreur = "You just have received your password by mail.";
			break;
			case 144: $erreur = "This mail address does not match any account.";
			break;
			case 145: $erreur = " The gods did not seem to have heard your call. Continue to pray and hope for their generous intervention.";
			break;
			case 146: $erreur = " The gods seem to have heard your call. Look around you, something seems to have changed.";
			break;
			case 147: $erreur = " You just build a statue, garnish it and you can get great powers.";
			break;
			case 148: $erreur = " You have just snap the sacrifice of Hera, her protection will apply for six hours.";
			break;
			case 149: $erreur = " You have just snap the sacrifice of Hera, her protection will apply for twelve hours.";
			break;
			case 150: $erreur = "This city is protected by Hera.";
			break;
			case 151: $erreur = "You have just honored Atlas";
			break;
			case 152: $erreur = "You have just honored the gods";
			break;
			case 153: $erreur = "You have just honored Aphrodite";
			break;
			case 154: $erreur = " The great leader of an alliance can not pause";
			break;
			case 155: $erreur = " Your pause period must be between 4 and 100 days including.";
			break;
			case 156: $erreur = " You must wait at least 12 hours after your attacks before you can pause ";
			break;
			case 157: $erreur = " You can not pause, at least the half of your alliance is already on pause.";
			break;
			case 158: $erreur = " You must wait at least 12 hours after your last lightning before you can pause ";
			break;
			case 159: $erreur = " You must wait at least 12 hours after your last fury before you can pause ";
			break;
			case 160: $erreur = "Your alliance forum is empty";
			break;
			case 161: $erreur = "You can not accept a withdrawal of this type of resource";
			break;
			case 162: $erreur = " You can not accept a withdrawal of so much drachmas ";
			break;
			case 163: $erreur = " You can not accept a withdrawal of so much resources ";
			break;
			case 164: $erreur = "You have just accepted a request for resources ";
			break;
			case 165: $erreur = "You do not have the temple of Hades";
			break;
			case 166: $erreur = "You can not pause if you are on alert Resources";
			break;
			case 167: $erreur = "You must house all your units before you can configure your defensive waves";
			break;
			case 168: $erreur = "You must house all your units before you can configure your offensive waves";
			break;
			case 169: $erreur = "Your alliance has not the required level so that you can build this construction.";
			break;
			case 170: $erreur = "Your invitation has been sent";
			break;
			case 171: $erreur = "You already sent 5 invitations today";
			break;
			case 172: $erreur = "This person has already received an invitation this week";
			break;
			case 173: $erreur = "Request denied";
			break;
			case 174: $erreur = "This prayer has been heard too many times by the gods";
			break;
			case 175: $erreur = " This prayer has already been heard by the gods ";
			break;
			case 176: $erreur = "Connection error, try again";
			break;
			case 177: $erreur = "Connection error";
			break;
			case 178: $erreur = " You can not purchase this lot ";
			break;
			case 179: $erreur = 'You have joined a private battleship, face and win the victory.';
			break;
			case 180: $erreur = 'You have just created a battleship, the brave fighters will soon join you, face them and win the victory.';
			break;
			case 181: $erreur = "You must sell your lot at a higher rate.";
			break;
			case 182: $erreur = "You must sell your lot at a lower rate.";
			break;
			case 183: $erreur = "You have just dissolved your alliance";
			break;
			case 184: $erreur = "You have just garnished the statue of Hera";
			break;
			case 185: $erreur = " You have just garnished the statue of Gaia";
			break;
			case 186: $erreur = " You have just garnished the statue of Hippodamos";
			break;
			case 187: $erreur = " You have just garnished the statue of Erèbe";
			break;
			case 188: $erreur = "You have just put your account on pause for ".$var." days.";
			break;
			case 189: $erreur = 'You just have snap the emergency departure. If you have not managed to leave your alliance within two weeks, you will be automatically expelled. You can not come back before four weeks.';
			break;
			case 190: $erreur = 'You just have expelled '.$var.' from your alliance.';
			break;
			case 191: $erreur = " You can not buy a license if your license ends in more than a week.";
			break;
			case 192: $erreur = "You just have deposited ".$var." ".$_SESSION['ressource']['drachme']-> getImg();
			break;
			case 193: $erreur = "You just have withdrawn ".$var." ".$_SESSION['ressource']['drachme']-> getImg();
			break;
			case 194: $erreur = "You do not have an armory.";
			break;
			case 195: $erreur = "You can not access to your armory.";
			break;
			case 196: $erreur = "This page is currently undergoing maintenance, we apologize for the inconvenience.";
			break;
			case 197: $erreur = 'You\'ve won, congratulations, thus you win '.$var.' Drachmes';
			break;
			case 198: $erreur = 'You lost, sorry, thus you lose '.$var.' Drachmes';
			break;
			case 199: $erreur = 'Draw, let’s try again ?';
			break;
			case 200: $erreur = " You do not have enough resources.";
			break;
			case 201: $erreur = " You can not give as many resources.";
			break;
			case 202: $erreur = "You can not hire units at level 0";
			break;
			case 203: $erreur = " You can not free units you do not have ";
			break;
			case 204: $erreur = "You can not sponsor yourself";
			break;
			case 205: $erreur = "You already have been stolen all your drachmas today ";
			break;
			case 206: $erreur = "$var thans you, Hermes stole you $var2 ".imress('drachme').'. These drachmas will be very useful for him to consolidate his city.';
			break;
	//case : $erreur = "";break;

			default: $erreur = "";	break;
		}
	}
	return $erreur;
}

function statu_ress($nombre) {
	
}

function check_archives($archive, $next) {
	
}

function affiche_tpc($restant) {
	
}

?>