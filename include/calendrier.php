<?php

include('include/menu_monalliance.php');

if(empty($mon_alliance) or $mon_alliance -> level == 1) {
	redirect();
}

$do    = $paquet->get_answer('calendrier')->{1};
$dates = $paquet->get_answer('calendrier')->{2};

echo '<script type="text/javascript">
var note={'.$dates.'};
</script>';

echo '<center>
<form style="margin: 0px;"
      method="post" 
      action="calendrier-'.$date_enre.'">
	<div style="display:inline">
		<input class="calendrier"
		       type="text" 
		       name="date" 
		       onfocus="view_microcal(true,\'microcal\',\'microcal\',-1,0);" 
		       onblur="view_microcal(false,\'microcal\',\'microcal\',-1,0);" 
		       onkeyup="this.style.color=testTypeDate(this.value)?\'black\':\'red\'" 
		       size="40" 
		       value="'.$date.'" />
		<div id="microcal" 
		     name="microcal" 
		     style="visibility:hidden;position:absolute;border:1px gray dashed;background:#ffffff; margin-left: 282px; z-index:100;"></div>
		
		<input type="checkbox"
		       name="rappel" '.
		       (!empty($do->rappel)?'checked="checked"':'').'/>	<b>'._(
		'Rappel automatique').'</b>
	</div>';

if($paquet->get_infoj('droits_alliance')->modifier_profils > 0) {
	echo '<textarea style="width: 700px; height: 150px;"
	                cols="40" 
	                rows="8" 
	                name="texte">'.(!empty($do -> texte)?stripslashes($do -> texte):'').'</textarea><br/>
					<div class="bouton_classique"><input type="submit"
					                                     value="'._('Envoyer').'" 
					                                     name="envoyer" /></div>
				</form>';
}
else {
	if(!empty($do -> texte))
		echo '<table class="none"><tr><td>'.stripslashes($do -> texte).'</tr></td></table>';
}

?>