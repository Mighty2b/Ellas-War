<?php

class Ewpaquet {
	private $token   = '';
	private $actions = array();
	private $ip;
	private $user_agent='';
	private $joueur;
	private $answer;
	
	function __construct() {
		
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
		$data = json_decode(file_get_contents(API_URL, false, $context));
		
		$this->joueur = $data->joueur;
		
		if(!empty($data->answer)) {
			$this->answer = $data->answer;
		}
	}
	
	function get_answer($action) {
		return $this->answer->$action;
	}
	
	function get_infoj($arg) {
		return $this->joueur->$arg;
	}
}

?>