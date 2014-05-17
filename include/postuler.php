<?php


if($paquet->get_infoj('lvl') < $paquet->get_answer('get_listealliances')->{4}) {
	redirect();
}

$all = $paquet->get_infoj('alliance');
if(!empty($all)) {
	redirect();
}

if(!empty($_POST['motivation'])) {
	redirect(_('lesalliances'));
}

$alliance = $paquet -> get_answer('profils_alliance')->{1};

if(empty($alliance -> nom) or !empty($alliance -> statu_rec)) {
	redirect();
}

echo '<div class="centrer">
	<br/><br/><b>'.
	_('Mettez vos motivations pour rentrer dans l\'alliance '.$alliance -> nom).'
	</b><br><br>
	<form action="#" method="post">
	<textarea name="motivation"
	          rows="10" 
	          cols="45" 
	          required="required" 
	          placeholder="'._('Vos motivations').'"></textarea><br/>
	<br/>
	<div class="bouton_classique"><input type="submit" 
	                                     name="postuler" 
	                                     value="'._('Postuler').'" /></div>
	</form>
</div>';

echo '
<script type="text/javascript">
    $(document).ready(function() {
        document.title = \'Postuler dans '.$alliance -> nom.'\';
    });
</script>';

?>