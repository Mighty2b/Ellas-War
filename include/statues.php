<?php

$bat = $paquet->get_infoj('liste_batiments');

if(empty($bat -> hall) or ($bat -> hall-> nb == 0)) {
	echo '<div class="erreur"><br/><br/>';
	echo display_error(119);
	echo '</div>';
}
else {

$liste_autels = $paquet->get_infoj('liste_autels');
$conditions   = $paquet->get_answer('conditions_statues')->{1};
$quand_hera   = $paquet->get_answer('conditions_statues')->{2};
$prix_autels  = $paquet->get_answer('conditions_statues')->{3};

$condition_gaia		= $conditions->gaia;
$condition_erebe	= $conditions->erebe;
$condition_hera		= $conditions->hera;
$condition_hippo	= $conditions->hippo;


  $texte_niveau = array(
  _('Durée : 6h, protège des espionnages'),
  _('Durée : 12h, protège des espionnages'),
  _('Durée : 6h, protège d\'Apollon et Hadès'),
  _('Durée : 12h, protège d\'Apollon et Hadès'),
  _('Durée : 6h, protège de Demeter'),
  _('Durée : 12h, protège de Demeter'),
  _('Durée : 6h, protège de Zeus'),
  _('Durée : 12h, protège de Zeus'),
  _('Durée : 6h, protège de tout'),
  _('Durée : 12h, protège de tout'));

  echo '<h1>'._('Statues').'</h1>';

	$paquet->error('orner',1);
	$paquet->error('activer_hera',1);
	$paquet->error('supprimer_statue',1);

  echo '<br/>
  <p align="justify" class="ligne_80 ligne90">'._(
	'Chaque statue vous permettra d\'accéder à de nouveaux '.
  'pouvoirs qui seront plus ou moins puissants selon leurs ornements. '.
  'Les ornements se méritent, vous ne pourrez les faire que lorsque '.
  'le dieu ou héros vous en aura jugé digne. '.
  'Vous pouvez bâtir un maximum de trois statues, vingts ornements '.
  'avec un maximum de dix par statue.').'<br/></p>

  <!-- Gaia -->
  <div class="ligne_80 gauche liste_autels" id="cadre_autel_gaia">
	  <h2>'._('Défense de Gaïa').' '.
	  (($liste_autels->defense_gaia > 0)?'<a href="'._('statues').'-defense_gaia-supprimer"><img src="images/attaques/cross.png" alt="'._('supprimer').'" /></a>':'').'</h2>
	  <div class="ligne">
		  <div class="gauche_autel">
			  <b>'._('Niveau').' :</b> '.$liste_autels->defense_gaia.'
			  <br/>';

			  if($condition_gaia == true) {
				  echo '<b>'._('Prix').' :</b> '.
				  prix_hall($prix_autels->defense_gaia, $liste_autels->defense_gaia).
					'<br/><br/>
			  <div class="ligne centrer"><b><a href="'._('statues').'-defense_gaia">'._('Obtenir').'</a></b></div>';
			  }

	echo '</div>
		  <div class="droite_autel">'._(
			'Gaïa mettra la nature de votre côté et augmentera la défense de '.
			'votre cité.').'
			  <br/><br/>
			  <table class="none">
				  <tr>
					  <td class="gras">'._('Niveau 1').' :&nbsp;</td>
					  <td class="droite">&nbsp;30 '._('Unités').'&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;'._('Niveau 6').' :&nbsp;</td>
					  <td>&nbsp;180 '._('Unités').'&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">'._('Niveau 2').' :&nbsp;</td>
					  <td class="droite">&nbsp;60 '._('Unités').'&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;'._('Niveau 7').' :&nbsp;</td>
					  <td>&nbsp;210 '._('Unités').'&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">'._('Niveau 3').' :&nbsp;</td>
					  <td class="droite">&nbsp;90 '._('Unités').'&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;'._('Niveau 8').' :&nbsp;</td>
					  <td>&nbsp;240 '._('Unités').'&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">'._('Niveau 4').' :&nbsp;</td>
					  <td>&nbsp;120 '._('Unités').'&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;'._('Niveau 9').' :&nbsp;</td>
					  <td>&nbsp;270 '._('Unités').'&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">'._('Niveau 5').' :&nbsp;</td>
					  <td>&nbsp;150 '._('Unités').'&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;'._('Niveau 10').' :&nbsp;</td>
					  <td>&nbsp;300 '._('Unités').'&nbsp;</td>
				  </tr>
			  </table>
		  </div>
	  </div>
  </div>
  <!-- Erebe -->

  <div class="ligne_80 gauche liste_autels"
       id="cadre_autel_erebe">
	  <h2>'._('Faveur de l\'Érèbe').' '.
	  (($liste_autels->sauvegarde_ombre > 0)?'<a href="'._('statues').'-sauvegarde_ombre-supprimer"><img src="images/attaques/cross.png" alt="'._('supprimer').'" /></a>':'').'</h2>
	  <div class="ligne">
		  <div class="gauche_autel">
			  <b>'._('Niveau').' :</b> '.$liste_autels->sauvegarde_ombre.
				'<br/>';

			  if($condition_erebe == true) {
				  echo '<b>'._('Prix').' :</b> '.prix_hall($prix_autels->sauvegarde_ombre, $liste_autels->sauvegarde_ombre).'
			  <br/><br/>
			  <div class="ligne centrer"><b><a href="'._('statues').'-sauvegarde_ombre">'._('Obtenir').'</a></b></div>';
			  }

