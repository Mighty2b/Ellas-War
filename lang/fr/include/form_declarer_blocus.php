<?php
	echo '<h1>'.ucfirst(stripslashes($cible -> nom));
?></h1>

<div align='justify'>
Vous êtes sur le point d'imposer un blocus commercial à l'alliance : <b><?php echo stripslashes($cible -> nom); ?></b>, 
réfléchissez bien aux conséquences de vos actes. 
Une fois le blocus mis en place vous ne pourrez plus accéder a commerce au bout de 48 heures. 
Mais le risque en vaut la chandelle, si vous arrivez à faire abdiquer l'alliance ennemis, 
elle perdra 10% de son XP et vous récupérerez la moitié de celle-ci.<br/><br/></div>
<form action="LesAlliances" method='post' enctype='multipart/form-data'>
	<input name="alliance" type="hidden" value="<?php echo $cible->id; ?>">
	<div class="bouton_classique"><input class="bouton_classique2" type="submit" value="Imposer" name="imposer" /></div>
</form>