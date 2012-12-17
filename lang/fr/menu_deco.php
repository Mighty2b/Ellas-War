<?php

echo '
<div id="bouton_rejoindre"><a href="sinscrire"><img src="lang/fr/design/nous_rejoindre.png" alt="Nous rejoindre" title="Rejoignez le combat" /></a></div>
<div id="bouton_decouvrir"><a href="decouvertedujeu"><img src="lang/fr/design/decouvrir_le_jeu.png" alt="Découvrir le jeu" title="Découvrez la Grèce Antique" height="46" width="154" /></a></div>
<div id="bouton_faq"><a href="http://wiki.ellaswar.com"><img src="lang/fr/design/faq.png" alt="FAQ" title="FAQ" height="44" width="67" /></a></div>
<div id="bouton_accueil"><a href="'.SITE_URL.'"><img src="lang/fr/design/accueil.png" alt="Accueil" title="Accueil" height="46" width="107" /></a></div>
<div id="bouton_forum"><a href="http://forums.ellaswar.com" target="_blank"><img src="lang/fr/design/forum.png" alt="Forum" title="Forum d\'Ellàs War" height="83" width="46" /></a></div>
<div id="bouton_partenaires"><a href="partenaires"><img src="lang/fr/design/partenaires.png" alt="Partenaires" title="Partenaires" /></a></div>
<div id="bouton_contact"><a href="'.(($paquet->get_statu() == 1 || $paquet->get_statu() == 3 )?'PageContact':'nouscontacter').'"><img src="lang/fr/design/nous_contacter.png" alt="Contact" title="Contacter le staff d\'Ellàs War" /></a></div>
';

?>