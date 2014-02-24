<?php

echo '<title>'._('Calendrier de votre alliance').'</title>
<meta name="description"
      content="'._('Calendrier de votre alliance').'" />';

if(!empty($_GET['var1'])) {
	$verif_date = explode("_", addslashes($_GET['var1'])); 

	if(checkdate($verif_date[1], $verif_date[0], $verif_date[2]) == true)
	{
		if($verif_date[0] < 10)
			$verif_date[0] = '0'.round($verif_date[0]);
			
		if($verif_date[1] < 10)
			$verif_date[1] = '0'.round($verif_date[1]);
			
		$date = $verif_date[0].'-'.$verif_date[1].'-'.$verif_date[2];
	}	
	else {
		$date = date('d-m-Y');
	}
}
else
{
	$date = date('d-m-Y');
}

$date_enre = str_replace('-', '_', $date);

if(!empty($_POST)) {
	if(empty($_POST['rappel'])) {
		$_POST['rappel'] = 0;
	}
	$paquet -> add_action('maj_calendrier', 
												 array($date, $_POST['texte'], $_POST['rappel']));
}

$paquet -> add_action('calendrier', array($date));

$paquet -> add_action('infoalliance');

?>