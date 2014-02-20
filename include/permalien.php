<?php

$res_permalien = $paquet->get_answer('get_permalien')->{1};

if(is_numeric($res_permalien) && $res_permalien = 1) {
	echo '<div class="erreur"><br/><br/>';
	echo display_error(213);
	echo '</div>';
}
elseif(is_numeric($res_permalien) && $res_permalien == 0) {
	echo '<div class="erreur"><br/><br/>';
	echo display_error(214);
	echo '</div>';
}
else {
		
	echo '<h1>'.$res_permalien->titre.'</h1>
	<br/><br/>
	<div class="ligne_80 centrer">
	'.$res_permalien->texte.'<br/><br/>
	
	<b>'._('Archive de').' '.$res_permalien->login.'
	'.display_date($res_permalien->timestamp,6).'</b>
	&nbsp;
	<div class="fb-like"
	     style="width:100px;" 
	     data-href="'.SITE_URL.'/permalien-'.$res_permalien->id.'" 
	     data-send="false" 
	     data-layout="button_count" 
	     data-width="450" 
	     data-show-faces="true"></div>
	</div>';
}

echo '<script type="text/javascript">
    $(document).ready(function() {';

if(is_numeric($res_permalien) && $res_permalien == 0){
	echo 'document.title = \'Cette archive est privée\'';
}
elseif(is_numeric($res_permalien) && $res_permalien == 1) {
	echo 'document.title = \'Cette archive n\'existe pas\'';
}
else {
	echo 'document.title = \''.$res_permalien->titre.'\'';
}
echo '
    });
</script>';

?>