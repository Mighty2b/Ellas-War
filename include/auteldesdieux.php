<?php

if($paquet->get_infoj('lvl') < 10) {
	echo '<div class="erreur">';
	echo display_error(94);
	echo '</div>';
}
else {
	
	$conditions = $paquet->get_answer('conditions_autels')->{1};
	$prix_autel = $paquet->get_answer('conditions_autels')->{2};
		
	$condition_promethee	= $conditions->promethee;
	$condition_dino				= $conditions->dino;
	$condition_hestia			= $conditions->hestia;
	$condition_lion				= $conditions->lion;
	$condition_unite			= $conditions->unite;
	$condition_attirance_aphrodite=$conditions->aphro;
	
	$liste_autels = $paquet->get_infoj('liste_autels');
	$active_ter   = $paquet->get_infoj('active_ter');
	
	echo '<h1>'._('Autel des dieux').'</h1>
	<br/>';

	$paquet->error('acheter_autel');

	echo '<div class="ligne_80">'._(
	     'Un dieu puissant vous soutient et grâce à cela, '.
	     'vous pouvez obtenir de nombreuses améliorations pour votre cité. '.
	     'Ces améliorations devront être méritées, elles ne vous sont donc '.
	     'pas toutes accessibles immédiatement. Mais n\'oubliez pas, les '.
	     'voies des dieux sont impénétrables.').'</div>
	<div class="clear"></div>
	<div class="ligne_80 liste_autels" id="cadre_autel_myth">
	<h2>'._('Songe de Prométhée').'</h2>
	<div class="ligne80">
		<div class="gauche_autel">
			<b>'._('Niveau').' :</b> '.$liste_autels->unite_myth.'<br/>';

	if($condition_promethee == true) {
		echo '<b>'._('Prix').' :</b> '.
		nbf($prix_autel->unite_myth->gold * (
		$liste_autels->unite_myth+1)).' '.
		imress('gold').' '.
		nbf($prix_autel->unite_myth->vin * (
		$liste_autels->unite_myth+1)).' '.
		imress('vin').'
		<br/><br/>
		<div class="ligne centrer"><b><a href="'._('auteldesdieux').'-unite_myth">'._('Obtenir').'</a></b></div>';
	}
	
	echo '</div>
	<div class="droite_autel">'._(
	'Prométhée augmente le nombre d\'unités mythologiques que vous pouvez posséder.').
	'<br/>
	<br/><b>'._('Niveau').' 1 :</b> +10%
	<br/><b>'._('Niveau').' 2 :</b> +20%
	<br/><b>'._('Niveau').' 3 :</b> +30%
	<br/><b>'._('Niveau').' 4 :</b> +40%
	<br/><b>'._('Niveau').' 5 :</b> +50%
	</div>
</div>
</div>

<div class="ligne_80 liste_autels" id="cadre_autel_dino">
<h2>'._('Aménagement de Dinocrate').'</h2>
<div class="ligne80">
	<div class="gauche_autel">
		<b>'._('Niveau').' :</b> '.$liste_autels->baisse_terrain.
		'<br/>';

if($liste_autels->baisse_terrain >= 1) {
	if($active_ter == 1)
	{
		echo '<br/><br/><b>'._('Actuellement').' :</b> '._('Terrain minimal').'<br/>';
		echo '<a href="'._('auteldesdieux').'-1-0">'._('Retrouver mon terrain d\'origine').'</a><br/>';
		echo '<a href="'._('auteldesdieux').'-1-2">'._('Augmenter mon terrain').'</a><br/>';
	}
	elseif($active_ter == 2)
	{
		echo '<br/><br/><b>'._('Actuellement').' :</b> '._('Terrain maximal').'<br/>';
		echo '<a href="'._('auteldesdieux').'-1-1">'._('Réduire mon terrain').'</a><br/>';
		echo '<a href="'._('auteldesdieux').'-1-0">'._('Retrouver mon terrain d\'origine').'</a><br/>';
	}
	else
	{
		echo '<br/><br/><b>'._('Actuellement').' :</b> '._('Terrain normal').'<br/>';
		echo '<a href="'._('auteldesdieux').'-1-1">'._('Réduire mon terrain').'</a><br/>';
		echo '<a href="'._('auteldesdieux').'-1-2">'._('Augmenter mon terrain').'</a><br/>';
	}
}
		if($condition_dino == true) {
			echo '<b>'._('Prix').' :</b> '.
			nbf($prix_autel->baisse_terrain->bois * 
			($liste_autels->baisse_terrain+1)).' '.
			imress('bois').' '.
			nbf($prix_autel->baisse_terrain->pierre * 
			($liste_autels->baisse_terrain+1)).' '.
			imress('pierre').' <br/>'.
			nbf($prix_autel->baisse_terrain->marbre * 
			($liste_autels->baisse_terrain+1)).' '.imress('marbre');
			
			echo '<br/><br/>
		<div class="ligne centrer"><b><a href="'._('auteldesdieux').'-baisse_terrain">'._('Obtenir').'</a></b></div>';
		}

