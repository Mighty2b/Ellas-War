<?php

function redirect($url='/', $time=0) {
	
	echo'<meta http-equiv="refresh" content="'.$time.'; url='.$url.'" />';
	
	if(empty($time)) {
		exit();
	}
}

function alerte($message) {
	echo '<script type=\'text/javascript\'>
	      alert(\''.addslashes($message).'\');
	      </SCRIPT>';	
}

function set_lang() {
	putenv('LC_ALL='.LANG);
	setlocale(LC_ALL, LANG);
	bindtextdomain('textes', './lang');
	textdomain('textes');
}

?>