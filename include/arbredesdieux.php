<?php

//Include des textes
include('donnees/arbredesdieux.php');

//On crée un arbre
$liste_arbre = array(
array(
  array(
    array('num' => 1, 'lvl' => 5),
    array('num' => 2, 'lvl' => 5),
    array('num' => 28, 'lvl' => 5)
  ),
  array(
    array('num' => 26, 'lvl' => 5),
    array('num' => 27, 'lvl' => 5),
    array('num' => 29, 'lvl' => 5)
  ),
  array(
    array('num' => 11, 'lvl' => 5),
    array('num' => 30, 'lvl' => 5),
    array('num' => 0, 'lvl' => 0)
  ),
  array(
    array('num' => 0, 'lvl' => 0),
    array('num' => 4, 'lvl' => 5),
    array('num' => 0, 'lvl' => 0)
  ),
  array(
    array('num' => 0, 'lvl' => 0),
    array('num' => 25, 'lvl' => 1),
    array('num' => 0, 'lvl' => 0)
  )
),

array(
	array(
		array('num' => 9, 'lvl' => 5),
    array('num' => 21, 'lvl' => 5),
    array('num' => 22, 'lvl' => 5)
	),
  array(
    array('num' => 10, 'lvl' => 5),
    array('num' => 19, 'lvl' => 5),
    array('num' => 18, 'lvl' => 5),
  ),
  array(
    array('num' => 5, 'lvl' => 5),
    array('num' => 31, 'lvl' => 5),
  	array('num' => 0, 'lvl' => 0),
  ),
  array(
  	array('num' => 0, 'lvl' => 0),
  	array('num' => 12, 'lvl' => 5),
  	array('num' => 0, 'lvl' => 0)
  ),
  array(
    array('num' => 0, 'lvl' => 0),
    array('num' => 24, 'lvl' => 1),
    array('num' => 0, 'lvl' => 0)
  )
),

array(
  array(
    array('num' => 16, 'lvl' => 5),
    array('num' => 7, 'lvl' => 5),
    array('num' => 8, 'lvl' => 5)
  ),
  array(
    array('num' => 13, 'lvl' => 5),
    array('num' => 14, 'lvl' => 5),
    array('num' => 15, 'lvl' => 5)
  ),
  array(
    array('num' => 20, 'lvl' => 5),
    array('num' => 3, 'lvl' => 5),
    array()
  ),
  array(
    array('num' => 0, 'lvl' => 0),
    array('num' => 17, 'lvl' => 5),
    array()
  ),
  array(
    array('num' => 0, 'lvl' => 0),
    array('num' => 23, 'lvl' => 1),
    array('num' => 0, 'lvl' => 0)
  )
));

$arbre_mon = $paquet->get_infoj('arbre');
$points    = $paquet->get_answer('arbredesdieux')->{1};

echo '<h1>'._('Arbre des dieux').'</h1>';

echo '<div class="ligne_80 ligne90 justifier">'._(
'L\'arbre des dieux vous permet de spécialiser votre cité. '.
'Grâce à lui vous pourrez choisir votre stratégie et la mener à bien. '.
'Vous pourrez obtenir régulièrement des points que vous pourrez utiliser '.
'pour acheter des bonus. '.
'Il vous faudra bien les choisir puisque vous ne pourrez pas tous les obtenir. '.
'Lors du choix des bonus, vous devrez commencer par le haut de l\'arbre. '.
'Vous devez avoir au minimum cinq points par ligne avant de passer à la ligne '.
'inférieure. Cette règle ne s\'applique pas sur la dernière ligne.').
'<br/><br/></div>';

$paquet -> error('reset_arbredesdieux');

echo '<div class="erreur ligne centrer">'._('Points disponibles').' : <span id="points_disponibles">'.$points.'</span><br/><br/></div>';

echo '<script type="text/javascript">
			var arbre_points_disponibles = '.$points.'
			</script>';

foreach($titre_arbredesdieux as $titre) {
  echo '<div class="cadre_33 centrer"><b>'.$titre.'</b><br/><br/></div>';
}

$arbre_niveau = 0;
foreach($liste_arbre as $arbre) {
	$niveau = 0;
  echo '<div class="cadre_33">
  <table class="none">';

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
        <div class="arbre_description"
             id="arbre_description_'.$noeud['num'].'">
        <b>'.$txt_arbredesdieux[$noeud['num']]['titre'].'</b>
        <br/>'.
        $txt_arbredesdieux[$noeud['num']]['txt'].'</div>
        <span id="arbre_case_'.$noeud['num'].'"
              class="compteur">0</span></div></td>';
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

echo '<div class="erreur ligne centrer cadre">
<br/><a href="'._('arbredesdieux').'-reset"
        class="sous">'._('Réinitialiser le choix des bonus').' : '.nbf(1000000).' '.imress('drachme').'</a></div>';

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
																				 '.$arbre_resume[2][4].'));
function arbre_total_niveau(arbre, niveau) {
  total = 0;
  for(i=0;i<niveau;i++) {
    total += arbre_points[arbre][i];
  }
  return total;
}

function arbre_incremente(id, arbre, niveau, max) {
  var valeur = parseInt($("#arbre_case_"+id).html());
  if(valeur < max && arbre_points_disponibles > 0) {
    if(niveau > 0) {
      var total = arbre_total_niveau(arbre, niveau);
    }
    else {
      var total = 0;
    }

    if(valeur < 5) {
      if(total >= niveau*5) {
        $.ajax({
          type: "GET",
          url: "form/form_arbre.php",
          data: "id="+id,
          success: function(msg) {
		        $("#arbre_case_"+id).html(valeur+1);
		        arbre_points[arbre][niveau]++;
		        arbre_points_disponibles--;
		        if(msg == arbre_points_disponibles) {
		        	$("#points_disponibles").html(arbre_points_disponibles);
		        }
		        else {
		        	location.reload();
		        }
          }
        });
      }
    }
  }
}';
echo '</script>';

?>