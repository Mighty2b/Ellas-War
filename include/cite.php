<?php

if(empty($_GET['page'])) {
	redirect(SITE_URL.'/'._('cite'));
}

include('donnees/batiments.php');
include('donnees/unites.php');
include('donnees/donnees.php');

$constructions = $paquet->get_infoj('liste_batiments');
$liste_unites  = $paquet->get_infoj('liste_unites');
$temples       = $paquet->get_infoj('temples');
$arbre_mon     = $paquet->get_infoj('arbre');
$liste_autels  = $paquet->get_infoj('liste_autels');

$dernieres_news  = $paquet->get_answer('get_news')->{1};
$tikets          = $paquet->get_answer('nb_tickets')->{1};
$btn             = $paquet->get_answer('info_btn')->{2};
$bonus           = $paquet->get_infoj('bonus');
$oracle          = $paquet->get_answer('info_oracle')->{2};
$dernieres_breves= $paquet->get_answer('get_breves')->{1};
$batis = array(0,0,0,0);
$units = array(0,0,0,0);
$attaque = 0;
$defense = 0;
$points_arbre = 0;
$points_dispo = $paquet->get_answer('arbredesdieux')->{1};
$niveaux_autels = 0;
$niveaux_arbres = 0;
$archives = $paquet->get_answer('list_archives')->{1};
$liste    = $paquet->get_answer('get_mes_filleuls_actifs')->{1};
$points_hf = 0;
$points_tf = 0;

$liste_hf = $paquet->get_answer('get_hf')->{1};

if(!empty($liste_hf)) {
	foreach($liste_hf as $hf) {
		if($hf->type == 7) {
			$points_tf++;
		}
		else {
			$points_hf++;
		}
	}
}

$defense_tours = 0;

if(!empty($constructions->tourguet)) {
	$defense_tours += $constructions->tourguet->nb;
}

if(!empty($constructions->tourobs)) {
	$defense_tours += $constructions->tourobs->nb;
}

if(!empty($constructions->tourgarde)) {
	$defense_tours += $constructions->tourgarde->nb;
}

if(!empty($constructions->tourmir)) {
	$defense_tours += $constructions->tourmir->nb;
}

foreach($batiments as $bat => $details) {
	if(!empty($constructions->$bat)) {
		$batis[$details['aff']-1] += $constructions->$bat->nb;
	}
}

foreach($unites as $bat => $details) {
	if(!empty($liste_unites->$bat)) {
		$units[$details['aff']-1] += $liste_unites->$bat->nb;
		$attaque += $liste_unites->$bat->attaque*$liste_unites->$bat->nb;
		$defense += $liste_unites->$bat->defense*$liste_unites->$bat->nb;
	}
}

foreach($arbre_mon as $d) {
	$points_arbre += $d;
}

if(!empty($liste_autels)) {
	$niveaux_autels += $liste_autels->{'unite_myth'};
	$niveaux_autels += $liste_autels->{'maison'};
	$niveaux_autels += $liste_autels->{'lion'};
	$niveaux_autels += $liste_autels->{'baisse_terrain'};
	$niveaux_autels += $liste_autels->{'unite'};
	$niveaux_autels += $liste_autels->{'attirance_aphrodite'};
	
	$niveaux_arbres += $liste_autels->{'sacrifice_hera'};
	$niveaux_arbres += $liste_autels->{'defense_gaia'};
	$niveaux_arbres += $liste_autels->{'strategie_hippodamos'};
	$niveaux_arbres += $liste_autels->{'sauvegarde_ombre'};
}

