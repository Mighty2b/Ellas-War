<?php

class EwPaquet {
	private $action = '';
	private $variable = '';
	private $reponse = '';
	private $ip;
	
	/*
	 * Constructeur
	 * @param action l'action à réaliser
	 * @param var les variables à passer
	 */
	function __construct($action='refresh', $var='') {
		//Si on a pas de token à fournir c'est qu'on est pas co
		if(empty($_COOKIE['token'])) {
			$_COOKIE['token'] = '';
			$_COOKIE['temps'] = '';
		}
		
		$this->action = $action;
		if(is_array($var)) {
			$this->variable = $var;
		}
		else {
			$this->variable = array($var);
		}

		$this -> ip = get_ip();

		$var = array('token'   => $_COOKIE['token'],
								 'action'  => $this->action,
								 'variable'=> $this->variable,
								 'host'    => @gethostbyaddr($this -> ip),
								 'navigateur'=> isset($_SERVER["HTTP_USER_AGENT"]) ? $_SERVER["HTTP_USER_AGENT"] : '',
								 'ip'      => $this->ip);
		$reponse = json_decode(getRequest(API_URL, $var));

		if(!empty($reponse->joueur)) {
			if(empty($reponse->joueur->token)) {
				$reponse->joueur->token = '';
			}
	
			if((empty($_COOKIE['token']) or 
				 ($_COOKIE['token'] != $reponse->joueur->token)) && 
				!empty($reponse->joueur->token)) {
				if($action == 'connexion' && isset($this->variable[2]) && $this->variable[2] == true) {
					$temps = time()+TEMPS_CO*24*3600;
				}
				else {
					$temps = time()+TEMPS_CO*60;
				
					if($_COOKIE['temps'] > $temps) {
						$temps = $_COOKIE['temps'];
					}
				}
	
				setcookie('token', $reponse->joueur->token, $temps, '/',
	    				  $_SERVER['HTTP_HOST']);
				setcookie('temps', $temps, $temps, '/',
	    				  $_SERVER['HTTP_HOST']);
			}
			elseif(($action == 'get_missives' or $action == 'constituer_groupe' or
							$action == 'ecrire_chat') && 
						 $reponse->joueur->statu != 0) {
				$temps = time()+TEMPS_CO*60;
			
				if($_COOKIE['temps'] < $temps) {
					setcookie('token', $_COOKIE['token'], $temps, '/',
		    				  $_SERVER['HTTP_HOST']);
					setcookie('temps', $temps, $temps, '/',
		    				  $_SERVER['HTTP_HOST']);
				}
			}
		}
		else {
			$reponse = '';
		}
		$this->reponse = $reponse;
		
		//Fix pour le cas où un compte est bloqué pour manque de ressources
		if($this->getstatu() == 1 && $this->gettpc()<0) {
			redirect();
		}
	}
	
	function display($erreur=0) {
		if(!empty($erreur)) {
			echo '<br/><div class="erreur centrer">'.erreur($erreur).'</div>';
		}elseif(!empty($this->reponse->joueur->erreur)) {
			echo '<br/><div class="erreur centrer">'.erreur($this->reponse->joueur->erreur).'</div>';
		}
		$this->reponse->joueur->erreur='';
	}
	
	function hasErreur() {
		if(!empty($this->reponse->joueur->erreur)) {
			return true;
		}
		else {
			return false;
		}
	}
	
	function getReponse() {
		return $this->reponse;
	}
	
	function getRetour($n=0) {
		switch($n) {
			case 2:
				return $this->reponse->retour2;
			break;
			
			case 3:
				return $this->reponse->retour3;
			break;
			
			case 4:
				return $this->reponse->retour4;
			break;
			
			case 5:
				return $this->reponse->retour5;
			break;
			
			case 6:
				return $this->reponse->retour6;
			break;
			
			default:
				return $this->reponse->retour;
			break;
		}
	}
	
