<?php

echo '
<section id="header">
<div id="header2">
<ul class="dropdown">
		<li>&nbsp;<a href="'._('informationspersonnelles').'">'._('Compte').'</a>&nbsp;
		<ul class="sub_menu">
			<li>&nbsp;<a href="'._('informationspersonnelles').'">Informations personelles</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('bibliotheque').'">Bibliothéque</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('pause').'">Pause</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('adressemail').'">E-mail</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('motdepasse').'">Mot de passe</a>&nbsp;</li>
		</ul>
		</li>
		<li>&nbsp;<a href="'._('messagerie').'">'._('Messagerie').'</a>&nbsp;
		<ul class="sub_menu">
			<li>&nbsp;<a href="'._('nouveaumessage').'">'._('Nouveau message').'</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('messagerie').'">'._('Boite de reception').'</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('boiteenvoie').'">'._('Boite d\'envoi').'</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('archivesdemessagerie').'">'._('Archives').'</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('listenoire').'">'._('Liste noire').'</a>&nbsp;</li>
		</ul>
		</li>
		<li>&nbsp;<a href="'._('parrainage').'">'.ucfirst(_('parrainage')).'</a>&nbsp;
		<ul class="sub_menu">
			<li>&nbsp;<a href="'._('filleuls').'">'.ucfirst(_('filleuls')).'</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('soutien').'">'.ucfirst(_('soutien')).'</a>&nbsp;</li>
		</ul></li>
		<li>&nbsp;<a href="'._('classements').'">'._('Classements').'</a>&nbsp;
		<ul class="sub_menu">
			<li>&nbsp;'._('Alliances').'&nbsp;</li>
			<li>&nbsp;'._('Batailles navales').'&nbsp;</li>
			<li>&nbsp;'._('Cités').'&nbsp;</li>
			<li>&nbsp;'._('Héros').'&nbsp;</li>
			<li>&nbsp;'._('Honneur').'&nbsp;</li>
		</ul>
		<li>&nbsp;<a href="'._('communaute').'">'._('Communauté').'</a>&nbsp;
		<ul class="sub_menu">
			<li>&nbsp;<a href="'._('joueursconnectes').'">'._('Joueur&nbsp;connectés').'</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('amis').'">'.ucfirst(_('amis')).'</a>&nbsp;</li>
			<li>&nbsp;<a href="'.FORUM_URL.'">'._('Forum').'</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('teamspeak').'">'.ucfirst(_('teamspeak')).'</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('sondages').'">'.ucfirst(_('sondages')).'</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('chat').'">'.ucfirst(_('chat')).'</a>&nbsp;</li>
		</ul>
		<li>&nbsp;<a href="'.WIKI_URL.'">'._('Aide').'</a>&nbsp;</li>
		<li>&nbsp;<a href="'._('pagecontact').'">'._('Contact').'</a>&nbsp;
		<ul class="sub_menu">
			<li>&nbsp;<a href="'._('archivescontact').'">'._('Archives').'</a>&nbsp;</li>
		</ul>
		</li>
		<li>&nbsp;<a href="#" onclick="deco();">'._('Deconnexion').'</a>&nbsp;</li>
</ul>
</div>
</section>
<section id="header_ban">
</section>
<section id="header_menu">
&nbsp;<a id="menu_cite" href="/"><div class="ssmenu">'._('Cité').'</div>'._('Cité').'</a>&nbsp;
&nbsp;<a id="menu_armee" href="'._('armee').'"><div class="ssmenu">'._('Armée').'</div>'._('Armée').'</a>&nbsp;
&nbsp;<a id="menu_archives" href="'._('archives').'"><div class="ssmenu">'.ucfirst(_('archives')).'</div>'.ucfirst(_('archives')).'</a>&nbsp;
&nbsp;<a id="menu_mythologie" href="'._('mythologie').'"><div class="ssmenu">'.ucfirst(_('mythologie')).'</div>'.ucfirst(_('mythologie')).'</a>&nbsp;
&nbsp;<a id="menu_heros" href="'._('heros').'"><div class="ssmenu">'._('Héros').'</div>'.ucfirst(_('heros')).'</a>&nbsp;
&nbsp;<a id="menu_forum" href="'.FORUM_URL.'" target="_blank"><div class="ssmenu">'.ucfirst(_('forum')).'</div>'.ucfirst(_('forum')).'</a>&nbsp;
&nbsp;<a id="menu_missions" href="'._('missions').'"><div class="ssmenu">'.ucfirst(_('missions')).'</div>'.ucfirst(_('missions')).'</a>&nbsp;
&nbsp;<a id="menu_alliance" href="'._('alliance').'"><div class="ssmenu">'.ucfirst(_('alliance')).'</div>'.ucfirst(_('alliance')).'</a>&nbsp;
&nbsp;<a id="menu_commerce" href="'._('commerce').'"><div class="ssmenu">'._('Marché').'</div>'._('Marché').'</a>&nbsp;
&nbsp;<a id="menu_jeux" href="'._('jeux').'"><div class="ssmenu">'.ucfirst(_('jeux')).'</div>'.ucfirst(_('jeux')).'</a>&nbsp;
</section>

