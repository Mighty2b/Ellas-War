<?php

echo '
<div id="bouton_rejoindre"><a href="signup"><img src="lang/fr/design/join_us.png" alt="Join us" title="Join us, and fight" /></a></div>
<div id="bouton_decouvrir"><a href="decouvertedujeu"><img src="lang/fr/design/discoverthegame.png" alt="Discover the game" title="Discover the ancient Greece" /></a></div>
<div id="bouton_faq"><a href="http://wiki.ellaswar.co.uk"><img src="lang/fr/design/faq.png" alt="FAQ" title="FAQ" /></a></div>
<div id="bouton_accueil"><a href="'.SITE_URL.'"><img src="lang/fr/design/home.png" alt="Home" title="Home" /></a></div>
<div id="bouton_forum"><a href="http://forums.ellaswar.co.uk" target="_blank"><img src="lang/fr/design/forum.png" alt="Forum" title="Forum" /></a></div>

<div id="bouton_partenaires"><a href="parteners"><img src="design/parteners.png" alt="Parteners" title="Parteners" /></a></div>
<div id="bouton_contact"><a href="'.(($paquet->get_statu() == 1 || $paquet->get_statu() == 3 )?'PageContact':'contactus').'"><img src="lang/fr/design/contactus.png" alt="Contact Us" title="Contact Us" /></a></div>
';

?>