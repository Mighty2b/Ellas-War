<?php

$dir     = 'images/drapeau';
$dossier = opendir($dir);
$r       = $paquet->get_answer('get_profil')->{1};

echo '<h1>',$paquet->get_infoj('login'),'</h1>
<div class="centrer">';

if(is_file('avatarjoueur/'.$paquet->get_infoj('id').'.jpg'))
	echo '<br/><img src=\'avatarjoueur/'.$paquet->get_infoj('id').'.jpg\' />';
elseif(is_file('avatarjoueur/'.$paquet->get_infoj('id').'.png'))
	echo '<br/><img src=\'avatarjoueur/'.$paquet->get_infoj('id').'.png\' />';
else {
	echo '<br/>';
}

if(!empty($r->parrainage)) {
	echo $r->parrainage;
}

echo '</div>
<form method=\'post\' action=\'#\' enctype=\'multipart/form-data\'>
<table class="none">
<tr>
	<td class="gras">'._('Age').'</td>
	<td><input type=\'text\' name=\'age\' maxlength=\'3\' size=\'3\' value=\'',$r->age,'\' class="form_retirer" style="text-align:right"> ans</td>
</tr>
<tr>
	<td class="gras">'._('Emplois').'</td>
	<td><input type=\'text\' name=\'emplois\' maxlength=\'50\' value=\'',$r->emplois,'\' class="form_retirer" style="text-align:left"></td>
</tr>

<tr>
	<td class="gras">'._('Avatar').'</td>
	<td><input name="fichier" type="file" class="form_retirer" />
			<br/> (max 200px × 200px, jpg ou png)</td>
</tr>

<tr>
	<td class="gras">'._('Description').'</td> 
	<td><textarea name=\'description\' rows=\'6\' cols=\'50\' maxlength=\'1000\' style="height:120px; width:345px;text-align:left;" class="form_retirer">',$r->description,'</textarea></td>
</tr>
<tr>
	<td class="gras">'._('Localisation').'</td>
	<td><input type=\'text\' name=\'loc\' maxlength=\'50\'  value="',$r->ville,'" class="form_retirer" style="text-align:left">';

if($r->pays != 'aaa.gif') {
	echo ' <img src="'.$dir.'/'.$r->pays.'" style="text-align:left">';
}

echo '</td></tr>
<tr><td></td><td> <table class="none"><tr>';

$i=0;
while($fichier=readdir($dossier))	{
	$berk=array('.', '..');
	if(!in_array($fichier,$berk)) {
		$lien=$dir.'/'.$fichier;
		if($fichier != 'Thumbs.db' AND $fichier != 'aaa.gif' AND $fichier != 'index.php')	{
			if(file_exists($lien)) {
				if($r->pays == $fichier) {
					echo '<td><img src="'.$lien.'"><input type="radio" name="pays" value="'.$fichier.'" checked="checked" /></td>';
				}
				else {
					echo '<td><img src="'.$lien.'"><input type="radio" name="pays" value="'.$fichier.'" /></td>';
				}
			}
			$i++;
			if($i%7 == 0)
				echo '</tr><tr>';
		}
	}
}

echo '
</tr></table></td></tr>
<tr><td class="gras"></td><td class="centrer">
<div class="bouton_classique"><input type="submit"
                                     name="action_profil" 
                                     Value="'._('Modifier').'"/></div>
</td></tr>
</table></form>';

?>