echo '</div>
	<div class="droite_autel">'.
	_('Dinocrate vous aidera à ré-agencer votre cité afin de réduire le '.
	  'terrain qu\'elle occupe ou au contraire l\'augmenter.').'
	<br/>
	<br/><b>'._('Niveau').' 1 :</b> +/-5%
	<br/><b>'._('Niveau').' 2 :</b> +/-10%
	<br/><b>'._('Niveau').' 3 :</b> +/-15%
	<br/><b>'._('Niveau').' 4 :</b> +/-20%
	<br/><b>'._('Niveau').' 5 :</b> +/-25%
	</div>
</div>
</div>

<div class="ligne_80 liste_autels" id="cadre_autel_maison">
<h2>'._('Hospitalité d\'Hestia').'</h2>
<div class="ligne80">
	<div class="gauche_autel">
		<b>'._('Niveau').' :</b> '.$liste_autels->maison.'
		<br/>';

			if($condition_hestia == true) {
				echo '<b>'._('Prix').' :</b> '.
				nbf($prix_autel->maison->eau * 
				($liste_autels->maison+1)).' '.
				 imress('eau').' '.
				 nbf($prix_autel->maison->nourriture * (
				 $liste_autels->maison+1)).' '.
				imress('nourriture').' <br/>'.
				nbf($prix_autel->maison->raisin * (
				$liste_autels->maison+1)).' '.
				imress('raisin').' '.
				nbf($prix_autel->maison->vin * (
				$liste_autels->maison+1)).' '.
				imress('vin').'
		<br/><br/>
		<div class="ligne centrer">
		<b><a href="'._('auteldesdieux').'-maison">'._('Obtenir').'</a></b></div>';
		}

	echo '</div>
	<div class="droite_autel">'._(
	'Hestia vous permettra de loger plus d\'unités dans vos huttes, habitations, palais et grottes.').
	'<br/>
	<br/><b>'._('Niveau').' 1 :</b> +10%
	<br/><b>'._('Niveau').' 2 :</b> +20%
	<br/><b>'._('Niveau').' 3 :</b> +30%
	<br/><b>'._('Niveau').' 4 :</b> +40%
	<br/><b>'._('Niveau').' 5 :</b> +50%
	</div>
</div>
</div>

<div class="ligne_80 liste_autels" id="cadre_autel_lion">
<h2>'._('Lions d\'Atlas').'</h2>
<div class="ligne80">
	<div class="gauche_autel">
		<b>'._('Niveau').' :</b> '.$liste_autels->lion.
		'<br/>';

	if($condition_lion == true) {
			echo '<b>'._('Prix').' :</b> '.
			nbf($prix_autel->lion->nourriture * ($liste_autels->lion+1)).' '.
			imress('nourriture').' '.
			nbf($prix_autel->lion->gold * ($liste_autels->lion+1)).' '.imress('gold').'
	<br/><br/>
	<div class="ligne centrer"><b><a href="'._('auteldesdieux').'-lion">'._('Obtenir').'</a></b></div>';
	}
	
	echo '</div>
	<div class="droite_autel">
	'._('Atlas vous permettra de recruter ses terribles lions pour défendre votre cité.').'
	<br/>
	<br/><b>'._('Niveau').' 1 :</b> 500
	<br/><b>'._('Niveau').' 2 :</b> 1000
	<br/><b>'._('Niveau').' 3 :</b> 1500
	<br/><b>'._('Niveau').' 4 :</b> 2000
	<br/><b>'._('Niveau').' 5 :</b> 2500
	</div>
