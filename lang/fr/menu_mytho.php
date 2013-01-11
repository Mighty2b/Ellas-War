<div id="menu_haut_mythologie" class="menuh_visible">
	<div id="bouton_haut_arbre"><a href="arbredesdieux"><img src="design/co/menu_haut_arbre.png" alt="Arbre des Dieux" title="Arbres des Dieux" /></a></div>
	<div id="bouton_haut_autel"><a href="AutelDesDieux"><img src="design/co/menu_haut_autel.png" alt="Autel des Dieux" title="Autel des Dieux" /></a></div>
	<div id="bouton_haut_temples"><a href="Temples"><img src="design/co/menu_haut_temples.png" alt="Temples" title="Temples" /></a></div>
	<div id="bouton_haut_statues"><a href="Statues"><img src="design/co/menu_haut_statues.png" alt="Statues" title="Statues" /></a></div>
	<div id="bouton_haut_succes"><a href="Succes"><img src="design/co/menu_haut_succes.png" alt="Succès" title="Succès" /></a></div>
	<div id="bouton_haut_prieres"><a href="Prieres"><img src="design/co/menu_haut_prieres.png" alt="Prieres" title="Prieres" /></a></div>
</div>
<?php 
if($page != 'soutien_stv' && $paquet->is_event('stv') && sizeof($paquet->getTemples()) > 0) {
	echo '
	<div class="ligne centrer"><br/>
		<a href="soutien_stv" class="details_ress">Soutenez un dieu pour la Saint Valentin</a>
	</div>';
}

?>