<section id="inside_co">
<div id="header_ssmenu">';
switch($page) {
	case 'cite':
	case 'constructions':
	case 'construire':
	case 'armurerie':
	case 'tresor':
	case 'oracle':
	case 'bonus':
	case 'faveurs':
		echo '
		<div id="barre_menu_cite">
			<a id="header_ssmenu_constructions"
			   href="'._('constructions').'">'._('Constructions').'</a>
			<a id="header_ssmenu_construire"
			   href="'._('construire').'">'._('Construire').'</a>
			<a id="header_ssmenu_armurerie"
			   href="'._('armurerie').'">'._('Armurerie').'</a>
			<a id="header_ssmenu_tresor"
			   href="'._('tresor').'">'._('Tresor').'</a>
			<a id="header_ssmenu_oracle"
			   href="'._('oracle').'">'._('Oracle').'</a>
			<a id="header_ssmenu_bonus"
			   href="'._('bonus').'">'._('Bonus divins').'</a>
			<a id="header_ssmenu_faveurs"
			   href="'._('faveurs').'">'.ucfirst(_('faveurs')).'</a>
		</div>';
	break;
	
	case 'armee':
	case 'attaquer':
	case 'passerenrevue':
	case 'engager':
	case 'mesattaques':
	case 'strategiedefensive':
	case 'strategieoffensive':
		echo '
		<div id="barre_menu_armee">
			<a id="header_ssmenu_attaquer"
			   href="'._('attaquer').'">'.ucfirst(_('attaquer')).'</a>
			<a id="header_ssmenu_passerenrevue"
			   href="'._('passerenrevue').'">'._('Passer en revue').'</a>
			<a id="header_ssmenu_engager"
			   href="'._('engager').'">'.ucfirst(_('engager')).'</a>
			<a id="header_ssmenu_mesattaques"
			   href="'._('mesattaques').'">'._('Mes attaques').'</a>
			<a id="header_ssmenu_strategiedefensive"
			   href="'._('strategiedefensive').'">'._('Stratégie défensive').'</a>
			<a id="header_ssmenu_strategieoffensive"
			   href="'._('strategieoffensive').'">'._('Stratégie offensive').'</a>
		</div>';
	break;
	
	case 'archives':
	
	break;
	
	case 'mythologie':
	case 'arbredesdieux':
	case 'auteldesdieux':
	case 'temples':
	case 'statues':
	case 'succes':
	case 'prieres':
	
	break;
	
	case 'heros':
	
	break;
	
	case 'missions':
	
	break;
	
	case 'alliance':
	
	break;
	
	case 'commerce':
	case 'donnerunefaveur':
	case 'vendre':
	case 'licences':
	case 'mesventes':
	case 'debarras':
		echo '
		<div id="barre_menu_marche">
			<a id="header_ssmenu_donnerunefaveur"
			   href="'._('donnerunefaveur').'">'._('Donner une faveur').'</a>
			<a id="header_ssmenu_commerce"
			   href="'._('commerce').'">'._('Marché').'</a>
			<a id="header_ssmenu_vendre"
			   href="'._('vendre').'">'.ucfirst(_('vendre')).'</a>
			<a id="header_ssmenu_mesventes"
			   href="'._('mesventes').'">'._('Mes ventes').'</a>
			<a id="header_ssmenu_debarras"
			   href="'._('debarras').'">'._('Débarras').'</a>
			<a id="header_ssmenu_faveurs2"
			   href="'._('faveurs').'">'.ucfirst(_('faveurs')).'</a>
		</div>';
	break;
	
	case 'jeux':
	
	break;
	
	case 'informationspersonnelles':
	case 'bibliotheque':
	case 'pause':
	case 'adressemail':
	case 'motdepasse':
	
	break;	
	
	case 'nouveaumessage':
	case 'messagerie':
	case 'boiteEnvoie':
	case 'archivesdemessagerie':
	case 'listenoire':
	
	break;
	
	case 'parrainage':
	case 'filleuls':
	case 'soutien':
	
	break;
	
	case 'classements':
	
	break;
	
	case 'communaute':
	case 'joueursconnectes':
	case 'amis':
	case 'teamspeak':
	case 'sondages':
	case 'chat':
	
	break;
	
	case 'pagecontact':
	case 'archivescontact':
	
	break;
	
	default: echo $page; break;
}
echo '
</div>
<div class="clear"></div>
<div id="inside_co_int">
';

?>