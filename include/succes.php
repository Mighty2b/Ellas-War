<?php

if(!empty($_GET['var1']) && is_numeric($_GET['var1'])) {
	$paquet = new EwPaquet('get_succes', array($_GET['var1']));
}
else {
	$paquet = new EwPaquet('get_succes');
	$_GET['var1']=0;
}

$liste_types = $paquet->getRetour();
$hf_cat      = unserialize($paquet->getRetour(2));
$liste       = unserialize($paquet->getRetour(3));
$me_cat      = unserialize($paquet->getRetour(4));
$total       = $paquet->getRetour(5);

echo '<div id="menu_hf">';

$i=0;
foreach($liste_types as $do) {
  $i++;
  echo '<a href="Succes-'.$do->id.'" 
  				 id="hf_img_'.$i.'" 
  				 class="bouton_hf"
  				 ><img src="lang/'.LANG.'/images/hf/'.$do->img.'.png" 
				   alt="'.$do->nom.'" 
				   name="'.$do->nom.'" /></a><br/>';
}

echo '</div>
<div id="liste_hf">';

include('lang/'.LANG.'/include/succes.php');

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