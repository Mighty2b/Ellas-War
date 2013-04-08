<?php

echo '<h1>
		<a href="Alliance" class="non_souligne">'.$mon_alliance -> nom.'</a>
	</h1>
	<br/><br/><div class="centrer">
L\'alliance possède actuellement <b>'.
number_format($mon_alliance -> xp, 0, ',', ' ').
'</b> points d\'expérience et est de ';

if($mon_alliance -> level < 5) {
	echo '<a href="niveau">niveau <b>'.$mon_alliance -> level.'</b></a>';
}
else {
	echo 'niveau <b>'.$mon_alliance -> level.'</b>';
}
echo '</div>';

if(!empty($depart_urgent)) {
	echo '<div class="interdit centrer" id="sortie_urgence">Sortie d\'urgence activée, départ prévu le '.date('d/m/Y \à H\hi', $depart_urgent);
	
	if($depart_urgent-(TEMPS_SORTIE_URGENCE-86400) > time()) {
		echo ' (<a href="#" onclick="annuler_depart_urgent()">Annuler</a>)';
	}
	
	echo '</div>';
}

if($paquet->auto_dissolution()) {
	echo '<div class="interdit centrer" id="sortie_urgence">Votre alliance a fait une demande de dissolution. Celle-ci sera automatiquement dissoute dès que possible.</div>';
}

?>
<div class="centrer ligne80">
<hr color="white"/>
&nbsp;
<a href="LesAlliances"><img src="images/alliance/diplomatie.png" alt="Diplomatie" title="Diplomatie" /></a>
&nbsp;
&nbsp;
<a href="ProfilMonAlliance"><img src="images/alliance/profils.png" alt="Profils" title="Profils" /></a>
&nbsp;
&nbsp;
<a href="Ecrire_alliance"><img src="images/alliance/message.png" alt="Ecrire un message aux membres de l'alliance" title="Ecrire un message aux membres de l'alliance" /></a>
&nbsp;

<?php

if($mon_alliance -> level >= 2) {
	echo '&nbsp;
<a href="Calendrier"><img src="images/alliance/calendrier.png" alt="Calendrier" title="Calendrier" /></a>
&nbsp;';
}

echo '&nbsp;';

if(!empty($mon_alliance -> lien)) {
	echo '&nbsp;<a href="'.$mon_alliance -> lien.'" target="_blank"><img src="images/alliance/forum.png" alt="Forum" title="Forum" /></a>&nbsp;';
}

if($mon_alliance -> nb_membre > 1) {
	echo '&nbsp;
<a href="Donner"><img src="images/alliance/donner.png" alt="Faire un don aux membres de l\'alliance" title="Faire un don aux membres de l\'alliance" /></a>
&nbsp;';
}

echo '&nbsp;
<a href="Cotisations"><img src="images/alliance/cotisations.png" alt="Cotisations" title="Cotisations" /></a>
&nbsp;&nbsp;
<a href="Coffre"><img src="images/alliance/coffre.png" alt="Coffre de l\'Alliance" title="Coffre de l\'alliance" /></a>
&nbsp;
&nbsp;
<a href="Demande"><img src="images/alliance/task_notes.png" alt="Demande de ressources" title="Demande de ressources" /></a>
&nbsp;';
if($paquet -> possible_transmettre() == true) {
	echo '&nbsp;<a href="Nommer"><img src="images/alliance/nommer.png" alt="Nommer" title="Nommer" /></a>&nbsp;';
}

if(sizeof($liste_attente) == 0) {
	echo '&nbsp;<a href=\'Recrutements\'><img src="images/alliance/recrutement.png" alt="Recrutement" title="Recrutement" /></a>&nbsp;';
}
else {
	echo '&nbsp;<a href=\'Recrutements\'><img src="images/alliance/recrutement2.png" alt="Membres en attente" title="Des membres attendent pour venir dans votre alliance" /></a>&nbsp;';
}

?>
&nbsp;
<a href="Pactes"><img src="images/alliance/pactes.png" alt="Pactes" title="Pactes" /></a>
&nbsp;&nbsp;
<a href="Guerres"><img src="images/alliance/guerres.png" alt="Guerres" title="Guerres" /></a>
&nbsp;

<?php
if($mon_alliance -> level >= 3 && $paquet->peut_contrat() > 0) {
	echo '&nbsp;<a href=\'Contrats\' ><img src="images/alliance/contrats.png" alt="Contrats" title="Contrats" /></a>&nbsp;';
}

if($mon_alliance -> level >= 2) {
	echo '&nbsp;<a href=\'Blocus\' ><img src="images/alliance/blocus.png" alt="Blocus" title="Blocus" /></a>&nbsp;';
}

?>

&nbsp;
<a href="Archives_alliance"><img src="images/alliance/archives.png" alt="Archives" title="Archives" /></a>
&nbsp;
<?php

if($sortie == 1)
{
	echo '&nbsp;<a href=\'Quitter\'><img src="images/alliance/quitter.png" alt="Quitter l\'alliance" title="Quitter l\'alliance" /></a>&nbsp;';
}
elseif($sortie == 2)
{
	echo '&nbsp;
	<a href="Sortieurgence" onclick="if (window.confirm(\'Déclencher la procédure de départ d\\\'urgence ?\')) { this.disabled=\'true\';} else { return false; }"><img src="images/alliance/sortie_urgence.png" alt="Départ d\'urgence" title="Sortie d\'urgence" /></a>
	&nbsp;';
}
elseif($sortie == 3)
{
echo '
&nbsp;
<a href=\'Dissoudre\' onClick="if (window.confirm(\'Dissoudre votre alliance ?\')) { this.disabled=\'true\'; document.form_attaque.submit(); return false; } else { return false; }"><img src="images/alliance/dissoudre.png" alt="Dissoudre" title="Dissoudre" /></a>
&nbsp;';
}
elseif($sortie == 4)
{
echo '
&nbsp;
<a href=\'Dissoudre\' onClick="if (window.confirm(\'Demander la dissolution de votre alliance ?\')) { this.disabled=\'true\'; document.form_attaque.submit(); return false; } else { return false; }"><img src="images/alliance/dissoudre.png" alt="Dissoudre" title="Dissoudre" /></a>
&nbsp;';
}
?>
<hr color="white"/>
</div>