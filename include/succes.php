<?php

$liste_types = $paquet->get_answer('get_succes')->{1};
$hf_cat      = unserialize($paquet->get_answer('get_succes')->{2});
$liste       = unserialize($paquet->get_answer('get_succes')->{3});
$me_cat      = unserialize($paquet->get_answer('get_succes')->{4});
$total       = $paquet->get_answer('get_succes')->{5};

echo '<div id="menu_hf">';

$i=0;
foreach($liste_types as $do) {
  $i++;
  echo '<a href="succes-'.$do->id.'" 
  				 id="hf_img_'.$i.'" 
  				 class="bouton_hf"
  				 ><span class="bouton_hf_int">'.$do->nom.'</span></a><br/>';
}

echo '</div>
<div id="liste_hf">';

if(empty($_GET['var1']) or !is_numeric($_GET['var1'])) {

	echo '<h1>'._('Points de succès').' : '.
	     '<span class="rouge_goco">'.$total.'</span></h1>';

  echo '<br/>
  <div class="ligne">
    <div class="cadre_50">
      <div class="progress-bar">
        <div class="progress-bar3" id="bar_hf_1">
          <div class="progress-bar2 blue">
          </div>
        </div>
        <div class="progress-bar-txt">'._('Général').' '.$me_cat[1].'/'.$hf_cat[1].'</div>
      </div>
    </div>
    <div class="cadre_50">
      <div class="progress-bar">
        <div class="progress-bar3" id="bar_hf_2">
          <div class="progress-bar2 rouge">
          </div>
        </div>
        <div class="progress-bar-txt">'._('Bâtiments').' '.$me_cat[2].'/'.$hf_cat[2].'</div>
      </div>
    </div>
  </div>
  <div class="ligne">
    <div class="cadre_50">
      <div class="progress-bar">
        <div class="progress-bar3" id="bar_hf_3">
          <div class="progress-bar2 vert">
          </div>
        </div>
        <div class="progress-bar-txt">'._('Alliance').' '.$me_cat[3].'/'.$hf_cat[3].'</div>
      </div>
    </div>
    <div class="cadre_50">
      <div class="progress-bar">
        <div class="progress-bar3" id="bar_hf_5">
          <div class="progress-bar2 jaune">
          </div>
        </div>
        <div class="progress-bar-txt">'._('Attaques').' '.$me_cat[5].'/'.$hf_cat[5].'</div>
      </div>
    </div>
  </div>
  <div class="ligne">
    <div class="cadre_50">
      <div class="progress-bar">
        <div class="progress-bar3" id="bar_hf_6">
          <div class="progress-bar2 gris">
          </div>
        </div>
        <div class="progress-bar-txt">Mythologie '.$me_cat[6].'/'.$hf_cat[6].'</div>
      </div>
    </div>
    <div class="cadre_50">
      <div class="progress-bar">
        <div class="progress-bar3" id="bar_hf_8">
          <div class="progress-bar2 orange">
          </div>
        </div>
        <div class="progress-bar-txt">?</div>
      </div>
    </div>
  </div>
  ';
}

foreach($liste as $hf) {
  echo '<div class="font_hf" >
  <div class="titre_hf">'.$hf['info']['nom'].'</div>
  <div class="txt_hf">'.$hf['info']['description'].'</div>
  <div class="pt_hf">';
  	if($_GET['var1'] != 7 && !empty($hf['max'])) {
  		if($hf['nb'] < $hf['max']) {
  			echo $hf['nb'];
  		}
  		else {
  			echo '<font color="red">'.$hf['nb'].'</font>';
  		}
  	}
  	echo '</div>
  </div>';
}

echo '
</div>
<script type="text/javascript">
$(function(){';

if(!empty($me_cat[1])) {
  echo '$("#bar_hf_1").css("width", "'.round(250*$me_cat[1]/$hf_cat[1]).'px");';
}

if(!empty($me_cat[2])) {
  echo '$("#bar_hf_2").css("width", "'.round(250*$me_cat[2]/$hf_cat[2]).'px");';
}

if(!empty($me_cat[3])) {
  echo '$("#bar_hf_3").css("width", "'.round(250*$me_cat[3]/$hf_cat[3]).'px");';
}

if(!empty($me_cat[5])) {
  echo '$("#bar_hf_5").css("width", "'.round(250*$me_cat[5]/$hf_cat[5]).'px");';
}

if(!empty($me_cat[6])) {
  echo '$("#bar_hf_6").css("width", "'.round(250*$me_cat[6]/$hf_cat[6]).'px");';
}

if(!empty($me_cat[8])) {
  echo '$("#bar_hf_8").css("width", "'.round(250*$me_cat[8]/$hf_cat[8]).'px");';
}

echo '
  $(".progress-bar").animate({"width": "250px"}, { duration: 2000});
});
</script>';

?>