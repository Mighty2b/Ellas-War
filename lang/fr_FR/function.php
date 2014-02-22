<?php

function display_date($temps, $type=1) {
	if($temps > 0)
	switch($type) {
		case 1:
			return 'le '.date("d-m-y", $temps);
		break;
		case 2:
			return date("d-m-y", $temps);
		break;
		case 3:
			return 'le '.
	    strftime('%A %d %B', $temps).' à '.
	    strftime('%Hh %M', $temps);
		break;
		case 4:
			return 
	    strftime('%A %d %B', $temps).' à '.
	    strftime('%Hh %M', $temps);
		break;
		case 5:
			return 
	    strftime('%A %d %B', $temps).' '.
	    strftime('%Hh %M', $temps);
		break;
		case 6:
			return ' du '.
	    strftime('%A %d %B', $temps).' à '.
	    strftime('%Hh %M', $temps);
	  break;
	}
}

function trad_to_page($page) {
	return $page;
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

	echo '<div class="ligne centrer rouge_goco gras">'.$restant.' avant le blocage de votre compte pour manque de ressources<br/></div>
	      <div class="clear"></div>';
}

?>