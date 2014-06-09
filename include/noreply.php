<?php

echo '<div class="centrer ligne_80 rouge_goco gras">
		<br/><br/>';

if(!empty($noreply)) {
	echo _('Votre désinscription d\'Ellàs War a bien été prise en compte.');
	echo '<br/>';
	echo _('Nous vous souhaitons une bonne continuation.');
}
else {
	echo _('Erreur lors de votre désinscription d\'Ellàs War.');
}

echo '</div>';

?>
