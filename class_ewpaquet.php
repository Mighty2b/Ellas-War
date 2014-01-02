<?php

class Ewpaquet {
	private $token   = '';
	private $actions = array();
	private $ip='';
	private $user_agent='';
	private $joueur=null;
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
			
			$temps = time()+TEMPS_CO*86400;
			
			if((empty($_COOKIE['token']) or 
			   $_COOKIE['token'] != $this->joueur->token) && 
				!empty($this->joueur->token)) {
			
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
	
	function get_answer($action='') {
		if(!empty($this->answer) && !empty($this->answer->$action)) {
			return $this->answer->$action;
		}
		else {
			return '';
		}
	}
	
	function get_infoj($arg) {
		
		if($this->joueur == null) {
			return null;
		}
		
		return $this->joueur->$arg;
	}
}

?>