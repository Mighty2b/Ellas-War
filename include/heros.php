<?php

if($paquet->get_answer('get_hero')->{1} != null) {

	echo '
	<div id="heros_stuff">
	
	</div>
	<div id="personnage_stats2">
		<div id="personnage_stats">
	
		</div>
	</div>';
	
	?>
	<script type="text/javascript">
	heros_stuff();
	/* form('personnage_stuff');
	form('contenu_sac_info');
	form('personnage_stats');*/
	</script>
<?php
}
else {
	echo '
<div id="cadre_milieu_petit">
	<div id="cadre_haut_petit"><img src="images/attaques/cross.png"
	                                alt="'._('Fermer').'" 
	                                title="'._('Fermer').'" 
	                                class="cursor" 
	                                style="margin-top:10px;margin-right:10px;" 
	                                onclick="javascript:fermer_cadre();"/></div>
	<div id="cadre_centre_petit">
	
	</div>
	<div id="cadre_bas_petit"></div>
</div>';

	echo '<div class="ligne_80 centrer rouge_goco gras"><br/>'._(
	'Vous n\'avez pas de héros pour l\'instant. '.
	'Choisissez votre classe et partez à l\'aventure.').'<br/>'.
	_('Attention, ce choix est définitif.').'<br/><br/></div>';
	
	$tab = $paquet->get_answer('get_possibles_classes')->{1};
	
	echo '<div id="cadre_personnage">';
	
	foreach($tab as $classe) {
		echo '<div class="cadre_personnage centrer"
		           onclick="heros_nouveau('.$classe->classe_id.')">
		<div class="cadre_personnage_int">
			<div class="cadre_personnage_titre centrer ligne">'.$classe->nom.'<br/><br/></div>	
			'.stripslashes($classe->description).'
		</div>
		</div>';
	}
	
	echo '</div>
	<script type="text/javascript">
	var max=0;
	$(".cadre_personnage").each(function(){
		if($(this).height() > max) {
			max = $(this).height();
		}
	});
	$(".cadre_personnage").height(max);
	
	</script>';
}

?>