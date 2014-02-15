<?php

echo '<title>'._('Profils de mon alliance').'</title>
<meta name="description"
      content="'._('Profils de mon alliance').'" />';

if(!empty($_POST['description_alliance'])) {
	if(!empty($_FILES['fichier']['tmp_name'])) {
		list($width, $height, 
		     $type, $attr) = getimagesize($_FILES['fichier']['tmp_name']);

		if($_FILES['fichier']['error']==1) {
alerte(_('Le fichier téléchargé excède la taille autorisée par le serveur(>2Mb)'));
		}
		elseif($_FILES['fichier']['size'] > 1024592) {
alerte(_('Le fichier téléchargé excède la taille autorisée:	Vous ne pouvez télécharger qu\'un fichier dont la taille est inférieur à 2Mo'));
		}
		elseif($width > 500 or $height > 350)	{
alerte(_('L\'image a une trop haute résolution'));
		}
		elseif($_FILES['fichier']['error']==3) {
alerte(_('Le fichier n\'a été que partiellement téléchargé'));
		}
		elseif($_FILES['fichier']['error']==4) {
		}
		elseif($_FILES['fichier']['type']!="image/pjpeg" && 
		       $_FILES['fichier']['type']!="image/jpeg" && 
		       $_FILES['fichier']['type']!="image/x-png" && 
		       $_FILES['fichier']['type']!="image/png" && 
		       $_FILES['fichier']['type']!="image/jpg") {
alerte(_('Le fichier téléchargé n\'est pas du type autorisé'));
		}
		else {
			$upload=1;
		}
	}
	$paquet-> add_action('maj_profil_alliance',
											 array($_POST['description_alliance'],$_POST['lien']));
}

$paquet-> add_action('infoalliance');

?>