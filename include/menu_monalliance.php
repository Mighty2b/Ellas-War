<?php

$mon_alliance  = $paquet->get_infoj('alliance');
$liste_membres = $paquet->get_answer('infoalliance')->{1};
$liste_guerres = $paquet->get_answer('infoalliance')->{2};
$liste_pactes  = $paquet->get_answer('infoalliance')->{3};
$liste_attente = $paquet->get_answer('infoalliance')->{4};
$sortie        = $paquet->get_answer('infoalliance')->{5};
$demande_ress  = $paquet->get_answer('infoalliance')->{6};
$depart_urgent = $paquet->get_infoj('depart_urgent');
$temps_sortie_urgence = $paquet->get_answer('infoalliance')->{7};

if(is_array($liste_guerres) && sizeof($liste_guerres) > 0) {
	$nombre_guerres = sizeof($liste_guerres);
}
else {
	$nombre_guerres = 0;
}

echo '<h1><a href="'._('alliance').'"
             class="non_souligne">'.$mon_alliance -> nom.'</a>
	</h1>
	<br/><br/><div class="centrer">';

printf(_(
'L\'alliance possède actuellement <b>%s</b> points d\'expérience et est de').' ',
nbf($mon_alliance -> xp));

if($mon_alliance -> level < 5) {
	echo '<a href="'._('niveau').'">'._('niveau').' <b>'.
	     $mon_alliance -> level.'</b></a>';
}
else {
	echo _('niveau').' <b>'.$mon_alliance -> level.'</b>';
}
echo '</div>';

if(!empty($depart_urgent)) {
	echo '<div class="interdit centrer"
	           id="sortie_urgence">';
printf(_('Sortie d\'urgence activée, départ prévu le %s'),
       display_date($depart_urgent,4));

	if($depart_urgent-($temps_sortie_urgence-86400) > time() && 
	   $paquet->get_infoj('depart_force') == 0) {
		echo ' (<a href="#" onclick="annuler_depart_urgent()">'._('Annuler').'</a>)';
	}
	
	echo '</div>';
}

if($mon_alliance->dissolution_auto == 1) {
	echo '<div class="interdit centrer"
	           id="sortie_urgence">'._(
	'Votre alliance sera automatiquement dissoute dès que possible.').'</div>';
}

echo '<div class="centrer ligne80">
<hr color="white"/>
&nbsp;
<a href="'._('lesalliances').'"><img src="images/alliance/diplomatie.png"
                                     alt="'._('Diplomatie').'" 
                                     title="'._('Diplomatie').'" /></a>
&nbsp;
&nbsp;
<a href="'._('profilmonalliance').'"><img src="images/alliance/profils.png"
                                          alt="'._('Profils').'"
                                          title="'._('Profils').'" /></a>
&nbsp;
&nbsp;
<a href="'._('nouveaumessage').'-0-0-'.
           $mon_alliance->id.'"><img src="images/alliance/message.png"
                                     alt="'._('Ecrire un message aux membres de l\'alliance').'"
                                     title="'._('Ecrire un message aux membres de l\'alliance').'" /></a>
&nbsp;';

if($mon_alliance -> level >= 2) {
	echo '&nbsp;
<a href="'._('calendrier').'"><img src="images/alliance/calendrier.png"
                                   alt="'._('Calendrier').'" 
                                   title="'._('Calendrier').'" /></a>
&nbsp;';
}

echo '&nbsp;';

if(!empty($mon_alliance -> lien)) {
	echo '&nbsp;<a href="'.$mon_alliance -> lien.'"
	               target="_blank"><img src="images/alliance/forum.png"
	                                    alt="'._('Forum').'" 
	                                    title="'._('Forum').'" /></a>&nbsp;';
}

if($mon_alliance -> nb_membre > 1) {
	echo '&nbsp;
<a href="'._('donner').'"><img src="images/alliance/donner.png"
                               alt="'._('Faire un don aux membres de l\'alliance').'" 
                               title="'._('Faire un don aux membres de l\'alliance').'" /></a>
&nbsp;';
}

echo '&nbsp;
<a href="'._('cotisations').'"><img src="images/alliance/cotisations.png"
                                    alt="'._('Cotisations').'" 
                                    title="'._('Cotisations').'" /></a>
&nbsp;&nbsp;';

