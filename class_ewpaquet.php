<?php

class Ewpaquet {
	private $token   = '';
	private $actions = array();
	private $ip='';
	private $user_agent='';
	private $joueur=null;
	private $event=null;
	private $answer=null;
	
	function __construct() {
		if(empty($_COOKIE['token'])) {
			$_COOKIE['token'] = '';
			$_COOKIE['temps'] = 0;
		}
		
		//TOFIX : visitor IP
		$this->ip = $_SERVER['REMOTE_ADDR'];
		
		if(isset($_SERVER["HTTP_USER_AGENT"])) {
			$this->user_agent = $_SERVER["HTTP_USER_AGENT"];
		} 
		
		if(!empty($_COOKIE['token'])) {
			$this->token = $_COOKIE['token'];
		}
	}
	
	function add_action($action, $para=array()) {
		$this->actions[] = array('action' => $action,
		                         'para'   => $para);
	}
	
	function send_actions() {
		$var = array('token'     => $this->token,
		             'actions'   => $this->actions,
		             'host'      => @gethostbyaddr($this -> ip),
		             'navigateur'=> $this->user_agent,
		             'ip'        => $this->ip);
		
		$postvar = http_build_query($var);
		$opts = array('http' =>
		    array(
		        'method'  => 'POST',
		        'header'  => 'Content-type: application/x-www-form-urlencoded',
		        'content' => $postvar
		    )
		);
		
		$context  = stream_context_create($opts);
		$data     = @json_decode(file_get_contents(API_URL, false, $context));
		
		if(!empty($data->joueur)) {
			$this->joueur = $data->joueur;
			$this->event  = $data->event;
			
			$temps = time()+TEMPS_CO*86400;
			
			if(!empty($this->joueur->token) && 
			   (empty($_COOKIE['token']) or 
			   $_COOKIE['token'] != $this->joueur->token)) {
			
				if($_COOKIE['temps'] > $temps) {
					$temps = $_COOKIE['temps'];
				}
	
				setcookie('token', $this->joueur->token, $temps, '/',
	    				  $_SERVER['HTTP_HOST']);
				setcookie('temps', $temps, $temps, '/',
	    				  $_SERVER['HTTP_HOST']);
			}
			else {			
				if($_COOKIE['temps'] < $temps) {
					setcookie('token', $_COOKIE['token'], $temps, '/',
		    				  $_SERVER['HTTP_HOST']);
					setcookie('temps', $temps, $temps, '/',
		    				  $_SERVER['HTTP_HOST']);
				}
			}
			
			if(!empty($data->answer)) {
				$this->answer = $data->answer;
			}
		}
	}
	
	function get_answer($action='', $num=0) {
		if(!empty($this->answer) && !empty($this->answer->$action)) {
			if(!empty($num)) {
				return $this->answer->$action->$num;
			}
			else {
				return $this->answer->$action;
			}
		}
		else {
			return '';
		}
	}
	
	function error($action, $num=1, $var='') {
		if(!empty($this->get_answer($action))) {
			if($this->get_answer($action)->{$num} != 0) {
				echo '<div class="erreur">';
				echo display_error($this->get_answer($action)->{$num}, $var);
				echo '</div>';
			}
		}
	}
	
	function get_infoj($arg) {
		
		if($this->joueur == null) {
			return null;
		}
		
		return $this->joueur->$arg;
	}
	
  function is_event($event) {
  	if(in_array($event, $this->event)) {
  		return true;
  	}
  	else {
  		return false;
  	}
  }
  
	//Specifics functions
  function peut_commerce() {
  	if($this->joueur->liste_batiments->forum->nb > 0) {
  		return true;
  	}
  	else {
  		return false;
  	}
  }
  
