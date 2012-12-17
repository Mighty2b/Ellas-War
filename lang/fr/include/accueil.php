<div id="cadre_login">
	<div id="cadre_login1">
	<form method="post" action="#">
		<div id="cadre_login2">
			<span class="rouge_goco">I</span>dentifiant
		</div>
		<div id="cadre_login3">
			<input type="text" name="identifiant" class="accueil" required="required" />			
		</div>
	
		<div id="cadre_login4"><span class="rouge_goco">M</span>ot de passe</div>
		<div id="cadre_login5"><input type="password" name="pass" class="accueil" required="required" /><br/><a href="#" class="lien" onclick="window.open('motdepasseperdu.php','Mot de passe perdu','toolbar=0, location=0, directories=0, status=0, scrollbars=1, resizable=0, copyhistory=0, menuBar=0, width=800, height=200');">Mot de passe perdu ?</a></div>
		<div id="cadre_login6">
			<div id="cadre_login7"><div class="bouton_classique"><input class="bouton_classique2" type="submit" value="VALIDER" onclick="javascript:load_deco();"/></div></div>
			<div id="cadre_login8"><input type="hidden" name="ap" value="" id="ap" /><input type="checkbox" name="rester_co" class="resterco" />&nbsp;</div>
			<div id="cadre_login9">Rester connecté</div>
		</div>
	</form>
	</div>
</div>
<div id="cadre_accueil">
	<div id="cadre_display" class="centrer">
<?php
	$paquet->display();
?>
</div>
<div>
<div style="position:absolute;float:left;height:50px;">
	<div class="fb-like-box" data-href="http://www.facebook.com/pages/Ellas-War/236755106383392" data-width="300" data-show-faces="false" data-stream="false" data-header="false"></div>
</div>

<div style="position:absolute;float:left;height:50px;margin-left:250px;margin-top:23px;">
	<g:plusone annotation="inline"></g:plusone>
</div>

<div style="position:absolute;float:left;height:50px;margin-left:510px;margin-top:20px;">
	<a href="http://www.twitter.com/Ellaswar"><img src="images/logo-twitter.png" alt="S'abonner à Ellaswar sur Twitter" width="36" height="36"/></a>
</div>	
	
	</div>
	<div id="news_ew"><a href="http://forums.ellaswar.com/viewforum.php?f=11" class="lien"><span class="rouge_goco">N</span>ews</a></div>
</div>
<div id="cadre_accueil2">
<div id="cadre_accueil21">
<span class="rouge_goco">B</span>âtissez votre cité au milieu d'une Grèce à feu et à sang. Enrôlez des hommes et construisez des défenses. Engagez des forces, faites vos propres stratégies et partez à l'assaut des autres cités.
<br/><br/>
<span class="rouge_goco">O</span>u préférerez vous peut-être développer vos productions et faire prospérer votre cité économiquement grâce au commerce ?
<br/><br/>
<span class="rouge_goco">H</span>onorez les dieux, vivez en les respectant et en les craignant. Ce sont eux qui apporteront à votre cité gloire et renommée ou au contraire la conduira à sa perte. N'oubliez pas, les dieux sont parmi vous, ils vous observent.
<br/><br/>
<span class="rouge_goco">F</span>aites des stocks grâce à votre trésor ou dépensez tout afin d'améliorer vos soldats. N'oubliez pas que chaque choix peut avoir des conséquences. Mais ne faut-il pas prendre des risques pour devenir la plus puissante des cités Grecques ?
</div>
<div id="cadre_accueil22">

<?php
$paquet = new EwPaquet('get_news', array(5));
$dernieres_news = $paquet->getRetour();

if(!empty($dernieres_news)) {
	foreach($dernieres_news as $news) {
		echo '<div class="news"><a href="'.$news->lien.'" class="titre_news">'.$news->titre.'</a>, <i>le '.date("d-m-y",$news->temps).'</i><br/>Par '.$news->auteur.'</div>';
	}
}

?>
</div>
</div>
<div id="cadre_accueil3">
	<div id="rejoignez_nous"><a href="sinscrire" class="lien"><span class="rouge_goco">R</span>ejoignez-nous</a></div>
</div>

<div id="cadre_accueil4">
	<div id="cadre_accueil41">
<a href="decouvertedujeu#lang/fr/screen/construire.png"><img src="lang/fr/screen/mini_construire.png" height="85" width="178" alt="Construire" title="Construisez des bâtiments afin d'étendre votre cité." class="img_acceuil" /></a>&nbsp;&nbsp;
<a href="decouvertedujeu#lang/fr/screen/commerce.png"><img src="lang/fr/screen/mini_commerce.png" height="85" width="85" alt="Commerce" title="Commercez avec les autres cités." class="img_acceuil" /></a>&nbsp;&nbsp;
<a href="decouvertedujeu#lang/fr/screen/tresor.png"><img src="lang/fr/screen/mini_tresor.png" height="85" width="143" alt="Tresor" title="Cachez vos riches et évitez les pillages." class="img_acceuil" /></a>&nbsp;&nbsp;
<a href="decouvertedujeu#lang/fr/screen/temples.png"><img src="lang/fr/screen/mini_temples.png" height="85" width="135" alt="Temples" title="Venerez les dieux et obtenez de terribles pouvoirs." class="img_acceuil" /></a>&nbsp;&nbsp;
<a href="decouvertedujeu#lang/fr/screen/jeux.png"><img src="lang/fr/screen/mini_jeux.png" height="85" width="140" alt="Javelot" title="Détendez-vous sur les mini jeux après vos conquêtes." class="img_acceuil" /></a>&nbsp;&nbsp;
<a href="decouvertedujeu#lang/fr/screen/jeu.png"><img src="lang/fr/screen/mini_jeu.png" height="85" width="113" alt="Jeux" title="Récuperez toutes les pièces le plus rapidement possible." class="img_acceuil" /></a>
	</div>
</div>
<div id="cadre_accueil5">
</div>