echo '</div>
		  <div class="droite_autel">'._(
		  'L\'Érèbe est la divinité infernale née du Chaos, personnifiant '.
		  'les Ténèbres, l\'Obscurité des Enfers. Grâce à elle, lors d\'une '.
		  'défaite défensive vos troupes ne partiront pas toutes aux enfers.').'
		  <br/><br/>
			  <table class="none">
				  <tr>
					  <td class="gras">'._('Niveau 1').' :&nbsp;</td>
					  <td class="droite">&nbsp;'._('Jusqu\'à 5 %').'&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;'._('Niveau 6').' :&nbsp;</td>
					  <td>&nbsp;'._('Jusqu\'à 30 %').'&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">'._('Niveau 2').' :&nbsp;</td>
					  <td class="droite">&nbsp;'._('Jusqu\'à 10 %').'&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;'._('Niveau 7').' :&nbsp;</td>
					  <td>&nbsp;'._('Jusqu\'à 35 %').'&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">'._('Niveau 3').' :&nbsp;</td>
					  <td class="droite">&nbsp;'._('Jusqu\'à 15 %').'&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;'._('Niveau 8').' :&nbsp;</td>
					  <td>&nbsp;'._('Jusqu\'à 40 %').'&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">'._('Niveau 4').' :&nbsp;</td>
					  <td>&nbsp;'._('Jusqu\'à 20 %').'&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;'._('Niveau 9').' :&nbsp;</td>
					  <td>&nbsp;'._('Jusqu\'à 45 %').'&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">'._('Niveau 5').' :&nbsp;</td>
					  <td>&nbsp;'._('Jusqu\'à 25 %').'&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;'._('Niveau 10').' :&nbsp;</td>
					  <td>&nbsp;'._('Jusqu\'à 50 %').'&nbsp;</td>
				  </tr>
			  </table>
		  </div>
	  </div>
  </div>

  <!-- Héra -->

  <div class="ligne_80 gauche liste_autels" id="cadre_autel_hera">
	  <h2>'._('Sacrifice d\'Héra').' '.
	  (($liste_autels->sacrifice_hera > 0)?'<a href="'._('statues').'-sacrifice_hera-supprimer"><img src="images/attaques/cross.png" alt="'._('supprimer').'" /></a>':'').'</h2>
	  <div class="ligne">
		  <div class="gauche_autel">
			  <b>'._('Niveau').' :</b> '.$liste_autels->sacrifice_hera.'
			  <br/>';
  
			  if($condition_hera == true) {
				  echo '<b>'._('Prix').' :</b> '.prix_hall($prix_autels->sacrifice_hera, $liste_autels->sacrifice_hera).'
			  <br/><br/>
			  <div class="ligne centrer"><b><a href="'._('statues').'-sacrifice_hera">'._('Obtenir').'</a></b></div>';
			  }
			
			echo '
		  </div>
		  <div class="droite_autel">
			  '._('Héra mettra temporairement votre cité à l\'abri de vos ennemis.').'
			  <br/>';
  
		  if($liste_autels->sacrifice_hera > 0) {
			if($quand_hera == 0) {
			  echo '<br/>
	<a href="'._('statues').'-sacrifice_hera-activer" class="sous">'._('Activer').'</a> ('._('.coût').' : '.nbf(2000000).' '.imress('nourriture').' '.nbf(200).' '.imress('vin').' )<br/>';
			}
			else {
				echo '<br/><b>'._('Héra écoutera de nouveau vos requêtes ').display_date($quand_hera,3).'</b>';
			}
		  }
  $debut = $i=$liste_autels->sacrifice_hera;
  if($liste_autels->sacrifice_hera >= 10) {
	$fin = 10;
  }
  else {
  	if($debut < 1) {
  		$debut = 1;
  	}
	$fin = $liste_autels->sacrifice_hera+1;
  }
  for($i=$debut;$i<=$fin;$i++) {
	  if($i <= $liste_autels->sacrifice_hera+1) {
		  echo '<br/><b>'._('Niveau').' '.$i.' :</b> '.$texte_niveau[$i-1];
	  }
  }

 	echo '</div>
	  </div>
  </div>

  <!-- Hippo -->
  <div class="ligne_80 gauche liste_autels" id="cadre_autel_hippo">
	  <h2>'._('Stratégie d\'Hippodamos').' '.
	  (($liste_autels->strategie_hippodamos > 0)?'<a href="'._('statues').'-strategie_hippodamos-supprimer"><img src="images/attaques/cross.png" alt="'._('supprimer').'" /></a>':'').'</h2>
	  <div class="ligne">
		  <div class="gauche_autel">
			  <b>'._('Niveau').' :</b> '.$liste_autels->strategie_hippodamos.'
			  <br/>';
  
			  if($condition_hippo == true) {
				  echo '<b>'._('Prix').' :</b> '.prix_hall($prix_autels->strategie_hippodamos, $liste_autels->strategie_hippodamos).'
			  <br/><br/>
			  <div class="ligne centrer"><b><a href="'._('statues').'-strategie_hippodamos">'._('Obtenir').'</a></b></div>';
			  }