echo '
<div id="info_cite_gauche">
<div class="cadre_info">
	<div class="cadre_info_haut"></div>
	<div class="cadre_info_centre"><div class="cadre_info_interieur" id="cadre_info_cite">
	<div class="ligne centrer"><a href="'._('constructions').'" class="titre">'._('Cité').'</a></div>
	<div class="ligne"><a class="mtitre" href="'._('constructions').'">'._('Bâtiments').'</a></div>
	<div class="ligne">
		<table width="100%" class="none">
		<thead></thead>
		<tfoot></tfoot>
		<tbody>
		<tr>
			<td width="50%"><a href="'._('construire').'-1"><b>'._('Battage de la monnaie').' :</b> '.nbf($constructions->atelierf->nb).'</a></td> 
			<td width="50%"><a href="'._('construire').'-1"><b>'._('Production').' : </b> '.nbf($batis[0]-$constructions->atelierf->nb).'</a></td>
		</tr>
		<tr>
			<td><a href="'._('construire').'-2"><b>'._('Militaire').' : </b> '.nbf($batis[1]-$units[3]).'</a></td>
			<td><a href="'._('construire').'-3"><b>'._('Logement').' : </b> '.nbf($batis[2]).'</a></td>
		</tr>
		<tr>
			<td><a href="'._('engager').'-4"><b>'._('Tours').' : </b> '.nbf($units[3]).'</a></td>
			<td>';
			if($units[3] > 0) {
				echo '<a href="'._('passerenrevue').'"><b>'._('Défense').'</b> : '.nbf($defense_tours). ' '.img('images/attaques/bouclier.png', _('défense'));
			}
			else {
				echo '<a href="'._('construire').'-4"><b>'._('Autre').' : </b> '.nbf($batis[3]);
			} 
echo '</a></td>
		</tr>
		</tbody>
		</table>
		<br/>
	</div>
	<div class="ligne">
	<a class="mtitre" href="'._('passerenrevue').'">'._('Unités').'</a>
	</div>
	<div class="ligne">
		<table width="100%" class="none">
		<tr>
			<td width="50%"><a href="'._('engager').'"><b>'._('Humaines').' :</b> '.nbf($units[0]+$units[1]).'</a></td>
			<td width="50%"><a href="'._('engager').'-3"><b>'._('Mythologiques').' :</b> '.nbf($units[2]).'</a></td>
		</tr>
		<tr>
			<td><a href="'._('passerenrevue').'"><b>'._('Attaque').' :</b> '.nbf($attaque).' '.img('images/attaques/dague.png', _('attaque')).'</a></td>
			<td><a href="'._('passerenrevue').'"><b>'._('Défense').' :</b> '.nbf($defense). ' '.img('images/attaques/bouclier.png', _('défense')).'</a></td>
		</tr>
		</table>
		<br/>
	</div>
	<div class="ligne">
	<a href="';

if($paquet->get_infoj('lvl') == 0) {
	echo _('Prieres');
}
elseif(sizeof($temples) >= 4) {
	echo _('AutelDesDieux');
}
else {
	echo _('Temples');
}

echo '" class="mtitre">'._('Mythologie').'</a></div>
	<div class="ligne">';

