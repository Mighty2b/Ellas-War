<?php

echo '<script type="text/javascript">
var note={'.$dates.'};
</script>';

?>
<center>
<form style="margin: 0px;" method="post" action="Calendrier-<?php echo $date_enre; ?>">
	<div style="display:inline">
		<input class="calendrier" type="text" name="date" onfocus="view_microcal(true,'microcal','microcal',-1,0);" onblur="view_microcal(false,'microcal','microcal',-1,0);" onkeyup="this.style.color=testTypeDate(this.value)?'black':'red'" size="40" value="<?php echo $date; ?>" />
		<div id="microcal" name="microcal" style="visibility:hidden;position:absolute;border:1px gray dashed;background:#ffffff; margin-left: 282px; z-index:100;"></div>
		
		<input type="checkbox" name="rappel" <?php echo (!empty($do->rappel)?'checked="checked"':''); ?>/>	<b>Rappel automatique</b>
	</div>
<?php

if($paquet->peut_profil() > 0) {
	echo '	<textarea class="form_retirer" style="width: 700px; height: 150px;" cols="40" rows="8" name="texte">'.(!empty($do -> texte)?stripslashes($do -> texte):'').'</textarea><br/>
					<div class="bouton_classique"><input class="bouton_classique2" type="submit" value="Envoyer" name="envoyer" /></div>
				</form>';
}
else {
	if(!empty($do -> texte))
		echo '<table class="tableau_calendrier"><tr><td>'.stripslashes($do -> texte).'</tr></td></table>';
}

?>