echo '
		  </div>
		  <div class="droite_autel">'.
		  _('Le célébre architecte Hippodamos vous conseillera afin de récuperer d\'avantage de ressources chez vos ennemis.').'
			  <table class="none">
				  <tr>
					  <td class="gras">'._('Niveau 1').' :&nbsp;</td>
					  <td class="droite">&nbsp;'._('Jusqu\'à 4 %').'&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;'._('Niveau 6').' :&nbsp;</td>
					  <td>&nbsp;'._('Jusqu\'à 24 %').'&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">'._('Niveau 2').' :&nbsp;</td>
					  <td class="droite">&nbsp;'._('Jusqu\'à 8 %').'&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;'._('Niveau 7').' :&nbsp;</td>
					  <td>&nbsp;'._('Jusqu\'à 28 %').'&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">'._('Niveau 3').' :&nbsp;</td>
					  <td class="droite">&nbsp;'._('Jusqu\'à 12 %').'&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;'._('Niveau 8').' :&nbsp;</td>
					  <td>&nbsp;'._('Jusqu\'à 32 %').'&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">'._('Niveau 4').' :&nbsp;</td>
					  <td>&nbsp;'._('Jusqu\'à 16 %').'&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;'._('Niveau 9').' :&nbsp;</td>
					  <td>&nbsp;'._('Jusqu\'à 36 %').'&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">'._('Niveau 5').' :&nbsp;</td>
					  <td>&nbsp;'._('Jusqu\'à 20 %').'&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;'._('Niveau 10').' :&nbsp;</td>
					  <td>&nbsp;'._('Jusqu\'à 40 %').'&nbsp;</td>
				  </tr>
			  </table>
		  </div>
	  </div>
  </div>

  <div id="tab_statues">
	  <div class="ligne cadre">
		  <div class="cadre_50 centrer" id="click_gaia">';
  
		  if($condition_gaia == true) {
			  echo '<img src="images/autel/defensegaia.png"
			             alt="'._('Défense de Gaïa').'" 
			             title="'._('Défense de Gaïa').'" />';
		  }
		  elseif($liste_autels->defense_gaia >= 10) {
			  echo '<img src="images/autel/defensegaia3.png"
			             alt="'._('Défense de Gaïa').'" 
			             title="'._('Défense de Gaïa').'" />';
		  }
		  else {
			  echo '<img src="images/autel/defensegaia2.png"
			             alt="'._('Défense de Gaïa').'" 
			             title="'._('Défense de Gaïa').'" />';
		  }
		  
  echo '
		  </div>
		  <div class="cadre_50 centrer" id="click_erebe">';

		  if($condition_erebe == true) {
			  echo '<img src="images/autel/faveurerebe.png"
			             alt="'._('Faveur de l\'Érèbe').'" 
			             title="'._('Faveur de l\'Érèbe').'" />';
		  }
		  elseif($liste_autels->sauvegarde_ombre >= 10) {
			  echo '<img src="images/autel/faveurerebe3.png"
			             alt="'._('Faveur de l\'Érèbe').'" 
			             title="'._('Faveur de l\'Érèbe').'" />';
		  }
		  else {
			  echo '<img src="images/autel/faveurerebe2.png"
			             alt="'._('Faveur de l\'Érèbe').'" 
			             title="'._('Faveur de l\'Érèbe').'" />';
		  }
		  
  echo '
		  </div>
	  </div>
	  <div class="ligne cadre">
		  <div class="cadre_50 centrer" id="click_hera">';

		  if($condition_hera == true) {
			  echo '<img src="images/autel/sacrificehera.png"
			             alt="'._('Sacrifice d\'Héra').'" 
			             title="'._('Sacrifice d\'Héra').'" />';
		  }
		  elseif($liste_autels->sacrifice_hera >= 10) {
			  echo '<img src="images/autel/sacrificehera3.png"
			             alt="'._('Sacrifice d\'Héra').'" 
			             title="'._('Sacrifice d\'Héra').'" />';
		  }
		  else {
			  echo '<img src="images/autel/sacrificehera2.png"
			             alt="'._('Sacrifice d\'Héra').'" 
			             title="'._('Sacrifice d\'Héra').'" />';
		  }
  
	echo '</div>
		  <div class="cadre_50 centrer" id="click_hippo">';

		  if($condition_hippo == true) {
			  echo '<img src="images/autel/hippodamos.png"
			             alt="'._('Stratégie d\'Hippodamos').'" 
			             title="'._('Stratégie d\'Hippodamos').'" />';
		  }
		  elseif($liste_autels->strategie_hippodamos >= 10) {
			  echo '<img src="images/autel/hippodamos3.png"
			             alt="'._('Stratégie d\'Hippodamos').'" 
			             title="'._('Stratégie d\'Hippodamos').'" />';
		  }
		  else {
			  echo '<img src="images/autel/hippodamos2.png"
			             alt="'._('Stratégie d\'Hippodamos').'" 
			             title="'._('Stratégie d\'Hippodamos').'" />';
		  }
  echo '
		  </div>
	  </div>
  </div>

