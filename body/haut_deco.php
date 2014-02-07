<?php

echo '<section id="banniere"></section>
<nav id="menu">
	<a id="nousrejoindre"
	   href="'._('sinscrire').'"><div class="ssmenu">'._('Nous rejoindre').'</div>'._('Nous rejoindre').'</a>
	<a id="decouvrirjeu"
	   href="'._('decouvertedujeu').'"><div class="ssmenu">'._('Découvrir le jeu').'</div>'._('Découvrir le jeu').'</a>
	<a id="faq"
	   href="'.WIKI_URL.'"><div class="ssmenu">'._('Faq').'</div>'._('Faq').'</a>
	<a id="accueil"
	   href="/"><div class="ssmenu">'._('Accueil').'</div>'._('Accueil').'</a>
	<a id="forum"
	   target="_blank"
	   href="'.FORUM_URL.'"><div class="ssmenu">'._('Forum').'</div>'._('Forum').'</a>
	<a id="partenaires"
	   href="'._('partenaires').'"><div class="ssmenu">'._('Partenariats').'</div>'._('Partenaires').'</a>
	<a id="contact"
	   href="'._('nouscontacter').'"><div class="ssmenu">'._('Contact').'</div>'._('Contact').'</a>
</nav>
<section id="home">
	<section id="home_int">
		<section id="formulaire">
		
			<article id="inscription">
			<h2>'._('Inscription').'</h2>';
			
			if($paquet->get_answer('inscription') != '') {
				$answer = $paquet->get_answer('inscription');
				if($answer->{1} != 0) {
					echo display_error($answer->{1});
				}
			}
			
			?>
			<form action="/" method="post">
				<input type="text"
				       name="ilogin" 
				       value="" 
				       class="form"
				       data-minlength="4"
				       placeholder="<?php echo _('Nom de joueur'); ?>"
				       required="required" />
				<br/>
				<input type="password" 
				       name="ipass" 
				       value="" 
				       class="form"
				       placeholder="<?php echo _('Mot de passe'); ?>"
				       required="required" />
				<br/>
				<input type="email" 
				       name="iemail" 
				       value="" 
				       class="form"
				       placeholder="<?php echo _('Adresse e-mail'); ?>"
				       required="required" />
				<br/>
				<div class="bouton_classique"><input type="submit" 
				                                     name="sinscrire" 
				                                     value="<?php echo _('S\'inscrire'); ?>" /></div>
			</form>
			<br/>
			</article>
			<article id="reseaux_sociaux">
<a href="<?php echo FACEBOOK; ?>" 
   target="_blank"><img src="images/logo/facebook.png" 
                        height="36" width="36"
                        title="<?php echo _('Ellàs War sur Facebook'); ?>" 
                        alt="<?php echo _('Ellàs War sur Facebook'); ?>"></a>
&nbsp;
<a href="<?php echo TWITTER; ?>" 
   target="_blank"><img src="images/logo/twitter.png" 
                        height="36" width="36"
                        title="<?php echo _('S\'abonner à Ellaswar sur Twitter'); ?>" 
                        alt="<?php echo _('S\'abonner à Ellaswar sur Twitter'); ?>"></a>
&nbsp;
<a href="https://github.com/Mighty2b" 
   target="_blank"><img src="images/logo/github.png" 
                        height="36" width="36"
                        title="<?php echo _('Mighty sur Github'); ?>" 
                        alt="<?php echo _('Mighty sur Github'); ?>"></a>
		
			</article>
			<article id="connexion">
				<h2><?php echo _('Connexion'); ?></h2>
				<?php
					if($paquet->get_answer('connexion') != '') {
						$answer = $paquet->get_answer('connexion');
						if($answer->{2} != 0) {
							echo display_error($answer->{2});
						}
					}
				?>
				<form action="/" method="post">
					<input type="text" 
					       name="login" 
					       value="" 
					       class="form"
					       placeholder="<?php echo _('Nom de joueur'); ?>"
				           required="required" />
					<br/>
					<input type="password" 
					       name="pass" 
					       value="" 
					       class="form"
					       placeholder="<?php echo _('Mot de passe'); ?>"
				           required="required" />
					<br/>
					<div class="bouton_classique"><input type="submit" 
					                                     name="envoyer" 
					                                     value="<?php echo _('Entrer'); ?>" /></div>
				</form>
				<br/>
			</article>
		</section>
		<section id="inside">
			<article>
