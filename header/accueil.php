<?php

if(!empty($_POST['identifiant']) && !empty($_POST['pass'])) {
	if(empty($_POST['rester_co']) or !($_POST['rester_co'] == true)) {
		$_POST['rester_co'] = false;
	}
	$paquet = new EwPaquet('connexion', array($_POST['identifiant'], $_POST['pass'], $_POST['rester_co']));
	if($paquet->get_statu() != 0) {
		redirect();
	}
} 

?>
<script type="text/javascript">
function load_deco()
{
	document.getElementById('ap').value=window.location;
}
</script>
