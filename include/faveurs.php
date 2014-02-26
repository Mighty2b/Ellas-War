<?php

echo '<div class="ligne centrer">
	<h1>'._('Tout pour prendre de l\'avance !').'</h1>
	</div>';

echo '
<div id="menu_hf">
<div class="nb_faveur"><b>';
	if($paquet->get_infoj('faveur') > 1) {
		echo _('Faveurs');
	}
	else {
		echo _('Faveur');
	}
	
	echo ' :</b> <font color="red">'.$paquet->get_infoj('faveur').'</font>
	      </div>
<a href="'._('faveurs').'" 
   class="bouton_hf"><span class="bouton_hf_int">Spéciaux</span></a>
<br>
<a href="'._('faveurs').'-1" 
   class="bouton_hf"><span class="bouton_hf_int">Combat</span></a>
<br>
<a href="'._('faveurs').'-2" 
   class="bouton_hf"><span class="bouton_hf_int">Commerce</span></a>
<br>
<a href="'._('faveurs').'-3" 
   class="bouton_hf"><span class="bouton_hf_int">Ressources</span></a>
<br>
</div>
<div id="liste_hf">';

if(empty($_GET['var1'])) {
	$_GET['var1']='';
}

switch($_GET['var1']) {
	case 1:
	
	break;
	
	case 2:
	
	break;
	
	case 3:
	
	break;
	
	default:
	
	break;
}

echo '</div>';

?>