<script type="text/javascript">
       $(function(){
 	$(".liste_autels").hide();
  		';
if(!empty($_GET['var1'])) {

	switch($_GET['var1']) {
		case 'sauvegarde_ombre':
			echo '$("#cadre_autel_erebe").show("slow");';
		break;
		case 'sacrifice_hera':
		  echo '$("#cadre_autel_hera").show("slow");';
		break;
		case 'defense_gaia':
	  	echo '$("#cadre_autel_gaia").show("slow");';
	  break;
  	case 'strategie_hippodamos':
	  	echo '$("#cadre_autel_hippo").show("slow");';
	  break;
	}
}
	echo '

	$("#tab_autel_dieux .cadre_33 img").click( function() {
    $(".liste_autels").hide("slow");
  });

	$("#tab_statues .cadre_50 img").click( function() {
    $(".liste_autels").hide("slow");
  });

	$("#click_aphro").click( function() {
		$("#cadre_autel_aphro").show("slow");
  });
  
	$("#click_dino").click( function() {
		$("#cadre_autel_dino").show("slow");
  });
  
	$("#click_maison").click( function() {
		$("#cadre_autel_maison").show("slow");
  });
  
	$("#click_lion").click( function() {
		$("#cadre_autel_lion").show("slow");
  });
  
	$("#click_myth").click( function() {
		$("#cadre_autel_myth").show("slow");
  });
  
	$("#click_unite").click( function() {
		$("#cadre_autel_unite").show("slow");
  });

	$("#click_erebe").click( function() {
		$("#cadre_autel_erebe").show("slow");
  });

	$("#click_gaia").click( function() {
		$("#cadre_autel_gaia").show("slow");
  });

	$("#click_hera").click( function() {
		$("#cadre_autel_hera").show("slow");
  });
  
	$("#click_hippo").click( function() {
		$("#cadre_autel_hippo").show("slow");
  });
});

</script>';
}
?>