<?php

$currentDate   = $_SERVER['REQUEST_TIME'];
$currentMonth  = date('m', $currentDate);
$firstDayMonth = $currentDate - ((date('d', $currentDate)-1)*3600*24);
$firstDayCalendar = $firstDayMonth - (date('N', $firstDayMonth)-1)*3600*24;

if(date('m', $firstDayCalendar+28*3600*24) == $currentMonth) {
  $nbDays = 35;
}
else {
  $nbDays = 42;
}

echo '<div class="caseJour">'._('Lundi').'</div>';
echo '<div class="caseJour">'._('Mardi').'</div>';
echo '<div class="caseJour">'._('Mercredi').'</div>';
echo '<div class="caseJour">'._('Jeudi').'</div>';
echo '<div class="caseJour">'._('Vendredi').'</div>';
echo '<div class="caseJour">'._('Samedi').'</div>';
echo '<div class="caseJour">'._('Dimanche').'</div>';

for($i=0;$i<$nbDays;$i++) {
  
  $time  = $firstDayCalendar+$i*3600*24;
  $jourS = date('N', $time);
  $jour  = date('j', $time);
  
  echo '
  <div class="caseEvenements">
    <div class="jour">'.$jour.'</div>
    <div class="caseList">';
  
  switch($jourS) {
    case 1:
      echo '<div class="evenement">'._('Entrepôts ouverts').'</div>';
    break;
    case 2:
      echo '<div class="evenement">'._('Entrepôts ouverts').'</div>';
    break;
    case 3:
      echo '<div class="evenement">'._('Débarras ouverts').'</div>';
    break;
    case 4:
      echo '<div class="evenement">'._('Entrepôts ouverts').'</div>';
      echo '<div class="evenement">'._('Diamant des dieux').'</div>';
    break;
    case 5:
      echo '<div class="evenement">'._('Entrepôts ouverts').'</div>';
      echo '<div class="evenement">'._('+10% aux gains d\'XP').'</div>';
    break;
    case 6:
      echo '<div class="evenement">'._('Débarras ouverts').'</div>';
      echo '<div class="evenement">'._('Tirage du loto').'</div>';
    break;
    case 7:
      echo '<div class="evenement">'._('Débarras ouverts').'</div>';
      echo '<div class="evenement">'._('Chalenge de l\'honneur').'</div>';
      echo '<div class="evenement">'._('Carré magique').'</div>';
      echo '<div class="evenement">'._('Retour de la Pythie').'</div>';
    break;
    
  }
  
  switch($jour) {
    case 1:
      echo '<div class="evenement">'._('Nomination d\'un nouvel Oracle').'</div>';
    break;
  }
  
echo '</div>
  </div>';
}

?>
<script type="text/javascript">
	var max=100;
	$(".caseEvenements").each(function(){
		if($(this).height() > max) {
			max = $(this).height();
		}
	});
	$(".caseEvenements").height(max);
</script>
