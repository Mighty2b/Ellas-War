<?php

$nouveaux_mp = $paquet->get_answer('messagerie_nonlus')->{1};

echo '
<section id="header">
<div id="header2">
<ul class="dropdown">
		<li>&nbsp;<a href="'._('informationspersonnelles').'">'._('Compte').'</a>&nbsp;
		<ul class="sub_menu">
			<li>&nbsp;<a href="'._('informationspersonnelles').'">Informations personnelles</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('bibliotheque').'">Bibliothéque</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('pause').'">Pause</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('adressemail').'">E-mail</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('motdepasse').'">Mot de passe</a>&nbsp;</li>
		</ul>
		</li>
		<li>&nbsp;<a href="'._('messagerie').'" ';
			
			if($nouveaux_mp > 0) {
				echo 'style="text-shadow: 0px 0px 8px rgba(255, 140, 0, 0.75);" '.
				     'title="'._('Messagerie').' ('.$nouveaux_mp.')"';
			}
echo '>'._('Messagerie');

if($nouveaux_mp > 0) {
	echo '&nbsp;('.$nouveaux_mp.')';
}

echo '</a>&nbsp;
		<ul class="sub_menu">
			<li>&nbsp;<a href="'._('nouveaumessage').'">'._('Nouveau message').'</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('messagerie').'" ';
			
			if($nouveaux_mp > 0) {
				echo 'style="text-shadow: 0px 0px 8px rgba(255, 140, 0, 0.75);" '.
				     'title="'._('Messagerie').' ('.$nouveaux_mp.')"';
			}
echo '>'._('Boite de reception').'</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('boiteenvoie').'">'._('Boite d\'envoi').'</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('archivesdemessagerie').'">'._('Archives').'</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('listenoire').'">'._('Liste noire').'</a>&nbsp;</li>
		</ul>
		</li>
		<li>&nbsp;<a href="'._('parrainage').'">'.ucfirst(_('parrainage')).'</a>&nbsp;
		<ul class="sub_menu">
			<li>&nbsp;<a href="'._('filleuls').'">'.ucfirst(_('filleuls')).'</a>&nbsp;</li>
			<!--<li>&nbsp;<a href="'._('soutien').'">'.ucfirst(_('soutien')).'</a>&nbsp;</li>-->
		</ul></li>
		<li>&nbsp;<a href="'._('classements').'">'._('Classements').'</a>&nbsp;
		<ul class="sub_menu">
			<li>&nbsp;<a href="'._('classementdesalliances').'">'._('Alliances').'</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('classementdesbtn').'">'._('Batailles navales').'</a>&nbsp;</li>
			<li>&nbsp;<a href="classementdesjoueurs">'._('Cités').'</a>&nbsp;</li>
			<li>&nbsp;<a>'._('Héros').'</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('classementghonneur').'">'._('Honneur').'</a>&nbsp;</li>
		</ul>
		<li>&nbsp;<a href="'._('communaute').'">'._('Communauté').'</a>&nbsp;
		<ul class="sub_menu">
			<li>&nbsp;<a href="'._('joueursconnectes').'">'._('Joueur&nbsp;connectés').'</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('amis').'">'.ucfirst(_('amis')).'</a>&nbsp;</li>
			<li>&nbsp;<a href="'.FORUM_URL.'"
			             target="_blank">'._('Forum').'</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('teamspeak').'">'.ucfirst(_('teamspeak')).'</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('sondages').'">'.ucfirst(_('sondages')).'</a>&nbsp;</li>
			<li>&nbsp;<a href="'._('chat').'">'.ucfirst(_('chat')).'</a>&nbsp;</li>
		</ul>
		<li>&nbsp;<a href="'.WIKI_URL.'"
		             target="_blank">'._('Aide').'</a>&nbsp;</li>
		<li>&nbsp;<a href="'._('pagecontact').'">'._('Contact').'</a>&nbsp;';/*
		<ul class="sub_menu">
			<li>&nbsp;<a href="'._('archivescontact').'">'._('Archives').'</a>&nbsp;</li>
		</ul>*/
		echo '</li>
		<li>&nbsp;<a href="#" onclick="deco();">'._('Deconnexion').'</a>&nbsp;</li>
