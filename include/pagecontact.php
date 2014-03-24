<?php

$mess  = NULL;
$liste = $paquet->get_answer('page_contact')->{1};

if(!empty($paquet->get_answer('get_message_contact')) && 
   !empty($paquet->get_answer('get_message_contact')->{1})) {
	$mess  = $paquet->get_answer('get_message_contact')->{1};
}

if(sizeof($liste) > 0) {
	echo '<div id="gauche_contact" class="ligne">';
	echo '<a href="pageContact">'._('Contacter un prophète').'</a>
				<h3>'._('Historique de contact').'</h3>';
	foreach($liste as $l => $sujet) {
		if(empty($sujet->regle)) {
			echo '<p><a href="pageContact-'.$sujet->id.'"
			            class="rouge"><b>'.stripslashes($sujet->titre).
			     '</b></a><br/><span class="mini_contact">'._('Dernier message').
			     ' '.display_date('d/m/Y', $sujet->date).'</span></p>';
		}
		else {
			echo '<p><a href="pageContact-'.$sujet->id.'"><b>'.
			stripslashes($sujet->titre).'</b></a><br/>'.
			'<span class="mini_contact">'._('Dernier message').
			' '.display_date($sujet->date).'</span></p>';
		}
	}
	echo '
		</div>
		<div id="droite_contact" class="centrer">';
}
else {
	echo '<div class="ligne centrer">';
}

echo '<div class="ligne_80"><div class="ligne90 ligne_80 justify">'._(
'Contactez l\'équipe d\'Ellàs War, envoyez-nous un message et nous '.
'vous recontacterons rapidement. Le temps de réponse est de 24h '.
'à une semaine mais nous faisons notre maximum pour traiter les '.
'demandes au plus vite. ');

if(sizeof($liste) == 0) {
	echo _('Vous pourrez aussi trouver sur cette page l\'historique de '.
	       'vos échanges avec le staff.');
}
echo '<br/><br/><br/>
</div></div>
	<form method="post" action="">
	<div class="ligne centrer">';

	$paquet->error('nouveau_topic');
	$paquet->error('nouveau_message');

	if($mess != NULL) {
		echo '<h3>'.stripslashes($mess->sujet).'</h3>
	</div>';
	}
	else {
		echo '</div>
		<div class="ligne centrer">
			<input type="text"
			       name="sujet" 
			       class="form_retirer" 
			       value="'.(!empty($_POST['sujet'])?stripslashes($_POST['sujet']):'').'" 
			       required="required" 
			       placeholder="'._('Titre de votre message').'"
			       style="width:500px;"/>
		</div>';
	}
	
	if(empty($mess->regle)) {
echo '
		<div class="ligne centrer">
			<textarea name="message" 
			          style="width:500px;height:250px;margin-top:5px;"
			          class="form_retirer" 
			          required="required" 
			          placeholder="'._('Votre message').'" >'.
(!empty($_POST['message'])?stripslashes($_POST['message']):'').'</textarea>
		</div>
		<div class="ligne centrer"><br/>
			<div class="bouton_classique"><input type="submit"
			                                     name="Contact" 
			                                     value="'._('Envoyer').'" /></div>
		</div>';

	}
	echo '</form>';

if($mess != NULL) {
	foreach($mess->message as $k => $mess) {
		echo '<p><b>'._('Par').' '.$mess->auteur.
			' '.display_date($mess->date).'</b><br/>
		'.stripslashes($mess->message).'
		</p>';
	}
}

/*
echo '
<div class="centrer erreur">
	<script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>
	<br/>
	Besoin d\'une réponse rapide ? Essayez de nous contacter sur Skype ou <a href="teamspeak" class="sous">sur Teamspeak</a>.<br/><br/>
</div>
<div class="centrer">
  <a href="skype:ellaswar?call"><img src="images/joueurs/skype.png" style="border: none;" height="82" alt="Skype Me™!" /></a>
  &nbsp;&nbsp;&nbsp;&nbsp;
  <a href="teamspeak"><img src="images/joueurs/teamspeak.png" alt="Venez nous rejoindre sur Teamspeak" title="Venez nous rejoindre sur Teamspeak" height="80" /></a>
</div>';

*/

echo '</div>';

?>