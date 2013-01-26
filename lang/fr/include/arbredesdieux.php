<?php

echo '<h1>Arbre des dieux</h1>';

echo '<div class="ligne80 justifier">L\'arbre des dieux vous permet de spécialiser votre cité. 
Grâce à lui vous pourrez choisir votre stratégie et la mener à bien. 
Vous pourrez obtenir régulièrement des points que vous pourrez utiliser pour acheter des bonus. ' .
		'Il vous faudra bien les choisir puisque vous ne pourrez pas tous les obtenir. 
		Lors du choix des bonus, vous devrez commencer par le haut de l\'arbre. 
		Vous devez avoir au minimum cinq points par ligne avant de passer à la ligne inférieure. 
		Cette règle ne s\'applique pas sur la dernière ligne.<br/><br/></div>';

$paquet->display();

echo '<div class="erreur ligne centrer">Points disponibles : <span id="points_disponibles">'.$paquet->getRetour().'</span><br/><br/></div>';

echo '<script type="text/javascript">
			var arbre_points_disponibles = '.$paquet->getRetour().'

			</script>';


foreach($titre_arbredesdieux as $titre) {
  echo '<div class="cadre_33 centrer"><b>'.$titre.'</b><br/><br/></div>';
}

$arbre_niveau = 0;
foreach($liste_arbre as $arbre) {
	$niveau = 0;
  echo '<div class="cadre_33">
  <table class="centrer_tableau">';

  foreach($arbre as $ligne) {
  	$num = 0;
    echo '<tr>';
    foreach($ligne as $noeud) {
      if(!empty($noeud['num'])) {
      	$num++;
        echo '<td><div 
        	class="arbre_bloc_noir" 
        	onclick="arbre_incremente('.$noeud['num'].', '.$arbre_niveau.', '.$niveau.','.$noeud['lvl'].');" 
        	oncontextmenu="arbre_decremente('.$noeud['num'].', '.$arbre_niveau.', '.$niveau.');return false;" 
        	style="background-image:url(\'images/arbre/'.($arbre_niveau+1).($niveau+1).$num.'.png\');"
        	>
        <div class="arbre_description" id="arbre_description_'.$noeud['num'].'">
        <b>'.$txt_arbredesdieux[$noeud['num']]['titre'].'</b>
        <br/>'.
        $txt_arbredesdieux[$noeud['num']]['txt'].'</div>
        <span id="arbre_case_'.$noeud['num'].'" class="compteur">0</span></div></td>';
      }
      else {
      	echo '<td></td>';
      }
    }
    echo '<tr>';
    $niveau++;
  }
	$arbre_niveau++;
  echo '</table>
  </div>';
}

echo '<div class="erreur ligne centrer cadre"><br/><a href="arbredesdieux-reset" class="sous">Réinitialiser le choix des bonus : '.nbf(1000000).' '.imress('drachme').'</a></div>';

$arbre_resume = array(array(0,0,0,0,0),
											array(0,0,0,0,0),
											array(0,0,0,0,0));
										

echo '<script type="text/javascript">';
if(!empty($arbre_mon) && sizeof($arbre_mon) > 0) {
			foreach($arbre_mon as $element => $valeur) {
				echo '$("#arbre_case_"+'.$element.').html('.$valeur.');
					';
		}
	
	$actu_arbre = 0;
	foreach($liste_arbre as $arbre) {
		$actu_branche=0;
		foreach($arbre as $branche) {
			foreach($branche as $element) {
				if(!empty($element['num']) && !empty($arbre_mon->$element['num'])) {
					$arbre_resume[$actu_arbre][$actu_branche] += $arbre_mon->$element['num'];
				}
			}
			$actu_branche++;
		}
		$actu_arbre++;
	}
}

echo 'var arbre_points = new Array(Array('.$arbre_resume[0][0].',
																				 '.$arbre_resume[0][1].',
																				 '.$arbre_resume[0][2].',
																				 '.$arbre_resume[0][3].',
																				 '.$arbre_resume[0][4].'),
																	 Array('.$arbre_resume[1][0].',
																				 '.$arbre_resume[1][1].',
																				 '.$arbre_resume[1][2].',
																				 '.$arbre_resume[1][3].',
																				 '.$arbre_resume[1][4].'),
																	 Array('.$arbre_resume[2][0].',
																				 '.$arbre_resume[2][1].',
																				 '.$arbre_resume[2][2].',
																				 '.$arbre_resume[2][3].',
																				 '.$arbre_resume[2][4].'));';
echo '</script>';

?>