if(sizeof($temples) > 0) {
	echo '<table width="100%" class="none">
	<tr>
		<td width="50%" valign="top">';
	
	if(in_array('apollon', $temples)) {
		echo '<a href="'._('temples').'-'._('apollon').'">'.$temples_donnees['apollon']['nom'].'</a><br/>';
	}
	
	if(in_array('demeter', $temples)) {
		echo '<a href="'._('temples').'-'._('demeter').'">'.$temples_donnees['demeter']['nom'].
		' ('.nbf($paquet->get_infoj('furie')).' <img height=\'10px\' src=\'images/attaques/vignette102.gif\' alt="'._('Furies').'" title="'._('Furies').'" />)</a><br/>';
	}
	
	if(in_array('hermes', $temples)) {
		echo '<a href="'._('temples').'-'._('hermes').'">'.$temples_donnees['hermes']['nom'].'</a><br/>';
	}
	echo '</td><td width="50%" valign="top">';
	if(in_array('ares', $temples)) {
		echo '<a href="'._('temples').'-'._('ares').'">'.$temples_donnees['ares']['nom'].'</a><br/>';
	}
	
	if(in_array('athena', $temples)) {
		echo '<a href="'._('temples').'-'._('athena').'">'.$temples_donnees['athena']['nom'].'</a><br/>';
	}
	
	echo '</td></tr>
	<tr><td valign="top">';
		
	if(in_array('artemis', $temples)) {
		echo '<a href="'._('temples').'-'._('artemis').'">'.$temples_donnees['artemis']['nom'].'</a><br/>';
	}

	if(in_array('dionysos', $temples)) {
		echo '<a href="'._('temples').'-'._('dionysos').'">'.$temples_donnees['dionysos']['nom'].'</a><br/>';
	}
	
	if(in_array('hephaistos', $temples)) {
		echo '<a href="'._('temples').'-'._('hephaistos').'">'.$temples_donnees['hephaistos']['nom'].'</a><br/>';
	}
	echo '</td><td valign="top">';
	if(in_array('zeus', $temples)) {
		echo '<a href="'._('temples').'-'._('zeus').'">'.$temples_donnees['zeus']['nom'].
		' ('.nbf($paquet->get_infoj('foudre')).' <img height=\'10px\' src=\'images/attaques/zeus.gif\' alt="'._('Foudres').'" title="'._('Foudres').'" />)</a><br/>';
	}
	
	if(in_array('poseidon', $temples)) {
		echo '<a href="'._('temples').'-'._('poseidon').'">'.$temples_donnees['poseidon']['nom'].'</a><br/>';
	}
	
	if(in_array('hades', $temples)) {
		echo '<a href="'._('temples').'-'._('hades').'">'.$temples_donnees['hades']['nom'].'</a><br/>';
	}
	echo '</td></tr></table>';
}

	echo '<table width="100%" class="none">
	<tr>
	<td>
	<a href="'._('arbredesdieux').'"><b>'._('Arbre des dieux').' :</b> '.$points_arbre.' '._('points').' ';
	if($points_dispo > 0) {
		if($points_dispo > 1) {
			echo ' <span class="ligne90">('.$points_dispo.' '._('disponibles').')</span>';
		}
		else {
			echo ' <span class="ligne90">('.$points_dispo.' '._('disponible').')</span>';
		}
	}
	
	$nb_bonus = sizeof($paquet->get_infoj('bonus_connexion'));
	
	echo '</a></td><td>
	<a href="'._('bonus').'"><b>'._('Bonus').' :</b>  ';
	
	if($nb_bonus >= 3) {
		echo '<span class="erreur">'.$nb_bonus.'</span>';
	}
	else {
		echo $nb_bonus;
	}
	
	echo '</a>
	</td></tr>';
	if($paquet->get_infoj('lvl') >= 10) {
		echo '<tr>
		<td width="50%"><a href="'._('auteldesdieux').'"><b>'._('Autels des dieux').' : </b> '.$niveaux_autels.' '.($niveaux_autels>1?(_('niveaux')):(_('niveau'))).'</a></td>
		<td width="50%"><a href="'._('statues').'"><b>'._('Statues').' :</b> '.$niveaux_arbres.' '.($niveaux_arbres>1?(_('ornements')):(_('ornement'))).'</a></td>
		</tr>';
	}
	
	echo '<tr>
	<td><a href="'._('succes').'"><b>'._('Points de succès').' :</b> '.$points_hf.'</a>
	</td>
	<td><a href="'._('succes').'-7"><b>'._('Tours de force').' :</b> '.$points_tf.'</a>
	</td>';
	
	echo '</table>
	<br/>
	</div>
	<div class="ligne mtitre">'._('En cours').'</div>
	<div class="ligne">
	<a href="'._('faveurs').'"><b>'._('Appui d\'Hébé').' : </b>';

	if(!empty($bonus->tresor) && $bonus->tresor > $paquet->get_infoj('timestamp')) {
		echo _('Actif jusqu\'au').' '.display_date($bonus->tresor,2);
	}
	else {
		echo ' '._('Inactif');
	}
	
	echo '</a>
	<br/>
	<a href="'._('faveurs').'"><b>'._('Attaques bonus').' : </b>'.
	$bonus->attaque.'</a>
	<br/>
	<a href="'._('faveurs').'"><b>'._('Appui d\'Éros').' : </b>';
	
	if(!empty($bonus->xp) && $bonus->xp > $paquet->get_infoj('timestamp')) {
		echo _('Actif jusqu\'au').' '.display_date($bonus->xp,2);
	}
	else {
		echo ' '._('Inactif');
	}
	
	echo '</a>
	<br/>
	<a href="'._('faveurs').'"><b>'._('Appui d\'Hermès').' : </b>';
	
	if(!empty($bonus->commerce) && $bonus->commerce > $paquet->get_infoj('timestamp')) {
		echo _('Actif jusqu\'au').' '.display_date($bonus->commerce,2);
	}
	else {
		echo ' '._('Inactif');
	}
	
	echo '</a>
	<br/>
	<a href="'._('faveurs').'"><b>'._('Appui d\'Hélios').' : </b>';
	
	if(!empty($bonus->ress) && $bonus->ress > $paquet->get_infoj('timestamp')) {
		echo _('Actif jusqu\'au').' '.display_date($bonus->ress,2);
	}
	else {
		echo ' '._('Inactif');
	}
	
	echo '</a>
	<br/><a href="'._('licences').'"><b>'._('Licence de grand commerçant').' : </b>';
	
	if(!empty($bonus->licence) && $bonus->licence > $paquet->get_infoj('timestamp')) {
		echo _('Actif jusqu\'au').' '.display_date($bonus->licence,2);
	}
	else {
		echo ' '._('Inactif');
	}
	
	echo '</a>
	</div>
	<div class="clear"></div>
	</div></div>
	<div class="cadre_info_bas"></div>
