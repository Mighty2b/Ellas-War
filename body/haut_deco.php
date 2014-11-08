<?php

echo '<section id="banniere"></section>
<nav id="menu">
	<a id="nousrejoindre"
	   href="'._('sinscrire').'"><div class="ssmenu">'._('Nous rejoindre').'</div></a>
	<a id="decouvrirjeu"
	   href="'._('decouvertedujeu').'"><div class="ssmenu">'._('Découvrir le jeu').'</div></a>
	<a id="faq"
	   href="'.WIKI_URL.'"><div class="ssmenu">'._('Faq').'</div></a>
	<a id="accueil"
	   href="/"><div class="ssmenu">'._('Accueil').'</div></a>
	<a id="forum"
	   target="_blank"
	   href="'.FORUM_URL.'"><div class="ssmenu">'._('Forum').'</div></a>
	<a id="partenaires"
	   href="'._('partenaires').'"><div class="ssmenu">'._('Partenariats').'</div></a>
	<a id="contact"
	   href="'._('nouscontacter').'"><div class="ssmenu">'._('Contact').'</div></a>
</nav>
<section id="home">
	<section id="home_int">
		<section id="formulaire">
		
			<div id="inscription">
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
				       title="<?php echo _('Nom de joueur'); ?>"
				       required="required" />
				<br/>
				<input type="password" 
				       name="ipass" 
				       value="" 
				       class="form"
				       placeholder="<?php echo _('Mot de passe'); ?>"
				       title="<?php echo _('Mot de passe'); ?>"
				       required="required" />
				<br/>
				<input type="email" 
				       name="iemail" 
				       value="" 
				       class="form"
				       placeholder="<?php echo _('Adresse e-mail'); ?>"
				       title="<?php echo _('Adresse e-mail'); ?>"
				       required="required" />
				<br/>
				<div class="bouton_classique"><input type="submit" 
				                                     name="sinscrire" 
				                                     value="<?php echo _('S\'inscrire'); ?>" /></div>
			</form>
			<br/>
			</div>
			<div id="reseaux_sociaux">