	function get_statu() {
		return $this->reponse->joueur->statu;
	}
	
	function get_batiments() {
		return $this->reponse->joueur->liste_batiments;
	}
	
	function get_unites() {
		return $this->reponse->joueur->liste_unites;
	}
	
	function get_nb_spartiate() {
		if(!empty($this->reponse->joueur->liste_unites->spartiate)) {
			return $this->reponse->joueur->liste_unites->spartiate->nb;
		}
		else {
			return 0;
		}
	}
	
	function get_bonus_prod() {
		return $this->reponse->joueur->prod_bonus;
	}

	function get_placen_nb() {
		return $this->reponse->joueur->placen_nb;
	}

	function get_placen() {
		return $this->reponse->joueur->placen;
	}

	function get_placel_nb() {
		return $this->reponse->joueur->placel_nb;
	}

	function get_placel() {
		return $this->reponse->joueur->placel;
	}

	function get_placeg_nb() {
		return $this->reponse->joueur->placeg_nb;
	}

	function get_placeg() {
		return $this->reponse->joueur->placeg;
	}
	
	function getlvl() {
		return $this->reponse->joueur->lvl;
	}
	
	function getlvl2() {
		return $this->reponse->joueur->lvl2;
	}
	
	function getstatu() {
		return $this->reponse->joueur->statu;
	}
	
	function getfaveur() {
		return $this->reponse->joueur->faveur;
	}
	
	function getMonnaie() {
		return $this->reponse->joueur->monnaie;
	}
	
	function getid() {
		return $this->reponse->joueur->id;
	}
	
	function getlogin() {
		return $this->reponse->joueur->login;
	}
	
	function getalliance() {
		if(!empty($this->reponse->joueur->alliance->id)) {
			return $this->reponse->joueur->alliance->id;
		}
		return 0;
	}
	
	function getinfoalliance() {
		return $this->reponse->joueur->alliance;
	}
	
	function getTemples() {
		return $this->reponse->joueur->temples;
	}
	
	function possible_temple1() {
		if(sizeof($this->reponse->joueur->temples) == 0 && 
			 $this->reponse->joueur->lvl == 2) {
			return true;
		}
		else {
			return false;
		}
	}
	
	function possible_temple2() {
		if(sizeof($this->reponse->joueur->temples) == 1 &&
			 $this->reponse->joueur->lvl == 6) {
			return true;
		}
		else {
			return false;
		}
	}
	
	function possible_temple3() {
		if(sizeof($this->reponse->joueur->temples) == 2 &&
			 $this->reponse->joueur->lvl == 8) {
			return true;
		}
		else {
			return false;
		}
	}
	
	function possible_temple4() {
		if(sizeof($this->reponse->joueur->temples) == 3 &&
			 $this->reponse->joueur->lvl == 10) {
			return true;
		}
		else {
			return false;
		}
	}
	
	function getTresor() {
		return number_format(round($this->reponse->retour,2), 2, ',', ' ');
	}
	
	function getTaxes() {
		return $this->reponse->retour2;
	}
	
	function getHistoriqueTresor() {
		return $this->reponse->retour3;
	}

	function nouveaux_mp() {
		return $this->reponse->joueur->nouveau;
	}

  /***
  * Possibilité de transmettre au moins un pouvoir
  ***/
	function possible_transmettre() {
		if(($this->reponse->joueur->droits_alliance->changer_cotise == 2) or 
		   ($this->reponse->joueur->droits_alliance->pacte == 2) or 
		   ($this->reponse->joueur->droits_alliance->declarer_guerre == 2) or 
		   ($this->reponse->joueur->droits_alliance->annuler_guerre == 2) or 
		   ($this->reponse->joueur->droits_alliance->accepter_joueur == 2) or 
		   ($this->reponse->joueur->droits_alliance->recrutement == 2) or 
		   ($this->reponse->joueur->droits_alliance->contrat == 2) or 
		   ($this->reponse->joueur->droits_alliance->accepter_demande == 2) or 
		   ($this->reponse->joueur->droits_alliance->modifier_profils == 2)) {
			return true;
		}
		else {
			return false;
		}
	}
	