</div>

<div class="cadre_info">
	<div class="cadre_info_haut"></div>
	<div class="cadre_info_centre"><div class="cadre_info_interieur" id="cadre_info_oracle">
	<div class="ligne centrer"><a href="'._('oracle').'" class="titre">'.ucfirst(_('oracle')).'</a></div>
	<div class="ligne centrer">

	<a href="'._('nouveaumessage').'-'.$oracle->id.'" 
	   class="gras">'._('Contacter').' '.$oracle->login.' '._('l\'Oracle').'</a>

	</div>
	</div></div>
	<div class="cadre_info_bas"></div>
</div>

<div class="cadre_info">
	<div class="cadre_info_haut"></div>
	<div class="cadre_info_centre"><div class="cadre_info_interieur" id="cadre_info_filleuls">
	<div class="ligne centrer"><a href="'._('parrainage').'" class="titre">'._('Filleuls').'</a></div>
	<div class="ligne">';
	
if(sizeof($liste) > 0) {
	foreach($liste as $do)	{
		if(!empty($do->timestamp)) {
			$image='<img src="images/utils/mb_connecter.png" alt="'._('Joueur Connecté').'" />';
		}
		else {
			$image='<img src="images/utils/mb_deconnecter.png" alt="'._('Joueur Déconnecté').'" />';
		}
		
		echo $image.' &nbsp;  <a href=\''._('profilsjoueur').'-'.$do->id.'\'>'.$do->login.'</a><br/>';
	}
}
elseif($paquet->get_infoj('nb_fil') == 0) {
	echo '<div class="centrer"><br/><b>'._('Vous n\'avez actuellement aucun filleul').'</b><br/></div>';
}

echo '
	</div>
	<div class="centrer">
		<a href="'._('parrainage').'"
		   class="erreur">'._('Invitez vos amis et gagnez des faveurs !').'</a><br/>
	</div>
	</div></div>
	<div class="cadre_info_bas"></div>
</div>

</div><div id="info_cite_droite">

<div class="cadre_info">
	<div class="cadre_info_haut"></div>
	<div class="cadre_info_centre"><div class="cadre_info_interieur" id="cadre_info_actu">
	<div class="ligne centrer"><a href="'._('actualites').'" class="titre">'._('Actualités').'</a></div>
	<div class="ligne">';

