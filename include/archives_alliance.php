<?php

$nb_archives_par_page = 20;
$nb_archives = $paquet->get_answer('get_archive_alliance')->{1};
$nb_pages = ceil($nb_archives/$nb_archives_par_page);
$archives = $paquet->get_answer('get_archive_alliance')->{2};

include('include/menu_monalliance.php');

echo '<h1>'._('Archives').'</h1>
<div class="centrer ligne_80"><br/>
<form name="form">
<select onChange="location = this.options [this.selectedIndex].value">
<option value="'._('archives_alliance').'">Toutes les archives</option>
<option value="'._('archives_alliance').'-1" '.
(($rub==1)?'selected="selected"':'').'>'._('Diplomatie').'</option>
<option value="'._('archives_alliance').'-2" '.
(($rub==2)?'selected="selected"':'').'>'._('Départs et recrutement').'</option>
<option value="'._('archives_alliance').'-3" '.
(($rub==3)?'selected="selected"':'').'>'._('Informations internes').'</option>
<option value="'._('archives_alliance').'-4" '.
(($rub==4)?'selected="selected"':'').'>'._('Demandes de ressources').'</option>
</select><br/>';

if($nb_archives > 0) {

  if($nb_pages > 1) {
    echo '<b>'._('Page').'</b> ';

    for($i=1;$i<=$nb_pages;$i++) {
      if($page == $i) {
        echo ' | <a href="'._('archives_alliance').'-'.$rub.'-'.$i.'" class="centre_armee2">'.$i.'</a> ';
      }
      else {
        echo ' | <a href="'._('archives_alliance').'-'.$rub.'-'.$i.'">'.$i.'</a> ';
      }
    }
  }

  echo '
  </form></div>
  <div class="ligne_80">
  <div id="tableau_historique" class="centrer">
    <div class="gras ligne rouge_goco">
      <div class="gauche_historique">&nbsp;'._('Date').'&nbsp;</div>
      <div class="droite_historique">&nbsp;'._('Titre').'&nbsp;</div>
    </div>';
  
  foreach($archives as $val)	{
    echo '<div class="ligne_historique">
      <div class="ligne">
        <div class="gauche_historique">'.date('d/m/Y \à H\hi',$val->timestamp).'</div>
        <div class="droite_historique" onclick="javascript:voir_archive('.$val->id.');">'.stripslashes($val->titre).'</div>
      </div>
      <div class="cache_historique" id="historique_num'.$val->id.'">
    '.stripslashes($val->texte).'
      </div>
    </div>';
  }
  echo '</div>';
}
else {
  echo '<br/><br/>'._('Les archives de votre alliance sont vides');
}

echo '</div>

<script type="text/javascript">

function voir_archive(id) {

var menu = $("#historique_num"+id);
	
	if(menu.hasClass("ouvert")) {
		menu.hide("slow");
		menu.removeClass("ouvert");
	}
	else {
		menu.addClass("ouvert");
		menu.show("slow");
	}
}

</script>';

?>