<title></title>
<meta name="description" content="" />
<?php
if(isset($_POST['Contact_x'])) {
	$_SESSION['joueur']->contact($_POST['login'],$_POST['mail'],$_POST['titre'], $_POST['message']);
}
?>
