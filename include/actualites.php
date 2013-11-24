<?php

$list_news = $paquet->get_answer('get_news')->{1};

echo '<h1 class="title_faq">'._('Actualités d\'Ellàs War').'</h1>';

if(sizeof($list_news) > 0) {

	echo '<br/>
	<table class="centrer_tableau">';

	foreach($list_news as $i => $news) {
		echo '
<tr>
		<td><a href="'.$news->lien.'" class="titre_news" target="_blank" >'.$news->titre.'</a>, <i>'.display_date($news->temps, 1).'</i> - '._('Par').' '.$news->auteur.'</td>
</tr>';
	}
	
	echo '</table>';
}

?>