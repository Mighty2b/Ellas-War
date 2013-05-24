<?php

if(!empty($val)) {
	$val->texte = str_replace('<table>', '<table class="centrer_tableau">', $val->texte);
	echo '
	<div class="ligne centrer">
		<h2>'.$val->titre.'</h2>
		<i>Le '.date('d/m/Y \à H\hi',$val->timestamp).'</i><br/><br/>
		'.$val->texte.'
		<br/><br/>';
		
	$next--;
	
	if(!empty($next)) {
		echo '<b>Encore '.$next.' archive'.(($next>1)?'s':'').' - 
		<a href="javascript:next_archive();">Voir l\'archive suivante</a></b>';
	}
	else {
	  echo '<div class="bouton_classique"><input class="bouton_classique2"
		    																			 type="submit"
																							 name="CONTINUER"
		    																			 value="CONTINUER"
		    																			 onclick="javascript:fermer_archive();" /></div>';
	}
	
	echo '</div>';
}

?>