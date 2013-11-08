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
		<li>&nbsp;<a href="'._('pagecontact').'">'._('Contact').'</a>&nbsp;</li>
		<li>&nbsp;<a href="#" onclick="deco();">'._('Deconnexion').'</a>&nbsp;</li>
</ul>
</div>
</section>
<section id="header_ban">
<a href="'.SITE_URL.'">Ellàs War</a>
</section>
<section id="header_menu">
&nbsp;<a href="/">Cité</a>&nbsp;
&nbsp;<a href="'._('armee').'">'._('Armée').'</a>&nbsp;
&nbsp;<a href="'._('archives').'">'.ucfirst(_('archives')).'</a>&nbsp;
&nbsp;<a href="'._('mythologie').'">'.ucfirst(_('mythologie')).'</a>&nbsp;
&nbsp;<a href="'._('heros').'">'.ucfirst(_('heros')).'</a>&nbsp;
&nbsp;<a href="'._('missions').'">'.ucfirst(_('missions')).'</a>&nbsp;
&nbsp;<a href="'._('alliance').'">'.ucfirst(_('alliance')).'</a>&nbsp;
&nbsp;<a href="'._('commerce').'">'._('Marché').'</a>&nbsp;
&nbsp;<a href="'._('jeux').'">'.ucfirst(_('jeux')).'</a>&nbsp;
</section>

<section id="header_ssmenu">';
switch($page) {
	case 'cite':
	case 'constructions':
	case 'construire':
	case 'armurerie':
	case 'tresor':
	case 'oracle':
	case 'bonus':
	case 'faveur':
		echo '
		<a href="'._('constructions').'">'._('Constructions').'</a>
		<a href="'._('construire').'">'._('Construire').'</a>
		<a href="'._('armurerie').'">'._('Armurerie').'</a>
		<a href="'._('tresor').'">'._('Tresor').'</a>
		<a href="'._('oracle').'">'._('Oracle').'</a>
		<a href="'._('bonus').'">'._('Bonus divins').'</a>
		<a href="'._('faveurs').'">'.ucfirst(_('faveurs')).'</a>';
	break;
	
	case 'armee':
	case 'attaquer':
	case 'passerenrevue':
	case 'engager':
	case 'mesattaques':
	case 'strategiedefensive':
	case 'strategieoffensive':
		echo '
		<a href="'._('attaquer').'">'.ucfirst(_('attaquer')).'</a>
		<a href="'._('passerenrevue').'">'._('Passer en revue').'</a>
		<a href="'._('engager').'">'.ucfirst(_('engager')).'</a>
		<a href="'._('mesattaques').'">'._('Mes attaques').'</a>
		<a href="'._('strategiedefensive').'">'._('Stratégie défensive').'</a>
		<a href="'._('strategieoffensive').'">'._('Stratégie offensive').'</a>';
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
	case 'faveurs':
	case 'vendre':
	case 'licences':
	case 'mesventes':
		echo '
		<a href="'._('donnerunefaveur').'">'._('Donner une faveur').'</a>
		<a href="'._('commerce').'">'._('Marché').'</a>
		<a href="'._('vendre').'">'.ucfirst(_('vendre')).'</a>
		<a href="'._('licences').'">'.ucfirst(_('licences')).'</a>
		<a href="'._('mesventes').'">'._('Mes ventes').'</a>
		<a href="'._('faveurs').'">'.ucfirst(_('faveurs')).'</a>';
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
	
	default: echo $page; break;
}
echo '
</section>
<section id="inside_co">
';

?>