</ul>
</div>
</section>
<section id="header_ban">';

echo '<div id="etape" style="display:none">';
	include('include/texte_tuto.php');
echo '</div>';

echo '
</section>
<section id="header_menu">
&nbsp;<a id="menu_cite" href="'._('cite').'"><div class="ssmenu">'._('Cité').'</div></a>&nbsp;
&nbsp;<a id="menu_armee" href="'._('passerenrevue').'"><div class="ssmenu">'._('Armée').'</div></a>&nbsp;
&nbsp;<a id="menu_archives" href="'._('archives').'"';

if($paquet->get_infoj('nb_histo') > 0) {
	echo ' style="text-shadow: 0px 0px 8px rgba(255, 140, 0, 0.75);"
	       title="'.$paquet->get_infoj('nb_histo').' '.
	                _('archives en attente').'"';
}

echo '><div class="ssmenu" >'.ucfirst(_('archives')).'</div></a>&nbsp;
&nbsp;<a id="menu_mythologie" href="';

if($paquet->get_infoj('lvl') <= 1) {
	echo _('arbredesdieux');
}
else {
	echo _('temples');
}

echo '"><div class="ssmenu">'.ucfirst(_('mythologie')).'</div></a>&nbsp;
&nbsp;<a id="menu_heros" href="'._('heros').'"><div class="ssmenu">'._('Héros').'</div></a>&nbsp;
&nbsp;<a id="menu_forum" href="'.FORUM_URL.'" target="_blank"><div class="ssmenu">'.ucfirst(_('forum')).'</div></a>&nbsp;
&nbsp;<a id="menu_missions" href="'._('missions').'"><div class="ssmenu">'.ucfirst(_('missions')).'</div></a>&nbsp;
&nbsp;<a id="menu_alliance" href="';

if(empty($paquet->get_infoj('alliance'))) {
	echo _('lesalliances');
}
else {
	echo _('alliance');
}

echo '"><div class="ssmenu">'.ucfirst(_('alliance')).'</div></a>&nbsp;';

if($paquet->get_infoj('lvl') > 0) {
	echo '&nbsp;<a id="menu_commerce" href="'._('commerce').'"><div class="ssmenu">'._('Marché').'</div></a>&nbsp;';
}

