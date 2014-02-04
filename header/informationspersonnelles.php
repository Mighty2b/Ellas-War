<?php

echo '<title>'._('Informations personnelles').'</title>
<meta name="description" 
      content="'._('Informations personnelles').'" />';

if(!empty($_POST)) {
	$age=abs(round($_POST['age']));

	if(is_numeric($age)) {

		if(!empty($_POST['pays'])) {
			$pays=trim(htmlentities($_POST['pays'], ENT_NOQUOTES, 'UTF-8'));
		}
		
		if(empty($pays) or ($pays == 'Thumbs.db') or !file_exists($dir.'/'.$pays)) {
			$pays='aaa.gif';
		}

	if(!empty($_FILES['fichier']['tmp_name'])) {
		list($width, $height, $type, $attr) = getimagesize($_FILES['fichier']['tmp_name']);
		
		if($_FILES['fichier']['error']==1) {
			alerte(_('Le fichier téléchargé excède la taille autorisée par le serveur(>2Mb)</div>'));
		}
		elseif($_FILES['fichier']['size'] > 1024592) {
			alerte(_('Le fichier téléchargé excède la taille autorisée:	Vous ne pouvez télécharger qu\'un fichier dont la taille est inférieur à ').MAX_FILE_SIZE().' ');
		}
		elseif($width > 200 or $height > 200)	{
			alerte(_('L\'image a une trop haute résolution'));
		}
		elseif($_FILES['fichier']['error'] == 3) {
			alerte(_('Le fichier n\'a été que partiellement téléchargé'));
		}
		elseif($_FILES['fichier']['error'] == 4) {
		}
		elseif($_FILES['fichier']['type']!="image/jpeg" && $_FILES['fichier']['type']!="image/jpg" && $_FILES['fichier']['type']!="image/pjpeg" && $_FILES['fichier']['type']!="image/x-png" && $_FILES['fichier']['type']!="image/png") {
			alerte(_('Le fichier téléchargé n\'est pas du type autorisé'));
		}
		else {
			$maj_avatar = 1;
		}
	}
	
	$paquet -> add_action('maj_profil', array($age, $_POST['loc'],
	                                          $_POST['description'],
	                                          $_POST['emplois'],$pays));
	}
}

$paquet -> add_action('get_profil');

?>
