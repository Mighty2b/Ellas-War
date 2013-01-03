<?php

switch($page) {
	case 'premierspas':
	case 'questionsfrequentes':
		$wiki = 'http://wiki.ellaswar.com/index.php/Premiers_pas';
	break;
	
	case 'lesespionnages':
	case 'lesattaques':
		$wiki = 'http://wiki.ellaswar.com/index.php/Les_attaques';
	break;
	
	case 'lestemples':
		$wiki = 'http://wiki.ellaswar.com/index.php/Les_temples';
	break;
	
	case 'generalitesalliances':
		$wiki = 'http://wiki.ellaswar.com/index.php/Les_alliances';
	break;
	
	case 'lesguerresetpactes':
		$wiki = 'http://wiki.ellaswar.com/index.php/Les_guerres';
	break;
	
	case 'lemarche':
		$wiki = 'http://wiki.ellaswar.com/index.php/Le_march%C3%A9';
	break;
	
	case 'lesressources':
		$wiki = 'http://wiki.ellaswar.com/index.php/Les_ressources';
	break;
	
	case 'lesfaveurs':
		$wiki = 'http://wiki.ellaswar.com/index.php/Faveurs';
	break;

	case 'quelquesregles':
		$wiki = 'http://wiki.ellaswar.com/index.php/Les_r%C3%A8gles';
	break;
	
	case 'faq':
		$wiki = 'http://wiki.ellaswar.com';
	break;
}

if(!empty($wiki)) {
	header("Status: 301 Moved Permanently", false, 301);
	header("Location: ".$wiki);
	exit();
}

?>