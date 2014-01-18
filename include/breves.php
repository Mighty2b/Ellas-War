<?php

$dernieres_news = $paquet->get_answer('get_breves')->{1};

echo _('<h1>Actualités d\'Ellàs War</h1>');

if(sizeof($dernieres_news) > 0) {

	echo '<br/>
	<table class="none">';

	foreach($dernieres_news as $news) {
		echo '
		<tr>
			<td><a href="'.$news->lien.'" 
			       class="titre_news" 
			       target="_blank" >'.$news->titre.'</a>, <i>'.
			display_date($news->temps).'</i> - '._('Par').' '.$news->auteur.'</td>
		</tr>';
	}
	
	echo '</table>';
}

?>