	function get_droits_alliance() {
		if(!empty($this->reponse->joueur->alliance)) {
			return $this->reponse->joueur->droits_alliance;
		}
		else {
			return ;
		}
	} 
	
	function peut_contrat() {
		if(!empty($this->reponse->joueur->alliance) && 
			 $this->reponse->joueur->alliance->level >= 3) {
			return $this->reponse->joueur->droits_alliance->contrat;
		}
		else {
			return 0;
		}
	}
	
	function peut_pacte() {
		if(!empty($this->reponse->joueur->alliance)) {
			return $this->reponse->joueur->droits_alliance->pacte;
		}
		else {
			return 0;
		}
	}
	
	function peut_guerre() {
		if(!empty($this->reponse->joueur->alliance)) {
			return $this->reponse->joueur->droits_alliance->declarer_guerre;
		}
		else {
			return 0;
		}
	}
	
	function peut_profil() {
		if(!empty($this->reponse->joueur->alliance)) {
			return $this->reponse->joueur->droits_alliance->modifier_profils;
		}
		else {
			return 0;
		}
	}
	
	function peut_cotise() {
		if(!empty($this->reponse->joueur->alliance)) {
			return $this->reponse->joueur->droits_alliance->changer_cotise;
		}
		else {
			return 0;
		}
	}
	
	function peut_accepter() {
		if(!empty($this->reponse->joueur->alliance)) {
			return $this->reponse->joueur->droits_alliance->accepter_demande;
		}
		else {
			return 0;
		}
	}
	
	function peut_recrutement() {
		if(!empty($this->reponse->joueur->alliance)) {
			return $this->reponse->joueur->droits_alliance->recrutement;
		}
		else {
			return 0;
		}
	}
	
	function peut_accepter_joueur() {
		if(!empty($this->reponse->joueur->alliance)) {
			return $this->reponse->joueur->droits_alliance->accepter_joueur;
		}
		else {
			return 0;
		}
	}
	
	function get_taux_rachat() {
		if(in_array('hermes', $this->reponse->joueur->temples)) {
			return 97.5;
		}
		else {
			return 80;
		}
	}
	
  function is_active_bonus_commerce() {
		if(!empty($this->reponse->joueur->bonus->commerce) && $this->reponse->joueur->bonus->commerce > $this->reponse->joueur->timestamp) {
      echo '<div class="erreur centrer">Appui d\'Hermès actif jusqu\'au '.print_date($this->reponse->joueur->bonus->commerce,2).'<br/></div>';
		}
  }
  
  function is_active_bonus_xp() {
  	if(!empty($this->reponse->joueur->bonus->xp) && $this->reponse->joueur->bonus->xp > $this->reponse->joueur->timestamp) {
  		echo '<div class="erreur centrer">Appui d\'Éros actif jusqu\'au '.print_date($this->reponse->joueur->bonus->xp,2).'<br/></div>';
  	}
  }
  
  function get_etape() {
  	return $this->reponse->joueur->etape;
  }
  
  function check_etape() {
  	return $this->reponse->joueur->check_etape;
  }
  
  function liste_autels() {
  	return $this->reponse->joueur->liste_autels;
  }
  
  function nb_statues() {
  	$nb = 0;
  	if(sizeof($this->reponse->joueur->liste_autels) > 0) {
	  	if($this->reponse->joueur->liste_autels->sacrifice_hera) {
	  		$nb++;
	  	}
	  	
	  	if($this->reponse->joueur->liste_autels->defense_gaia > 0) {
	  		$nb++;
	  	}
	  	
	  	if($this->reponse->joueur->liste_autels->strategie_hippodamos > 0) {
	  		$nb++;
	  	}
	  	
	  	if($this->reponse->joueur->liste_autels->sauvegarde_ombre > 0) {
	  		$nb++;
	  	}
  	}
  	
  	return $nb;  	   	 	
  }
  
