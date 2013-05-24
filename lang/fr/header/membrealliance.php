<?php

if(!empty($all)) {
	echo '<title>Membres de l\'alliance '.$all -> nom.' EllasWar.com Jeu de guerre multijoueurs et de stratégie en ligne gratuit sur le theme de l\'antiquité grecque</title>
	<meta name="description" content="Membres de l\'alliance '.$all -> nom.' d\'Ellàs War. Inscrivez-vous et partez à l\'assault des autres peuples. EllasWar.Com est un jeu de stratégie en ligne gratuit au temps de l\'antiquité grecque. Construisez votre cité et votre armée pour devenir le maître de toute une civilisation." />';
}
else {
	redirect('allianceexistepas');
}

?>