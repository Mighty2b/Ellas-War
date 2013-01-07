<div id="cadre_login">
	<div id="cadre_login1">
	<form method="post" action="#">
		<div id="cadre_login2">
			<span class="rouge_goco">L</span>ogin
		</div>
		<div id="cadre_login3">
			<input type="text" name="identifiant" class="accueil" required="required" />			
		</div>
	
		<div id="cadre_login4"><span class="rouge_goco">P</span>assword</div>
		<div id="cadre_login5"><input type="password" name="pass" class="accueil" required="required" />
		<br/>
		<a href="#" class="lien" onclick="window.open('uk/lostpassword.php', 'Lost password', 'toolbar=0, location=0, directories=0, status=0, scrollbars=1, resizable=0, copyhistory=0, menuBar=0, width=800, height=500');">Lost password ?</a></div>
		<div id="cadre_login6">
			<div id="cadre_login7"><div class="bouton_classique"><input class="bouton_classique2" type="submit" value="CONFIRM" onclick="javascript:load_deco();"/></div></div>
			<div id="cadre_login8"><input type="hidden" name="ap" value="" id="ap" /><input type="checkbox" name="rester_co" class="resterco" />&nbsp;</div>
			<div id="cadre_login9">Keep me logged</div>
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
	
</div>

<div style="position:absolute;float:left;height:50px;margin-left:250px;margin-top:23px;">
	
</div>

<div style="position:absolute;float:left;height:50px;margin-left:510px;margin-top:20px;">
	
</div>	
	
	</div>
	<div id="news_ew"><a href="http://forums.ellaswar.com/viewforum.php?f=11" class="lien"><span class="rouge_goco">N</span>ews</a></div>
</div>
<div id="cadre_accueil2">
<div id="cadre_accueil21">
<span class="rouge_goco">B</span>uild your city in the midst of a Greece where chaos reigns. Head the fiercest warriors and build your defenses. Engage forces, set up your own strategies and get ready to attack the other cities.
<br/><br/>
<span class="rouge_goco">Y</span>ou're feeling like a merchant? Develop your products and grow your city economically through trade.
<br/><br/>
<span class="rouge_goco">H</span>onor the gods, live by respecting and fearing them. They will bring fame and glory to your city or lead it to its ruin. Remember, you are among the gods, they are watching you.
<br/><br/>
<span class="rouge_goco">S</span>ave money in your treasure or spend it all to possess an arsenal. In any case, remember that each choice can have consequences. But should we not take risks to become the most powerful of Greek cities?
</div>
<div id="cadre_accueil22">

<?php
$paquet = new EwPaquet('get_news', array(5));
$dernieres_news = $paquet->getRetour();

if(!empty($dernieres_news)) {
	foreach($dernieres_news as $news) {
		echo '<div class="news"><a href="'.$news->lien.'" class="titre_news">'.$news->titre.'</a>, <i>the '.date("d-m-y",$news->temps).'</i><br/>By <span class="rouge_goco">'.$news->auteur.'</span></div>';
	}
}

?>
</div>
</div>
<div id="cadre_accueil3">
	<div id="rejoignez_nous"><a href="signup" class="lien"><span class="rouge_goco">J</span>oin Us</a></div>
</div>

<div id="cadre_accueil4">
	<div id="cadre_accueil41">

	</div>
</div>
<div id="cadre_accueil5">
</div>