<a href="<?php echo FACEBOOK; ?>" 
   target="_blank"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QwVFgItrwEOyAAABSdJREFUWMPFWNuLVVUY/31rfWvvc5mbMTo6E1ko5SVCeolgnnRKhEyELHqVwJciCqn8A4IgLQwkfBR8il56CBIFu1gQOgRBoVKhD4pz0bmc2957Xb4eZmzmzDkz53TOUOvpcPZaa//29/2+3/p9i7BsbH5qX+7psRN7NccHARpZ9igDUAJAaG8QIFMi9fOpYTWlAG4C+OHC6dE/9799ZWlB3+D2bc+9dvY7xfEI/vuRADh+4fToGQKAXM/Gnc8eOvl97+D2QUDwP44xBhCN7DrwVe/G7YOQ9QYjkFX2JFLN/j7Hm7aN7sr3DT+hQAjBrwsMpRlzkzdx7/YvKM/dx0BvhEI+wsPom7iIoZ1HYK1duXQLG1PYxCanQrAQcesAhzB5axzZg99w/I1DOPr6i4jjqGHWWx9fw43b1ZVEV6w40oojBJ9B1iFCNqsAlVv48evT6C3mEUTgff2+WmtkNkUItqFsWZs8jMkjuGTVfLcdGyLUZu/i/Jl3kM8ZZI0pWQREsFkGcSlkRYjYxEXFcQHepeiW1KQ0+nIJhgYHkGV21XkRA8Fl8D5rjBBHBXDcg+DS7tkjGv05BWYF55b4qIjw1515jP8+CecDjFZ4MFeC+KxBZDiKizBRAbXyAxBRt/WFgU05BO8RlkU79QEffPot5svZGqr9MEJxjzJxgSqzd0FKdak6CpoAa20doCR1kJBBQrpsbtMRmE1BMefhfQYVdIeVVYXNUggAu7EPznuEEJaeW4vy3CQq5XQxOhq5Yn9TzjLHeWiTg3iLoEJHuhOrBHt2FBGCYOeTm+FWREiCx55tBUxMW1jrYKIYEyVB0oT4zLwAKHgL1UmVETA8NIAP3z+CEAJ8EFjrGsr8xJuHodQCcYoFg5eOnYf4BiEW5iin2ESAeACqE+LAe49KtYYQVv+gam1JHLMsw/RMBcW8aeQQKV7cWDrXIREEH+rStNa4N1WFJjTnENHiybvwoyM8JleAD2FNpVeK/hHB6dkKlFZN38ciQiICpQ2U5o4A3Z1K8N6pywgC7HhU4+iro3XgktTh1LmrqCYLnEkzhziOm+EJHFymgs9IawPqEJAXYGo2hQhhtq+JuAgwOZOiUluqKs2muTA6l8C5FNrkQEp3KYwEpV2D4hMRtI6guXXRsEsrCDZZH0BCMFyDUqouZaQUlImhfesMsE0rymU1cJTvrOxXHB2gBMy6TgJYA5pz0NzSbwW2yTx5W4U2hXVwixqK5sCaEdQyQEzQJgftWxtAzpJ5uCxBlO9Htx2HQCOKI2jmOtXXmsCcgzFtASqJszUU+jdDJHQNiDXDGK7TPHZqIUKhjZS5pKydrUGZfNeeWsAgEhhj6jhkWEFzDOVbfrBwlpbhXQrFMSR013UIMZTSDYDYeSiO2gEE9lkVwWXQ2jQY7k4iFMcRmLkOkNYEpQ20bgmI2LmUvLcgUhB0a2EJiqgBEDMt3lO03N+zSFAi69OxigT0bBiG1hrL3bDW7V+bMDNL+f7t1Xrtf4nII9UjGL9RrqsyHwS+vQKe4b6e3HStNOFK929xoX9Ldz2HIly7Podr1+dWmso2FI4AV/pEbR0MP8cc7v0x/gW8Tbo+z1YxlS0aTEbIZi5/+dHznxEAvPLyvsd+vVO4mToVP/7MYTwyvBuyxjaETswcNb+uCQ6lOz9N+Cvvbu3ffzalsbEXcOnSRewdOzBUTvlYLXUHmfVuIcOyRg9PpBtsrAug1UyjWhl5ArGmSSO1kxtqFz//5mq1BgB/A0ucXQwgROcEAAAAAElFTkSuQmCC" 
                        height="36" width="36"
                        title="<?php echo _('Ellàs War sur Facebook'); ?>" 
                        alt="<?php echo _('Ellàs War sur Facebook'); ?>"></a>