if(!empty($demande_ress) && $demande_ress > 0) {
	echo '<a href="'._('coffre').'"><img src="images/alliance/coffre2.png"
	                                     alt="'._('Coffre de l\'alliance').'" 
	                                     title="'._('Coffre de l\'alliance').'" /></a>';
}
else {
	echo '<a href="'._('coffre').'"><img src="images/alliance/coffre.png" 
	                                     alt="'._('Coffre de l\'alliance').'" 
	                                     title="'._('Coffre de l\'alliance').'" /></a>';
}

echo '&nbsp;
&nbsp;
<a href="'._('demande').'"><img src="images/alliance/task_notes.png"
                                alt="'._('Demande de ressources').'" 
                                title="'._('Demande de ressources').'" /></a>
&nbsp;';
if($paquet -> possible_transmettre() == true) {
	echo '&nbsp;<a href="'._('nommer').'"><img src="images/alliance/nommer.png"
	                                          alt="'._('Nommer').'" 
	                                          title="'._('Nommer').'" /></a>&nbsp;';
}

if(sizeof($liste_attente) == 0) {
	echo '&nbsp;<a href="'._('recrutements').'"><img src="images/alliance/recrutement.png"
	                                                 alt="'._('Recrutement').'" 
	                                                 title="'._('Recrutement').'" /></a>&nbsp;';
}
else {
	echo '&nbsp;<a href="'._('recrutements').'"><img src="images/alliance/recrutement2.png"
	                                                 alt="'._('Membres en attente').'" 
	                                                 title="'._('Des membres attendent pour venir dans votre alliance').'" /></a>&nbsp;';
}

echo '
&nbsp;
<a href="'._('pactes').'"><img src="images/alliance/pactes.png"
                               alt="'._('Pactes').'" 
                               title="'._('Pactes').'" /></a>
&nbsp;&nbsp;
<a href="'._('guerres').'"><img src="images/alliance/guerres.png" 
                                alt="'._('Guerres').'" 
                                title="'._('Guerres').'" /></a>
&nbsp;';

if($mon_alliance -> level >= 3 && 
   $paquet->get_infoj('droits_alliance')->contrat > 0) {
	echo '&nbsp;<a href="'._('contrats').'" ><img src="images/alliance/contrats.png"
	                                              alt="'._('Contrats').'" 
	                                              title="'._('Contrats').'" /></a>&nbsp;';
}

if($mon_alliance -> level >= 2) {
	echo '&nbsp;<a href="'._('blocus').'" ><img src="images/alliance/blocus.png"
	                                            alt="'._('Blocus').'" 
	                                            title="'._('Blocus').'" /></a>&nbsp;';
}

echo '&nbsp;
<a href="'._('archives_alliance').'"><img src="images/alliance/archives.png" 
                                          alt="'._('Archives').'" 
                                          title="'._('Archives').'" /></a>
&nbsp;';

if($sortie == 1) {
	echo '&nbsp;<a href="'._('quitter').'"><img src="images/alliance/quitter.png"
	                                            alt="'._('Quitter l\'alliance').'" 
	                                            title="'._('Quitter l\'alliance').'" /></a>&nbsp;';
}
elseif($sortie == 2) {
	echo '&nbsp;
	<a href="'._('sortieurgence').'"
	   onclick="if(window.confirm(\''._('Déclencher la procédure de départ d\\\'urgence ?').'\')) { this.disabled=\'true\';} else { return false; }"><img src="images/alliance/sortie_urgence.png" alt="'._('Départ d\'urgence').'" title="'._('Sortie d\'urgence').'" /></a>
	&nbsp;';
}
elseif($sortie == 3)
{
echo '
&nbsp;
<a href="'._('dissoudre').'"
   onClick="if (window.confirm(\''._('Dissoudre votre alliance ?').'\')) { this.disabled=\'true\'; document.form_attaque.submit(); return false; } else { return false; }"><img src="images/alliance/dissoudre.png" alt="'._('Dissoudre').'" title="'._('Dissoudre').'" /></a>
&nbsp;';
}
elseif($sortie == 4)
{
echo '
&nbsp;
<a href="'._('dissoudre').'"
   onClick="if (window.confirm(\''._('Demander la dissolution de votre alliance ?').'\')) { this.disabled=\'true\'; document.form_attaque.submit(); return false; } else { return false; }"><img src="images/alliance/dissoudre.png" alt="'._('Dissoudre').'" title="'._('Dissoudre').'" /></a>
&nbsp;';
}

echo '<hr color="white"/>
</div>';

echo '<script type="text/javascript">

function annuler_depart_urgent() {
   $.ajax({
	     type: "GET",
	     url: "form/annuler_depart_urgent.php"
	   });
   $("#sortie_urgence").hide("slow");
}

</script>'

?>
