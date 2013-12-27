<?php

if(!empty($_GET['var1']) && (trad_to_page($_GET['var1']) == 'gratuit')) {
	echo '<title>'._('Jouez gratuitement sur Ellàs War !').'</title>';
	echo '<meta name="description" content="'._(
	     'Jouez gratuitement sur Ellàs War.').
	      '" />';
}
else {
	echo '<title>'._('Mettez en place votre stratégie').'</title>';
	echo '<meta name="description" content="'._(
	     'La stratégie est au coeur d\'Ellàs War. Que vous soyez un joueur offensif ou défensif gardez toujours en tête la survie de votre cité. Vénérez les dieux, obtenez de fabuleux pouvoir et profitez en pour affronter vos ennemis.').
	      '" />';
}
?>