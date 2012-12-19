<h1>Armurerie</h1>
<?php

$paquet->display();
$bonus_unites = $paquet->bonus_unites();

if($possible == true) {
  $prix = array('',
                '100000 '.imress('drachme').' 2000000 '.imress('fer'),
                '150000 '.imress('drachme').' 3000000 '.imress('fer'),
                '100000 '.imress('drachme').' 700000 '.imress('argent'),
                '150000 '.imress('drachme').' 1050000 '.imress('argent'),
                '100000 '.imress('drachme').' 50000 '.imress('pierre'),
                '150000 '.imress('drachme').' 75000 '.imress('pierre'),
                '100000 '.imress('drachme').' 1000000 '.imress('bois'),
                '150000 '.imress('drachme').' 1500000 '.imress('bois'));
  $noms = array('',
'Infanterie de mêlée',
'Cavalerie de mêlée',
'Infanterie à distance',
'Cavalerie à distance',
'Infanterie mythologique de mêlée',
'Cavalerie mythologique de mêlée',
'Infanterie mythologique  à distance',
'Cavalerie mythologique  à distance');

$bonus = array('', '+5% en attaque', '+5% en défense', '-5% en solde', '-5% en coût');

?>
  <div class="ligne centrer"><br/>
    <b>Les améliorations sont valables durant six heure et ne sont pas cumulables.</b>
  </div>
  <div class="ligne centrer">
<h2>Unités humaines</h2>
  </div>
  <div class="ligne">
    <div class="ligne_quart centrer minititre_armurerie" id="h_infanterie_cac">Infanterie de mêlée</div>
    <div class="ligne_quart centrer minititre_armurerie" id="h_cavalerie_cac">Cavalerie de mêlée</div>
    <div class="ligne_quart centrer minititre_armurerie" id="h_infanterie_dis">Infanterie à distance</div>
    <div class="ligne_quart centrer minititre_armurerie" id="h_cavalerie_dis">Cavalerie à distance</div>
  </div>
<?php
  for($j=1;$j<=4;$j++) {
?>
  <div class="ligne bloc_armurerie" id="bloc_amurerie_<?php echo $j; ?>">
  <br/>
  <table class="centrer_tableau">
    <tr>
      <td>+5% en attaque</td>
      <td class="droite"><?php echo $prix[$j]; ?></td><td class="droite">10000 <?php echo imress('raisin'); ?></td>
      <?php
      $var = $j.'1';
      if(!empty($bonus_unites->$var)) {
				echo '<td>Fin : </td><td class="droite">'.date('G\h i', $bonus_unites->$var);
			}
			else {
        echo '<td colspan="2"><a href="Armurerie-'.$j.'1">Obtenir</a>';
      }
      ?>
      </td>
    </tr>
    <tr>
      <td>+5% en défense</td>
      <td class="droite"><?php echo $prix[$j]; ?></td><td class="droite">10000 <?php echo imress('marbre'); ?></td>
      <?php
      $var = $j.'2';
      if(!empty($bonus_unites->$var)) {
				echo '<td>Fin : </td><td class="droite">'.date('G\h i', $bonus_unites->$var);
			}
			else {
        echo '<td colspan="2"><a href="Armurerie-'.$j.'2">Obtenir</a>';
      }
      ?>
      </td>
    </tr>
    <tr>
      <td>-5% en solde</td>
      <td class="droite"><?php echo $prix[$j]; ?></td><td class="droite">1000 <?php echo imress('vin'); ?></td>
      <?php
      $var = $j.'3';
      if(!empty($bonus_unites->$var)) {
				echo '<td>Fin : </td><td class="droite">'.date('G\h i', $bonus_unites->$var);
			}
			else {
        echo '<td colspan="2"><a href="Armurerie-'.$j.'3">Obtenir</a>';
      }
      ?>
      </td>
    </tr>
    <tr>
      <td>-5% en coût</td>
      <td class="droite"><?php echo $prix[$j]; ?></td><td class="droite">1000 <?php echo imress('gold'); ?></td>
      <?php
      $var = $j.'4';
      if(!empty($bonus_unites->$var)) {
				echo '<td>Fin : </td><td class="droite">'.date('G\h i', $bonus_unites->$var);
			}
			else {
        echo '<td colspan="2"><a href="Armurerie-'.$j.'4">Obtenir</a>';
      }
      ?>
      </td>
    </tr>
  </table>
  <br/>
  </div>
<?php
  }
?>
<br/><br/>
<div class="ligne centrer">
  <h2>Unités mythologiques</h2>
</div>
  <div class="ligne">
    <div class="ligne_quart centrer minititre_armurerie" id="m_infanterie_cac">Infanterie de mêlée</div>
    <div class="ligne_quart centrer minititre_armurerie" id="m_cavalerie_cac">Cavalerie de mêlée</div>
    <div class="ligne_quart centrer minititre_armurerie" id="m_infanterie_dis">Infanterie à distance</div>
    <div class="ligne_quart centrer minititre_armurerie" id="m_cavalerie_dis">Cavalerie à distance</div>
  </div>
<?php
  for($j=5;$j<=8;$j++)
  {
?>
  <div class="ligne bloc_armurerie" id="bloc_amurerie_<?php echo $j; ?>">
  <br/>
  <table class="centrer_tableau">
    <tr>
      <td>+5% en attaque</td>
      <td class="droite"><?php echo $prix[$j]; ?></td><td class="droite">10000 <?php echo imress('raisin'); ?></td>
      <?php
      if(!empty($bonus_unites[$j.'1']))
			{
				echo '<td>Fin : </td><td class="droite">'.date('G\h i', $bonus_unites[$j.'1']);
			}
			else
			{
        echo '<td colspan="2"><a href="Armurerie-'.$j.'1">Obtenir</a>';
      }
      ?>
      </td>
    </tr>
    <tr>
      <td>+5% en défense</td>
      <td class="droite"><?php echo $prix[$j]; ?></td><td class="droite">10000 <?php echo imress('marbre'); ?></td>
      <?php
      if(!empty($bonus_unites[$j.'2']))
			{
				echo '<td>Fin : </td><td class="droite">'.date('G\h i', $bonus_unites[$j.'2']);
			}
			else
			{
        echo '<td colspan="2"><a href="Armurerie-'.$j.'2">Obtenir</a>';
      }
      ?>
      </td>
    </tr>
    <tr>
      <td>-5% en solde</td>
      <td class="droite"><?php echo $prix[$j]; ?></td><td class="droite">1000 <?php echo imress('vin'); ?></td>
      <?php
      if(!empty($bonus_unites[$j.'3']))
			{
				echo '<td>Fin : </td><td class="droite">'.date('G\h i', $bonus_unites[$j.'3']);
			}
			else
			{
        echo '<td colspan="2"><a href="Armurerie-'.$j.'3">Obtenir</a>';
      }
      ?>
      </td>
    </tr>
    <tr>
      <td>-5% en coût</td>
      <td class="droite"><?php echo $prix[$j]; ?></td><td class="droite">1000 <?php echo imress('gold'); ?></td>
      <?php
      if(!empty($bonus_unites[$j.'4']))
			{
				echo '<td>Fin : </td><td class="droite">'.date('G\h i', $bonus_unites[$j.'4']);
			}
			else
			{
        echo '<td colspan="2"><a href="Armurerie-'.$j.'4">Obtenir</a>';
      }
      ?>
      </td>
    </tr>
  </table>
  <br/>
  </div>
<?php
  }
  
  if(sizeof($paquet->bonus_unites()) > 0) {
echo '<div class="ligne">
  <h2>Améliorations en cours</h2>
</div><table class="centrer_tableau">';

    $tab = trans_tab($paquet->bonus_unites());
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

}

?>