  function active_ter() {
  	return $this->reponse->joueur->active_ter;
  }
  
  function bonus_unites() {
  	return $this->reponse->joueur->bonus_unites;
  }
  
  function get_bloque_info() {
  	return array('raison' => $this->reponse->joueur->raison,
  							 'sortie' => $this->reponse->joueur->date_sortie,
  							 'ban' => $this->reponse->joueur->ban);
  }
  
  function get_pause_info() {
  	return array('times' => $this->reponse->joueur->times,
  							 'sortie_pause' => $this->reponse->joueur->sortie_pause,
  							 'faveur' => $this->reponse->joueur->faveur,
  							 'sortie' => $this->reponse->joueur->sortie);
  }
  
  function getFaveurs() {
  	return $this->reponse->joueur->faveur;
  }
  
  function getnomalliance() {
  	if(!empty($this->reponse->joueur->alliance))
  		return $this->reponse->joueur->alliance->nom;
  	else
  		return '';
  }
  
  function getterrain() {
  	return $this->reponse->joueur->terrain;
  }
  
  function getvictoires() {
  	return $this->reponse->joueur->victoires;
  }
  
  function getdefaites() {
  	return $this->reponse->joueur->defaites;
  }
  
  function getpoints() {
  	return $this->reponse->joueur->points;
  }
  
  function gethonneur() {
  	return $this->reponse->joueur->honneur;
  }
  
  function get_ress_var() {
		return $this->reponse->joueur->ress_var;
  }
  
  function get_prod_bonus() {
  	return $this->reponse->joueur->prod_bonus;
  }
  
  function get_bonus() {
  	return $this->reponse->joueur->bonus;
  }
  
  function get_cotisation() {
  	return $this->reponse->joueur->cotisation;
  }
  
  function get_ress() {
  	return array(
		'drachme' => $this->reponse->joueur->drachme,
		'nourriture' => $this->reponse->joueur->nourriture,
		'eau' => $this->reponse->joueur->eau,
		'bois'=> $this->reponse->joueur->bois,
		'fer' => $this->reponse->joueur->fer,
		'argent'=>$this->reponse->joueur->argent,
		'pierre'=>$this->reponse->joueur->pierre,
		'marbre'=>$this->reponse->joueur->marbre,
		'raisin'=>$this->reponse->joueur->raisin,
		'vin'=>$this->reponse->joueur->vin,
		'gold'=>$this->reponse->joueur->gold);
  }
  
  function getmeteo() {
  	return $this->reponse->joueur->meteo;
  }
  
  function bonus_meteo() {
  	return $this->reponse->joueur->bonus_meteo;
  }
  
  function get_meteo() {
  	if(!empty($this->reponse->joueur->meteo)) {
  		return $this->reponse->joueur->meteo;
  	}
  	else {
  		return '';
  	}
  }
  
  function getcoef_marbre() {
  	return $this->reponse->joueur->coef_marbre;
  }
  
  function nbfurie() {
  	return $this->reponse->joueur->furie;
  }
  
  function nbfoudre() {
  	return $this->reponse->joueur->foudre;
  }
  
  function depart_urgent() {
  	return $this->reponse->joueur->depart_urgent;
  }
  
