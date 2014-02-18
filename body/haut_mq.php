<?php

$nouveaux_mp = $paquet->get_answer('messagerie_nonlus')->{1};

echo '<section id="header_ban">
</section>
<section id="header_menu">

</section>

<section id="inside_co">
<div id="header_ssmenu">';
switch($page) {
	case 'archives':
	case 'permalien':
		echo '<div id="barre_menu_vide"></div>';
	break;
	
	case 'profilsalliance':
		echo '<div id="barre_menu_vide"></div>';
	break;
		
	case 'classements':
	case 'honneur':
	case 'classementdesjoueurs':
	case 'classementghonneur':
	case 'classementdesalliances':
	case 'classementdesbtn':
	case 'classementdesheros':
		echo '<div id="barre_menu_vide"></div>';
	break;
	
	case 'communaute':
	case 'joueursconnectes':
	case 'amis':
	case 'teamspeak':
	case 'sondages':
	case 'chat':
	case 'tour_de_force':
		echo '<div id="barre_menu_vide"></div>';
	break;
	
	case 'breves':
	case 'actualites':
	case 'pagecontact':
	case 'profilsjoueur':
		echo '<div id="barre_menu_vide"></div>';
	break;
	
	case 'accueil_mq':
		echo '<div id="barre_menu_vide"></div>';
	break;
	
	default: echo $page; break;
}
echo '
</div>
<div class="clear"></div>

<div id="inside_co_int">
';

?>