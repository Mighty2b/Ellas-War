<?php

  $texte_niveau = array(
  'Durée : 6h, protège des espionnages',
  'Durée : 12h, protège des espionnages',
  'Durée : 6h, protège d\'Apollon et Hadès',
  'Durée : 12h, protège d\'Apollon et Hadès',
  'Durée : 6h, protège de Demeter',
  'Durée : 12h, protège de Demeter',
  'Durée : 6h, protège de Zeus',
  'Durée : 12h, protège de Zeus',
  'Durée : 6h, protège de tout',
  'Durée : 12h, protège de tout');

  echo '
  <h1>Statues</h1>
  ';

  $paquet->display();

  ?><br/>
  <p align="justify" class="ligne80">Chaque statue vous permettra d'accéder à de nouveaux 
  pouvoirs qui seront plus ou moins puissants selon leurs ornements.
  Les ornements se méritent, vous ne pourrez les faire que lorsque 
  le dieu ou héros vous en aura jugé digne. 
  Vous pouvez bâtir un maximum de trois statues, vingts ornements 
  avec un maximum de dix par statue.</p>

  <!-- Gaia -->
  <div class="ligne80 gauche liste_autels" id="cadre_autel_gaia">
	  <h2>Défense de Gaïa <?php echo (($liste_autels->defense_gaia > 0)?'<a href="Statues-defense_gaia-supprimer"><img src="images/attaques/cross.png" alt="supprimer" /></a>':''); ?></h2>
	  <div class="ligne">
		  <div class="gauche_autel">
			  <b>Niveau :</b> <?php echo $liste_autels->defense_gaia; ?>
			  <br/>
  <?php
			  if($condition_gaia == true) {
				  echo '<b>Prix :</b> '.prix_hall($prix_autels['defense_gaia'], $liste_autels->defense_gaia).'
			  <br/><br/>
			  <div class="ligne centrer"><b><a href="Statues-defense_gaia">Obtenir</a></b></div>';
			  }
			  ?>
		  </div>
		  <div class="droite_autel">
			  Gaïa mettra la nature de votre côté et augmentera la défense de votre cité.
			  <br/><br/>
			  <table>
				  <tr>
					  <td class="gras">Niveau 1 :&nbsp;</td>
					  <td class="droite">&nbsp;30 Unités&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;Niveau 6 :&nbsp;</td>
					  <td>&nbsp;180 Unités&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">Niveau 2 :&nbsp;</td>
					  <td class="droite">&nbsp;60 Unités&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;Niveau 7 :&nbsp;</td>
					  <td>&nbsp;210 Unités&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">Niveau 3 :&nbsp;</td>
					  <td class="droite">&nbsp;90 Unités&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;Niveau 8 :&nbsp;</td>
					  <td>&nbsp;240 Unités&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">Niveau 4 :&nbsp;</td>
					  <td>&nbsp;120 Unités&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;Niveau 9 :&nbsp;</td>
					  <td>&nbsp;270 Unités&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">Niveau 5 :&nbsp;</td>
					  <td>&nbsp;150 Unités&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;Niveau 10 :&nbsp;</td>
					  <td>&nbsp;300 Unités&nbsp;</td>
				  </tr>
			  </table>
		  </div>
	  </div>
  </div>
  <!-- Erebe -->

  <div class="ligne80 gauche liste_autels" id="cadre_autel_erebe">
	  <h2>Faveur de l'Érèbe <?php echo (($liste_autels->sauvegarde_ombre > 0)?'<a href="Statues-sauvegarde_ombre-supprimer"><img src="images/joueurs/supprimer_mp.png" alt="supprimer" /></a>':'');?></h2>
	  <div class="ligne">
		  <div class="gauche_autel">
			  <b>Niveau :</b> <?php echo $liste_autels->sauvegarde_ombre; ?>
			  <br/>
  <?php
			  if($condition_erebe == true) {
				  echo '<b>Prix :</b> '.prix_hall($prix_autels['sauvegarde_ombre'], $liste_autels->sauvegarde_ombre).'
			  <br/><br/>
			  <div class="ligne centrer"><b><a href="Statues-sauvegarde_ombre">Obtenir</a></b></div>';
			  }
			  ?>
		  </div>
		  <div class="droite_autel">
			  L'Érèbe est la divinité infernale née du Chaos, personnifiant les Ténèbres, l'Obscurité des Enfers. Grâce à elle, lors d'une défaite défensive vos troupes ne partiront pas toutes aux enfers.
		  <br/><br/>
			  <table>
				  <tr>
					  <td class="gras">Niveau 1 :&nbsp;</td>
					  <td class="droite">&nbsp;Jusqu'à 5 %&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;Niveau 6 :&nbsp;</td>
					  <td>&nbsp;Jusqu'à 30 %&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">Niveau 2 :&nbsp;</td>
					  <td class="droite">&nbsp;Jusqu'à 10 %&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;Niveau 7 :&nbsp;</td>
					  <td>&nbsp;Jusqu'à 35 %&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">Niveau 3 :&nbsp;</td>
					  <td class="droite">&nbsp;Jusqu'à 15 %&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;Niveau 8 :&nbsp;</td>
					  <td>&nbsp;Jusqu'à 40 %&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">Niveau 4 :&nbsp;</td>
					  <td>&nbsp;Jusqu'à 20 %&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;Niveau 9 :&nbsp;</td>
					  <td>&nbsp;Jusqu'à 45 %&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">Niveau 5 :&nbsp;</td>
					  <td>&nbsp;Jusqu'à 25 %&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;Niveau 10 :&nbsp;</td>
					  <td>&nbsp;Jusqu'à 50 %&nbsp;</td>
				  </tr>
			  </table>
		  </div>
	  </div>
  </div>

  <!-- Héra -->

  <div class="ligne80 gauche liste_autels" id="cadre_autel_hera">
	  <h2>Sacrifice d'Héra <?php echo (($liste_autels->sacrifice_hera > 0)?'<a href="Statues-sacrifice_hera-supprimer"><img src="images/attaques/cross.png" alt="supprimer" /></a>':''); ?></h2>
	  <div class="ligne">
		  <div class="gauche_autel">
			  <b>Niveau :</b> <?php echo $liste_autels->sacrifice_hera; ?>
			  <br/>
  <?php
			  if($condition_hera == true) {
				  echo '<b>Prix :</b> '.prix_hall($prix_autels['sacrifice_hera'], $liste_autels->sacrifice_hera).'
			  <br/><br/>
			  <div class="ligne centrer"><b><a href="Statues-sacrifice_hera">Obtenir</a></b></div>';
			  }
			  ?>
		  </div>
		  <div class="droite_autel">
			  Héra mettra temporairement votre cité à l'abri de vos ennemis.
			  <br/>
  <?php
		  if($liste_autels->sacrifice_hera > 0) {
			if($quand_hera == 0) {
			  echo '<br/>
	<a href="Statues-sacrifice_hera-activer" class="sous">Activer</a> (coût : 2000000 '.imress('nourriture').' 200 '.imress('vin').' )<br/>';
			}
			else {
				echo '<br/><b>Héra écoutera de nouveau vos requêtes le '.print_date($quand_hera).'</b>';
			}
		  }
  if($liste_autels->sacrifice_hera >= 10) {
	$fin = 10;
  }
  else {
	$fin = $liste_autels->sacrifice_hera+1;
  }
  for($i=$liste_autels->sacrifice_hera;$i<=$fin;$i++) {
	  if($i <= $liste_autels->sacrifice_hera+1) {
		  echo '<br/><b>Niveau '.$i.' :</b> '.$texte_niveau[$i-1];
	  }
  }

  ?>
		  </div>
	  </div>
  </div>

  <!-- Hippo -->
  <div class="ligne80 gauche liste_autels" id="cadre_autel_hippo">
	  <h2>Stratégie d'Hippodamos <?php echo (($liste_autels->strategie_hippodamos > 0)?'<a href="Statues-strategie_hippodamos-supprimer"><img src="images/attaques/cross.png" alt="supprimer" /></a>':''); ?></h2>
	  <div class="ligne">
		  <div class="gauche_autel">
			  <b>Niveau :</b> <?php echo $liste_autels->strategie_hippodamos; ?>
			  <br/>
  <?php
			  if($condition_hippo == true) {
				  echo '<b>Prix :</b> '.prix_hall($prix_autels['strategie_hippodamos'], $liste_autels->strategie_hippodamos).'
			  <br/><br/>
			  <div class="ligne centrer"><b><a href="Statues-strategie_hippodamos">Obtenir</a></b></div>';
			  }
