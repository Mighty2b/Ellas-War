<?php

echo '<title>'._('Classement des batailles navales').'</title>
<meta name="description"
      content="'._('Classement des batailles navales').'" />';

if(!empty($_POST['joueur'])) {
	$joueur = htmlentities(trim(addslashes($_POST['joueur'])));
}
else {
	$joueur = '';
}

if (isset($_GET['var1']) && is_numeric($_GET['var1'])) {
  $page = $_GET['var1'];
  $i=25*($page-1)+1;
}
else {
  $page = 1; // On se met sur la page 1 (par défaut)
  $i=1;// On met dans une variable le nombre de messages qu'on veut par page
}

if(!empty($_GET['var2'])) {
	$par = $_GET['var2'];
}
else {
	$par = 'niveau';
}

$paquet -> add_action ('get_classementbtn', array($par, $page));

?>