  function possible_unite($unite,$premier) {
  	if(empty($this->reponse->joueur->liste_unites->$unite)) {
  		return false;
  	}
  	
		$value = $this->reponse->joueur->liste_unites->$unite;
		
		if($value->nb > 0) {
			return true;
		}
		elseif($this->reponse->joueur->lvl < $value->lvlmini) {
			return false;
		}
		elseif(($value->type == 'def') && ($this->reponse->joueur->lvl >= $value->lvlmini)) {
			return true;
		}
		elseif(!(
			(($unite == 'espion') && empty($this->reponse->joueur->liste_batiments->qgespion->nb)) or 
			(!empty($value->n_camp) && 
			 empty($this->reponse->joueur->liste_batiments->camp -> nb)) or 
			(!empty($value->n_arc) && 
			 empty($this->reponse->joueur->liste_batiments->ecolearc-> nb)) or 
			(!empty($value->n_cav) && 
			 empty($this->reponse->joueur->liste_batiments->ecolecav -> nb)) or 
			(!empty($value->n_aca) && 
			 empty($this->reponse->joueur->liste_batiments->academy -> nb)) or 
			(!empty($value->n_art) && (!in_array('artemis', $this->reponse->joueur->temples))) or
			(!empty($value->n_hep) && (!in_array('hephaistos', $this->reponse->joueur->temples))) or
			(!empty($value->n_dio) && (!in_array('dionysos', $this->reponse->joueur->temples)))  or
			(!empty($value->n_ares) && (!in_array('ares', $this->reponse->joueur->temples)))  or
			(!empty($value->n_zeus) && (!in_array('zeus', $this->reponse->joueur->temples))) or
			(!empty($value->n_hades) && (!in_array('hades', $this->reponse->joueur->temples))) or
			(!empty($value->n_lion) && empty($this->reponse->joueur->liste_autels->lion)) or
			(!empty($value->n_cyclope) && empty($this->reponse->joueur->liste_autels->unite)) or
			(!empty($value->n_gaia) && empty($this->reponse->joueur->liste_autels->defense_gaia)) or
			(!empty($value->n_pre) && (!$premier)) or
			(!empty($value->n_aphro) && 
			 (empty($this->reponse->joueur->liste_autels->attirance_aphrodite) or 
			  ($this->reponse->joueur->liste_autels->attirance_aphrodite < $value->n_aphro)))
			or ($value->type == 'def'))) {
			return true;
		}
		else{
			return false;
		}
  }
  
  function get_cotise_volontaire() {
  	if(!empty($this->reponse->joueur->alliance))
  		return $this->reponse->joueur->cotise_volontaire;
  	else
  		return 0;
  }
  
  function getidchef() {
  	return $this->reponse->joueur->alliance->id_chef;
  }
  
  function getidsschef() {
  	return $this->reponse->joueur->alliance->sous_chef;
  }
  
  function getattente() {
  	if(empty($this->reponse->joueur->attente)) {
  		return '';
  	}
  	return $this->reponse->joueur->attente;
  }
  
  function get_statu_rec() {
  	return $this->reponse->joueur->alliance->statu_rec;
  }
  
  function peut_commerce() {
  	if($this->reponse->joueur->liste_batiments->forum->nb > 0) {
  		return true;
  	}
  	else {
  		return false;
  	}
  }
  
  function get_level() {
  	return $this->reponse->joueur->alliance->level;
  }
  
  function gettpc() {
  	return $this->reponse->joueur->tpc;
  }
  
  function get_arbre() {
  	return $this->reponse->joueur->arbre;
  }
  
  function get_bonus_connexion() {
  	return $this->reponse->joueur->bonus_connexion;
  }
  
  function get_bonus_info() {
  	return $this->reponse->joueur->bonus_info;
  }
  
  function nb_ornements() {
  	return	$this->reponse->joueur->liste_autels->sacrifice_hera + 
						$this->reponse->joueur->liste_autels->defense_gaia +
						$this->reponse->joueur->liste_autels->strategie_hippodamos +
						$this->reponse->joueur->liste_autels->sauvegarde_ombre;
  }
  
  function get_timestamp() {
  	return	$this->reponse->joueur->timestamp;
  }
  
  function is_event($event) {
  	if(in_array($event, $this->reponse->event)) {
  		return true;
  	}
  	else {
  		return false;
  	}
  }
}

?>