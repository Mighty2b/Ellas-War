<?php

class Ewpaquet {
	private $token   = '';
	private $actions = array();
	
	function __construct() {
		if(!empty($_COOKIE['token'])) {
			$this->token = $_COOKIE['token'];
		}
	}
	
	function add_action($action, $para=array()) {
		$this->actions[] = array('action' => $action,
		                         'para'   => $para);
	}
	
	function send_actions() {
		
	}
}

?>