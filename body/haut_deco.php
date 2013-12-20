<section id="banniere"></section>
<nav id="menu"></nav>
<section id="home">
	<section id="home_int">
		<section id="formulaire">
		
			<article id="inscription">
			<h2><?php echo _('Inscription'); ?></h2>
			<input type="text"
			       name="login" 
			       value="" 
			       class="form"
			       placeholder="<?php echo _('Nom de joueur'); ?>" />
			<br/>
			<input type="password" 
			       name="pass" 
			       value="" 
			       class="form"
			       placeholder="<?php echo _('Mot de passe'); ?>" />
			<br/>
			<div class="bouton_classique"><input type="submit" 
			                                     name="envoyer" 
			                                     value="<?php echo _('S\'inscrire'); ?>" /></div>
			<br/>
			<hr/>
			</article>
			
			<article id="connexion">
				<h2>Connexion</h2>
				<?php
					if($paquet->get_answer('connexion') != '') {
						$answer = $paquet->get_answer('connexion');
						if($answer->{2} != 0) {
							echo display_error($answer->{2});
						}
					}
				?>
				<div id="erreur"></div>
				<form action="/" method="post">
					<input type="text" 
					       name="login" 
					       value="" 
					       class="form"
					       placeholder="<?php echo _('Nom de joueur'); ?>" />
					<br/>
					<input type="password" 
					       name="pass" 
					       value="" 
					       class="form"
					       placeholder="<?php echo _('Mot de passe'); ?>" />
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
