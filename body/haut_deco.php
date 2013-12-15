<section id="banniere"></section>
<nav id="menu"></nav>
<section id="home">
	<section id="home_int">
		<section id="formulaire">
		
			<article id="inscription">
			<h2>Inscription</h2>
			<input type="text" name="login" value="" class="form" />
			<br/>
			<input type="password" name="pass" value="" class="form" />
			<br/>
			<input type="submit" name="envoyer" value="envoyer" />
			<br/><br/>
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
					<input type="text" name="login" value="" class="form" />
					<br/>
					<input type="password" name="pass" value="" class="form" />
					<br/>
					<input type="submit" 
					       name="envoyer" 
					       value="envoyer" />
				</form>
				<br/>
			</article>
		</section>
		<section id="inside">
			<article>
