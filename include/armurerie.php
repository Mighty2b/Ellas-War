<?php

echo '<h1>'._('Armurerie').'</h1>';

$paquet->error('acheter_bonus_unites', 2);

$bonus_unites = $paquet->get_infoj('bonus_unites');

if($paquet->get_answer('armurerie')->{1} == false) {
	echo '<div class="erreur">';
	echo display_error(195);
	echo '</div>';	
}
else {
  if($paquet->get_infoj('lvl') >= 5) {
  	$coef = 0.8;
  }
  else {
  	$coef = 1;
  }
  $prix = array('',
                nbf($coef*100000).' '.imress('drachme').' '.nbf($coef*2000000).' '.imress('fer'),
                nbf($coef*150000).' '.imress('drachme').' '.nbf($coef*3000000).' '.imress('fer'),
                nbf($coef*100000).' '.imress('drachme').' '.nbf($coef*700000).' '.imress('argent'),
                nbf($coef*150000).' '.imress('drachme').' '.nbf($coef*1050000).' '.imress('argent'),
                nbf($coef*100000).' '.imress('drachme').' '.nbf($coef*50000).' '.imress('pierre'),
                nbf($coef*150000).' '.imress('drachme').' '.nbf($coef*75000).' '.imress('pierre'),
                nbf($coef*100000).' '.imress('drachme').' '.nbf($coef*1000000).' '.imress('bois'),
                nbf($coef*150000).' '.imress('drachme').' '.nbf($coef*1500000).' '.imress('bois'));
  $noms = array('',
_('Infanterie de mêlée'),
_('Cavalerie de mêlée'),
_('Infanterie à distance'),
_('Cavalerie à distance'),
_('Infanterie mythologique de mêlée'),
_('Cavalerie mythologique de mêlée'),
_('Infanterie mythologique  à distance'),
_('Cavalerie mythologique  à distance'));

$bonus = array('', 
_('+5% en attaque'), 
_('+5% en défense'), 
_('-5% en solde'), 
_('-5% en coût'));

echo '
  <div class="ligne centrer"><br/>
    <b>'._(
'Les améliorations sont valables durant six heure et ne sont pas cumulables.').'</b>
  </div>
  <div class="ligne centrer">
<h2>'._('Unités humaines').'</h2>
  </div>
  <div class="ligne">
    <div class="ligne_quart centrer minititre_armurerie cursor"
         id="h_infanterie_cac">'._('Infanterie de mêlée').'</div>
    <div class="ligne_quart centrer minititre_armurerie cursor"
         id="h_cavalerie_cac">'._('Cavalerie de mêlée').'</div>
    <div class="ligne_quart centrer minititre_armurerie cursor"
         id="h_infanterie_dis">'._('Infanterie à distance').'</div>
    <div class="ligne_quart centrer minititre_armurerie cursor"
         id="h_cavalerie_dis">'._('Cavalerie à distance').'</div>
  </div>';

  for($j=1;$j<=4;$j++) {
echo '
  <div class="ligne bloc_armurerie" id="bloc_amurerie_'.$j.'">
  <br/>
  <table class="centrer_tableau">
    <tr>
      <td>+5% '._('en attaque').'</td>
      <td class="droite">'.$prix[$j].'</td>
      <td class="droite">'.nbf($coef*10000). ' '. imress('raisin').'</td>';

      $var = $j.'1';
      if(!empty($bonus_unites->$var)) {
				echo '<td>'._('Fin').' : </td>
				      <td class="droite">'.display_date($bonus_unites->$var, 2);
			}
			else {
        echo '<td colspan="2"><a href="'._('armurerie').'-'.$j.'1">'._('Obtenir').'</a>';
      }
      
      echo '
      </td>
    </tr>
    <tr>
      <td>+5% '._('en défense').'</td>
      <td class="droite">'.$prix[$j].'</td>
      <td class="droite">'.nbf($coef*10000). ' '. imress('marbre').'</td>';
      
      $var = $j.'2';
      if(!empty($bonus_unites->$var)) {
				echo '<td>'._('Fin').' : </td><td class="droite">'.display_date($bonus_unites->$var, 2);
			}
			else {
        echo '<td colspan="2"><a href="'._('armurerie').'-'.$j.'2">'._('Obtenir').'</a>';
      }
      
      echo '
      </td>
    </tr>
    <tr>
      <td>-5% '._('en solde').'</td>
      <td class="droite">'.$prix[$j].'</td>
      <td class="droite">'.nbf($coef*1000). ' '. imress('vin').'</td>';
      
      $var = $j.'3';
      
      if(!empty($bonus_unites->$var)) {
				echo '<td>'._('Fin').' : </td><td class="droite">'.display_date($bonus_unites->$var, 2);
			}
			else {
        echo '<td colspan="2"><a href="'._('armurerie').'-'.$j.'3">'._('Obtenir').'</a>';
      }
      
      echo '
      </td>
    </tr>
    <tr>
      <td>-5% '._('en coût').'</td>
      <td class="droite">'.$prix[$j].'</td>
      <td class="droite">'.nbf($coef*1000). ' '. imress('gold').'</td>';
      
      $var = $j.'4';
      if(!empty($bonus_unites->$var)) {
				echo '<td>'._('Fin').' : </td><td class="droite">'.display_date($bonus_unites->$var, 2);
			}
			else {
        echo '<td colspan="2"><a href="'._('armurerie').'-'.$j.'4">'._('Obtenir').'</a>';
      }
      
      echo '
      </td>
    </tr>
  </table>
  <br/>
  </div>';
  }
  
  echo '<br/><br/>
