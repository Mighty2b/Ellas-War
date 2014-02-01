<?php

echo '<title>'.('Liste d\'attaque').'</title>
<meta name="description" 
      content="'._('Liste d\'attaque').'" />';
 
if(!empty($_GET['var3'])) {
	$recupcible=addslashes(htmlentities(trim($_GET['var3'])));
}
else {
	$recupcible = 0;
}

if(!empty($_POST['recherche'])) {
	$recherche = addslashes(htmlentities(trim($_POST['recherche'])));
}
elseif(!empty($_GET['var4'])) {
	$recherche = addslashes(htmlentities(trim($_GET['var4'])));
}
else {
	$recherche = '';
}

if(!empty($_GET['var1'])) {
	$page_num = round(htmlentities(trim($_GET['var1'])));
}
else {
	$page_num = 1;
}

if(empty($_GET['var2'])) {
	$par = 'niveau';
}
else {
	$par = $_GET['var2'];
}

$paquet->add_action('liste_attaque',
                    array($recupcible, $par, $recherche, $page_num));

?>