echo '
		  </div>
		  <div class="droite_autel">
			  Le célébre architecte Hippodamos vous conseillera afin de récuperer d\'avantage de ressources chez vos ennemis.
			  <table>
				  <tr>
					  <td class="gras">Niveau 1 :&nbsp;</td>
					  <td class="droite">&nbsp;Jusqu\'à 4 %&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;Niveau 6 :&nbsp;</td>
					  <td>&nbsp;Jusqu\'à 24 %&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">Niveau 2 :&nbsp;</td>
					  <td class="droite">&nbsp;Jusqu\'à 8 %&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;Niveau 7 :&nbsp;</td>
					  <td>&nbsp;Jusqu\'à 28 %&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">Niveau 3 :&nbsp;</td>
					  <td class="droite">&nbsp;Jusqu\'à 12 %&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;Niveau 8 :&nbsp;</td>
					  <td>&nbsp;Jusqu\'à 32 %&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">Niveau 4 :&nbsp;</td>
					  <td>&nbsp;Jusqu\'à 16 %&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;Niveau 9 :&nbsp;</td>
					  <td>&nbsp;Jusqu\'à 36 %&nbsp;</td>
				  </tr>
				  <tr>
					  <td class="gras">Niveau 5 :&nbsp;</td>
					  <td>&nbsp;Jusqu\'à 20 %&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;</td>
					  <td class="gras">&nbsp;Niveau 10 :&nbsp;</td>
					  <td>&nbsp;Jusqu\'à 40 %&nbsp;</td>
				  </tr>
			  </table>
		  </div>
	  </div>
  </div>

  <div id="tab_statues">
	  <div class="ligne cadre">
		  <div class="cadre_50 centrer" id="click_gaia">';
  
		  if($condition_gaia == true) {
			  echo '<img src="lang/fr/images/autel/defensegaia.png" alt="Défense de Gaïa" title="Défense de Gaïa" />';
		  }
		  elseif($liste_autels->defense_gaia >= 10) {
			  echo '<img src="lang/fr/images/autel/defensegaia3.png" alt="Défense de Gaïa" title="Défense de Gaïa" />';
		  }
		  else {
			  echo '<img src="lang/fr/images/autel/defensegaia2.png" alt="Défense de Gaïa" title="Défense de Gaïa" />';
		  }
		  
  echo '
		  </div>
		  <div class="cadre_50 centrer" id="click_erebe">';

		  if($condition_erebe == true) {
			  echo '<img src="lang/fr/images/autel/faveurerebe.png" alt="Faveur de l\'Érèbe" title="Faveur de l\'Érèbe" />';
		  }
		  elseif($liste_autels->sauvegarde_ombre >= 10) {
			  echo '<img src="lang/fr/images/autel/faveurerebe3.png" alt="Faveur de l\'Érèbe" title="Faveur de l\'Érèbe" />';
		  }
		  else {
			  echo '<img src="lang/fr/images/autel/faveurerebe2.png" alt="Faveur de l\'Érèbe" title="Faveur de l\'Érèbe" />';
		  }
		  
  echo '
		  </div>
	  </div>
	  <div class="ligne cadre">
		  <div class="cadre_50 centrer" id="click_hera">';

		  if($condition_hera == true) {
			  echo '<img src="lang/fr/images/autel/sacrificehera.png" alt="Sacrifice d\'Héra" title="Sacrifice d\'Héra" />';
		  }
		  elseif($liste_autels->sacrifice_hera >= 10) {
			  echo '<img src="lang/fr/images/autel/sacrificehera3.png" alt="Sacrifice d\'Héra" title="Sacrifice d\'Héra" />';
		  }
		  else {
			  echo '<img src="lang/fr/images/autel/sacrificehera2.png" alt="Sacrifice d\'Héra" title="Sacrifice d\'Héra" />';
		  }
  
	echo '</div>
		  <div class="cadre_50 centrer" id="click_hippo">';

		  if($condition_hippo == true) {
			  echo '<img src="lang/fr/images/autel/hippodamos.png" alt="Stratégie d\'Hippodamos" title="Stratégie d\'Hippodamos" />';
		  }
		  elseif($liste_autels->strategie_hippodamos >= 10) {
			  echo '<img src="lang/fr/images/autel/hippodamos3.png" alt="Stratégie d\'Hippodamos" title="Stratégie d\'Hippodamos" />';
		  }
		  else {
			  echo '<img src="lang/fr/images/autel/hippodamos2.png" alt="Stratégie d\'Hippodamos" title="Stratégie d\'Hippodamos" />';
		  }
  echo '
		  </div>
	  </div>
  </div>';
?>