if(!empty($dernieres_news)) {
	foreach($dernieres_news as $news) {
		echo '<div class="news"><a href="'.$news->lien.'" 
		                           class="titre_news">'.$news->titre.'</a>, <i>'.display_date($news->temps).'</i></div>';
	}
}

	echo '
	</div>
	</div></div>
	<div class="cadre_info_bas"></div>
</div>

<div class="cadre_info">
	<div class="cadre_info_haut"></div>
	<div class="cadre_info_centre"><div class="cadre_info_interieur" id="cadre_info_breves">
	<div class="ligne centrer"><a href="'._('breves').'" class="titre">'._('Brèves').'</a></div>
	<div class="ligne">';

if(!empty($dernieres_breves)) {
	foreach($dernieres_breves as $breves) {
		echo '<div class="news"><a href="'.$breves->lien.'" class="titre_news">'.$breves->titre.'</a>, <i>'.display_date($breves->temps).'</i></div>';
	}
}

echo '
	</div>
	</div></div>
	<div class="cadre_info_bas"></div>
</div>

<div class="cadre_info">
	<div class="cadre_info_haut"></div>
	<div class="cadre_info_centre"><div class="cadre_info_interieur" id="cadre_info_archives">
	<div class="ligne centrer"><a href="'._('archives').'" class="titre">'._('Archives').'</a></div>
	<div class="ligne">';
	
	if(!empty($archives)) {
		foreach($archives as $details) {
			echo '<div class="news"><a href="'._('archives').'&ouvrir='.$details->id.'"
			                           class="titre_news'.(empty($details->lu)?' dore':'').'">'.$details->titre.'</a></div>';
		}
	}
	
	echo '
	</div>	
	</div></div>
	<div class="cadre_info_bas"></div>
</div>

<div class="cadre_info">
	<div class="cadre_info_haut"></div>
	<div class="cadre_info_centre"><div class="cadre_info_interieur">
	<div class="ligne centrer"><a href="'._('jeux').'" class="titre">'._('Jeux').'</a></div>
	<div class="ligne">
	<table width="100%" class="none">
		<tr>
		<td width="50%">
		<a href="'._('ticket').'" class="mtitre">'._('Tickets à gratter').'</a><br/>
		<a href="'._('ticket').'">';
		if($tikets > 1) {
			echo '<b>'.$tikets.'</b> '._('tickets restant');
		}
		else {
			echo '<b>'.$tikets.'</b> '._('ticket restant');
		}
		echo '</a>';
	if($paquet->get_infoj('lvl') > 0) {
	echo '
		</td>
		<td width="50%"><a href="'._('loto').'" class="mtitre">'._('Jouez au loto').'</a><br/>
		<a href="'._('loto').'">'._('Un ticket gratuit par semaine !').'</a></td>
		</tr>
		<tr>
		<td>';
		if($paquet->get_infoj('lvl') > 1 or sizeof($btn) > 0) {
			echo '<a href="'._('bataillesnavales').'" class="mtitre">'._('Batailles navales').'</a><br/>';
			if(sizeof($btn) > 0) {
				foreach($btn as $do) {
					if(empty($do->titre)) {
						$do->titre=_('Partie publique');
					}
				
					if(($do->places == 4) && ($do->temps < $paquet->get_infoj('timestamp'))) {
						$do->titre='<a href="'._('partie').'-'.$do->id.'">'.$do->titre.'</a>';
					}
				
					echo $do->titre.'<br/>';
				}
			}
		}
	}
	echo '</td>
	<td><a href="'._('carremagique').'" class="mtitre">'._('Carré magique').'</a><br/>
	<a href="'._('carremagique').'">'._('Aidez le jeu et remportez des faveurs !').'</a>
	</td>
	</tr>
	</table>
	</div>
	<div class="clear"></div>
	</div></div>
	<div class="cadre_info_bas"></div>
</div>
</div>';

?>