<div class="ligne centrer">
  <h2>'._('Unités mythologiques').'</h2>
</div>
  <div class="ligne">
    <div class="ligne_quart centrer minititre_armurerie cursor"
         id="m_infanterie_cac">'._('Infanterie de mêlée').'</div>
    <div class="ligne_quart centrer minititre_armurerie cursor"
         id="m_cavalerie_cac">'._('Cavalerie de mêlée').'</div>
    <div class="ligne_quart centrer minititre_armurerie cursor"
         id="m_infanterie_dis">'._('Infanterie à distance').'</div>
    <div class="ligne_quart centrer minititre_armurerie cursor"
         id="m_cavalerie_dis">'._('Cavalerie à distance').'</div>
  </div>';
  
  for($j=5;$j<=8;$j++)
  {
  	echo '
  <div class="ligne bloc_armurerie" id="bloc_amurerie_'.$j.'">
  <br/>
  <table class="centrer_tableau">
    <tr>
      <td>+5% '._('en attaque').'</td>
      <td class="droite">'.$prix[$j].'</td>
      <td class="droite">'.nbf($coef*10000). ' '. imress('raisin').'</td>';
      
      if(!empty($bonus_unites->{$j.'1'}))
			{
				echo '<td>'._('Fin').' : </td>
				      <td class="droite">'.display_date($bonus_unites->{$j.'1'}, 2);
			}
			else
			{
        echo '<td colspan="2"><a href="'._('armurerie').'-'.$j.'1">'._('Obtenir').'</a>';
      }
      
      echo '
      </td>
    </tr>
    <tr>
      <td>+5% '._('en défense').'</td>
      <td class="droite">'.$prix[$j].'</td>
      <td class="droite">'.nbf($coef*10000). ' '. imress('marbre').'</td>';
      
      if(!empty($bonus_unites->{$j.'2'}))
			{
				echo '<td>'._('Fin').' : </td><td class="droite">'.display_date($bonus_unites->{$j.'2'}, 2);
			}
			else
			{
        echo '<td colspan="2"><a href="'._('armurerie').'-'.$j.'2">'._('Obtenir').'</a>';
      }
      
      echo '
      </td>
    </tr>
    <tr>
      <td>-5% '._('en solde').'</td>
      <td class="droite">'.$prix[$j].'</td><td class="droite">'.nbf($coef*1000). ' '. imress('vin').'</td>';
      
      if(!empty($bonus_unites->{$j.'3'}))
			{
				echo '<td>'._('Fin').' : </td><td class="droite">'.display_date($bonus_unites->{$j.'3'}, 2);
			}
			else
			{
        echo '<td colspan="2"><a href="'._('armurerie').'-'.$j.'3">'._('Obtenir').'</a>';
      }
      
      echo '
      </td>
    </tr>
    <tr>
      <td>-5% '._('en coût').'</td>
      <td class="droite">'.$prix[$j].'</td>
      <td class="droite">'.nbf($coef*1000). ' '. imress('gold').'</td>';
      
      if(!empty($bonus_unites->{$j.'4'}))
			{
				echo '<td>'._('Fin').' : </td><td class="droite">'.display_date($bonus_unites->{$j.'4'}, 2);
			}
			else
			{
        echo '<td colspan="2"><a href="'._('armurerie').'-'.$j.'4">'._('Obtenir').'</a>';
      }
      
      echo '
      </td>
    </tr>
  </table>
  <br/>
  </div>';
  }
  
  if(sizeof($paquet->get_infoj('bonus_unites')) > 0) {
echo '<div class="ligne">
  <h2>'._('Améliorations en cours').'</h2>
</div><table class="centrer_tableau">';

    $tab = trans_tab($paquet->get_infoj('bonus_unites'));
    foreach($tab as $type_unite => $tab_bonus) {
      if(sizeof($tab_bonus) > 0) {
        echo '<tr><td><b>'.$noms[$type_unite].' : </b> </td><td>';
        foreach($tab_bonus as $y => $bon) {
           echo ' '.$bonus[$bon];
        }
        echo '</td></tr>';
      }
    }
  }
  echo '</table>';


	  echo '
<script type="text/javascript">
$(function(){
  $(".bloc_armurerie").hide();
	';
	  
	if(!empty($_GET['var1'])) {
  	echo '$("#bloc_amurerie_'.$_GET['var1'][0].'").show("slow");';
	}
	
  echo '
  $(".minititre_armurerie").click( function() {
    $(".bloc_armurerie").hide("slow");
  });
  
  $("#h_infanterie_cac").click( function() {
    $("#bloc_amurerie_1").show("slow");
  });
  
  $("#h_cavalerie_cac").click( function() {
    $("#bloc_amurerie_2").show("slow");
  });
  
  $("#h_infanterie_dis").click( function() {
    $("#bloc_amurerie_3").show("slow");
  });
  
  $("#h_cavalerie_dis").click( function() {
    $("#bloc_amurerie_4").show("slow");
  });
  
  $("#m_infanterie_cac").click( function() {
    $("#bloc_amurerie_5").show("slow");
  });
  
  $("#m_cavalerie_cac").click( function() {
    $("#bloc_amurerie_6").show("slow");
  });
  
  $("#m_infanterie_dis").click( function() {
    $("#bloc_amurerie_7").show("slow");
  });
  
  $("#m_cavalerie_dis").click( function() {
    $("#bloc_amurerie_8").show("slow");
  });
});
</script>
  ';
}
?>