  function possible_unite($unite,$premier) {
  	if(empty($this->joueur->liste_unites->$unite)) {
  		return false;
  	}
  	
		$value = $this->joueur->liste_unites->$unite;
		
		if($value->nb > 0) {
			return true;
		}
		elseif($this->joueur->lvl < $value->lvlmini) {
			return false;
		}
		elseif(($value->type_att == 9) && ($this->joueur->lvl >= $value->lvlmini)) {
			return true;
		}
		elseif(!(
			(($unite == 'espion') && empty($this->joueur->liste_batiments->qgespion->nb)) or 
			(!empty($value->n_camp) && 
			 empty($this->joueur->liste_batiments->camp -> nb)) or 
			(!empty($value->n_arc) && 
			 empty($this->joueur->liste_batiments->ecolearc-> nb)) or 
			(!empty($value->n_cav) && 
			 empty($this->joueur->liste_batiments->ecolecav -> nb)) or 
			(!empty($value->n_aca) && 
			 empty($this->joueur->liste_batiments->academy -> nb)) or 
			(!empty($value->n_art) && (!in_array('artemis', $this->joueur->temples))) or
			(!empty($value->n_hep) && (!in_array('hephaistos', $this->joueur->temples))) or
			(!empty($value->n_dio) && (!in_array('dionysos', $this->joueur->temples)))  or
			(!empty($value->n_ares) && (!in_array('ares', $this->joueur->temples)))  or
			(!empty($value->n_zeus) && (!in_array('zeus', $this->joueur->temples))) or
			(!empty($value->n_hades) && (!in_array('hades', $this->joueur->temples))) or
			(!empty($value->n_lion) && empty($this->joueur->liste_autels->lion)) or
			(!empty($value->n_cyclope) && empty($this->joueur->liste_autels->unite)) or
			(!empty($value->n_gaia) && empty($this->joueur->liste_autels->defense_gaia)) or
			(!empty($value->n_pre) && (!$premier)) or
			(!empty($value->n_aphro) && 
			 (empty($this->joueur->liste_autels->attirance_aphrodite) or 
			  ($this->joueur->liste_autels->attirance_aphrodite < $value->n_aphro)))
			or ($value->type_att == 9))) {
			return true;
		}
		else{
			return false;
		}
  }
  
  function get_ress() {
  	if(!empty($this->joueur) && $this->joueur->statu == 1) {
	  	return array(
			'drachme' => $this->joueur->drachme,
			'nourriture' => $this->joueur->nourriture,
			'eau' => $this->joueur->eau,
			'bois'=> $this->joueur->bois,
			'fer' => $this->joueur->fer,
			'argent'=>$this->joueur->argent,
			'pierre'=>$this->joueur->pierre,
			'marbre'=>$this->joueur->marbre,
			'raisin'=>$this->joueur->raisin,
			'vin'=>$this->joueur->vin,
			'gold'=>$this->joueur->gold);
  	}
  	else {
  		return '';
  	}
  }
  
  function is_active_bonus_commerce() {
		if(!empty($this->joueur->bonus->commerce) && 
		   $this->joueur->bonus->commerce > $this->joueur->timestamp) {
      echo '<div class="erreur centrer">';
      printf(_("Appui d'Hermès actif jusqu'au %s"),
             display_date($this->joueur->bonus->commerce,4));
			echo '<br/></div>';
		}
  }
  
  function is_active_bonus_xp() {
  	if(!empty($this->joueur->bonus->xp) && 
  	   $this->joueur->bonus->xp > $this->joueur->timestamp) {
  		echo '<div class="erreur centrer">';
  		printf(_("Appui d'Éros actif jusqu'au %").
  		       display_date($this->joueur->bonus->xp,4));
			echo '<br/></div>';
  	}
  }
  
	function get_taux_rachat() {
		if(in_array('hermes', $this->joueur->temples)) {
			return 97.5;
		}
		else {
			return 80;
		}
	}
	
	
	function possible_temple1() {
		if(sizeof($this->joueur->temples) == 0 && 
			 $this->joueur->lvl == 2) {
			return true;
		}
		else {
			return false;
		}
	}
	
	function possible_temple2() {
		if(sizeof($this->joueur->temples) == 1 &&
			 $this->joueur->lvl == 6) {
			return true;
		}
		else {
			return false;
		}
	}
	
	function possible_temple3() {
		if(sizeof($this->joueur->temples) == 2 &&
			 $this->joueur->lvl == 8) {
			return true;
		}
		else {
			return false;
		}
	}
	
	function possible_temple4() {
		if(sizeof($this->joueur->temples) == 3 &&
			 $this->joueur->lvl == 10) {
			return true;
		}
		else {
			return false;
		}
	}
	
  /***
  * Possibilité de transmettre au moins un pouvoir
  ***/
	function possible_transmettre() {
		if(($this->joueur->droits_alliance->changer_cotise == 2) or 
		   ($this->joueur->droits_alliance->pacte == 2) or 
		   ($this->joueur->droits_alliance->declarer_guerre == 2) or 
		   ($this->joueur->droits_alliance->annuler_guerre == 2) or 
		   ($this->joueur->droits_alliance->accepter_joueur == 2) or 
		   ($this->joueur->droits_alliance->recrutement == 2) or 
		   ($this->joueur->droits_alliance->contrat == 2) or 
		   ($this->joueur->droits_alliance->accepter_demande == 2) or 
		   ($this->joueur->droits_alliance->modifier_profils == 2)) {
			return true;
		}
		else {
			return false;
		}
	}
}

?>