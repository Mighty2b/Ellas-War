<?php

$totalDesMessages = $paquet->get_answer('liste_attaque')->{2};
$liste_guerres    = $paquet->get_answer('liste_attaque')->{3};
$liste            = $paquet->get_answer('liste_attaque')->{1};

$temples = $paquet->get_infoj('temples');

// On calcule le nombre de pages à créer
$nombreDePages  = ceil($totalDesMessages / 20);

$i=($page_num-1)*50+1;

$paquet->is_active_bonus_xp();

$writeniveau='<a href="'._('attaquer').'-'.$page_num.'-niveau-'.
                       $recupcible.constr_get('recherche', $recherche).'"
                 class="titre_tab">'._('Niveau').'</a>';
$writevictoire='<a href="'._('attaquer').'-'.$page_num.'-victoire-'.
                   $recupcible.constr_get('recherche', $recherche).'"
		               class="titre_tab">'._('Victoire').'</a>';
$writedefaite='<a href="'._('attaquer').'-'.$page_num.'-defaite-'.
                        $recupcible.constr_get('recherche', $recherche).'"
                  class="titre_tab">'._('Défaite').'</a>';
$writeterrain='<a href="'._('attaquer').'-'.$page_num.'-terrain-'.
                  $recupcible.constr_get('recherche', $recherche).'" 
                  class="titre_tab">'._('Terrain').'</a>';
$writepseudo='<a href="'._('attaquer').'-'.$page_num.'-login-'.
                       $recupcible.constr_get('recherche', $recherche).'"
                 class="titre_tab">'._('Pseudo').'</a>';
$writexp='<a href="'._('attaquer').'-'.$page_num.'-xp-'.
                   $recupcible.constr_get('recherche', $recherche).'" 
             class="titre_tab">'._('XP').'</a>';

if($par == 'niveau') {
	$writeniveau='<font color=\'#77461B\'>'._('Niveau').'</font>';
}
elseif($par == 'victoire') {
	$writevictoire='<font color=\'#77461B\'>'._('Victoire').'</font>';
}
elseif($par == 'defaite') {
	$writedefaite='<font color=\'#77461B\'>'._('Défaite').'</font>';
}
elseif($par == 'terrain') {
	$writeterrain='<font color=\'#77461B\'>'._('Terrain').'</font>';
}
elseif($par == 'login') {
	$writepseudo='<font color=\'#77461B\'>'._('Pseudo').'</font>';
}
elseif($par == 'xp') {
	$writexp='<font color=\'#77461B\'>'._('XP').'</font>';
}
else {
	$par = 'niveau';
	$writeniveau='<font color=\'#77461B\'>'._('Niveau').'</font>';
}

$nb_ate = ($paquet->get_infoj('lvl')-1)*6;

$num = $page_num - 3;
$numl = $page_num + 2;

if($num < 1) {
	$num = 1;
}

echo '
<div id="cadre_milieu_petit">
	<div id="cadre_haut_petit"><img src="images/attaques/cross.png"
	                                alt="'._('Fermer').'" 
	                                title="'._('Fermer').'" 
	                                class="cursor" 
	                                style="margin-top:10px;margin-right:10px;" 
	                                onclick="javascript:fermer_cadre();"/></div>
	<div id="cadre_centre_petit">
	
	</div>
	<div id="cadre_bas_petit"></div>
</div>';

if($nombreDePages > 1) {
	if($numl > $nombreDePages) {
		$numl = $nombreDePages;
	}
	
	echo '<div class="ligne centrer">';
	
	if($num > 1) {
		echo '<a href="'._('attaquer').'-1-'.$par.
		               constr_get('recherche', $recherche).'">1</a>  ... ';
	}
	
	if(empty($recupcible)) {
		for ($i = $num ; $i <= $numl ; $i++) {
			if($page_num == $i) {
				echo '<b>'.$i.'</b> ';
			}
			else {
				echo '<a href="'._('attaquer').'-' . $i . '-'.$par.
				               constr_get('recherche', $recherche).'">' . $i . '</a> ';
			}
		}
		
		if($numl < $nombreDePages) {
			echo '... <a href="'._('attaquer').'-'.$nombreDePages.'-'.$par.
			                   constr_get('recherche', $recherche).'">'.$nombreDePages.'</a> ';
		}
	}
	else {
		for ($i = $num ; $i <= $numl ; $i++) {
			if($page_num == $i) {
				echo '<b>'.$i.'</b> ';
			}
			else {
				echo '<a href="'._('attaquer').'-' . $i . '-'.$par.'-'.$recupcible.
				               constr_get('recherche', $recherche).'">' . $i . '</a> ';
			}
		}

		if($numl < $nombreDePages) {
			echo '... <a href="'._('attaquer').'-'.$nombreDePages.'-'.$par.'-'.$recupcible . 
			                   constr_get('recherche', $recherche).'">'.$nombreDePages.'</a> ';
		}
	}
	echo '</div>';
}

