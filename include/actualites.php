<?php

$list_news = $paquet->get_answer('get_news')->{1};

echo '<h1 class="title_faq">'._('Actualités d\'Ellàs War').'</h1>';

if(sizeof($list_news) > 0) {
	echo '<div id="new_list" class="ligne">
	<h2>'._('News').'</h2>';
	
	foreach($list_news as $i => $news) {
		echo '<div class="ligne">
			<a href="'.$news->lien.'" class="titre_news" target="_blank" >'.$news->titre.'</a>, <i>'.display_date($news->temps, 1).'</i></td>
		</div>';
	}
	
	echo '</div>';
}

?>