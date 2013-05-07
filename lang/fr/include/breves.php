<h1 class="title_faq">Actualités d'Ellàs War</h1>
<?php

$paquet = new EwPaquet('get_breves', array(20));
$dernieres_news = $paquet->getRetour();

if(sizeof($dernieres_news) > 0) {

	echo '<br/>
	<table class="centrer_tableau">';

	foreach($dernieres_news as $news) {
		echo '
		<tr><td><a href="'.$news->lien.'" class="titre_news" target="_blank" >'.$news->titre.'</a>, <i>le '.date("d-m-y",$news->temps).'</i> - Par '.$news->auteur.'</td></tr>';
	}
	
	echo '</table>';
}

?>