<!-- &nbsp;
<a href="<?php echo TWITTER; ?>" 
   target="_blank"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA2ZpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuMC1jMDYwIDYxLjEzNDc3NywgMjAxMC8wMi8xMi0xNzozMjowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpGNzdGMTE3NDA3MjA2ODExQUQyNkQxRjlGQjI3MUJFMCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDoyQ0Q0QjE1M0NDQ0ExMURGOTQ4QUM3MUMzQkEwMjkyRSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDoyQ0Q0QjE1MkNDQ0ExMURGOTQ4QUM3MUMzQkEwMjkyRSIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ1M1IE1hY2ludG9zaCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkZDN0YxMTc0MDcyMDY4MTE4RTM3OTNENTRFRENEQTNGIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkY3N0YxMTc0MDcyMDY4MTFBRDI2RDFGOUZCMjcxQkUwIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+fCkUZQAABFlJREFUeNrsWG9oG2Ucfu4ul7tcQpql1nVpSm2x3TJ1y4xOHVVL5+qoX1Qc6sAhKoJ+EpV992tBFAeyj4IfBMUhKAiKm8jcmO3WWteMVZturH/m2qZJ8z+Xu/P3pk11S7LctTX9oD94klzueN/nnvf37325UCgEshbC+4Tuld/1tGnCacI7Q0ND0xwR2k4XZ4LBoLejowOKotSVTTqdRiQSwcjISJQuHxV8Pt9xIhUKBAKw2WwwDKOuYHM2NTVBkiTHzMyMjydWB9rb2+tO5FYwDoyLjT4aBEGAruvYTON5pg1cjNCmk/mn/UcIcRw0lxdCYmFthDRN2zAuqeATUJtaYegahEIersFvwafjG6OQLingc2nTg2UC+5Da8Qi9YQH67CS0we8gZeIQoW+MQpk725EN9kL+fQjSxDD4bKrqQAVvM5Z29S5fCDSsvxM8IZaKwXXuG9inx81FW0mhSsiHf0GOt2FpTx/mnn0Xse5DyG9prvhsPNgHjRegGbgJquLBYs9hZFu6qs5TwiohplAlyAKH1KcDUONRaJyAdNt9mO9/E9HeI8h6W1afy97Rity2u8vIrIKmiXY/D9WuVJ2rtEq3JcQyqHv7bmgL12+aIOPrwkL/G0jc21N8Lt75UHUyJQgiEp17axKqGWW5VAJ6207oRvm9+P1PItvoR85P9dmo7R+Jjj0Q/7gAjl5UbfRByCQgzk5YC3t+7AzSdNt+4DB9yOXO3HaP+ZzgbsSN546CT0RhC5+F4+JZ8JLdGiGHw4H8xAWkvNvABx8DJzvXlaeM2ByM8WHosXk4WrugWVWImbj1Lhih/dBsdlNLc1tCS4sQBHLdTBpqZAy8XbReOvSrl5A79ja4B/vABfaCo5yzJjIzEQjHacnsdtgkCaLTWTa3KYWKTZSaROL0CWR2P75mlfjhU8VmrGSV5jVdy1i/4qK3SmYzgNJgnU18Hsroj9AksXamLuWBvOxCgRJgtTyhp5PAwKsoTIZRIJVMQ6NM/PkHUCjRWspDzPNj+49AvjIKeXK0vLZ1PgDt5UPQGlssLRv35UfYMnsZuixbL676Vx8j9sJRFA6+DnHuGoTYDRSofqlb22hAl7VlUnPgThyDZ+ynogObcY0yQk5ZgvrJe9D2PQ31qdcAql9/h4kFMtcug/9sAO7En5AVxXTPVdGp3W43hHNfI3H+Bxj9r8AI9lCGNKnO1TC4U19AHDkJj8dTDG8rDSDbKBp+v7/iTTZQMplErqBDo/yDnQ/DaN3BQo76nS6Asi6Si+DmppaJXPwZYnQWTloe2YS/3GpTU1O1w97lcsFJxTB/5Vfkxwehquqye9A32z6xdMC+RVGEnSU8UmU9bbHpJp9NyFDL1rth2PAm//99WT0IxWnJGjja3G2msXaZLMkInczn88+Ycdh/01ai93t2PvQbKfQiaw43QyWmDCNDorADq5eYQmHCLvrjQwI70muuM6frK0d6b7Ejvb8EGADPOXNPbwasYgAAAABJRU5ErkJggg=="
                        height="36" width="36"
                        title="<?php echo _('S\'abonner à Ellaswar sur Twitter'); ?>" 
                        alt="<?php echo _('S\'abonner à Ellaswar sur Twitter'); ?>"></a> -->
&nbsp;
<a href="https://github.com/Mighty2b" 
   target="_blank"><img src="data:image/png;base64,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" 
                        height="36" width="36"
                        title="<?php echo _('Mighty sur Github'); ?>" 
                        alt="<?php echo _('Mighty sur Github'); ?>"></a>
		
			</div>
			<div id="connexion">
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
					       title="<?php echo _('Nom de joueur'); ?>"
				           required="required" />
					<br/>
					<input type="password" 
					       name="pass" 
					       value="" 
					       class="form"
					       placeholder="<?php echo _('Mot de passe'); ?>"
					       title="<?php echo _('Mot de passe'); ?>"
				           required="required" />
					<br/>
					<div class="bouton_classique"><input type="submit" 
					                                     name="envoyer" 
					                                     value="<?php echo _('Entrer'); ?>" /></div>
				</form>
				<br/>
			</div>
			<div id="mdp_perdu">
				<a href="<?php 
					echo _('mdp_perdu'); 
				?>"><?php echo _('Mot de passe perdu'); ?> ?</a>			
			</div>
		</section>
		<section id="inside">