</div>
</div>

<div class="ligne_80 liste_autels" id="cadre_autel_unite">
<h2>'._('Unités divines').'</h2>
<div class="ligne80">
	<div class="gauche_autel">
		<b>'._('Niveau').' :</b> '.$liste_autels->unite.
		'<br/>';

			if($condition_unite == true) {
				echo '<b>'._('Prix').' :</b> '.
				nbf($prix_autel->unite->fer * ($liste_autels->unite+1)).' '.
				imress('fer').' '.
				nbf($prix_autel->unite->gold * ($liste_autels->unite+1)).' '.
				imress('gold').'
		<br/><br/>
		<div class="ligne centrer"><b><a href="'._('auteldesdieux').'-unite">'._('Obtenir').'</a></b></div>';
		}
	
	echo '</div>
	<div class="droite_autel">
	'._('Les dieux vous céderont leurs terribles cyclopes pour combattre à vos côtés.').'
	<br/>
	<br/><b>'._('Niveau').' 1 :</b> 1200
	<br/><b>'._('Niveau').' 2 :</b> 2400
	<br/><b>'._('Niveau').' 3 :</b> 3600
	<br/><b>'._('Niveau').' 4 :</b> 4800
	<br/><b>'._('Niveau').' 5 :</b> 6000
	</div>
</div>
</div>

<div class="ligne_80 liste_autels" id="cadre_autel_aphro">
<h2>'._('Attirance d\'Aphrodite').'</h2>
<div class="ligne80">
	<div class="gauche_autel">
		<b>'._('Niveau').' :</b> '.$liste_autels->attirance_aphrodite.'
		<br/>';

		if($condition_attirance_aphrodite == true) {
			echo '<b>'._('Prix').' :</b> '.
			nbf($prix_autel->attirance_aphrodite->nourriture * (
			$liste_autels->attirance_aphrodite+1)).' '.
			imress('nourriture').' '.
			nbf($prix_autel->attirance_aphrodite->raisin * (
			$liste_autels->attirance_aphrodite+1)).' '.imress('raisin').' <br/>'.
			nbf($prix_autel->attirance_aphrodite->marbre * (
			$liste_autels->attirance_aphrodite+1)).' '.
			imress('marbre').' '.
			nbf($prix_autel->attirance_aphrodite->gold * (
			$liste_autels->attirance_aphrodite+1)).' '.imress('gold').'
		<br/><br/>
		<div class="ligne centrer"><b><a href="'._('auteldesdieux').'-attirance_aphrodite">'._('Obtenir').'</a></b></div>';
		}
		
		echo '
	</div>
	<div class="droite_autel">
	'._('Aphrodite charmera de terribles créatures afin de les mettre à votre service.').'
	<br/>
	</div>
</div>
</div>

<div id="tab_autel_dieux">
<div class="ligne cadre">
<div class="cadre_33 centrer" id="click_aphro">';
	
	if($condition_attirance_aphrodite == true ) {
		echo '<img src="images/autel/attiranceaphrodite.png"
		           alt="'._('Attirance d\'aphrodite').'"
		           title="'._('Attirance d\'aphrodite').'" />';
	}
	elseif($liste_autels->attirance_aphrodite >= 5) {
		echo '<img src="images/autel/attiranceaphrodite3.png"
		           alt="'._('Attirance d\'aphrodite').'"
		           title="'._('Attirance d\'aphrodite').'" />';
	}
	else {
		echo '<img src="images/autel/attiranceaphrodite2.png"
		           alt="'._('Attirance d\'aphrodite').'"
		           title="'._('Attirance d\'aphrodite').'" />';
	}

echo '
</div>
<div class="cadre_33 centrer" id="click_dino">';
	
	if($condition_dino == true) {
		echo '<img src="images/autel/dino.png"
		           alt="'._('Aménagement de Dinocrate').'" 
		           title="'._('Aménagement de Dinocrate').'" />';
	}
	elseif($liste_autels->baisse_terrain >= 5) {
		echo '<img src="images/autel/dino3.png"
		           alt="'._('Aménagement de Dinocrate').'" 
		           title="'._('Aménagement de Dinocrate').'" />';
	}
	else {
		echo '<img src="images/autel/dino2.png"
		           alt="'._('Aménagement de Dinocrate').'" 
		           title="'._('Aménagement de Dinocrate').'" />';
		}
