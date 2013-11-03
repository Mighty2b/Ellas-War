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
			<li>&nbsp;<a href="'._('nouveaumessage').'">Nouveau message</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('messagerie').'">Boite de reception</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('boiteEnvoie').'">Boite d\'envoi</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('archivesdemessagerie').'">Archives</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('listenoire').'">Liste noire</a>&nbsp;</li>
		</ul>
		</li>
		<li>&nbsp;'._('Parrainage').'&nbsp;
		<ul class="sub_menu">
			<li>&nbsp;'._('Filleuls').'&nbsp;</li>
			<li>&nbsp;'._('Soutien').'&nbsp;</li>
		</ul></li>
		<li>&nbsp;'._('Classements').'&nbsp;
		<ul class="sub_menu">
			<li>&nbsp;'._('Alliances').'&nbsp;</li>
			<li>&nbsp;'._('Batailles navales').'&nbsp;</li>
			<li>&nbsp;'._('Cités').'&nbsp;</li>
			<li>&nbsp;'._('Héros').'&nbsp;</li>
			<li>&nbsp;'._('Honneur').'&nbsp;</li>
		</ul>
		<li>&nbsp;'._('Communauté').'&nbsp;
		<ul class="sub_menu">
			<li>&nbsp;'._('Joueur&nbsp;connectés').'&nbsp;</li>
			<li>&nbsp;'._('Amis').'&nbsp;</li>
			<li>&nbsp;<a href="'.FORUM_URL.'">'._('Forum').'</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('teamspeak').'">'._('Teamspeak').'</a>&nbsp;</li>
			<li>&nbsp;'._('Sondages').'&nbsp;</li>
			<li>&nbsp;'._('Chat').'&nbsp;</li>
		</ul>
		<li>&nbsp;<a href="'.WIKI_URL.'">'._('Aide').'</a>&nbsp;</li>
		<li>&nbsp;'._('Contact').'&nbsp;</li>
		<li>&nbsp;'._('Deconnexion').'&nbsp;</li>
</ul>
</div>
</section>
<section id="header_ban">
Ellàs War
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
	case 'armee':
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
	
	case 'informationspersonnelles':
	case 'bibliotheque':
	case 'pause':
	case 'adressemail':
	case 'motdepasse':
	
	break;	
	
default: echo $page; break;
}
echo '
</section>
<section id="inside_co">
';

?>