echo '&nbsp;<a id="menu_jeux" href="'._('jeux').'"><div class="ssmenu">'.ucfirst(_('jeux')).'</div></a>&nbsp;
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
	case 'diamant':
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
		echo '<div id="barre_menu_vide"></div>';
	break;

	case 'arbredesdieux':
	case 'mythologie':	
	case 'auteldesdieux':
	case 'temples':
	case 'statues':
	case 'succes':
	case 'prieres':
	case 'modifiertemples':
		echo '
		<div id="barre_menu_mythologie">
			<a id="header_ssmenu_arbredesdieux"
			   href="'._('arbredesdieux').'">'._('Arbre des Dieux').'</a>
			<a id="header_ssmenu_auteldesdieux"
			   href="'._('auteldesdieux').'">'._('Autel des Dieux').'</a>
			<a id="header_ssmenu_temples"
			   href="'._('temples').'">'._('Temples').'</a>
			<a id="header_ssmenu_statues"
			   href="'._('statues').'">'._('Statues').'</a>
			<a id="header_ssmenu_succes"
			   href="'._('succes').'">'._('Succès').'</a>
			<a id="header_ssmenu_prieres"
			   href="'._('prieres').'">'._('Prieres').'</a>		
		</div>';
	break;
	
	case 'heros':
		echo '
		<div id="barre_menu_heros">
		</div>';
	break;
	
	case 'missions':
		echo '<div id="barre_menu_vide"></div>';
	break;
	
	case 'alliance':
	case 'lesalliances':
	case 'creervotrealliance':
	case 'membrealliance':
	case 'profilsalliance':
	case 'postuler':
	case 'profilmonalliance':
	case 'cotisations':
	case 'coffre':
	case 'demande':
	case 'nommer':
	case 'recrutements':
	case 'pactes':
	case 'guerres':
	case 'archives_alliance':
		echo '<div id="barre_menu_vide"></div>';
	break;
	
	case 'commerce':
	case 'donnerunefaveur':
	case 'vendre':
	case 'licences':
	case 'mesventes':
	case 'debarras':
	case 'archivecommerce':
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
	case 'carremagique':
	case 'ticket':
	case 'javelot':
	case 'des':
	case 'loto':
	case 'biges':
	case 'quadriges':
	case 'bataillesnavales':
		echo '<div id="barre_menu_vide"></div>';
	break;
	
	case 'informationspersonnelles':
	case 'bibliotheque':
	case 'pause':
	case 'adressemail':
	case 'motdepasse':
	case 'reset':
		echo '<div id="barre_menu_vide"></div>';
	break;	
	
	case 'nouveaumessage':
	case 'messagerie':
	case 'boiteenvoie':
	case 'archivesdemessagerie':
	case 'listenoire':
	case 'lire':
		echo '<div id="barre_menu_vide"></div>';
	break;
	
	case 'parrainage':
	case 'filleuls':
	case 'soutien':
		echo '<div id="barre_menu_vide"></div>';
	break;
	
	case 'classements':
	case 'honneur':
	case 'classementdesjoueurs':
	case 'classementghonneur':
	case 'classementdesalliances':
	case 'classementdesbtn':
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
	case 'vosobjectifs':
	case 'actualites':
	case 'pagecontact':
	case 'archivescontact':
	case 'profilsjoueur':
	case 'details':
	case 'gestionmeteo':
		echo '<div id="barre_menu_vide"></div>';
	break;
	
	default: echo $page; break;
}
echo '
</div>
<div class="clear"></div>

<div id="inside_co_stat" class="centrer">
	<div id="inside_co_stat_int">';

$alliance     = $paquet->get_infoj('alliance');
if(!empty($alliance)) {
	$nom_alliance = $alliance->nom;
}

echo '
<a href="'._('vosobjectifs').'" 
   class="gras" 
   style="text-decoration:none;">'.$paquet->get_infoj('login')
.' ('.$paquet->get_infoj('lvl').')</a><br/>
<a href="'._('vosobjectifs').'" class="sousligne">'._('Vos objectifs').'</a><br/>
'.(!empty($nom_alliance)?$nom_alliance.
'<br/>':'').
_('Terrain').' : <b>'.nbf($paquet->get_infoj('terrain')).'</b><br/>
'.(($paquet->get_infoj('victoires')>1)?_('Victoires'):_('Victoire')).
' : <b>'.nbf($paquet->get_infoj('victoires')).'</b><br/>
'.(($paquet->get_infoj('defaites')>1)?_('Défaites'):_('Défaite')).' : <b>'.
nbf($paquet->get_infoj('defaites')).'</b><br/>';

if($paquet->get_infoj('lvl') >= 6) {
	echo _('XP').' : <b>'.nbf($paquet->get_infoj('points')).'</b><br/>';
}

if($paquet->get_infoj('lvl') >= 1) {
	echo '<a href="'._('honneur').'" class="sousligne">'._('Honneur').'</a> : ';
	echo '<a href="'._('honneur').'" style="text-decoration:none;"><b>'.
					 nbf($paquet->get_infoj('honneur')).'</b></a>';
}

echo '</div>
</div>

<div id="inside_co_int">
';

?>