echo '<div class="ligne centrer cadre">
<form action="#" method="post">
<input type="hidden" name="page" value="liste" />
<input type="text"
       name="recherche" 
       class="form_retirer cadre" 
       style="margin-top:3px;margin-left:48px;margin-right:5px;" 
       required="required" /> <div class="bouton_classique cadre"><input type="submit" 
                                                                         value="'._('Rechercher').'" 
                                                                         name="rechercher" /></div>
</form>
	<div style="float:right;position:relative;margin-right:50px;">
		<a href="'._('diamant').'"><img src="images/attaques/diamant.png"
		                       alt="'._('Diamant des dieux').'" 
		                       title="'._('Diamant des dieux').'" /></a>
	</div>
</div>';

$paquet->error('liste_attaque',6);

if(!empty($liste_guerres) && sizeof($liste_guerres) > 0) {
	echo '<div class="ligne centrer cadre">';
	if(sizeof($liste_guerres) > 1) {
		echo '<b>'._('Guerres en cours').' :</b> ';
	}
	else {
		echo '<b>'._('Guerre en cours').' :</b> ';
	}
	
	foreach($liste_guerres as $all) {
		echo '<a href="'._('attaquer').'-1-niveau-'.$all->id.
		               constr_get('recherche', $recherche).'">'.$all->nom.'</a> ';
	}
	echo '</div>';
}

echo '<br/>';

if(empty($liste) or sizeof($liste) == 0) {
	echo '<br/><div class="centrer"><br/><br/><br/><b>'._(
       'Votre liste d\'attaque est vide').'</b></div><br/>';
}
else {
	$i=0;
	echo '<br/><table>
	<thead><tr>
		<td>&nbsp;'.$writepseudo.'&nbsp;</td>
		<td>&nbsp;'.$writeniveau.'&nbsp;</td> 
		<td>&nbsp;'.$writevictoire.'&nbsp;</td> 
		<td>&nbsp;'.$writedefaite.'&nbsp;</td> 
		<td>&nbsp;'.$writexp.'&nbsp;</td> 
		<td>&nbsp;'.$writeterrain.'&nbsp;</td> 
		<td>&nbsp;'._('Alliance').'&nbsp;</td>
		<td>&nbsp;&nbsp;</td></tr></thead>
	<tfoot></tfoot>
	<tbody>';
		
	foreach($liste as $donneees) {
		if($donneees->co) {
			$image='<img src="images/utils/mb_connecter.png"
			             alt="'._('Joueur Connecté').'" 
			             title="'._('Joueur Connecté').'"/>';
		}
		else {
			$image='<img src="images/utils/mb_deconnecter.png" 
			             alt="'._('Joueur Déconnecté').'" 
			             title="'._('Joueur Déconnecté').'" />';
		}

		echo '<tr>';
		if($donneees->statu == 4) {
			echo '<td align=\'left\'>&nbsp;'.$image.' <a href="'._('profilsjoueur').'-'.$donneees->id.'"><font color=\'brown\'>'.ucfirst($donneees->login).'</font></a>&nbsp;</td>
								<td class="centrer">&nbsp;'.($donneees->lvl).'&nbsp;</td>
								<td class="centrer">&nbsp;'.nbf($donneees->victoires).'&nbsp;</td>
								<td class="centrer">&nbsp;'.$donneees->defaites.'&nbsp;</td>
								<td class="centrer">&nbsp;'.nbf($donneees->points).'&nbsp;</td>
								<td class="centrer">&nbsp;'.nbf($donneees->terrain).'&nbsp;</td>
								<td align=\'left\'>&nbsp;';
		}
		else {
			echo '<td align=\'left\'>&nbsp;'.$image.' <a href="'._('profilsjoueur').'-'.$donneees->id.'">'.ucfirst($donneees->login).'</a>&nbsp;</td>
								<td class="centrer">&nbsp;'.($donneees->lvl).'&nbsp;</td>
								<td class="centrer">&nbsp;'.nbf($donneees->victoires).'&nbsp;</td>
								<td class="centrer">&nbsp;'.$donneees->defaites.'&nbsp;</td>
								<td class="centrer">&nbsp;'.nbf($donneees->points).'&nbsp;</td>
								<td class="centrer">&nbsp;'.nbf($donneees->terrain).'&nbsp;</td>
								<td align=\'left\'>&nbsp;';
		}

		if(empty($donneees->nom)) {
			echo '<a href="'._('attaquer').'-1-niveau-1'.constr_get('recherche', $recherche).'">'._('Aucune').'</a>';
		}
		else {
			echo ' <a href="'._('attaquer').'-1-niveau-'.$donneees->alliance.constr_get('recherche', $recherche).'">'.stripslashes($donneees->nom).'</a> ';
		}
		echo '&nbsp;</td><td class="gauche">&nbsp;';

		if(empty($donneees->times) or ($donneees->times < time())) {
			if(in_array('apollon', $temples)) {
				echo ' <img height=\'25px\'
				            src=\'images/attaques/eyes.gif\'
				            alt="'._('Espionner').'" 
				            title="'._('Espionner').'" 
				            class="cursor" 
				            onclick="javascript:observer('.$donneees->id.');"/> ';
			}
			elseif(in_array('hades', $temples)) {
				echo ' <img height=\'25px\'
				            src=\'images/attaques/hades.gif\'
				            alt="'._('Visiter').'" 
				            title="'._('Visiter').'" 
				            class="cursor" 
				            onclick="javascript:visiter('.$donneees->id.');"/> ';
			}
			echo ' <img src=\'images/attaques/xeyes.png\' 
			            alt="'._('Espionner').'" 
			            title="'._('Espionner').'" 
			            class="cursor" 
			            onclick="javascript:espionner('.$donneees->id.');"/> ';
			if(!empty($donneees->furie)) {
				echo ' <img src=\'images/attaques/vignette102.gif\'
				            alt=\'Déclencher\'
				            title=\'Déclencher\'
				            height=\'32px\'
				            class="cursor" 
				            onclick="if(window.confirm(\''._('Envoyer la furie de Demeter ?').'\')) { furie('.$donneees->id.'); } else { return false; }" 
				            id="bouton_furie_'.$donneees->id.'" /> ';
			}
		}

		if($donneees->lvl <= 2) {
			$max = 1;
		}
		elseif($donneees->lvl < 9) {
			$max = $donneees->lvl - 1;
		}
		else {
			$max=8;
		}

		if($donneees->possible) {
			echo ' <img height=\'25px\'
			            src=\'images/attaques/epee_s.gif\'
			            alt="'._('Attaquer').'" 
			            title="'._('Attaquer').'" 
			            class="cursor" 
			            onclick="javascript:preparer('.$donneees->id.');"
			            id="bouton_attaquer_'.$donneees->id.'" /> ';
		}
		echo '</td></tr>';
	}
	echo '</tbody></table>';
	$i++;
}

