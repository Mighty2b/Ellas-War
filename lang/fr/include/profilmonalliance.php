<?php

if($paquet->peut_profil() > 0) {
	if(!empty($_POST['description_alliance'])) {
		if(!empty($_FILES['fichier']['tmp_name'])) {
			list($width, $height, $type, $attr) = getimagesize($_FILES['fichier']['tmp_name']);
	
			if($_FILES['fichier']['error']==1) {
				alerte('Le fichier téléchargé excède la taille autorisée par le serveur(>2Mb)</div>');
			}
			elseif($_FILES['fichier']['size'] > 1024592) {
			alerte('Le fichier téléchargé excède la taille autorisée:	Vous ne pouvez télécharger qu\'un fichier dont la taille est inférieur à '.MAX_FILE_SIZE().' ');
			}
			elseif($width > 500 or $height > 350)	{
			alerte('L\'image a une trop haute résolution');
			}
			elseif($_FILES['fichier']['error']==3) {
			alerte('Le fichier n\'a été que partiellement téléchargé');
			}
			elseif($_FILES['fichier']['error']==4) {
			}
			elseif($_FILES['fichier']['type']!="image/pjpeg" && $_FILES['fichier']['type']!="image/jpeg" && $_FILES['fichier']['type']!="image/x-png" && $_FILES['fichier']['type']!="image/png" && $_FILES['fichier']['type']!="image/jpg") {
			alerte('Le fichier téléchargé n\'est pas du type autorisé');
			}
			else {
				@unlink('avataralliance/'.$paquet->getalliance().'.jpg');
				@unlink('avataralliance/'.$paquet->getalliance().'.png');
	
				if($_FILES['fichier']['type'] == "image/pjpeg") {
					move_uploaded_file($_FILES['fichier']['tmp_name'],'avataralliance/'.$paquet->getalliance().'.jpg');
				}
				else {
					move_uploaded_file($_FILES['fichier']['tmp_name'],'avataralliance/'.$paquet->getalliance().'.png');
				}
			}
		}
		$paquet = new EwPaquet('maj_profil_alliance',
													 array($_POST['description_alliance'],$_POST['lien']));
	}
	else {
		$paquet = new EwPaquet('infoalliance');
	}

$mon_alliance  = $paquet->getinfoalliance();
$liste_membres = $paquet->getRetour();
$liste_guerres = $paquet->getRetour(2);
$liste_pactes  = $paquet->getRetour(3);
$liste_attente = $paquet->getRetour(4);
$sortie        = $paquet->getRetour(5);
$depart_urgent = $paquet->depart_urgent();
$nombre_guerres = sizeof($liste_guerres);
$demande_ress  = $paquet->getRetour(6);

include('lang/'.LANG.'/menu_monalliance.php');

	echo '<center>';

	$paquet->display();

	if(is_file('avataralliance/'.$paquet->getalliance().'.jpg')) {
		echo '<img src=\'avataralliance/'.$paquet->getalliance().'.jpg\' />';
	}
	elseif(is_file('avataralliance/'.$paquet->getalliance().'.png')) {
		echo '<img src=\'avataralliance/'.$paquet->getalliance().'.png\' />';	
	}
	
	echo '<form method="post" action="ProfilMonAlliance" enctype=\'multipart/form-data\'><br/>
	<input name="fichier" type="file" class="form_retirer" /> (max 500px × 350px)<br/><br/>
	<b>Lien vers votre forum :</b> <input type="text" name="lien" value="'.$mon_alliance -> lien.'" class="form_retirer" size="40"/><br/><br/>
	<textarea name="description_alliance" class="form_retirer" style="width:600px;height:300px;" required="required">'.stripslashes(stripslashes(stripslashes($mon_alliance -> description))).'</textarea>
	<br/>	<br/>
	<div class="bouton_classique"><input class="bouton_classique2" type="submit" name="Modifier" value="Modifier" /></div>
	</form>';
}
else
{
	$paquet = new EwPaquet('infoalliance', array(1));
	$mon_alliance  = $paquet->getinfoalliance();
	$liste_membres = $paquet->getRetour();
	$liste_guerres = $paquet->getRetour(2);
	$liste_pactes  = $paquet->getRetour(3);
	$liste_attente = $paquet->getRetour(4);
	$sortie        = $paquet->getRetour(5);
	$demande_ress  = $paquet->getRetour(6);
	
	$depart_urgent = $paquet->depart_urgent();
	$nombre_guerres = sizeof($liste_guerres);
	
	include('lang/'.LANG.'/menu_monalliance.php');

	$paquet->display();
	
	if(!empty($mon_alliance -> avatar))
		echo '<img src="avataralliance/'.$mon_alliance -> avatar.'" alt="">';
	
	echo '<p class="ligne80">'.$mon_alliance -> description.'</p>';
}

?>