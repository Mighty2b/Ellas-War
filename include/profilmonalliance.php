<?php

include('include/menu_monalliance.php');

if($paquet->get_infoj('droits_alliance')->modifier_profils > 0) {
	if(!empty($upload)) {
		@unlink('avataralliance/'.$mon_alliance->id.'.jpg');
		@unlink('avataralliance/'.$mon_alliance->id.'.png');

		if($_FILES['fichier']['type'] == "image/pjpeg") {
			move_uploaded_file($_FILES['fichier']['tmp_name'],
                         'avataralliance/'.$mon_alliance->id.'.jpg');
		}
		else {
			move_uploaded_file($_FILES['fichier']['tmp_name'],
			                   'avataralliance/'.$mon_alliance->id.'.png');
		}
	}
	
	echo '<center>';

	if(is_file('avataralliance/'.$mon_alliance->id.'.jpg')) {
		echo '<img src=\'avataralliance/'.$mon_alliance->id.'.jpg\' />';
	}
	elseif(is_file('avataralliance/'.$mon_alliance->id.'.png')) {
		echo '<img src=\'avataralliance/'.$mon_alliance->id.'.png\' />';	
	}
	
	echo '<form method="post"
	            action="'._('profilmonalliance').'"
	            enctype="multipart/form-data"><br/>
	<input name="fichier"
	       type="file" /> (max 500px × 350px)<br/><br/>
	<b>'._('Lien vers votre forum').' :</b> <input type="text" 
	                                               name="lien" 
	                                               value="'.$mon_alliance -> lien.'"
	                                               size="40"/><br/><br/>
	<textarea name="description_alliance" 
	          style="width:600px;height:300px;" 
	          required="required">'.stripslashes(stripslashes(stripslashes($mon_alliance -> description))).'</textarea>
	<br/>	<br/>
	<div class="bouton_classique"><input type="submit" 
	                                     name="'._('Modifier').'" 
	                                     value="'._('Modifier').'" /></div>
	</form>';
}
else
{
	if(!empty($mon_alliance -> avatar)) {
		echo '<img src="avataralliance/'.$mon_alliance -> avatar.'" alt="">';
	}
	
	echo '<p class="ligne80">'.$mon_alliance -> description.'</p>';
}

?>