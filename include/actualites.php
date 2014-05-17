<?php

$liste_news = $paquet->get_answer('get_news');

echo '<h1 class="title_faq">'._('Actualités d\'Ellàs War').'</h1><br/>';


if(!empty($liste_news)) {
	$list_news = $liste_news->{1};
	
	if(sizeof($list_news) > 0) {
		echo '<div id="new_list" class="ligne">';
		
		foreach($list_news as $i => $news) {
			echo '<div class="ligne">
				<a href="'.$news->lien.'" class="titre_news" target="_blank" >'.$news->titre.'</a>, <i>'.display_date($news->temps, 1).'</i></td>
			</div>';
			
			if(!empty($last) && $last != date('Y', $news->temps)) {
				echo '<div class="ligne"><br/></div>';
			}
			$last = date('Y', $news->temps);
		}
		
		echo '<div class="ligne"><br/></div></div>';
	}
}

?>