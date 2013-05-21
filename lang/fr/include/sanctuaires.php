<?php
echo '
<div id="cadre_milieu_petit">
	<div id="cadre_haut_petit"><img src="images/attaques/cross.png" alt="Fermer" title="Fermer" class="supr_messagerie" style="margin-top:10px;margin-right:10px;" onclick="javascript:fermer_pacte();"/></div>
	<div id="cadre_centre_petit">
	
	</div>
	<div id="sanctuaire_rapport"></div>
	<div id="cadre_bas_petit"></div>
</div>';

echo '<div class="ligne80">';

echo '<h1>Sanctuaires</h1>';
	if($paquet->getalliance() == 0 && $paquet->getlvl2() < 3) {
		echo '<div class="erreur centrer">Vous devez être dans une alliance pour accéder aux sanctaires.</div>';
	}
	else {
	
	foreach($liste_sanctuaires as $sanctuaire) {
		if(sizeof($sanctuaire->mb) > 0) {
			echo '<div class="gauche"><b>'.$sanctuaire->nom.'</b><br/>';
			echo stripslashes($sanctuaire->description).'<br/><br/>';
		
			echo '<b>Ennemis :</b><br/>
						<ul>';
			foreach($sanctuaire->mb as $membre) {
				echo '<li>'.$membre->nom.'</li>';
			}
			echo '</ul>';
			
			if(!empty($sanctuaire_actuel)) {
				if($sanctuaire->id == $sanctuaire_actuel) {
					echo '<div class="ligne">
								<a onclick="javascript:constituer_groupe('.$sanctuaire->id.');"
									 class="details_ress img_temple">Continuer votre sanctuaire</a>
								</div></div>';
				}
				else {
					echo '<div class="ligne">
								Un sanctuaire est déjà en cours
								</div></div>';
				}
			}
			else {
				echo '<div class="ligne">
							<a onclick="javascript:constituer_groupe('.$sanctuaire->id.');"
								 class="details_ress img_temple">Constituer un groupe</a>
							</div></div>';
			}
		}
	}
}
echo '</div>';

?>