if($nombreDePages > 1) {
	echo '<div class="centrer"><br/>Page : ';
	if(empty($recupcible)) {
		for ($i = 1 ; $i <= $nombreDePages ; $i++) {
			if(($page_num==$i)) {
				echo '<font color=\'#77461B\'>' . $i . '</font> ';
			}
			else {
				echo '<a href="'._('attaquer').'-' . $i . '-'.$par.constr_get('recherche', $recherche).'">' . $i . '</a> ';
			}
		}
	}
	else {
		for ($i = 1 ; $i <= $nombreDePages ; $i++) {
			if(($page_num==$i)) {
				echo '<font color=\'#77461B\'>' . $i . '</font> ';
			}
			else {
				echo '<a href="'._('attaquer').'-' . $i.'-'.$par . '-'.$recupcible.constr_get('recherche', $recherche).'">' . $i . '</a> ';
			}
		}
	}
	echo '</div>';
}

echo '<script type="text/javascript">
function observer(id) {
   $.ajax({
     type: "GET",
     url: "form/observer.php",
     data: "ciblej="+id,
     success: function(msg){
       $("#cadre_centre_petit").html(msg);
       $("#cadre_milieu_petit").show("slow");
     }
   });
}

function espionner(id) {
   $.ajax({
     type: "GET",
     url: "form/form_espionner.php",
     data: "ciblej="+id,
     success: function(msg){
       $("#cadre_centre_petit").html(msg);
       $("#cadre_milieu_petit").show("slow");
     }
   });
}

function visiter(id) {
   $.ajax({
     type: "GET",
     url: "form/visiter.php",
     data: "ciblej="+id,
     success: function(msg){
       $("#cadre_centre_petit").html(msg);
       $("#cadre_milieu_petit").show("slow");
     }
   });
}

function furie(id) {
   $.ajax({
     type: "GET",
     url: "form/furie.php",
     data: "ciblej="+id,
     success: function(msg){
       $("#cadre_centre_petit").html(msg);
       $("#cadre_milieu_petit").show("slow");
     }
   });
}

function foudre(id) {
   $.ajax({
     type: "GET",
     url: "form/foudre.php",
     data: "ciblej="+id,
     success: function(msg){
       $("#cadre_centre_petit").html(msg);
       $("#cadre_milieu_petit").show("slow");
     }
   });
}

function preparer(id) {
   $.ajax({
     type: "GET",
     url: "form/form_preparer.php",
     data: "ciblej="+id,
     success: function(msg){
       $("#cadre_centre_petit").html(msg);
       $("#cadre_milieu_petit").show("slow");
     }
   });
}

function attaquer(id) {
   $("#bouton_attaquer").hide();
   $("#encours").html(\''._('<b>Attaque en cours</b>').'\');
   $.ajax({
     type: "GET",
     url: "form/form_attaquer.php",
     data: "ciblej="+id,
     success: function(msg){
       $("#cadre_centre_petit").html(msg);
       $("#cadre_milieu_petit").show("slow");
     }
   });
}

function fermer_cadre() {
  $("#cadre_milieu_petit").hide("slow");
}
</script>';

?>