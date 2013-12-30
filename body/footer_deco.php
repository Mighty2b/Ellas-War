<?php

echo '<nav>
<br/>
<br/>
<br/>
<br/>
<br/>

<div class="titre"><a href="'.SITE_URL.'" title="'._('Ellàs War').'">'._('Ellàs War').'</a></div>
<a href="'._('decouvertedujeu').'" title="'._('Découvrir Ellàs War').'">'._('Découvrir le jeu').'</a>
<br/><a href="'._('actualites').'" title="'._('Actualités d\'Ellàs War').'">'._('Actualités du jeu').'</a>
<br/><a href="'.WIKI_URL.'" title="'._('Wiki d\'Ellàs War').'" target="_blank">'._('FAQ').'</a>
<br/><a href="'._('nouscontacter').'" title="'._('Contacter l\'équipe d\'Ellàs War').'">'._('Nous contacter').'</a>
<br/>

<div class="titre"><a href="'._('quelquesmotssurlesite').'" title="'._('Quelques mots sur Ellàs War').'">'._('Quelques mots sur le site').'</a></div>
<a href="'._('partenaires').'" title="'._('Nos partenaires').'">'._('Partenaires').'</a>
<br/><a href="'._('jeu-strategie').'" title="'._('Un jeu de stratégie').'">'._('Un jeu de stratégie').'</a>
<br/><a href="'._('jeu-gratuit').'" title="'._('Un jeu gratuit').'">'._('Un jeu gratuit').'</a>
<br/><a href="'.CGU_URL.'" title="'._('Conditions générales d\'utilisation').'">'._('Conditions générales d\'utilisation').'</a>
<br/>

<div class="titre"><a href="'._('communaute').'" title="'._('La communauté d\'Ellàs War').'">'._('Communauté').'</a></div>
<a href="'._('joueursconnectes').'" title="'._('Joueurs connectés sur Ellàs War').'">'._('Joueurs connectés').'</a>
<br/><a href="'.FORUM_URL.'" title="'._('Forum d\'Ellàs War').'" target="_blank">'._('Forum').'</a>
<br/><a href="'._('teamspeak').'" title="'._('Serveur Teamspeak').'">'._('Serveur Teamspeak').'</a>
<br/><a href="'._('equipedusite').'" title="'._('L\'équipe d\'Ellàs War').'">'._('L\'équipe du site').'</a>
<br/>

<div class="titre"><a href="'._('classements').'" title="'._('Classements d\'Ellàs War').'">'._('Classements').'</a></div>
<a href="'._('classementdesalliances').'" title="'._('Classement des alliances').'">'._('Alliances').'</a>
<br/><a href="'._('classementdesjoueurs').'" title="'._('Classement des joueurs').'">'._('Joueurs').'</a>
<br/><a href="'._('classementdesbtn').'" title="'._('Classement des batailles navales').'">'._('Batailles navales').'</a>
<br/><a href="'._('classementdesheros').'" title="'._('Classement des Héros').'">'._('Héros').'</a>
<br/>
</nav>';

?>
<script type="text/javascript">
$(window).load(function() {
	if($(document).width() > $(window).width()) {
		var diff = ($(document).width() - $(window).width())/2;
		$('html,body').animate({
	        scrollLeft: diff
	    }, 1);
	}
});
<?php 

echo '
$("#banniere").click( function() {
	location.href = \''.SITE_URL.'\';
});';

?>
</script>