<?php
	echo '
<h1>'._('Venez combattre sur Ellàs War').'</h1>
<br/>
<p>'._('Inscrivez-vous <b>gratuitement</b> sur Ellàs War, '.
'affrontez des milliers de joueurs et '.
'défendez votre <b>cité</b> face aux ennemis qui l\'entourent. ').'<br/><br/></p>

<div id="home_description_1" class="visible">

<div class="home_description_left">
<img src="'.STATIC_LINK.'lang/'.LANG.'/images/screen/mini_strategie.png" 
     alt="'._('Déployez votre stratégie').'"
     title="'._('Déployez votre stratégie').'"
     width="120" height="113" >
<br/>
<div class="ligne_50 ligne200 centrer cursor gras"
     onclick="display_cadre(4)">&larr;</div>
<div class="ligne_50 ligne200 centrer cursor gras"
     onclick="display_cadre(2)">&rarr;</div>
</div>

<div class="home_description_right">
<div class="home_description_right_inner">
<h2>'._('Déployez votre stratégie').'</h2><br/>'.
_('Prenez la tête d\'une <b>cité</b> au milieu d\'une <b>Grèce</b> à feu et à sang. '.
'Enrôlez des hommes et construisez des défenses. '.
'Engagez des forces, faites vos propres <b>stratégies</b> et '.
'partez à l\'assaut des autres <b>cités</b>. '.
'Ou préférerez-vous peut-être développer vos productions et '.
'faire prospérer votre cité <b>économiquement</b> grâce au commerce ?').'</div>
</div>
</div>

<div id="home_description_2">

<div class="ligne"><h2>'._('Faites intervenir les dieux').'</h2></div>

<div class="home_description_left">
<img src="'.STATIC_LINK.'lang/'.LANG.'/images/screen/mini_dieux.png" 
     alt="'._('Déployez votre stratégie').'"
     title="'._('Déployez votre stratégie').'"
     width="120" height="76" >
<br/>
<div class="ligne_50 centrer cursor gras"
     onclick="display_cadre(1)">&larr;</div>
<div class="ligne_50 centrer cursor gras"
     onclick="display_cadre(3)">&rarr;</div>
</div>

<div class="home_description_right">
<div class="home_description_right_inner">'.
_('Honorez les <b>dieux</b>, vivez en les respectant et en les craignant. '.
'Vous devrez faire des choix, chacun vous donnera un avantage unique. '.
'Ce sont eux qui apporteront à votre <b>cité</b> gloire et renommée ou '.
'au contraire la conduiront à sa perte. '.
'N\'oubliez pas, <b>les dieux</b> sont parmi vous, ils vous observent.').'</div>
</div>
</div>

<div id="home_description_3">

<div class="ligne"><h2>'._('Chaque avantage compte').'</h2></div>

<div class="home_description_left">
<img src="'.STATIC_LINK.'lang/'.LANG.'/images/screen/mini_arbre.png" 
     alt="'._('Déployez votre stratégie').'"
     title="'._('Déployez votre stratégie').'"
     width="120" height="78" >
<br/>
<div class="ligne_50 centrer cursor gras"
     onclick="display_cadre(2)">&larr;</div>
<div class="ligne_50 centrer cursor gras"
     onclick="display_cadre(4)">&rarr;</div>
</div>

<div class="home_description_right">
<div class="home_description_right_inner">'.
_('L\'arbre des <b>dieux</b> vous permettra de spécialiser votre cité. '.
'Vénérez les <b>dieux</b> et les <b>grands hommes</b> de la <b>Grèce antique</b> '.
'grâce aux autels et aux statues et ils vous en remercieront.').'</div>
</div>
</div>

<div id="home_description_4">

<div class="ligne"><h2>'._('Prenez des risques').'</h2></div>

<div class="home_description_left">
<img src="'.STATIC_LINK.'lang/'.LANG.'/images/screen/mini_tresor.png" 
     alt="'._('Déployez votre stratégie').'"
     title="'._('Déployez votre stratégie').'"
     width="120" height="71" >
<br/>
<div class="ligne_50 centrer cursor gras"
     onclick="display_cadre(3)">&larr;</div>
<div class="ligne_50 centrer cursor gras"
     onclick="display_cadre(1)">&rarr;</div>
</div>

<div class="home_description_right">
<div class="home_description_right_inner">'.
_('Faites des stocks grâce à votre trésor ou dépensez tout afin d\'améliorer vos <b>soldats</b>. '.
'N\'oubliez pas que chaque choix peut avoir des conséquences. '.
'Mais ne faut-il pas prendre des risques '.
'pour devenir la plus puissante des <b>cités Grecques</b> ?').'</div>
</div>
</div>';

if($paquet->get_answer('get_news') != null) {
	$list_news = $paquet->get_answer('get_news')->{1};
		
	if(sizeof($list_news) > 0) {
		echo '<div id="new_list" class="ligne">
		<h2>'._('News').'</h2>';
		
		foreach($list_news as $i => $news) {
			echo '
			<div class="ligne">
				<a href="'.$news->lien.'" class="titre_news" target="_blank" >'.$news->titre.'</a>, <i>'.display_date($news->temps, 1).'</i>
			</div>';
		}
		
		echo '</div>';
	}
}
?>

<script type="text/javascript">
function display_cadre(id) {
	$(".visible").hide();
	$("#home_description_"+(id)).show();
	$(".visible").removeClass('visible');
	$("#home_description_"+(id)).addClass('visible');
}
</script>