echo '
</div>
<div class="cadre_33 centrer" id="click_maison">';

if($condition_hestia == true) {
	echo '<img src="images/autel/hospitalitdhestia.png"
	           alt="'._('Hospitalité d\'Hestia').'" 
	           title="'._('Hospitalité d\'Hestia').'" />';
}
elseif($liste_autels->maison >= 5) {
	echo '<img src="images/autel/hospitalitdhestia3.png"
	           alt="'._('Hospitalité d\'Hestia').'" 
	           title="'._('Hospitalité d\'Hestia').'" />';
}
else {
	echo '<img src="images/autel/hospitalitdhestia2.png"
	           alt="'._('Hospitalité d\'Hestia').'" 
	           title="'._('Hospitalité d\'Hestia').'" />';
}

echo '
</div>
</div>

<div class="ligne cadre">
<div class="cadre_33 centrer" id="click_lion">';

if($condition_lion == true) {
	echo '<img src="images/autel/lionsdatlas.png"
	           alt="'._('Lions d\'Atlas').'" 
	           title="'._('Lions d\'Atlas').'" />';
}
elseif($liste_autels->lion >= 5) {
	echo '<img src="images/autel/lionsdatlas3.png"
	           alt="'._('Lions d\'Atlas').'" 
	           title="'._('Lions d\'Atlas').'" />';
}
else {
	echo '<img src="images/autel/lionsdatlas2.png"
	           alt="'._('Lions d\'Atlas').'" 
	           title="'._('Lions d\'Atlas').'" />';
}

echo '
</div>
<div class="cadre_33 centrer" id="click_myth">';

if($condition_promethee == true) {
	echo '<img src="images/autel/songedeprometee.png"
	           alt="'._('Songe de Promethée').'" 
	           title="'._('Songe de Promethée').'" />';
}
elseif($liste_autels->unite_myth >= 5) {
	echo '<img src="images/autel/songedeprometee3.png"
	           alt="'._('Songe de Promethée').'" 
	           title="'._('Songe de Promethée').'" />';
}
else {
	echo '<img src="images/autel/songedeprometee2.png"
	           alt="'._('Songe de Promethée').'" 
	           title="'._('Songe de Promethée').'" />';
}

echo '
</div>
<div class="cadre_33 centrer" id="click_unite">';

if($condition_unite == true) {
	echo '<img src="images/autel/unitsdivineou.png"
	           alt="'._('Unités divines').'" 
	           title="'._('Unités divines').'" />';
}
elseif($liste_autels->unite >= 5) {
	echo '<img src="images/autel/unitsdivineou3.png"
	           alt="'._('Unités divines').'" 
	           title="'._('Unités divines').'" />';
}
else {
	echo '<img src="images/autel/unitsdivineou2.png"
	           alt="'._('Unités divines').'" 
	           title="'._('Unités divines').'" />';
}

echo '
</div>
</div>
</div>';

	if(!empty($_GET['var1'])) {
	echo ' <script type="text/javascript">
		
		$(function(){';
	  switch($_GET['var1']) {
		  case 'unite_myth':
			  echo '$("#cadre_autel_myth").show("slow");';
			  break;
		  case '1':
		  case '2':
		  case 'baisse_terrain':
			  echo '$("#cadre_autel_dino").show("slow");';
			  break;
		  case 'maison':
			  echo '$("#cadre_autel_maison").show("slow");';
			  break;
		  case 'lion':
			  echo '$("#cadre_autel_lion").show("slow");';
			  break;
		  case 'unite':
			  echo '$("#cadre_autel_unite").show("slow");';
			  break;
		  case 'attirance_aphrodite':
			  echo '$("#cadre_autel_aphro").show("slow");';
				  break;
		  }
		echo '});
		</script>';
	}

	echo ' <script type="text/javascript">
$(function(){
  $(".liste_autels").hide();

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